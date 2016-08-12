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
 * The follow button lets Pinners easily follow your business’s Pinterest page.
 * Choose either a `board` or `user` to follow. If both are specified, `board` will be used.
 *
 * @author Alexander Stepanov <student_vmk@mail.ru>
 */
class PinterestFollowButton extends Widget
{
    use PinterestWidgetTrait;

    /**
     * @var string the board slug of the board to follow (`<username>/<board_name>`)
     */
    public $board;

    /**
     * @var string the username of the user to follow
     */
    public $user;

    /**
     * @var string the text to be displayed on the follow button
     */
    public $text = '';

    /**
     * Initializes the widget.
     */
    public function init()
    {
        if ($this->board === null && $this->user === null) {
            throw new InvalidConfigException('PinterestFollowButton requires either a "board" slug or a "user" name.');
        }

        $this->registerAssets();
    }

    /**
     * Executes the widget.
     */
    public function run()
    {
        $subj = $this->board ?: $this->user;
        $url = "https://www.pinterest.com/$subj/";
        $attributes = ['data-pin-do' => 'buttonFollow'];

        echo Html::a($this->text, $url, $attributes);
    }
}
