<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use app\modules\forms\models\PrehistoryItem;

/**
 * @var yii\web\View $this
 * @var app\modules\forms\models\PciReport $model
 * @var app\modules\admin\models\Patient $patient
 * @var yii\widgets\ActiveForm $form
 * @var boolean $isView
 * @var array $prehistoryItemsArray
 */

?>

<section class="full_container_section">
    <?php $form = ActiveForm::begin(['id' => 'patient-prehistory-form']); ?>
    <section class="sec_gap40">
        <div class="container">
            <div class="row">
                <div class="AutoWrapper">
                    <div class="cmn_content_box1 col-md-12 vertical-box-padding">
                        <fieldset>Patient Prehistory</fieldset>
                        <div>
                            <?= $form->field($model, 'date')->widget(DatePicker::classname(), [
                                'pluginOptions' => [
                                    'autoclose' => true,
                                    'format' => 'yyyy-mm-dd',
                                ]
                            ]);?>
                        </div>

                        <div>
                            <?= $form->field($model, 'prehistory_item_id')
                                ->dropDownList($prehistoryItemsArray); ?>
                        </div>

                        <div>
                            <?= $form->field($model, 'text', [
                                'inputOptions' => [
                                    'class' => 'form-control full-width-textarea',
                                ],
                                'options' => ['class' => 'input-group full-width-input-group'],
                            ])->textarea();?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sec_gap10">
        <div class="container">
            <div class="row">
                <div class="AutoWrapper">
                    <div class="col-md-12 column_gap_1a col_0 print-buttons">
                        <?= Html::submitButton(Yii::t('modules/forms/app', 'Store'), ['class' => 'btn btn-primary btn_custom_2 submit-btn']) ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php ActiveForm::end(); ?>
</section>
