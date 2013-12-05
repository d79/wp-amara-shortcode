=== Plugin Name ===
Contributors: d79
Donate link: http://www.emergency.it/form/donations/
Tags: amara, amara.org, video, subtitles
Requires at least: 3.0.1
Tested up to: 3.7.1
Stable tag: 4.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A simple wordpress plugin to enable Amara.org shortcode

== Description ==

A simple wordpress plugin to enable Amara.org shortcode.

== Installation ==

1. Upload `wp_amara_shortcode.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

== Changelog ==

= 1.2 =
Support extended to most of the options available on [Amara Embed Code Usage Guide](https://github.com/pculture/unisubs/wiki/Embed-Code-Usage-Guide)

= 1.1 =
Support extended to all video formats accepted by Amara

= 1.0 =
Plugin file created

== Usage ==

Insert `[amara url=http://URL/OF/VIDEO]` into the content of your page where you want to display the subtitled video (supported video formats: Ogg, WebM, flv, mp4, Youtube, Vimeo, Dailymotion).

Optionally, you can set some other options, like explained on [Amara Embed Code Usage Guide](https://github.com/pculture/unisubs/wiki/Embed-Code-Usage-Guide).

To insert the `content` option for FLV files use the format `content='key1:value1|key2:value2|...|keyN:valueN'` (note the wrapping quotes)

To insert the `base_state` language option, just add it like 'base_state=XX' (where XX is the ISO-639-3 language code)

### Examples

`[amara url=http://www.youtube.com/watch?v=XSGBVzeBUbk color1=0xFF0000 width=640 height=480]`

`[amara url=http://vimeo.com/15308050 color=FF0000 width=640 height=480]`

`[amara url=http://mysite.com/myvideofile.flv width=640 height=480 content='url:flowplayer.content-3.2.0.swf|height:220|padding:30|backgroundColor:#112233|opacity:0.7|backgroundGradient:[0.1, 0.1, 1.0]|style:{p: {fontSize: 40}}']`

`[amara url=http://blip.tv/file/get/Miropcf-AboutUniversalSubtitles847.ogv base_state=ja]`