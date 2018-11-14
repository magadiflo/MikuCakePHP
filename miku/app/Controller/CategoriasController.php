<?php
App::uses('AppController', 'Controller');

class CategoriasController extends AppController {

	public $components = array('Session', 'RequestHandler');
	public $helpers = array('Html', 'Form', 'Time', 'Js');
	
	//Configuración de la paginación - Parte 01
	public $paginate = array(
        'Categoria' => array(
        	'limit' => 3,
        	'order' => array('Categoria.id' => 'asc')
    	),
        'Platillo' => array(
        	'limit' => 3,
        	'recursive' => 0,
        	'order' => array('Platillo.id' => 'asc')
        )
    );

	public function index() {
		$this->Categoria->recursive = 0;
		//Configuración de la paginación - Parte 02
		$this->paginate['Categoria']['limit'] = 3;
		$this->paginate['Categoria']['order'] = array('Categoria.id' => 'asc');
		$this->set('categorias', $this->paginate());
	}

	public function view($id = null) {
		if (!$this->Categoria->exists($id)) {
			throw new NotFoundException(__('Invalid categoria'));
		}
		$options = array('conditions' => array('Categoria.' . $this->Categoria->primaryKey => $id));
		$this->set('categoria', $this->Categoria->find('first', $options));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Categoria->create();
			if ($this->Categoria->save($this->request->data)) {
				$this->Session->setFlash(__('The categoria has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The categoria could not be saved. Please, try again.'));
			}
		}
	}

	public function edit($id = null) {
		if (!$this->Categoria->exists($id)) {
			throw new NotFoundException(__('Invalid categoria'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Categoria->save($this->request->data)) {
				$this->Session->setFlash(__('The categoria has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The categoria could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Categoria.' . $this->Categoria->primaryKey => $id));
			$this->request->data = $this->Categoria->find('first', $options);
		}
	}

	public function delete($id = null) {
		$this->Categoria->id = $id;
		if (!$this->Categoria->exists()) {
			throw new NotFoundException(__('Invalid categoria'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Categoria->delete()) {
			$this->Session->setFlash(__('The categoria has been deleted.'));
		} else {
			$this->Session->setFlash(__('The categoria could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
