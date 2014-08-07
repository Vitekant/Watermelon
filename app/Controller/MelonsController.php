<?php
App::uses('AppController', 'Controller');
/**
 * Melons Controller
 *
 * @property Melon $Melon
 * @property PaginatorComponent $Paginator
 */
class MelonsController extends AppController {

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
		$this->Melon->recursive = 0;
		$this->set('melons', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Melon->exists($id)) {
			throw new NotFoundException(__('Invalid melon'));
		}
		$options = array('conditions' => array('Melon.' . $this->Melon->primaryKey => $id));
		$this->set('melon', $this->Melon->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Melon->create();
			if ($this->Melon->save($this->request->data)) {
				$this->Session->setFlash(__('The melon has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The melon could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Melon->exists($id)) {
			throw new NotFoundException(__('Invalid melon'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Melon->save($this->request->data)) {
				$this->Session->setFlash(__('The melon has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The melon could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Melon.' . $this->Melon->primaryKey => $id));
			$this->request->data = $this->Melon->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Melon->id = $id;
		if (!$this->Melon->exists()) {
			throw new NotFoundException(__('Invalid melon'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Melon->delete()) {
			$this->Session->setFlash(__('The melon has been deleted.'));
		} else {
			$this->Session->setFlash(__('The melon could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	
	public function random_pair(){
		$left = $this->Melon->find('first', array('order' => array('rand()')))['Melon'];
		$right = $this->Melon->find('first', array('conditions' => array('Melon.id !=' => $left['id']), 'order' => array('rand()')))['Melon'];
		$this->set(compact('left', 'right'));
        $this->set('_serialize', array('left', 'right'));
	}
	
		
	public function watermelon() {
		$this->set('title_for_layout','');
	}
	
	public function gettop10(){
        $model = $this;
        return Cache::remember('top_melons', function() use ($model){
        	$query = "SELECT * FROM (SELECT a.id,a.path,b.score FROM melons AS a ".
        	"INNER JOIN (SELECT winner_id,sum(count) as score FROM wins ".
        	"GROUP BY winner_id) AS b ON b.winner_id = a.id ORDER BY score DESC ) AS Melon";
            //$query = "SELECT * FROM melons AS Melon WHERE 1 ORDER BY ".
			//	"(SELECT sum(count) FROM wins as b WHERE b.winner_id = Melon.id) DESC LIMIT 10;";
			return $this->Melon->query($query);
        }, 'long');
	}
	
	public function top10()	{
		$melons = $this->gettop10();
		$this->set(compact('melons'));
	}
	

	
}
