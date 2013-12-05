<?php
/*
Plugin Name: WP Amara Shortcode
Plugin URI: https://github.com/d79/wp-amara-shortcode
Description: A simple wordpress plugin to enable Amara.org shortcode
Version: 1.1
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
		}
		
		public function amara( $atts ) {
			extract( shortcode_atts( array(
				'url' => '',
				'color1' => '0xFF0000',
				'width' => 640,
				'height' => 480,
			), $atts, 'amara' ) );

			return <<<code
			<script type="text/javascript" src="http://s3.www.universalsubtitles.org/embed.js">
			({
				video_url: "{$url}",
			   video_config: {
					color1: '{$color1}',
					width: '{$width}',
					height: '{$height}'
				}
			})
			</script>
code;
		}

	}
}

if(class_exists('WP_Amara_Shortcode')) {
	// instantiate the plugin class
	$wp_amara_shortcode = new WP_Amara_Shortcode();
}