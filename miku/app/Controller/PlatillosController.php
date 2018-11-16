<?php
App::uses('AppController', 'Controller');

class PlatillosController extends AppController {

	public $components = array('Session', 'RequestHandler');
	public $paginate = array(
        'limit' => 5,
        'order' => array(
            'Platillo.id' => 'asc'
        )
    );

	public function index() {
		$this->Platillo->recursive = 0;
		$this->paginate['Platillo']['limit'] = 5;
		$this->paginate['Platillo']['order'] = array('Platillo.id' => 'asc');
		$this->set('platillos', $this->paginate());
	}

	public function view($id = null) {
		if (!$this->Platillo->exists($id)) {
			throw new NotFoundException(__('Id del platillo inválido.'));
		}
		$options = array('conditions' => array('Platillo.' . $this->Platillo->primaryKey => $id));
		$this->set('platillo', $this->Platillo->find('first', $options));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Platillo->create();
			if ($this->Platillo->save($this->request->data)) {
				$this->Session->setFlash('['.$this->request->data['Platillo']['nombre'].'] ¡Bien! Se creó un nuevo platillo.', 
										'default', array('class'=>'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('No se puedo crear el platillo.'), 
										'default', array('class'=>'alert alert-danger'));
			}
		}
		$categorias = $this->Platillo->Categoria->find('list');
		$this->set(compact('categorias'));
	}

	public function edit($id = null) {
		if (!$this->Platillo->exists($id)) {
			throw new NotFoundException(__('Id del platillo inválido.'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Platillo->save($this->request->data)) {
				
				$plat = $this->Platillo->findById($id);
				$nombrePlat = $plat['Platillo']['nombre'];
				$this->Session->setFlash("[".$nombrePlat."] Platillo actualizado.", 'default', 
										array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('No se pudo actualizar el platillo', 'default',
										array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Platillo.' . $this->Platillo->primaryKey => $id));
			$this->request->data = $this->Platillo->find('first', $options);
		}
		$categorias = $this->Platillo->Categoria->find('list');
		$this->set(compact('categorias'));
	}

	public function delete($id = null) {
		$this->Platillo->id = $id;
		if (!$this->Platillo->exists()) {
			throw new NotFoundException(__('Id del platillo inválido'));
		}

		$plat = $this->Platillo->findById($id);
		$nombrePlat = $plat['Platillo']['nombre'];

		$this->request->allowMethod('post', 'delete');
		if ($this->Platillo->delete()) {
			$this->Session->setFlash("[".$nombrePlat."] Platillo eliminado.", 'default', array('class'=>'alert alert-success'));
		} else {
			$this->Session->setFlash('No se pudo eliminar el platillo.', 'default', array('class'=>'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
