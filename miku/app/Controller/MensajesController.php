<?php
App::uses('AppController', 'Controller');

class MensajesController extends AppController {

	public $components = array('Session', 'RequestHandler');
    public $helpers = array('Html', 'Form', 'Time', 'Js');
    public $paginate = array(
        'limit' => '5',
        'order' => array(
            'Mensaje.id' => 'DESC'
        ),
    );

	public function index() {
		$this->Mensaje->recursive = 0;

		$this->paginate['Mensaje']['limit'] = 5;
		$this->paginate['Mensaje']['order'] = array('Mensaje.id' => 'DESC');
		
		if($this->Auth->user('role') == 'admin'){
            $this->set('mensajes', $this->paginate());
        }else{
            $this->paginate['Mensaje']['conditions'] = array('Mensaje.user_id' => $this->Auth->user('id'));
            $this->set('mensajes', $this->paginate());
        }
	}

	public function view($id = null) {
		if (!$this->Mensaje->exists($id)) {
			throw new NotFoundException(__('Invalid mensaje'));
		}
		$options = array('conditions' => array('Mensaje.' . $this->Mensaje->primaryKey => $id));
		$this->set('mensaje', $this->Mensaje->find('first', $options));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->request->data['Mensaje']['user_id'] = $this->Auth->user('id');
			$this->request->data['Mensaje']['estado'] = 1;
		
			$this->Mensaje->create();
			if ($this->Mensaje->save($this->request->data)) {
				$this->Session->setFlash('Su mensaje fue enviado. ¡Nos contactaremos ponto!', 
										'default', array('class'=>'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('No pudo ser enviado su mensaje.', 
										'default', array('class'=>'alert alert-danger'));
			}
		}
		$users = $this->Mensaje->User->find('list');
		$this->set(compact('users'));
	}

	public function edit() {
		$id = $this->request->data['Mensaje']['id'];
		if (!$this->Mensaje->exists($id)) {
			throw new NotFoundException(__('El id del mensaje no existe'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Mensaje->save($this->request->data)) {
				$this->Session->setFlash('El mensaje fue confirmado.', 
					'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('El mensaje no pudo ser confirmado.', 
					'default', array('class' => 'alert alert-danger'));
			}
		} else{
			$this->Session->setFlash('Error, el id fue enviado por url', 
			'default', array('class' => 'alert alert-danger'));
			return $this->redirect(array('action' => 'index'));
		}
	}

	public function delete($id = null) {
		$this->Mensaje->id = $id;
		if (!$this->Mensaje->exists()) {
			throw new NotFoundException(__('El id del mensaje es inválido'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Mensaje->delete()) {
			$this->Session->setFlash('El mensaje fue eliminado.', 
					'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash('El mensaje no pudo ser eliminado.', 
					'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
