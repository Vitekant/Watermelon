<?php
App::uses('Win', 'Model');

/**
 * Win Test Case
 *
 */
class WinTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.win',
		'app.melon'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Win = ClassRegistry::init('Win');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Win);

		parent::tearDown();
	}

}
