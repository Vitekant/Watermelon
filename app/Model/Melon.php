<?php
App::uses('AppModel', 'Model');
/**
 * Melon Model
 *
 * @property Win $Win
 */
class Melon extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'path' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'approved' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	
	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'id';
	
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	
	/**
	 * hasMany associations
	 *
	 * @var array
	 */
	public $hasMany = array(
			'Win' => array(
					'className' => 'Win',
					'foreignKey' => 'winner_id',
					'dependent' => false,
					'conditions' => '',
					'fields' => '',
					'order' => '',
					'limit' => '',
					'offset' => '',
					'exclusive' => '',
					'finderQuery' => '',
					'counterQuery' => ''
			)
	);
}
