## Overview
This documentation contains CMS usage and screenshoots of available rich-media shortcodes.
Each shortcode for easier visual representation within the WYSIWYG editor is displayed as placeholder image in the colors of the brand, with a link and an optional title, as shown on image:
 
 
![Shortcode placeholders](https://github.com/fractaslabs/silverstripe-shortcodable-codes/blob/3.0/docs/en/images/shortcode-placeholders.png)
 
 
### Facebook Shortcode
Allows you to display Facebook posts and videos. You can not embed a Facebook profile or any other Facebook Widget except posts and videos.

#### USAGE:
Into the field link you need to insert the full link to Facebook post or video.
To view Facebook videos you need to check the box marked Is Video (NOTE: for correct display of Facebook videos, correct Facebook video link is required, like: https://www.facebook.com/facebook/videos/10153231379946729/).
Optionally it is possible to change the width of the generated Facebook post which, if not replaced, receives the default value of 500px.


### IFrame shortcode
Allows you to display the contents of other websites or any application or service via the HTML <iframe> tag.

#### USAGE:
Into the field link you need to insert the full link to a website or service, while the Width and Height fields are optional and if not replaced receive default values of 640px x 480px.

#### NOTE 1:
If website, application or service has set a ban on the display of content (eg. "X-Frame-Options: SAMEORIGIN") then IFrame shortcode will not work, it will display an error message about the lack of site (Error 404 - Page not found) or unavailability (error 403 - Forbidden), for example, as is the case if you try to set https://www.google.com in <iframe>.

#### NOTE 2:
IFrame shortcode is responsive and "supposed" to be proportionally adjusted to the dimensions of the user's screen, but we can not guarantee the functionality of responsiveness because it depends on the implementation of embed sides (third party).


### Instagram shortcode
Enables display of Instagram Widget post, whether it is video or image.

#### USAGE:
Into the field Link you need to insert the full link to Instagram post. The interface will display the Instagram post widget, which is responsive and adaptable to the current resolution of the user's device.


### Twitter shortcode
Enables display of Twitter Widget Post, whether it is video or image.

#### USAGE:
Into the field Link you need to insert the full link to Twitter Post or video.
To view the Twitter video is necessary to mark the checkbox Is Video.


### Vimeo shortcode
Enables display of Vimeo videos. Into the field Link you need to insert the Vimeo video ID like so:
![Vimeo video ID example](https://github.com/fractaslabs/silverstripe-shortcodable-codes/blob/3.0/docs/en/images/vimeo-video-id-example.png)

Width and Height fields are optional and if they are not replaced receive defaults of 640px or 390px. If the default values are modified, it is necessary to keep the ratio of 16:9.



### YouTube shortcode
Enables display of YouTube videos. Into the field link you need to insert a YouTube video ID like so:
![YouTube video ID example](https://github.com/fractaslabs/silverstripe-shortcodable-codes/blob/3.0/docs/en/images/youtube-video-id-example.png)

Width and Height fields are optional and if they are not replaced receive defaults of 640px or 390px. If the default values are modified, it is necessary to keep the ratio of 16: 9.
