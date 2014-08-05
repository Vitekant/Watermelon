<?php
App::uses('Melon', 'Model');

/**
 * Melon Test Case
 *
 */
class MelonTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.melon',
		'app.win'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Melon = ClassRegistry::init('Melon');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Melon);

		parent::tearDown();
	}

}
