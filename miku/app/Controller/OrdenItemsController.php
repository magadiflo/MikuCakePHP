<?php
App::uses('AppController', 'Controller');
/**
 * OrdenItems Controller
 *
 * @property OrdenItem $OrdenItem
 * @property PaginatorComponent $Paginator
 */
class OrdenItemsController extends AppController {

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
		$this->OrdenItem->recursive = 0;
		$this->set('ordenItems', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->OrdenItem->exists($id)) {
			throw new NotFoundException(__('Invalid orden item'));
		}
		$options = array('conditions' => array('OrdenItem.' . $this->OrdenItem->primaryKey => $id));
		$this->set('ordenItem', $this->OrdenItem->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->OrdenItem->create();
			if ($this->OrdenItem->save($this->request->data)) {
				$this->Session->setFlash(__('The orden item has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The orden item could not be saved. Please, try again.'));
			}
		}
		$ordens = $this->OrdenItem->Orden->find('list');
		$platillos = $this->OrdenItem->Platillo->find('list');
		$this->set(compact('ordens', 'platillos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->OrdenItem->exists($id)) {
			throw new NotFoundException(__('Invalid orden item'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->OrdenItem->save($this->request->data)) {
				$this->Session->setFlash(__('The orden item has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The orden item could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('OrdenItem.' . $this->OrdenItem->primaryKey => $id));
			$this->request->data = $this->OrdenItem->find('first', $options);
		}
		$ordens = $this->OrdenItem->Orden->find('list');
		$platillos = $this->OrdenItem->Platillo->find('list');
		$this->set(compact('ordens', 'platillos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->OrdenItem->id = $id;
		if (!$this->OrdenItem->exists()) {
			throw new NotFoundException(__('Invalid orden item'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->OrdenItem->delete()) {
			$this->Session->setFlash(__('The orden item has been deleted.'));
		} else {
			$this->Session->setFlash(__('The orden item could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
