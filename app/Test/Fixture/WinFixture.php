<?php
/**
 * WinFixture
 *
 */
class WinFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'winner_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'looser_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'count' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_bin', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'winner_id' => 1,
			'looser_id' => 1,
			'count' => 1
		),
	);

}
