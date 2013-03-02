<?php

/**
 *	@author Félix Girault <felix.girault@gmail.com>
 *	@license FreeBSD License (http://opensource.org/licenses/BSD-2-Clause)
 */

namespace fg\Essence\Http;



/**
 *	Handles HTTP related operations.
 *
 *	@package fg.Essence.Http
 */

class FileGetContents implements \fg\Essence\Http {

	/**
	 *	Retrieves contents from the given URL.
	 *
	 *	@param string $url The URL fo fetch contents from.
	 *	@return string The fetched contents.
	 *	@throws \fg\Essence\Http\Exception
	 */

	public function get( $url ) {

		$reporting = error_reporting( 0 );
		$contents = file_get_contents( $url );
		error_reporting( $reporting );

		if ( $contents === false ) {
			// let's assume the file doesn't exists
			throw new Exception( 404, $url );
		}

		return $contents;
	}
}
