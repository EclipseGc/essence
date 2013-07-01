<?php

/**
 *	@author Félix Girault <felix.girault@gmail.com>
 *	@license FreeBSD License (http://opensource.org/licenses/BSD-2-Clause)
 */

namespace fg\Essence;

use fg\Essence\Provider\OEmbed;
use fg\Essence\Utility\Package;
use fg\Essence\Utility\Set;



/**
 *	A collection of providers which can find the provider of an url.
 *
 *	@package fg.Essence
 */

class ProviderCollection {

	/**
	 *	A list of providers.
	 *
	 *	@var array
	 */

	protected $_config = array(
		'23hq' => array(
			'class' => 'OEmbed',
			'pattern' => '#23hq.com/.+/photo/.+#i',
			'endpoint' => 'http://www.23hq.com/23/oembed?format=json&url=%s',
			'format' => OEmbed::json
		),
		'Bandcamp' => array(
			'class' => 'OpenGraph',
			'pattern' => '#bandcamp\.com/(album|track)/#i'
		),
		'Blip.tv' => array(
			'class' => 'OEmbed',
			'pattern' => '#blip.tv/.+#i',
			'endpoint' => 'http://blip.tv/oembed?format=json&url=%s',
			'format' => OEmbed::json
		),
		'Cacoo' => array(
			'class' => 'OEmbed',
			'pattern' => '#cacoo.com/.+#i',
			'endpoint' => 'http://cacoo.com/oembed.json?url=%s',
			'format' => OEmbed::json
		),
		'CanalPlus' => array(
			'class' => 'OpenGraph',
			'pattern' => '#canalplus\.fr#i'
		),
		'Chirb.it' => array(
			'class' => 'OEmbed',
			'pattern' => '#chirb.it/.+#i',
			'endpoint' => 'http://chirb.it/oembed.json?url=%s',
			'format' => OEmbed::json
		),
		'Clikthrough' => array(
			'class' => 'OEmbed',
			'pattern' => '#clikthrough\.com/theater/video/\d+#i',
			'endpoint' => 'http://clikthrough.com/services/oembed?format=json&url=%s',
			'format' => OEmbed::json
		),
		'CollegeHumorOEmbed' => array(
			'class' => 'OEmbed',
			'pattern' => '#collegehumor.com/(video|embed)/.*#i',
			'endpoint' => 'http://www.collegehumor.com/oembed.json?url=%s',
			'format' => OEmbed::json
		),
		'CollegeHumorOpenGraph' => array(
			'class' => 'OpenGraph',
			'pattern' => '#collegehumor.com/(picture|article)/.+#i'
		),
		'Dailymotion' => array(
			'class' => 'OEmbed/Dailymotion',
			'pattern' => '#dailymotion\.com#i',
			'endpoint' => 'http://www.dailymotion.com/services/oembed?format=json&url=%s',
			'format' => OEmbed::json
		),
		'Deviantart' => array(
			'class' => 'OEmbed',
			'pattern' => '#deviantart.com/.+#i',
			'endpoint' => 'http://backend.deviantart.com/oembed?format=json&url=%s',
			'format' => OEmbed::json
		),
		'Dipity' => array(
			'class' => 'OEmbed',
			'pattern' => '#dipity.com/.+#i',
			'endpoint' => 'http://www.dipity.com/oembed/timeline?format=json&url=%s',
			'format' => OEmbed::json
		),
		'Flickr' => array(
			'class' => 'OEmbed',
			'pattern' => '#flickr\.com/photos/[a-zA-Z0-9@\\._]+/[0-9]+#i',
			'endpoint' => 'http://flickr.com/services/oembed?format=json&url=%s',
			'format' => OEmbed::json
		),
		'FunnyOrDie' => array(
			'class' => 'OEmbed',
			'pattern' => '#funnyordie\.com/videos/.*#i',
			'endpoint' => 'http://www.funnyordie.com/oembed?format=json&url=%s',
			'format' => OEmbed::json
		),
		'HowCast' => array(
			'class' => 'OpenGraph',
			'pattern' => '#howcast\.com/.+/.+#i'
		),
		'Huffduffer' => array(
			'class' => 'OEmbed',
			'pattern' => '#huffduffer.com/[-.\w@]+/\d+#i',
			'endpoint' => 'http://huffduffer.com/oembed?format=json&url=%s',
			'format' => OEmbed::json
		),
		'Hulu' => array(
			'class' => 'OEmbed',
			'pattern' => '#hulu\.com/watch/.+#i',
			'endpoint' => 'http://www.hulu.com/api/oembed.json?url=%s',
			'format' => OEmbed::json
		),
		'Ifixit' => array(
			'class' => 'OEmbed',
			'pattern' => '#ifixit.com/.*#i',
			'endpoint' => 'http://www.ifixit.com/Embed?format=json&url=%s',
			'format' => OEmbed::json
		),
		'Imgur' => array(
			'class' => 'OEmbed',
			'pattern' => '#(imgur\.com/(gallery|a)/.+|imgur\.com/.+)#i',
			'endpoint' => 'http://api.imgur.com/oembed?format=json&url=%s',
			'format' => OEmbed::json
		),
		'Instagram' => array(
			'class' => 'OEmbed',
			'pattern' => '#instagr(\.am|am\.com)/p/.*#i',
			'endpoint' => 'http://api.instagram.com/oembed?format=json&url=%s',
			'format' => OEmbed::json
		),
		'Mobypicture' => array(
			'class' => 'OEmbed',
			'pattern' => '#mobypicture.com/user/.+/view/.+#','moby.to/.+#i',
			'endpoint' => 'http://api.mobypicture.com/oEmbed?format=json&url=%s',
			'format' => OEmbed::json
		),
		'Official.fm' => array(
			'class' => 'OEmbed',
			'pattern' => '#official.fm/.+#i',
			'endpoint' => 'http://official.fm/services/oembed?format=json&url=%s',
			'format' => OEmbed::json
		),
		'Polldaddy' => array(
			'class' => 'OEmbed',
			'pattern' => '#polldaddy\.com/.*#i',
			'endpoint' => 'http://polldaddy.com/oembed?format=json&url=%s',
			'format' => OEmbed::json
		),
		'Prezi' => array(
			'class' => 'OpenGraph',
			'pattern' => '#prezi\.com/.+/.+#i'
		),
		'Qik' => array(
			'class' => 'OEmbed',
			'pattern' => '#qik\.com/\w+#i',
			'endpoint' => 'http://qik.com/api/oembed.json?url=%s',
			'format' => OEmbed::json
		),
		'Revision3' => array(
			'class' => 'OEmbed',
			'pattern' => '#revision3\.com/[a-z0-9]+/.+#i',
			'endpoint' => 'http://revision3.com/api/oembed?format=json&url=%s',
			'format' => OEmbed::json
		),
		'Scribd' => array(
			'class' => 'OEmbed',
			'pattern' => '#scribd\.com/doc/[0-9]+/.+#i',
			'endpoint' => 'http://www.scribd.com/services/oembed?format=json&url=%s',
			'format' => OEmbed::json
		),
		'Shoudio' => array(
			'class' => 'OEmbed',
			'pattern' => '#(shoudio.com/.+|shoud.io/.+)#i',
			'endpoint' => 'http://shoudio.com/api/oembed?format=json&url=%s',
			'format' => OEmbed::json
		),
		'Sketchfab' => array(
			'class' => 'OEmbed',
			'pattern' => '#sketchfab.com/show/.+#i',
			'endpoint' => 'http://sketchfab.com/oembed?format=json&url=%s',
			'format' => OEmbed::json
		),
		'SlideShare' => array(
			'class' => 'OEmbed',
			'pattern' => '#slideshare\.net/.+/.+#i',
			'endpoint' => 'http://www.slideshare.net/api/oembed/2?format=json&url=%s',
			'format' => OEmbed::json
		),
		'SoundCloud' => array(
			'class' => 'OEmbed',
			'pattern' => '#soundcloud\.com/[a-zA-Z0-9-]+/[a-zA-Z0-9-]+#i',
			'endpoint' => 'http://soundcloud.com/oembed?format=json&url=%s',
			'format' => OEmbed::json
		),
		'TedOEmbed' => array(
			'class' => 'OEmbed',
			'pattern' => '#ted.com/talks/*+#i',
			'endpoint' => 'http://www.ted.com/talks/oembed.json?url=%s',
			'format' => OEmbed::json
		),
		'TedOpenGraph' => array(
			'class' => 'OpenGraph',
			'pattern' => '#ted\.com/talks#i'
		),
		'Twitter' => array(
			'class' => 'OEmbed',
			'pattern' => '#twitter\.com/[a-zA-Z0-9_]+/status/.+#i',
			'endpoint' => 'https://api.twitter.com/1/statuses/oembed.json?url=%s',
			'format' => OEmbed::json
		),
		'Vhx' => array(
			'class' => 'OEmbed',
			'pattern' => '#vhx.tv/.+#i',
			'endpoint' => 'http://vhx.tv/services/oembed.json?url=%s',
			'format' => OEmbed::json
		),
		'Viddler' => array(
			'class' => 'OEmbed',
			'pattern' => '#viddler.com/.+#i',
			'endpoint' => 'http://www.viddler.com/oembed/?url=%s',
			'format' => OEmbed::json
		),
		'Vimeo' => array(
			'class' => 'OEmbed/Vimeo',
			'pattern' => '#vimeo\.com#i',
			'endpoint' => 'http://vimeo.com/api/oembed.json?url=%s',
			'format' => OEmbed::json
		),
		'Yfrog' => array(
			'class' => 'OEmbed',
			'pattern' => '#yfrog\.(com|ru|com\.tr|it|fr|co\.il|co\.uk|com\.pl|pl|eu|us)/.+#i',
			'endpoint' => 'http://www.yfrog.com/api/oembed?format=json&url=%s',
			'format' => OEmbed::json
		),
		'Youtube' => array(
			'class' => 'OEmbed',
			'pattern' => '#youtube\.com|youtu\.be#i',
			'endpoint' => 'http://www.youtube.com/oembed?format=json&url=%s',
			'format' => OEmbed::json
		)
	);



