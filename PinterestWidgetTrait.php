<?php
/**
 * @link https://github.com/nirvana-msu/yii2-pinterest-widgets
 * @copyright Copyright (c) 2016 Alexander Stepanov
 * @license MIT
 */

namespace nirvana\pinterest;

use Yii;
use yii\web\View;

/**
 * Trait, providing a common method to register assets for all pinterest widgets.
 *
 * @author Alexander Stepanov <student_vmk@mail.ru>
 */
trait PinterestWidgetTrait
{
    /**
     * Registers the necessary assets
     */
    public function registerAssets()
    {
        $view = $this->getView();
        $js = <<< SCRIPT
(function(d){
    var f = d.getElementsByTagName('SCRIPT')[0], p = d.createElement('SCRIPT');
    p.type = 'text/javascript';
    p.async = true;
    p.src = '//assets.pinterest.com/js/pinit.js';
    f.parentNode.insertBefore(p, f);
}(document));
SCRIPT;
        $view->registerJs($js, View::POS_END);
    }

    /**
     * @return \yii\web\View the view object that can be used to render views or view files.
     * @see yii\base\Widget::getView()
     */
    abstract function getView();
}
