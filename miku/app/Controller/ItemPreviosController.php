<?php
App::uses('AppController', 'Controller');

class ItemPreviosController extends AppController {

	public $components = array('Session', 'RequestHandler');
    public $helpers = array('Html', 'Form', 'Time');

	public function index() {
		// $this->ItemPrevio->recursive = 0;
		// $this->set('itemPrevios', $this->Paginator->paginate());
	}

	public function view() {
		$res_itemPrevio = $this->ItemPrevio->find('all');
		if(count($res_itemPrevio) == 0){
			$this->Session->setFlash('Aún no se realiza ningún pedido',
                                        'default', 
									array('class'=>'alert alert-warning'));
			return $this->redirect(array('controller' => 'Platillos', 'action' => 'index'));
		}
		$this->set('itemPrevios', $this->ItemPrevio->find('all', array('order' => 'ItemPrevio.id ASC')));
		$total_item_previos = $this->ItemPrevio->find('all', array('fields' => array('SUM(ItemPrevio.subtotal) AS subtotal')));
		$mostrar_total_item_previos = $total_item_previos[0][0]['subtotal'];
		$this->set('total_item_previos', $mostrar_total_item_previos);
	}

	public function add() {
		if($this->request->is('ajax')){
			$id = $this->request->data['id'];
			$cantidad = $this->request->data['cantidad'];

			$platillo = $this->ItemPrevio->Platillo->find('all', 
			array('fields' => array('Platillo.precio'),
				  'conditions' => array('Platillo.id' => $id)));
			//[0], por que nos devolverá un solo registro
			$precio = $platillo[0]['Platillo']['precio'];
			$subTotal = $cantidad * $precio;
			//Esta variable contendrá el id del usuario que esté logueado actualmente
			//Luego lo cambiaremos
			$idUserActual = 1; 
			//Arreglo con datos de la BD-tbl-item_previos
			$item_previos = array('user_id' => $idUserActual, 
									'platillo_id' => $id, 
									'cantidad' => $cantidad, 
									'subtotal' => $subTotal);
			$existe_item = $this->ItemPrevio->find('all', 
			array('fields' => array('ItemPrevio.platillo_id'),
				  'conditions' => array('ItemPrevio.platillo_id' => $id)));
			if(count($existe_item) == 0){
				//Guarda el Item en la BD-tbl-item_Previos
				$this->ItemPrevio->save($item_previos);
			}
		}	
		//No usaremos una vista asociada a esta acción
		$this->autoRender = false;
	}

	public function edit($id = null) {
		if (!$this->ItemPrevio->exists($id)) {
			throw new NotFoundException(__('Invalid item previo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ItemPrevio->save($this->request->data)) {
				$this->Session->setFlash(__('The item previo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The item previo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ItemPrevio.' . $this->ItemPrevio->primaryKey => $id));
			$this->request->data = $this->ItemPrevio->find('first', $options);
		}
		$users = $this->ItemPrevio->User->find('list');
		$platillos = $this->ItemPrevio->Platillo->find('list');
		$this->set(compact('users', 'platillos'));
	}

	public function delete($id = null) {
		$this->ItemPrevio->id = $id;
		if (!$this->ItemPrevio->exists()) {
			throw new NotFoundException(__('Invalid item previo'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ItemPrevio->delete()) {
			$this->Session->setFlash(__('The item previo has been deleted.'));
		} else {
			$this->Session->setFlash(__('The item previo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
