<?php

/**
 *	@author Félix Girault <felix.girault@gmail.com>
 *	@license FreeBSD License (http://opensource.org/licenses/BSD-2-Clause)
 */

namespace fg\Essence\Provider\OEmbed;



/**
 *	Generic OEmbed provider.
 *
 *	@package fg.Essence.Provider.OEmbed
 */

class Generic extends \fg\Essence\Provider\OEmbed {

	/**
	 *
	 */

	protected $_Cache = null;



	/**
	 *	Constructor.
	 */

	public function __construct( ) {

		parent::__construct( self::anything, '', '' );

		$this->_Cache = new \fg\Essence\Cache\Volatile( );
	}



	/**
	 *	Tells if the provider can fetch embed informations from the given URL.
	 *
	 *	@param string $url URL to fetch informations from.
	 */

	public function canEmbed( $url ) {

		return ( $this->_extractEndpoint( $url ) !== false );
	}



	/**
	 *	Fetches embed information from the given URL.
	 *
	 *	@param string $url URL to fetch informations from.
	 *	@return Media Embed informations.
	 */

	protected function _embed( $url ) {

		$endpoint = $this->_extractEndpoint( $url );

		if ( !$endpoint ) {
			throw new \fg\Essence\Exception( 'Unable to find any endpoint.' );
		}

		return $this->_embedEndpoint( $endpoint['url'], $endpoint['type']);
	}



	/**
	 *	Extracts an oEmbed endpoint from the given URL.
	 *
	 *	@param string $url
	 */

	protected function _extractEndpoint( $url ) {

		if ( $this->_Cache->has( $url )) {
			return $this->_Cache->get( $url );
		}

		$attributes = \fg\Essence\Registry::get( 'dom' )->extractAttributes(
			\fg\Essence\Registry::get( 'http' )->get( $url ),
			array(
				'link' => array(
					'rel' => '#alternate#i',
					'type',
					'href'
				)
			)
		);

		$endpoint = false;

		foreach ( $attributes['link'] as $link ) {
			if ( preg_match( '#json|xml#i', $link['type'], $matches )) {
				$endpoint = array(
					'url' => $link['href'],
					'type' => array_shift( $matches )
				);

				break;
			}
		}

		$this->_Cache->set( $url, $endpoint );
		return $endpoint;
	}
}
