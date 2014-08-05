<?php
App::uses('AppController', 'Controller');
App::uses('Win', 'Model');
/**
 * Wins Controller
 *
 * @property Win $Win
 * @property PaginatorComponent $Paginator
 */
class WinsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','RequestHandler');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Win->recursive = 0;
		$this->set('wins', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Win->exists($id)) {
			throw new NotFoundException(__('Invalid win'));
		}
		$options = array('conditions' => array('Win.' . $this->Win->primaryKey => $id));
		$this->set('win', $this->Win->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Win->create();
			if ($this->Win->save($this->request->data)) {
				$this->Session->setFlash(__('The win has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The win could not be saved. Please, try again.'));
			}
		}
		$melons = $this->Win->Melon->find('list');
		debug($melons);
		$data = array('winers'=>$melons, 'loosers'=>$melons);
		$this->set($data);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Win->exists($id)) {
			throw new NotFoundException(__('Invalid win'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Win->save($this->request->data)) {
				$this->Session->setFlash(__('The win has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The win could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Win.' . $this->Win->primaryKey => $id));
			$this->request->data = $this->Win->find('first', $options);
		}
		$melons = $this->Win->Melon->find('list');
		$this->set(compact('melons'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Win->id = $id;
		if (!$this->Win->exists()) {
			throw new NotFoundException(__('Invalid win'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Win->delete()) {
			$this->Session->setFlash(__('The win has been deleted.'));
		} else {
			$this->Session->setFlash(__('The win could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	
	public function results(){
		//debug($this->request);
		$winner_id = $this->request->query['winner'];
		$looser_id = $this->request->query['looser'];
		
		$exists = $this->Win->find('count',array('conditions'=>array('winner_id'=>$winner_id,'looser_id'=>$looser_id)));

		if($exists == 0) {
			$win = new Win();
			$win->looser_id = $looser_id;
			$win->count = 1;
			$win->winner_id = $winner_id;
			$winner_count = 1;
		}else{
			$win = $this->Win->find('first',array('conditions'=>array('winner_id'=>$winner_id,'looser_id'=>$looser_id)))['Win'];
			$win['count'] = $win['count']+1;
			$winner_count = $win['count'];
		}
		$this->Win->save($win);
		
		
		$exists = $this->Win->find('count',array('conditions'=>array('winner_id'=>$looser_id,'looser_id'=>$winner_id)));

		if($exists != 0) {
			$looser = $this->Win->find('first',array('conditions'=>array('winner_id'=>$winner_id,'looser_id'=>$looser_id)))['Win'];
			$looser_count = $looser['count'];
		}else{
			$looser_count = 0;
		}
		
		$this->set(compact('winner_count','looser_count'));
        $this->set('_serialize', array('winner_count','looser_count'));
	}
}
