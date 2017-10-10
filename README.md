# SilverStripe Shortodable codes 4.0

## Overview
Couple of Rich-media content embeds based on [Shortcodable module](https://github.com/sheadawson/silverstripe-shortcodable/).

Available Shortcodes:
 * Facebook (posts, video)
 * Iframe
 * Instagram (posts, video)
 * Twitter (posts, video)
 * Vimeo
 * YouTube


## Requirements
 * SilverStripe 4+
 * Shortcodable


## Installation
 * Install via Composer
```
composer require fractaslabs/silverstripe-shortcodable-codes
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


## CMS usage
 * See [Docs](https://github.com/fractaslabs/silverstripe-shortcodable-codes/blob/master/docs/en/userguide.md)


## Bugtracker
Bugs are tracked on [github.com](https://github.com/fractaslabs/silverstripe-shortcodable-codes/issues)


## Licence
 * See [Licence](https://github.com/fractaslabs/silverstripe-shortcodable-codes/LICENSE)
