# SilverStripe Shortcodable codes 3.0
[![Build Status](https://travis-ci.org/fractaslabs/silverstripe-shortcodable-codes.svg?branch=3.0)](https://travis-ci.org/fractaslabs/silverstripe-shortcodable-codes)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/fractaslabs/silverstripe-shortcodable-codes/badges/quality-score.png?b=3.0)](https://scrutinizer-ci.com/g/fractaslabs/silverstripe-shortcodable-codes/?branch=3.0)

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
composer require fractas/silverstripe-shortcodable-codes ^1.0
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
 * See [Docs](https://github.com/fractaslabs/silverstripe-shortcodable-codes/blob/3.0/docs/en/userguide.md)


## Bugtracker
Bugs are tracked on [github.com](https://github.com/fractaslabs/silverstripe-shortcodable-codes/issues)


## Licence
 * See [Licence](https://github.com/fractaslabs/silverstripe-shortcodable-codes/blob/3.0/LICENSE)
