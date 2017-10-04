# SilverStripe Shortcodable codes 3.0

## Overview
Couple of Rich-media content embeds based on [Shortcodable module](https://github.com/sheadawson/silverstripe-shortcodable/) for SilverStripe 3.

Available Shortcodes:
 * Facebook (posts, video)
 * Iframe
 * Instagram (posts, video)
 * Twitter (posts, video)
 * Vimeo
 * YouTube


## Requirements
 * SilverStripe Framework 3.5+
 * SilverStripe CMS 3.5+
 * Shortcodable 3.0+


## Installation
 * Install via Composer
```
composer require fractaslabs/silverstripe-shortcodable-codes ^1.0
```
 * Choose and add which Shortcodes you wanna enable via YAML configuration:
```yaml
---
Name: shortcodable-codes
---
Shortcodable:
  shortcodable_classes:
    - FacebookShortcode
    - IframeShortcode
    - InstagramShortcode
    - TwitterShortcode
    - VimeoShortcode
    - YoutubeShortcode
```
 * Run dev/build with ?flush=1


## CMS usage
 * See [Docs](https://github.com/fractaslabs/silverstripe-shortcodable-codes/docs/en/userguide.md)


## Bugtracker
Bugs are tracked on [github.com](https://github.com/fractaslabs/silverstripe-shortcodable-codes/issues)


## Licence
 * See [Licence](https://github.com/fractaslabs/silverstripe-shortcodable-codes/blob/3.0/LICENSE)
