<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {

	public $components = array('Session','Paginator');
	
	public function beforeFilter(){
		//Llamamos al beforeFilter() del AppController
		parent::beforeFilter();
		//Definirá las acciones a las que el usuario 
		//esté o no autentificado puede acceder, en este caso al add
		$this->Auth->allow('add');
	}

	public function login(){
		if($this->request->is('post')){
			if($this->Auth->login()){//Si está accediendo correctamente al método lógin
				//este método redirectUrl(), será manejado desde el AppController
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Session->setFlash('Usuario y/o contraseña son incorrectas', 'default', 
				array('class'=>'alert alert-danger'));
		}
	}

	//Redireccionará según hayamos configurado en el AppController
	public function logout(){
		return $this->redirect($this->Auth->logout());
	}



	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			//Por defecto los usuarios serán del rol = 'user'
			$this->request->data['User']['role'] = 'user';
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('Se creó un nuevo usuario.', 
				'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('No se pudo crear el usuario.', 
				'default', array('class' => 'alert alert-danger'));
			}
		}
	}

	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}

	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
