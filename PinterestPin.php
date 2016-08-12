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
 * Pin widget lets you show a Pin and is perfect for when you find a Pin that fits your look and feel.
 *
 * @author Alexander Stepanov <student_vmk@mail.ru>
 */
class PinterestPin extends Widget
{
    use PinterestWidgetTrait;

    /**
     * @var string the id of the Pin to display
     */
    public $pin;

    /**
     * @var string enum of ['small', 'medium', 'large']
     */
    public $size;

    /**
     * @var boolean whether to hide description
     */
    public $terse;

    /**
     * Initializes the widget.
     */
    public function init()
    {
        if ($this->pin === null) {
            throw new InvalidConfigException('PinterestPin requires a "pin" id.');
        }

        if ($this->size !== null && !in_array($this->size, ['small', 'medium', 'large'])) {
            throw new InvalidConfigException('The "size" property must be one of [\'small\', \'medium\', \'large\']');
        }

        $this->registerAssets();
    }

    /**
     * Executes the widget.
     */
    public function run()
    {
        $url = "https://www.pinterest.com/pin/$this->pin/";
        $attributes = array_filter([    // removes null attributes
            'data-pin-do' => 'embedPin',
            'data-pin-width' => $this->size,
            'data-pin-terse' => $this->terse ? 'true' : null,
        ]);

        echo Html::a('', $url, $attributes);
    }
}
