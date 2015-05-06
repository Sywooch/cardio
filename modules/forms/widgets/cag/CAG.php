<?php

namespace app\modules\forms\widgets\cag;

use yii\base\Widget;
use yii\helpers\Html;

/**
 * Display CAG inputs for cardiac catheterization form
 *
 * @author Oleksandr Shybystyi oleksandr.shybystyi@gmail.com
 */
class CAG extends Widget
{
    /**
     * @var ActiveForm
     */
    public $form;

    /**
     * @var Model
     */
    public $model;

    /**
     * @var array of attribute names or empty strings
     */
    public $attributes;

    public function run()
    {
        $html = '';
        foreach ($this->attributes as $attribute => $view) {
            if ($view) {
                $itemHtml = $this->render($view, [
                    'attribute' => $attribute,
                    'form' => $this->form,
                    'model' => $this->model,
                ]);
            } else {
                $itemHtml = '';
            }

            $html .= Html::tag('li', $itemHtml);
        }
        echo Html::tag('ul', $html, ['class' => 'list_2']);
    }
}
