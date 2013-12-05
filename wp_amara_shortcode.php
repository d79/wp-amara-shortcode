<?php
/*
Plugin Name: WP Amara Shortcode
Plugin URI: https://github.com/d79/wp-amara-shortcode
Description: A simple wordpress plugin to enable Amara.org shortcode
Version: 1.2
Author: Dario Candelù
Author URI: http://www.spaziosputnik.it
License: GPL2
*/
/*
Copyright 2013 Dario Candelù

This program is free software; you can redistribute it and/or modify 
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation. 

This program is distributed in the hope that it will be useful, 
but WITHOUT ANY WARRANTY; without even the implied warranty of 
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the 
GNU General Public License for more details.

You should have received a copy of the GNU General Public License 
along with this program; if not, write to the Free Software 
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA 
*/


if(!class_exists('WP_Amara_Shortcode'))
{
	class WP_Amara_Shortcode
	{
		/**
		 * Construct the plugin object
		 */
		public function __construct() {
			add_shortcode( 'amara' , array(&$this, 'amara') );
		} // __construct
		
		/**
		 * Main plugin function
		 */
		public function amara( $atts ) {

			if(isset($atts['content'])) {
				$content = $this->prepare_content($atts['content']);
				unset($atts['content']);
			}

			if(isset($atts['base_state'])) {
				$base_state = 'base_state: {"language": "'.$atts['base_state'].'"}';
				unset($atts['base_state']);
			}

			extract( shortcode_atts( array(
				'url' => '',
			), $atts, 'amara' ) );

			if(isset($atts['url']))
				unset($atts['url']);

			// begin of the javascript
			$js = <<<code
				<script type="text/javascript" src="http://s3.www.universalsubtitles.org/embed.js">
				({
					video_url: "{$url}",
code;
			
			// video_config
			$js .= "video_config: {";
			
			foreach ($atts as $key => $value) {
				$js .= "$key: '{$value}',\n";
			}

			// if present, load content options for FLV file
			if(isset($content)) {
				$js .= "content: {\n";
				foreach ($content as $key => $value) {
					$js .= "$key: '{$value}',\n";
				}
				$js .= "},\n";
			}

			$js .= "},"; // end of video_config

			// if present, insert base_state option
			if(isset($base_state))
				$js .= $base_state;

			// end of the javascript
			$js .= <<<code
				})
				</script>
code;
			return $js;

		} // amara

		/**
		 * Prepare array of content options for FLV file
		 */
		private function prepare_content ( $content ) {

			$parts   = explode('|', $content);
			$options = array();
			foreach ($parts as $opt) {
				$pos = strpos($opt, ':');
				if($pos !== false) {
					$key   = substr($opt, 0, $pos);
					$value = substr($opt, $pos+1);
					try {
						$options[$key] = $value;
					} catch (Exception $e) {}
				}
			}
			return $options;

		} // _prepare_content

	}
}

if(class_exists('WP_Amara_Shortcode')) {
	// instantiate the plugin class
	$wp_amara_shortcode = new WP_Amara_Shortcode();
}