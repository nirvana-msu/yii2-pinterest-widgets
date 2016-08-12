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
 * Board widget displays an entire board (up to 50 Pins), providing your visitors a quick taste of what your Pinterest profile's all about.
 *
 * @author Alexander Stepanov <student_vmk@mail.ru>
 */
class PinterestBoard extends Widget
{
    use PinterestWidgetTrait;

    /**
     * @var string the board slug of the board (`<username>/<board_name>`)
     */
    public $board;

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
        if ($this->board === null) {
            throw new InvalidConfigException('PinterestBoard requires a "board" slug.');
        }

        $this->registerAssets();
    }

    /**
     * Executes the widget.
     */
    public function run()
    {
        $url = "https://www.pinterest.com/$this->board/";
        $attributes = array_filter([    // removes null attributes
            'data-pin-do' => 'embedBoard',
            'data-pin-board-width' => $this->boardWidth,
            'data-pin-scale-height' => $this->boardHeight,
            'data-pin-scale-width' => $this->imageWidth,
        ]);

        echo Html::a('', $url, $attributes);
    }
}
