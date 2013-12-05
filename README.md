WP Amara Shortcode
==================

Wordpress Plugin for Amara.org shortcode

Usage
-----

Insert `[amara url=XXXXXXXXXXX]` into the content of your page where you want to display the subtitled video (where `XXXXXXXXXXX` is the complete URL of your video).

Optionally, you can set some other options, like explained on [Amara Embed Code Usage Guide](https://github.com/pculture/unisubs/wiki/Embed-Code-Usage-Guide).

To insert the `content` option for FLV files use the format `content='key1:value1|key2:value2|...|keyN:valueN'` (note the wrapping quotes)

To insert the `base_state` language option, just add it like `base_state=XX` (where XX is the ISO-639-3 language code)

### Examples

```
[amara url=http://www.youtube.com/watch?v=XSGBVzeBUbk color1=0xFF0000 width=640 height=480]
```

```
[amara url=http://vimeo.com/15308050 color=FF0000 width=640 height=480]
```

```
[amara url=http://mysite.com/myvideofile.flv width=640 height=480 content='url:flowplayer.content-3.2.0.swf|height:220|padding:30|backgroundColor:#112233|opacity:0.7|backgroundGradient:[0.1, 0.1, 1.0]|style:{p: {fontSize: 40}}']
```

```
[amara url=http://blip.tv/file/get/Miropcf-AboutUniversalSubtitles847.ogv base_state=ja]
```