	/**
	 *	A list of providers.
	 *
	 *	@var array
	 */

	protected $_providers = array( );



	/**
	 *	Loads the given providers.
	 *
	 *	@see load( )
	 *	@param array $providers An array of provider class names, relative to
	 *		the 'Provider' folder.
	 */

	public function __construct( array $config = array( )) {

		if ( !empty( $config )) {
			$this->_config = array_merge( $this->_config, $config );
		}
	}



	/**
	 *	Tells if a provider was found for the given url.
	 *
	 *	@param string $url An url which may be embedded.
	 *	@return mixed The url provider if any, otherwise null.
	 */

	public function hasProvider( $url ) {

		foreach ( $this->_config as $options ) {
			if ( preg_match( $options['pattern'], $url )) {
				return true;
			}
		}

		return false;
	}



	/**
	 *	Finds providers of the given url.
	 *
	 *	@param string $url An url which may be embedded.
	 *	@return array An array of fg\Essence\Provider.
	 */

	public function providers( $url ) {

		$providers = array( );

		foreach ( $this->_config as $name => $options ) {
			if ( preg_match( $options['pattern'], $url )) {
				$providers[ ] = $this->_provider( $name, $options );
			}
		}

		return $providers;
	}



	/**
	 *	Lazy loads a provider given its name and configuration.
	 *
	 *	@param string $name Name.
	 *	@param string $name Configuration.
	 *	@return Provider Instance.
	 */

	protected function _provider( $name, $options ) {

		if ( !isset( $this->_providers[ $name ])) {
			$Reflection = new \ReflectionClass(
				$this->_fullyQualified( $options['class'])
			);

			if ( !$Reflection->isAbstract( )) {
				$Provider = $Reflection->newInstance( $options );

				if ( $Provider->isGeneric( )) {
					if ( !$excludeGenerics ) {
						$this->_providers[ ] = $Provider;
					}
				} else {
					// regular providers are pushed to the front to take
					// precedence over the generic ones.
					array_unshift( $this->_providers, $Provider );
				}
			}

			$this->_providers[ $name ] = $Provider;
		}

		return $this->_providers[ $name ];
	}



	/**
	 *	Returns the fully qualified class name (FQCN) for the given provider
	 *	name. If the name happens to be a FQCN, it is returned as is.
	 *
	 *	@param string $name Provider name.
	 *	@param string FQCN.
	 */

	protected function _fullyQualified( $name ) {

		return ( $name[ 0 ] !== '\\' )
			? '\\fg\\Essence\\Provider\\' . str_replace( '/', '\\', $name )
			: $name;
	}
}
