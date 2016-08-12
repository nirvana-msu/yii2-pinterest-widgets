<?php
/**
 * @link https://github.com/nirvana-msu/yii2-pinterest-widgets
 * @copyright Copyright (c) 2016 Alexander Stepanov
 * @license MIT
 */

namespace nirvana\pinterest;

use Yii;
use yii\base\InvalidConfigException;
use yii\base\Widget;
use yii\helpers\Html;

/**
 * The Pin It button is the best way for your business to get content on Pinterest. With just one click, visitors can save content they like on your site to Pinterest, which helps even more Pinners discover you.
 * Note: there are more settings available than this widget currently supports. For the full description of the settings, defaults and their effect, refer to https://developers.pinterest.com/docs/widgets/save/
 *
 * @author Alexander Stepanov <student_vmk@mail.ru>
 */
class PinItButton extends Widget
{
    use PinterestWidgetTrait;

    /**
     * @var string enum of ['any', 'one']
     */
    public $type = 'any';

    /**
     * @var boolean is large sized button
     */
    public $large;

    /**
     * @var boolean is circular button
     */
    public $round;

    /**
     * @var string the image url of the Pin to create
     */
    public $media;

    /**
     * @var string the link back of the Pin to create
     */
    public $url;

    /**
     * @var string the description of the Pin to create
     */
    public $description;

    /**
     * Initializes the widget.
     */
    public function init()
    {
        if (!in_array($this->type, ['any', 'one'])) {
            throw new InvalidConfigException('The "type" property must be one of [\'any\', \'one\']');
        }

        $this->registerAssets();
    }

    /**
     * Executes the widget.
     */
    public function run()
    {
        $isOne = $this->type === 'one';

        $text = $this->round ? '<img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_round_red_32.png" />' : '';

        $url = 'https://www.pinterest.com/pin/create/button/';
        if ($isOne) {
            $href = urlencode($this->url);
            $media = urlencode($this->media);
            $description = urlencode($this->description);
            $url .= "?url=$href&media=$media&description=$description";
        }

        $attributes = array_filter([    // removes null attributes
            'data-pin-do' => $isOne ? 'buttonPin' : 'buttonBookmark',
            'data-pin-tall' => $this->large ? 'true' : null,
            'data-pin-round' => $this->round ? 'true' : null,
        ]);

        echo Html::a($text, $url, $attributes);
    }
}
