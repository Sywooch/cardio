<?php
/**
 * Created by PhpStorm.
 * User: hlogeon
 * Date: 09.10.2014
 * Time: 13:04
 *
 * @author Degtyaruk Andrey <hlogeon1@gmail.com>
 */

namespace app\components\helpers;

use Yii;
use yii\helpers\Html;
use yii\grid\ActionColumn;

class BootstrapActionColumn extends ActionColumn{

    /**
     * Initializes the default button rendering callbacks
     */
    protected function initDefaultButtons()
    {
        if (!isset($this->buttons['view'])) {
            $this->buttons['view'] = function ($url, $model) {
                return Html::a('<i class="icon-eye-open"></i>', $url, [
                    'title' => Yii::t('yii', 'View'),
                    'data-pjax' => '0',
                ]);
            };
        }
        if (!isset($this->buttons['update'])) {
            $this->buttons['update'] = function ($url, $model) {
                return Html::a('<i class="icon-pencil"></i>', $url, [
                    'title' => Yii::t('yii', 'Update'),
                    'data-pjax' => '0',
                ]);
            };
        }
        if (!isset($this->buttons['delete'])) {
            $this->buttons['delete'] = function ($url, $model) {
                return Html::a('<i class="icon-trash"></i>', $url, [
                    'title' => Yii::t('yii', 'Delete'),
                    'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                    'data-method' => 'post',
                    'data-pjax' => '0',
                ]);
            };
        }
    }

} 