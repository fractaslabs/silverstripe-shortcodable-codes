<?php

class InstagramShortcode extends ViewableData
{
    private static $singular_name = 'Instagram Shortcode';
    private static $plural_name   = 'Instagram Shortcodes';

    /**
     * The API base URL
     */
    const API_URL = 'https://api.instagram.com/oembed';

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
            return 'Instagram Shortcode: no link';
        }

        $arguments['link'] = str_replace("'", '', $arguments['link']);
        if (strpos($arguments['link'], ',')) {
            return 'Instagram Shortcode: only one link supported at the moment';
        }

        $query = array('url' => Convert::raw2xml($arguments['link']));
        if (array_key_exists('hidecaption', $arguments)) {
            $query['hidecaption'] = true;
        }

        $fetch = new RestfulService(self::API_URL, 1800); // 0 = no caching service / default cache is set to 1 hour (3600)
        $fetch->setQueryString($query);

        if (!$fetch) {
            return false;
        }

        try {
            $conn = $fetch->request('', "GET", null, null, array(CURLOPT_SSL_VERIFYPEER => false));
            // check response status code
            if ($conn->getStatusCode() == 200) {
                // read body from response
                $body = $conn->getBody();
            } else {
                // response status is not OK (send email)
                $body = false;
                $loginErr = false;
                if ($conn->getStatusCode() == 404) {
                    SS_Log::log(new Exception("(404) API is not available"), SS_Log::ERR);
                } elseif ($conn->getStatusCode() == 503) {
                    SS_Log::log(new Exception("(503) API is not available"), SS_Log::ERR);
                } elseif ($conn->getStatusCode() == 500) {
                    SS_Log::log(new Exception("(500) API is not available"), SS_Log::ERR);
                } elseif ($conn->getStatusCode() == 403) {
                    SS_Log::log(new Exception("(403) API is not available"), SS_Log::ERR);
                } elseif ($conn->getStatusCode() == 401) {
                    SS_Log::log(new Exception("(401) API is not available"), SS_Log::ERR);
                } else {
                    SS_Log::log(new Exception(print_r($conn, true)), SS_Log::ERR);
                }

                return false;
            }
        } catch (Exception $e) {
            SS_Log::log(new Exception(print_r($e, true)), SS_Log::ERR);
            return false;
        }

        $urlDecode = json_decode(($body), 1);

        $data = new ArrayData(array(
            'Title'    => (array_key_exists('title', $arguments)) ? $arguments['title'] : false,
            'Data'    => ($urlDecode) ? $urlDecode['html'] : false,
            'Caption' => (array_key_exists('hidecaption', $arguments)) ? $arguments['hidecaption'] : false,
            'Width' => (array_key_exists('width', $arguments)) ? $arguments['width'] : false
        ));

        // render with template
        return $data->renderWith('InstagramShortcode');
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
            TextField::create('title', 'Title')
                ->setMaxLength(80)
                ->setDescription('<span class="optional-shortcode-label">OPTIONAL:</span> add a title
					that shows above this Instagram post. <br>Max. <strong>80 characters</strong>'),
            TextField::create('link', 'Link')
                ->setDescription('<span class="required-shortcode-label">REQUIRED:</span> enter full
					Instagram post link. Example: <strong>https://www.instagram.com/p/BKKYSoNjEsr/</strong><br>
					Do not include anything after last /.'),
            CheckboxField::create('hidecaption', _t("ShortcodeExt.HIDECAPTION", "Hide Caption"))
                ->setDescription('Choose this if you embeding Instagram video'),
            TextField::create('width', _t("ShortcodeExt.WIDTH", "Width"))
                ->setValue('612')
                ->setMaxLength('4')
                ->setDescription('Enter desired post width (type only number ie. 612). Defaults to <strong>612px</strong>')
        );

        return $fields;
    }

    /**
     * Returns a link to an image to be displayed as a placeholder in the editor
     * In this example we make easy work of this task by using the placehold.it service
     * But you could also return a link to an image in the filesystem - perharps the first
     * image in this InstagramShortcode a placeholder
     *
     * @param array $attributes the list of attributes of the shortcode
     * @return String
     **/
    public function getShortcodePlaceHolder($attributes)
    {
        $title = (array_key_exists('title', $attributes)) ? $attributes['title'] : false;
        $link = (array_key_exists('link', $attributes)) ? $attributes['link'] : false;

        $text = 'Instagram';
        $text .= "\r\n";
        $text .= $title;
        $text .= "\r\n";
        $text .= '('. $link .')';

        $params = array(
            'txt' => $text,
            'w' => 300,
            'h' => 200,
            'txtsize' => '20',
            'bg' => '405de6',
            'txtclr' => 'FFFFFF'
        );

        return 'https://placeholdit.imgix.net/~text?' . http_build_query($params);
    }
}
