<?php
App::uses('AppController', 'Controller');

class OrdenItemsController extends AppController {

	public $components = array('Session', 'RequestHandler');
	public $helpers = array('Html', 'Form', 'Time', 'Js');
	
	public $paginate = array(
        'limit'=> 10,
        'order' => array(
            'OrdenItem.id' => 'ASC'
        ),
    );

	public function view($id = null) {
		$this->OrdenItem->recursive = 2;
		/*Verifica que el id de la orden exista**/
		if (!$this->OrdenItem->Orden->exists($id)) {
			throw new NotFoundException(__('La órden es inválida'));
		}
		$total_orden = $this->OrdenItem->Orden->find('all', array('fields'=>array('Orden.total'), 'conditions' => array('Orden.id' => $id)));
		$this->set('total_orden', $total_orden);

		$this->paginate['OrdenItem']['limit'] = 10;
        $this->paginate['OrdenItem']['conditions'] = array('OrdenItem.orden_id' => $id);
		$this->paginate['OrdenItem']['order'] = array('OrdenItem.id' => 'ASC');
		
		$this->set('ordenitems', $this->paginate());
	}
}
