<?php

/**
 *	@author Félix Girault <felix.girault@gmail.com>
 *	@license FreeBSD License (http://opensource.org/licenses/BSD-2-Clause)
 */

namespace Essence;

if ( !defined( 'ESSENCE_BOOTSTRAPPED' )) {
	require_once dirname( dirname( __FILE__ ))
		. DIRECTORY_SEPARATOR . 'bootstrap.php';
}



/**
 *	Test case for Media.
 */

class MediaTest extends \PHPUnit_Framework_TestCase {

	/**
	 *
	 */

	public $properties = array(
		'title' => 'Title',
		'description' => 'Description.',
		'width' => 800,
		'height' => 600,
		'custom' => 'Custom property'
	);



	/**
	 *
	 */

	public $Media = null;



	/**
	 *
	 */

	public function setUp( ) {

		$this->Media = new Media( $this->properties );
	}



	/**
	 *
	 */

	public function testConstruct( ) {

		$this->assertTrue( $this->Media->has( 'custom' ));
	}



	/**
	 *
	 */

	public function testIterator( ) {

		foreach ( $this->Media as $property => $value ) { }
	}
}
