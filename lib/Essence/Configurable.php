<?php

/**
 *	@author Félix Girault <felix.girault@gmail.com>
 *	@license FreeBSD License (http://opensource.org/licenses/BSD-2-Clause)
 */

namespace Essence;



/**
 *	Makes a class configurable.
 *
 *	@package Essence
 */

trait Configurable {

	/**
	 *	An array of properties, to be defined in classes using the trait.
	 *
	 *	@var array
	 */

	protected $_properties = array( );



	/**
	 *	@see has( )
	 */

	public function __isset( $property ) {

		return $this->has( $property );
	}



	/**
	 *	@see get( )
	 */

	public function __get( $property ) {

		return $this->get( $property );
	}



	/**
	 *	@see set( )
	 */

	public function __set( $property, $value ) {

		return $this->set( $property, $value );
	}



	/**
	 *	Returns if there is any value for the given property.
	 *
	 *	@param string $property Property name.
   *
	 *	@return boolean True if the property exists, otherwise false.
	 */

	public function has( $property ) {

		return !empty( $this->_properties[ $property ]);
	}



	/**
	 *	Returns the value of the given property.
	 *
	 *	@param string $property Property name.
	 *	@param mixed $default Default value to be returned in case the property
	 *		doesn't exists.
	 *	@return mixed The property value, or $default.
	 */

	public function get( $property, $default = null ) {

		return isset( $this->_properties[ $property ])
			? $this->_properties[ $property ]
			: $default;
	}



	/**
	 *	Sets the value of the given property.
	 *
	 *	@param string $property Property name.
	 *	@param string $value New value.
	 */

	public function set( $property, $value ) {

		$this->_properties[ $property ] = $value;
    return $this;
	}



	/**
	 *	Sets the value of a property if it is empty.
	 *
	 *	@param string $property Property name.
	 *	@param string $default Default value.
   *
   *  @return $this
	 */

	public function setDefault( $property, $default ) {

		if ( !$this->has( $property )) {
			$this->set( $property, $default );
		}
    return $this;
	}



	/**
	 *	Sets default values.
	 *
	 *	@see setDefault( )
	 *	@param array $properties Default properties.
   *
   *  @return $this
	 */

	public function setDefaults( array $properties = array() ) {

		$this->_properties += $properties;
    return $this;
	}



	/**
	 *	Returns the entire set of properties.
	 *
	 *	@return array Properties.
	 */

	public function properties( ) {

		return $this->_properties;
	}



	/**
	 *	Sets the entire set of properties.
	 *
	 *	@param array $properties Properties to set.
   *
   *  @return $this
	 */

	public function setProperties( array $properties ) {

		$this->_properties = $properties;
    return $this;
	}



	/**
	 *	Merges the given properties with the current ones.
	 *
	 *	@param array $properties Properties to merge.
   *
   *  @return $this;
	 */

	public function configure( array $properties ) {

		$this->_properties = array_merge( $this->_properties, $properties );
    return $this;
	}
}
