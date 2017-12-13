# SilverStripe Shortodable codes 4.0
[![Latest Stable Version](https://poser.pugx.org/fractaslabs/silverstripe-shortcodable-codes/v/stable)](https://packagist.org/packages/fractaslabs/silverstripe-shortcodable-codes)
[![Latest Unstable Version](https://poser.pugx.org/fractaslabs/silverstripe-shortcodable-codes/v/unstable)](https://packagist.org/packages/fractaslabs/silverstripe-shortcodable-codes)
[![Total Downloads](https://poser.pugx.org/fractaslabs/silverstripe-shortcodable-codes/downloads)](https://packagist.org/packages/fractaslabs/silverstripe-shortcodable-codes)
[![License](https://poser.pugx.org/fractaslabs/silverstripe-shortcodable-codes/license)](https://packagist.org/packages/fractaslabs/silverstripe-shortcodable-codes)

## Overview
Couple of Rich-media content embeds based on [Shortcodable module](https://github.com/sheadawson/silverstripe-shortcodable/).

Available Shortcodes:
 * Facebook _(posts, video)_
 * Iframe
 * Instagram _(posts, video)_
 * Twitter _(posts, video)_
 * Vimeo
 * YouTube


## Requirements
 * SilverStripe CMS & Framework 4+
 * SilverStripe Shortcodable 4


## Installation
 * Install via Composer
```
composer require fractaslabs/silverstripe-shortcodable-codes "2.x-dev"
```
 * Choose and add which Shortcodes you wanna enable via YAML configuration:
```yaml
---
Name: shortcodable-codes
---
Shortcodable:
  shortcodable_classes:
    - Fractas\ShortcodableCodes\FacebookShortcode
    - Fractas\ShortcodableCodes\IframeShortcode
    - Fractas\ShortcodableCodes\InstagramShortcode
    - Fractas\ShortcodableCodes\TwitterShortcode
    - Fractas\ShortcodableCodes\VimeoShortcode
    - Fractas\ShortcodableCodes\YoutubeShortcode
```
 * Run dev/build with ?flush=1


## CMS user usage
See [Docs](https://github.com/fractaslabs/silverstripe-shortcodable-codes/blob/master/docs/en/userguide.md)


## Bugtracker
Bugs are tracked on [github.com](https://github.com/fractaslabs/silverstripe-shortcodable-codes/issues)


## Licence
See [Licence](https://github.com/fractaslabs/silverstripe-shortcodable-codes/blob/master/LICENSE)
