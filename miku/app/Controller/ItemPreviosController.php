<?php
App::uses('AppController', 'Controller');

class ItemPreviosController extends AppController {

	public $components = array('Session', 'RequestHandler');
    public $helpers = array('Html', 'Form', 'Time');

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
	
		$total = $this->ItemPrevio->find('all', array('fields' => array('SUM(ItemPrevio.subtotal) as subtotal')));
		$mostrar_total = $total[0][0]['subtotal'];
		$pedido_update = $this->ItemPrevio->find('all', array('fields' => array('ItemPrevio.id', 'ItemPrevio.subtotal'), 'conditions' => array('ItemPrevio.id' => $id)));
		$mostrar_item = array('id' => $pedido_update[0]['ItemPrevio']['id'], 'subtotal' => $pedido_update[0]['ItemPrevio']['subtotal'], 'total' => $mostrar_total);
		
		echo json_encode(compact('mostrar_item'));
		$this->autoRender = false;
	}
}
