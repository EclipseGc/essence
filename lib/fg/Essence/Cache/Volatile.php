<?php

/**
 *	@author Félix Girault <felix.girault@gmail.com>
 *	@license FreeBSD License (http://opensource.org/licenses/BSD-2-Clause)
 */

namespace fg\Essence\Cache;



/**
 *	Handles caching for a single session.
 *
 *	@package fg.Essence.Cache
 */

class Volatile implements \fg\Essence\Cache {

	/**
	 *	Data.
	 *
	 *	@var array
	 */

	protected $_data = array( );



	/**
	 *	Returns if data exists for the given key.
	 *
	 *	@param string $key The key to test.
	 *	@return boolean Whether there is data for the key or not.
	 */

	public function has( $key ) {

		return array_key_exists( $key, $this->_data );
	}



	/**
	 *	Returns the data for the given key.
	 *
	 *	@param string $key The key to search for.
	 *	@param mixed $default Default value to return if there is no data.
	 *	@return mixed The data.
	 */

	public function get( $key, $default = null ) {

		if ( $this->has( $key )) {
			return $this->_data[ $key ];
		}

		return $default;
	}



	/**
	 *	Sets the data for the given key.
	 *
	 *	@param string $key The key for the data.
	 *	@param mixed $data The data.
	 */

	public function set( $key, $data ) {

		$this->_data[ $key ] = $data;
	}



	/**
	 *	Deletes all cached data.
	 */

	public function clear( ) {

		$this->_data = array( );
	}
}
