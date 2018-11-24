<?php
App::uses('AppController', 'Controller');

class CategoriasController extends AppController {

	public $components = array('Session', 'RequestHandler');
	public $helpers = array('Html', 'Form', 'Time', 'Js');
	
	//Configuración de la paginación - Parte 01
	public $paginate = array(
        'Categoria' => array(
        	'limit' => 3,
        	'order' => array('Categoria.id' => 'desc')
    	),
        'Platillo' => array(
        	'limit' => 3,
        	'recursive' => 0,
        	'order' => array('Platillo.id' => 'desc')
        )
	);
	
	public function isAuthorized($user){
		if($user['role']=='user'){
			if(in_array($this->action, array('index', 'view'))){
				return true;
			}else{
				if($this->Auth->user('id')){//Si el usuario sigue logueado pero no tiene acceso a la acción que está arribita(add, index)
					$this->Session->setFlash('No puede acceder', 'default', array('class'=>'alert alert-danger'));
					$this->redirect($this->Auth->redirect());
				}
			}
		}
		return parent::isAuthorized($user);
	}

	//Muestra lista de categorías
	public function index() {
		$this->Categoria->recursive = 0;
		//Configuración de la paginación - Parte 02
		$this->paginate['Categoria']['limit'] = 3;
		$this->paginate['Categoria']['order'] = array('Categoria.id' => 'desc');
		$this->set('categorias', $this->paginate());
	}

	//Categoría >>>> Platillos
	public function view($id = null) {
		if (!$this->Categoria->exists($id)) {
			throw new NotFoundException(__('¡id de categoría inválido!'));
		}
		//Condición de búsqueda de la categoría según el id ingresado
		$options = array('conditions' => array('Categoria.' . $this->Categoria->primaryKey => $id));
		//Encuentra la categoría según la opción indicada
		$categ = $this->Categoria->find('first', $options);
		
		//Configuración de la paginación. Le enviamos solo algunos campos de la tabla Platillo
		$this->paginate['Platillo']['conditions'] = array('Platillo.categoria_id' => $id);
		$this->paginate['Platillo']['fields'] = array('Platillo.id', 'Platillo.nombre', 
													  'Platillo.precio', 'Platillo.foto',
													  'Platillo.foto_dir', 'Platillo.categoria_id', 'Platillo.estado');
		//Obteniendo nombre de cateogría: Modelo Categoria, campo BD: categoria
		$platilloCat = $categ['Categoria']['categoria'];
		
		//Enviamos variables
		$this->set('nombreCategoria', $platilloCat);
		$this->set('categoriaPlatillos', $this->paginate('Platillo'));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Categoria->create();
			if ($this->Categoria->save($this->request->data)) {
				$this->Session->setFlash('['.$this->request->data['Categoria']['categoria'].'] ¡Bien! Se creó una nueva categoría.', 
										'default', array('class'=>'alert alert-success'));				
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('¡Algo anda mal!, No se pudo crear la categoría.', 'default',
										array('class'=>'alert alert-danger'));
			}
		}
	}

	public function edit($id = null) {
		if (!$this->Categoria->exists($id)) {
			throw new NotFoundException(__('La categoría es inválida'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Categoria->save($this->request->data)) {

				$cat = $this->Categoria->findById($id);
				$nombreCat = $cat['Categoria']['categoria'];
				$this->Session->setFlash("[".$nombreCat."] Categoría actualizada.", 'default', 
										array('class' => 'alert alert-success'));
										
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('No se pudo actualizar la categoría', 'default',
										array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Categoria.' . $this->Categoria->primaryKey => $id));
			$this->request->data = $this->Categoria->find('first', $options);
		}
	}

	public function delete($id = null) {
		$this->Categoria->id = $id;
		if (!$this->Categoria->exists()) {
			throw new NotFoundException(__('La categoría que intenta eliminar no existe'));
		}

		$cat = $this->Categoria->findById($id);
		$nombreCat = $cat['Categoria']['categoria'];

		$this->request->allowMethod('post', 'delete');
		if ($this->Categoria->delete()) {
			$this->Session->setFlash("[".$nombreCat."] Categoría eliminada.", 'default', array('class'=>'alert alert-success'));
		} else {
			$this->Session->setFlash('No se pudo eliminar la categoría ¡Pruebe otra vez!', 'default', array('class'=>'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
