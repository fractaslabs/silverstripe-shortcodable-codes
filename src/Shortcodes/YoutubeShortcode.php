<?php

namespace Fractas\ShortcodableCodes;

use ViewableData;
use ArrayData;
use FieldList;
use TextField;

class YoutubeShortcode extends ViewableData
{
    private static $singular_name = 'YouTube Shortcode';
    private static $plural_name   = 'YouTube Shortcodes';

    /**
     * @return mixed
     */
    public function singular_name()
    {
        return $this->stat('singular_name');
    }

    /**
     * Parse the shortcode and render as a string, probably with a template
     *
     * @param  array           $attributes the list of attributes of the shortcode
     * @param  string          $content the shortcode content
     * @param  ShortcodeParser $parser the ShortcodeParser instance
     * @param  string          $shortcode the raw shortcode being parsed
     * @return String
     */
    public static function parse_shortcode($arguments, $content, $parser, $shortcode)
    {
        if (!array_key_exists('link', $arguments) || !$arguments['link']) {
            return 'YouTube Shortcode: no link';
        }

        $arguments['link'] = str_replace("'", '', $arguments['link']);
        if (strpos($arguments['link'], ',')) {
            return 'YouTube Shortcode: only one link supported at the moment';
        }

        $data = new ArrayData(array(
            'Title'    => (array_key_exists('title', $arguments)) ? $arguments['title'] : false,
            'Link'    => (array_key_exists('link', $arguments)) ? $arguments['link'] : false,
            'Width'    => (array_key_exists('width', $arguments)) ? $arguments['width'] : false,
            'Height'=> (array_key_exists('height', $arguments)) ? $arguments['height'] : false
        ));

        // render with template
        return $data->renderWith('YoutubeShortcode');
    }

    /**
     * Returns a list of fields for editing the shortcode's attributes
     * in the insert shortcode popup window
     *
     * @return Fieldlist
     **/
    public function getShortcodeFields()
    {
        $fields = FieldList::create(
            TextField::create('title', _t("ShortcodeExt.TITLE", "Title"))
                ->setMaxLength(80)
                ->setDescription('<span class="optional-shortcode-label">OPTIONAL:</span> add a title
					that shows above this YouTube video. <br>Max. <strong>80 characters</strong>'),
            TextField::create('link', _t("ShortcodeExt.LINK", "Link"))
                ->setDescription('<span class="required-shortcode-label">REQUIRED:</span> enter here
					ONLY YouTube video ID, ie. <strong><a href="http://imgur.com/GR63q1d" target="_blank">
					click for example image</a></strong>.'),
            TextField::create('width', _t("ShortcodeExt.WIDTH", "Width"))
                ->setValue('640')
                ->setMaxLength('4')
                ->setDescription('Enter desired width (type only number ie. 640). Defaults to <strong>640px</strong>'),
            TextField::create('height', _t("ShortcodeExt.HEIGHT", "Height"))
                ->setValue('360')
                ->setMaxLength('4')
                ->setDescription('Enter desired height (type only number ie. 360). Defaults to <strong>360px</strong>.<br>
                Please keep ratio to 16:9.')
        );

        return $fields;
    }

    /**
     * Returns a link to an image to be displayed as a placeholder in the editor
     * In this example we make easy work of this task by using the placehold.it service
     * But you could also return a link to an image in the filesystem - perharps the first
     * image in this YouTubeShortcode a placeholder
     *
     * @param array $attributes the list of attributes of the shortcode
     * @return String
     **/
    public function getShortcodePlaceHolder($attributes)
    {
        $title = (array_key_exists('title', $attributes)) ? $attributes['title'] : false;
        $link = (array_key_exists('link', $attributes)) ? $attributes['link'] : false;

        $text = 'YouTube';
        $text .= "\r\n";
        $text .= $title;
        $text .= "\r\n";
        $text .= '('. $link .')';

        $params = array(
            'txt' => $text,
            'w' => 300,
            'h' => 200,
            'txtsize' => '20',
            'bg' => 'cd201f',
            'txtclr' => 'FFFFFF'
        );

        return 'https://placeholdit.imgix.net/~text?' . http_build_query($params);
    }
}
