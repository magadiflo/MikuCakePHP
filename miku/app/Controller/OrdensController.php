<?php
App::uses('AppController', 'Controller');
/**
 * Ordens Controller
 *
 * @property Orden $Orden
 * @property PaginatorComponent $Paginator
 */
class OrdensController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Orden->recursive = 0;
		$this->set('ordens', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Orden->exists($id)) {
			throw new NotFoundException(__('Invalid orden'));
		}
		$options = array('conditions' => array('Orden.' . $this->Orden->primaryKey => $id));
		$this->set('orden', $this->Orden->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Orden->create();
			if ($this->Orden->save($this->request->data)) {
				$this->Session->setFlash(__('The orden has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The orden could not be saved. Please, try again.'));
			}
		}
		$users = $this->Orden->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Orden->exists($id)) {
			throw new NotFoundException(__('Invalid orden'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Orden->save($this->request->data)) {
				$this->Session->setFlash(__('The orden has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The orden could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Orden.' . $this->Orden->primaryKey => $id));
			$this->request->data = $this->Orden->find('first', $options);
		}
		$users = $this->Orden->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Orden->id = $id;
		if (!$this->Orden->exists()) {
			throw new NotFoundException(__('Invalid orden'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Orden->delete()) {
			$this->Session->setFlash(__('The orden has been deleted.'));
		} else {
			$this->Session->setFlash(__('The orden could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
