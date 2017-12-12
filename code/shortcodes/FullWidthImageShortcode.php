<?php

class FullWidthImageShortcode extends ViewableData
{
    private static $singular_name = 'Full Width Image Shortcode';
    private static $plural_name   = 'Full Width Image Shortcodes';

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
        if (isset($arguments['ImageID']) && $image = Image::get()->byId((int) $arguments['ImageID'])) {
            if (!$image || !$image->exists()) {
                return 'Full Width Image Shortcode: no image';
            }

            $data = new ArrayData(array(
                'Title'            => (array_key_exists('title', $arguments)) ? $arguments['title'] : false,
                'Description'    => (array_key_exists('description', $arguments)) ? $arguments['description'] : false,
                'Image'            => $image
            ));

            return $data->renderWith('FullWidthImageShortcode');
        }
    }

    /**
     * Returns a list of fields for editing the shortcode's attributes
     * in the insert shortcode popup window
     * 
     * @return Fieldlist
     **/
    public function getShortcodeFields()
    {
        $imageField = UploadField::create('ImageID', _t("ShortcodeExt.IMAGE", "Image"))
                        ->setAllowedFileCategories('image')
                        ->setAllowedMaxFileNumber(1);

        $fields = FieldList::create(
            TextField::create('title', _t("ShortcodeExt.TITLE", "Title"))
                ->setMaxLength(80)
                ->setDescription('<span class="optional-shortcode-label">OPTIONAL:</span> add a title 
					that shows above uploaded image. <br>Max. <strong>80 characters</strong>'),
            TextField::create('description', _t("ShortcodeExt.DESCRIPTION", "Description"))
                ->setMaxLength(160)
                ->setDescription('<span class="optional-shortcode-label">OPTIONAL:</span> add a 
					description that shows below title and above uploaded image. <br>Max. <strong>160 
					characters</strong>'),
            $imageField
        );

        return $fields;
    }

    /**
     * Returns a link to an image to be displayed as a placeholder in the editor
     * In this example we make easy work of this task by using the placehold.it service
     * But you could also return a link to an image in the filesystem - perharps the first
     * image in this FullWidthImageShortcode
     * a placeholder
     * 
     * @param array $attributes the list of attributes of the shortcode
     * @return String
     **/
    public function getShortcodePlaceHolder($attributes)
    {
        $title = (array_key_exists('title', $attributes)) ? $attributes['title'] : false;
        $link = (array_key_exists('link', $attributes)) ? $attributes['link'] : false;
        $width = (array_key_exists('width', $attributes)) ? $attributes['width'] : 300;
        $height = (array_key_exists('height', $attributes)) ? $attributes['height'] : 200;
        $imageID = (array_key_exists('ImageID', $attributes)) ? $attributes['ImageID'] : false;
        $image = ($imageID != false) ? Image::get()->byId($imageID) : false;
        $imageUrl = ($image != false) ? $image->CroppedFocusedImage($width, $height)->getUrl() : false;

        $text = 'FullWithImage';
        $text .= "\r\n";
        $text .= $title;
        $text .= "\r\n";
        $text .= '('. $imageID .')';

        $params = array(
            'txt' => $text,
            'w' => $width,
            'h' => $height,
            'txtsize' => '20',
            'bg' => 'BBBBBB',
            'txtclr' => '333333'
        );

        return $imageUrl;
    }

    /**
     * If you would like to customise or filter the list of available shortcodable 
     * DataObject records available in the dropdown, you can supply a custom 
     * getShortcodableRecords method on your shortcodable DataObject. The method should 
     * return an associative array suitable for the DropdownField.
     * 
     * @return array
     */
    public function getShortcodableRecords()
    {
        return false;
    }
}
