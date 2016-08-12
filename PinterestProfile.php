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
 * Profile widget shows the most recent Pins you’ve saved.
 *
 * @author Alexander Stepanov <student_vmk@mail.ru>
 */
class PinterestProfile extends Widget
{
    use PinterestWidgetTrait;

    /**
     * @var string the username of the profile
     */
    public $user;

    /**
     * @var number the width of the board widget
     */
    public $boardWidth;

    /**
     * @var number the height of the board widget
     */
    public $boardHeight;

    /**
     * @var number the width of the Pin thumbnails within the widget
     */
    public $imageWidth;

    /**
     * Initializes the widget.
     */
    public function init()
    {
        if ($this->user === null) {
            throw new InvalidConfigException('PinterestProfile requires a "user" name.');
        }

        $this->registerAssets();
    }

    /**
     * Executes the widget.
     */
    public function run()
    {
        $url = "https://www.pinterest.com/$this->user/";
        $attributes = array_filter([    // removes null attributes
            'data-pin-do' => 'embedUser',
            'data-pin-board-width' => $this->boardWidth,
            'data-pin-scale-height' => $this->boardHeight,
            'data-pin-scale-width' => $this->imageWidth,
        ]);

        echo Html::a('', $url, $attributes);
    }
}
