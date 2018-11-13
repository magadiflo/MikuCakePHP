<?php
App::uses('AppController', 'Controller');
/**
 * ItemPrevios Controller
 *
 * @property ItemPrevio $ItemPrevio
 * @property PaginatorComponent $Paginator
 */
class ItemPreviosController extends AppController {

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
		$this->ItemPrevio->recursive = 0;
		$this->set('itemPrevios', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ItemPrevio->exists($id)) {
			throw new NotFoundException(__('Invalid item previo'));
		}
		$options = array('conditions' => array('ItemPrevio.' . $this->ItemPrevio->primaryKey => $id));
		$this->set('itemPrevio', $this->ItemPrevio->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ItemPrevio->create();
			if ($this->ItemPrevio->save($this->request->data)) {
				$this->Session->setFlash(__('The item previo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The item previo could not be saved. Please, try again.'));
			}
		}
		$users = $this->ItemPrevio->User->find('list');
		$platillos = $this->ItemPrevio->Platillo->find('list');
		$this->set(compact('users', 'platillos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
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

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
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
