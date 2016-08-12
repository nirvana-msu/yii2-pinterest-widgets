yii2-pinterest-widgets
================

Yii2 extension for [pinterest widgets](https://developers.pinterest.com/docs/widgets/getting-started/),
making it easy to add Pinterest content onto your website.

## Resources
 * Yii2 [extension page](http://www.yiiframework.com/extension/yii2-pinterest-widgets)
 * Pinterest [widget builder](https://business.pinterest.com/widget-builder/)

## Installation

### Composer

Add extension to your `composer.json` and update your dependencies as usual, e.g. by running `composer update`
```js
{
    "require": {
        "nirvana-msu/yii2-pinterest-widgets": "1.0.*@dev"
    }
}
```

![](https://raw.githubusercontent.com/pinterest/react-pinterest/master/examples/images/demo.png)

The full list of available widgets are:
  - Pin It Button
  - Pinterest Follow Button
  - Pinterest Pin Widget
  - Pinterest Profile Widget
  - Pinterest Board Widget

## Pin It Button

The Pin It button is the best way for your business to get content on Pinterest. With just one click, visitors can save content they like on your site to Pinterest, which helps even more Pinners discover you.

prop  | type    | default           | notes
------| ------- | ----------------- | ----------
type  | string  | 'any'             | enum of ['any', 'one']
large | boolean | *not set* (false) | is large sized button
round | boolean | *not set* (false) | is circular button

The following props are specific for type="one". Each prop refers to the Pin to be pinned on click. A new Pin will be created using `media`, `url` and `description`.

prop        | type   | notes
----------- |------- | ----------
media       | string | the image url of the Pin to create
url         | string | the link back of the Pin to create
description | string | the description of the Pin to create

> Note: there are more settings available than this widget currently supports. For the full description of the settings, defaults and their effect, refer to [documentation](https://developers.pinterest.com/docs/widgets/save/).

Use: 
```php
// To create a Pin one Pin It button
echo PinItButton::widget([
    'type' => 'one',
    'media' => 'https://goo.gl/zFFBUK',
    'url' => 'https://goo.gl/hQmcWP',
    'description' => 'Example Stuff',
]);

// To Create a Pin any Pin It Button: opens the image picker overlay
echo PinItButton::widget(['type' => 'any']);
echo PinItButton::widget(['type' => 'any', 'large' => true]);
echo PinItButton::widget(['type' => 'any', 'round' => true]);
echo PinItButton::widget(['type' => 'any', 'round' => true, 'large' => true]);
```

## Pinterest Follow Button

The follow button lets Pinners easily follow your business’s Pinterest page.

prop  | type   | notes
----- | ------ | ----------
board | string | the board slug of the board to follow (`<username>/<board_name>`)
user  | string | the username of the user to follow
text  | string | the text to be displayed on the follow button

Choose either a `board` or `user` to follow. If both are specified, `board` will be used.

Use:
```php
// To create a board follow button
echo PinterestFollowButton::widget([
    'board' => 'pinterest/official-news',
    'text' => 'Official News',
]);

// To create a profile follow button
echo PinterestFollowButton::widget([
    'user' => 'pinterest',
    'text' => 'Pinterest',
]);
```

## Pinterest Pin Widget

Pin widget lets you show a Pin and is perfect for when you find a Pin that fits your look and feel.

prop  | type    | default             | notes
----- | ------- | ------------------- | ----------
pin   | string  | *required*          | the id of the Pin to display
size  | string  | *not set* ('small') | enum of ['small', 'medium', 'large']
terse | boolean | *not set* (false)   | whether to hide description

Use:
```php
// Pin Widgets default to small
echo PinterestPin::widget(['pin' => '530158187357124374']);
echo PinterestPin::widget(['pin' => '530158187357124374', 'size' => 'medium']);
echo PinterestPin::widget(['pin' => '530158187357124374', 'size' => 'large', 'terse' => true]);
```

## Pinterest Board Widget

Board widget displays an entire board (up to 50 Pins), providing your visitors a quick taste of what your Pinterest profile's all about. 

prop        | type   | default    | notes
----------- | ------ | ---------- | ----------
board       | string | *required* | the board slug of the board (`<username>/<board_name>`)
boardWidth  | number | *not set*  | the width of the board widget
boardHeight | number | *not set*  | the height of the board widget
imageWidth  | number | *not set*  | the width of the Pin thumbnails within the widget

Use:
```php
echo PinterestBoard::widget([
    'board' => 'pinterest/official-news',
    'boardWidth' => 400,
    'boardHeight' => 320,
    'imageWidth' => 80,
]);
```

## Pinterest Profile Widget

Profile widget shows the most recent Pins you’ve saved.

prop        | type   | default    | notes
----------- | ------ | ---------- | ----------
user        | string | *required* | the username of the profile
boardWidth  | number | *not set*  | the width of the board widget
boardHeight | number | *not set*  | the height of the board widget
imageWidth  | number | *not set*  | the width of the Pin thumbnails within the widget

Use:
```php
echo PinterestProfile::widget([
    'user' => 'pinterest',
    'boardWidth' => 400,
    'boardHeight' => 320,
    'imageWidth' => 80,
]);
```

##License

Extension is released under MIT license.
