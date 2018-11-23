<?php
App::uses('AppController', 'Controller');

class OrdensController extends AppController {

	public $components = array('Session', 'RequestHandler');
    public $helpers = array('Html', 'Form', 'Time', 'Js');
    public $paginate = array(
        'limit' => '5',
        'order' => array(
            'Orden.id' => 'DESC'
        ),
    );

	public function index() {
		$this->Orden->recursive = 0;

        $this->paginate['Orden']['limit'] = 5;
        $this->paginate['Orden']['order'] = array('Orden.id' => 'DESC');
        
        if($this->Auth->user('role') == 'admin'){
            $this->set('ordens', $this->paginate());
        }else{
            $this->paginate['Orden']['conditions'] = array('Orden.user_id' => $this->Auth->user('id'));
            $this->set('ordens', $this->paginate());
        }
	}

	public function add(){
        //Recuperamos datos de un modelo con el que no se está relacionado
        $this->loadModel('ItemPrevio', 'RequestHandler');
        //Usuario que está actualmente logueado
        $id_user_actual = $this->Auth->user('id'); 
        $estado = 1;
        $orden_item = $this->ItemPrevio->find('all', array('conditions' => array('ItemPrevio.user_id' => $id_user_actual), 'order'=>'ItemPrevio.id ASC'));
        	
        if(count($orden_item) > 0){
            $total_items = $this->ItemPrevio->find('all', array('fields'=>array('SUM(ItemPrevio.subtotal) as subtotal'), 'conditions' => array('ItemPrevio.user_id' => $id_user_actual)));
            $mostrar_total_orden = $total_items[0][0]['subtotal'];

            $data = array('user_id' => $id_user_actual, 'total' => $mostrar_total_orden, 'estado' => $estado);
            $this->Orden->create();
            if($this->Orden->save($data)){
                //Recupera el "id" de la orden que se ha guardado en ese momento. id actual.
                $id_orden = $this->Orden->id;
                for($i=0; $i<count($orden_item); $i++){
                    $platillo_id = $orden_item[$i]['ItemPrevio']['platillo_id'];
                    $cantidad = $orden_item[$i]['ItemPrevio']['cantidad'];
                    $subtotal = $orden_item[$i]['ItemPrevio']['subtotal'];

                    $orden_items = array('platillo_id'=>$platillo_id, 
                                            'orden_id'=>$id_orden, 
                                            'cantidad'=>$cantidad, 
                                            'subtotal'=>$subtotal);
                    $this->Orden->OrdenItem->saveAll($orden_items);
                }
                //Eliminando todo el contenido de la tabla ItemPrevio del usuario que hizo el pedido
                $this->ItemPrevio->deleteAll(array('ItemPrevio.user_id' => $id_user_actual), false);

                $this->Session->setFlash('La orden fue procesada con éxito¡¡', 'default', array('class'=>'alert alert-success'));
                return $this->redirect(array('controller'=>'platillos', 'action'=>'index'));
            }else{
                $this->Session->setFlash('La orden no pudo ser procesada...', 'default', array('class'=>'alert alert-danger'));
            }
        }else{
			$this->Session->setFlash('Ninguna orden ha sido procesada.', 'default', array('class'=>'alert alert-danger'));
            return $this->redirect(array('controller'=>'platillos', 'action'=>'index'));
        }
    }
    
    public function edit() {
		$id = $this->request->data['Orden']['id'];
		if (!$this->Orden->exists($id)) {
			throw new NotFoundException(__('El id de la orden no existe'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Orden->save($this->request->data)) {
				$this->Session->setFlash('La orden fue confirmada.', 
					'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('La orden no pudo ser confirmada.', 
					'default', array('class' => 'alert alert-danger'));
			}
		} else{
			$this->Session->setFlash('Error, el id de la orden fue enviado por url', 
			'default', array('class' => 'alert alert-danger'));
			return $this->redirect(array('action' => 'index'));
		}
	}

}
