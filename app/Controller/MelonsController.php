<?php
App::uses('AppController', 'Controller');
/**
 * Melons Controller
 *
 * @property Melon $Melon
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class MelonsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'RequestHandler');

	
	
	public function beforeFilter() {
		$this->Auth->allow('watermelon', 'random_pair', 'gettop10', 'top10', 'upload');
	}
	
	
	public function isAuthorized($user) {
		// All registered users can add posts
		switch($this->action){
			case 'index':
			case 'approve':
			case 'view':
				return true;
			default:
				return parent::isAuthorized($user);
		}
	}
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
	
	
	
	/**
	 * approve melon
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function approve($id = null) {
		$this->Melon->id = $id;
		if (!$this->Melon->exists()) {
			throw new NotFoundException(__('Invalid melon'));
		}
		
		$options = array('conditions' => array('Melon.' . $this->Melon->primaryKey => $id));
		$melon = $this->Melon->find('first', $options);
		$melon['Melon']['approved'] = true;
		
		if ($this->Melon->save($melon)) {
			$this->Session->setFlash(__('The melon has been approved.'));
		} else {
			$this->Session->setFlash(__('The melon could not be approved. Please, try again.'));
		}
		
		return $this->redirect(array('action' => 'view', $id));
	}
	
	
	public function random_pair(){
		App::uses('String', 'Utility');
		$left = $this->Melon->find('first', array('order' => array('rand()')))['Melon'];
		$right = $this->Melon->find('first', array('conditions' => array('Melon.id !=' => $left['id']), 'order' => array('rand()')))['Melon'];
		if(!$this->Session->check('canary')){
			$bin_canary = openssl_random_pseudo_bytes(12);
			$canary = bin2hex($bin_canary);
			$this->Session->write('canary', $canary);
		}
		else{
			$canary = $this->Session->read('canary');
		}
		$this->set(compact('left', 'right', 'canary'));
		$this->set('_serialize', array('left', 'right', 'canary'));
	}
	
	
	public function watermelon() {
		$this->set('title_for_layout','');
	}
	
	public function gettop10(){
		$model = $this;
		//         return Cache::remember('top_melons', function() use ($model){
		 
		//         }, 'short');
		$query = "SELECT * FROM (SELECT a.id,a.path,b.score FROM melons AS a ".
				"INNER JOIN (SELECT winner_id,sum(count) as score FROM wins ".
				"GROUP BY winner_id) AS b ON b.winner_id = a.id ORDER BY score DESC ) AS Melon";
		//$query = "SELECT * FROM melons AS Melon WHERE 1 ORDER BY ".
		//	"(SELECT sum(count) FROM wins as b WHERE b.winner_id = Melon.id) DESC LIMIT 10;";
		return $this->Melon->query($query);
	}
	
	public function top10()	{
		$melons = $this->gettop10();
		$this->set(compact('melons'));
	}
	
	public function upload() {
		if ($this->request->is ( 'post' )) {
	
			require_once (App::path ( 'Vendor' )[0] . 'recaptchalib.php');
				
			$privatekey = "6Leiy_gSAAAAAEldt0VswaZmRhuEs_w38f0Kyosa";
				
				
			$resp = recaptcha_check_answer ( $privatekey, $_SERVER ["REMOTE_ADDR"], $_POST ["recaptcha_challenge_field"], $_POST ["recaptcha_response_field"] );
				
			if (!($resp->is_valid)) {
				$this->Session->setFlash ( __ ( 'Incorrect reCAPTCHA . Try it again.' ) );
	
			} else {
				require_once (App::path ( 'Vendor' )[0] . 'Imgur/Imgur.php');
				$imgur = new Imgur ();
				if (! is_null ( $this->request->data ( 'image_url' ) ) && $this->request->data ( 'image_url' ) != '') {
					$result = $imgur->upload ()->url ( $this->request->data ( 'image_url' ) );
					$path = $result ['data'] ['link'];
				} else if (! is_null ( $this->request->data ( 'image_path' ) )) {
					$result = $imgur->upload ()->file ( $this->request->data ( 'image_path' ) );
					$path = $result ['data'] ['link'];
				} else {
					$this->Session->setFlash ( __ ( 'incorrect data.' ) );
					return;
				}
	
				$this->Melon->create ();
				$melon = array ();
				$melon ['path'] = $path;
				if ($this->Melon->save ( $melon )) {
					$this->Session->setFlash ( __ ( 'The melon has been saved.' ) );
					// return $this->redirect(array('action' => 'watermelon'));
				} else {
					$this->Session->setFlash ( __ ( 'The melon could not be saved. Please, try again.' ) );
				}
			}
		}
	}
}
