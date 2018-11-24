<?php
App::uses('AppController', 'Controller');

class ItemPreviosController extends AppController {

	public $components = array('Session', 'RequestHandler');
	public $helpers = array('Html', 'Form', 'Time');

	public function isAuthorized($user){
		if($user['role']=='user'){
			if(in_array($this->action, array('view', 'add', 'itemupdate', 'remove', 'quitar', 'recalcular'))){
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
	
	public function view() {
		$idUserActual = $this->Auth->user('id'); 
		$res_itemPrevio = $this->ItemPrevio->find('all', array('conditions' => array('ItemPrevio.user_id' => $idUserActual), 'order'=>'ItemPrevio.id ASC'));
		if(count($res_itemPrevio) == 0){
			$this->Session->setFlash('Aún no se realiza ningún pedido',
                                        'default', 
									array('class'=>'alert alert-warning'));
			return $this->redirect(array('controller' => 'Platillos', 'action' => 'index'));
		}
		$this->set('itemPrevios', $res_itemPrevio);
		$total_item_previos = $this->ItemPrevio->find('all', array('fields' => array('SUM(ItemPrevio.subtotal) AS subtotal'), 'conditions' => array('ItemPrevio.user_id' => $idUserActual)));
		$mostrar_total_item_previos = $total_item_previos[0][0]['subtotal'];
		$this->set('total_item_previos', $mostrar_total_item_previos);
	}

	public function add() {
		if($this->request->is('ajax')){
			$id = $this->request->data['id'];
			$cantidad = $this->request->data['cantidad'];
			//Usuario que está actualmente logueado
			$idUserActual = $this->Auth->user('id'); 

			$platillo = $this->ItemPrevio->Platillo->find('all', 
			array('fields' => array('Platillo.precio'),
				  'conditions' => array('Platillo.id' => $id)));
			//[0], por que nos devolverá un solo registro
			$precio = $platillo[0]['Platillo']['precio'];
			$subTotal = $cantidad * $precio;
			//Arreglo con datos de la BD-tbl-item_previos
			$item_previos = array('user_id' => $idUserActual, 
									'platillo_id' => $id, 
									'cantidad' => $cantidad, 
									'subtotal' => $subTotal);
			$existe_item = $this->ItemPrevio->find('all', 
			array('fields' => array('ItemPrevio.platillo_id'),
				  'conditions' => array('ItemPrevio.platillo_id' => $id, 'ItemPrevio.user_id' => $idUserActual)));
			if(count($existe_item) == 0){
				//Guarda el Item en la BD-tbl-item_Previos
				$this->ItemPrevio->save($item_previos);
			}
		}	
		//No usaremos una vista asociada a esta acción
		$this->autoRender = false;
	}

	public function itemupdate(){
		if($this->request->is('ajax')){
			$id = $this->request->data['id'];
			$cantidad = isset($this->request->data['cantidad']) ? $this->request->data['cantidad'] : null;
			if($cantidad == 0){
				$cantidad = 1;
			}
	
			$item = $this->ItemPrevio->find('all', array('fields' => array('ItemPrevio.id', 'Platillo.precio'), 'conditions' => array('ItemPrevio.id' => $id)));
			$precio_item = $item[0]['Platillo']['precio'];
			$subtotal_item = $cantidad * $precio_item;
			$item_update = array('id' => $id, 'cantidad' => $cantidad, 'subtotal' => $subtotal_item);
			$this->ItemPrevio->saveAll($item_update);
		}
		$idUserActual = $this->Auth->user('id'); 
		$total = $this->ItemPrevio->find('all', array('fields' => array('SUM(ItemPrevio.subtotal) as subtotal'), 'conditions' => array('ItemPrevio.user_id' => $idUserActual)));
		$mostrar_total = $total[0][0]['subtotal'];
		$pedido_update = $this->ItemPrevio->find('all', array('fields' => array('ItemPrevio.id', 'ItemPrevio.subtotal'), 'conditions' => array('ItemPrevio.id' => $id)));
		$mostrar_item = array('id' => $pedido_update[0]['ItemPrevio']['id'], 'subtotal' => $pedido_update[0]['ItemPrevio']['subtotal'], 'total' => $mostrar_total);
		
		echo json_encode(compact('mostrar_item'));
		$this->autoRender = false;
	}

	public function remove(){
		if($this->request->is('ajax')){
			$id = $this->request->data['id'];
			$this->ItemPrevio->delete($id);
		}
		//Vuelve a recalcular el total
		$idUserActual = $this->Auth->user('id'); 
		$total_remove = $this->ItemPrevio->find('all', array('fields'=>array('SUM(ItemPrevio.subtotal) as subtotal'), 'conditions' => array('ItemPrevio.user_id' => $idUserActual)));
		$mostrar_total_remove = $total_remove[0][0]['subtotal'];
		
		$items = $this->ItemPrevio->find('all', array('conditions' => array('ItemPrevio.user_id' => $idUserActual)));
		if(count($mostrar_total_remove) == 0){
			$mostrar_total_remove = "0.00";
		}

		if(count($items) == 0){
			$this->Session->setFlash('No tiene platillos seleccionados',
			'default', array('class'=>'alert alert-success'));
		}

		echo json_encode(compact('items', 'mostrar_total_remove'));
		$this->autoRender = false;
	}

	public function quitar(){
		$idUserActual = $this->Auth->user('id'); 
		if($this->ItemPrevio->deleteAll(array('ItemPrevio.user_id' => $idUserActual), false)){
			$this->Session->setFlash('Todos sus platillos seleccionados fueron eliminados.',
		'default', array('class'=>'alert alert-success'));
		}else{
			$this->Session->setFlash('No se pudo quitar los platillos seleccionados.',
		'default', array('class'=>'alert alert-danger'));
		}
		return $this->redirect(array('controller'=>'platillos', 'action'=>'index'));
	}

	public function recalcular(){
		//debug($_POST);
		$arreglo = $this->request->data['ItemPrevio'];
		//debug($arreglo); //Observamos que contiene el arreglo
		if($this->request->is('post')){
			foreach ($arreglo as $key => $value) {
				$entero = preg_replace("/[^0-9]/", "", $value);
				if($entero == 0 || $entero == ""){
					$entero = 1;
				}
				$precio_update = $this->ItemPrevio->find('all', 
				array('fields'=>array('ItemPrevio.id', 'Platillo.precio'), 'conditions'=>array('ItemPrevio.id'=>$key)));
				$precio_update_mostrar = $precio_update[0]['Platillo']['precio'];
				$subtotal_update = $entero * $precio_update_mostrar;
				$pedido_update = array('id'=>$key, 'cantidad'=>$entero, 'subtotal'=>$subtotal_update);
				$this->ItemPrevio->saveAll($pedido_update);
			}
		}
		
		if($this->request->data['recalcular'] == 'recalcular'){
			$this->Session->setFlash('Se recalcularon los datos de sus platillos seleccionados.', 'default', array('class'=>'alert alert-success'));
			return $this->redirect(array('controller'=>'item_previos', 'action'=>'view'));

		}elseif($this->request->data['procesar']=='procesar'){
			return $this->redirect(array('controller'=>'ordens', 'action'=>'add'));
		}
	}
}
