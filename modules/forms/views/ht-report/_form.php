<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;

use app\components\helpers\CustomHtml;

/**
 * @var yii\web\View $this
 * @var app\modules\forms\models\HtReport $model
 * @var yii\widgets\ActiveForm $form
 * @var app\modules\forms\models\HtReportPrehistory $infarctPrehistories
 * @var app\modules\forms\models\HtReportPrehistory $pciPrehistories
 * @var app\modules\forms\models\HtReportPrehistory $cabgPrehistories
 * @var app\modules\forms\models\HtReportPrehistory $addPrehistories
 * @var app\modules\forms\models\HtReportPrehistory $echoPrehistories
 */
?>
<section class="full_container_section">
    <?php $form = ActiveForm::begin(['id' => 'ht-report-form']); ?>
    <section class="sec_gap40">
        <div class="container">
            <div class="row">
                <div class="AutoWrapper">
                    <div class="col-md-12 cmn_content_box1">
                    <fieldset><?= Yii::t('modules/forms/app', 'HEARTTEAMCARD') ?></fieldset>
                    
                    <div class="col-md-12 gap_t40 col_0">
                        <div class="width_250">
                            <?= $form->field($model, 'small_description', [
                                'template' => "{input}\n{hint}\n{error}\n",
                                'inputOptions' => [
                                    'class' => 'form-control textarea_1',
                                    'placeholder' => Yii::t('modules/forms/app', 'Name') . ": {$model->patient->name}, Pid: {$model->patient->pid}, " . Yii::t('modules/forms/app', 'Birth date') . ": {$model->patient->birth_date}",
                                ],
                                'options' => ['class' => 'input-group input_group_1'],
                            ])->textarea();?>
                        </div><!-- / col-md-4 width_250 -->
                        
                        <div class="width_500">
                            
                            <div class="col-md-12 column_gap_1 col_0 width_360 right-margin float-left">
                                <?=
                                CustomHtml::activeButtonRadioList($model, 'clinical', ['1' => 'Clinic', '0' => 'Polyclinic'], $this);
                                ?>
                            </div><!-- / col-md-12 -->

                            <div class="float-left width_110">
                                <?= $form->field($model, 'ccr_report_id', [
                                    'template' => "{input}\n{hint}\n{error}\n",
                                ])
                                ->dropDownList(['0' => 'HC'] + $model->ccrArray); ?>
                            </div>

                        </div><!-- / col-md-8 width_500 -->
                        
                        <div class="width_500">
                            <div class="float-left">
                                <?= $form->field($model, 'discuss_date', [
                                    'template' => "{label}\n",
                                    'inputOptions' => ['class' => 'form-control form_control_1'],
                                    'options' => ['class' => 'zero-margin'],
                                ])?>
                                <?= $form->field($model, 'discuss_date', [
                                    'template' => "{input}\n{hint}\n{error}\n",
                                ])
                                ->widget(DatePicker::classname(), [
                                    'pluginOptions' => [
                                    'autoclose' => true,
                                    'format' => 'yyyy-mm-dd',
                                    ]
                                ]);?>
                            </div>
                            <div class="float-left">
                                <?= $form->field($model, 'thoracic_surgeon', ['options' => ['class' => 'left-margin']]) ?>
                            </div>
                        </div>

                        <div class="width_500">
                            <?= $form->field($model, 'intervention_cardiologist', [
                                'template' => "{label}\n",
                                'options' => ['class' => 'zero-margin'],
                                'parts' => ['{input}' => ''],
                            ]) ?>
                            <ul class="list_1 padding">
                                <?= Html::activeCheckboxList($model, 'intervention_cardiologist',
                                    $model::$interventionCardiologistValues,
                                    [
                                        'item' => function($index, $label, $name, $checked, $value) {
                                            $inputId = $name . '-' . strtolower($value);
                                            $options = [
                                                'checked' => (boolean) $checked,
                                                'id' => $inputId,
                                            ];
                                            $label = Yii::t('modules/forms/app', $label);
                                            $radio = Html::input('checkbox', $name, $value, $options);
                                            $radio .= Html::label($label, $inputId, ['class' => 'label_gap_1']);

                                            $html = Html::tag('div', $radio, ['class' => 'input-group']);

                                            $html = Html::tag('li', $html);

                                            return $html;
                                        }
                                    ]
                                ) ?>
                            </ul>
                        </div>

                        <div class="width_500">
                            <?= $form->field($model, 'cardiologist', [
                                'template' => "{label}\n",
                                'options' => ['class' => 'zero-margin'],
                                'parts' => ['{input}' => ''],
                            ]) ?>
                            <ul class="list_1 padding">
                                <?= Html::activeCheckboxList($model, 'cardiologist',
                                    $model::$cardiologistValues,
                                    [
                                        'item' => function($index, $label, $name, $checked, $value) {
                                            $inputId = $name . '-' . strtolower($value);
                                            $options = [
                                                'checked' => (boolean) $checked,
                                                'id' => $inputId,
                                            ];
                                            $label = Yii::t('modules/forms/app', $label);
                                            $radio = Html::input('checkbox', $name, $value, $options);
                                            $radio .= Html::label($label, $inputId, ['class' => 'label_gap_1']);

                                            $html = Html::tag('div', $radio, ['class' => 'input-group']);

                                            $html = Html::tag('li', $html);

                                            return $html;
                                        }
                                    ]
                                ) ?>
                            </ul>
                        </div>

                        <div class="width_500">
                            <?= $form->field($model, 'referring_cardiologist', [
                                'options' => ['class' => 'float-left width-400 clearfix'],
                                'labelOptions' => ['class' => 'block float-left width_200 margin'],
                                'inputOptions' => ['class' => 'width_200 block form-control-custom left-margin bottom-margin float-left'],
]) ?>
                        </div>

                    </div><!-- / col-md-12 -->
                </div><!-- / col-md-12 -->
                </div><!-- / AutoWrapper -->
            </div>
        </div>
    </section><!-- / section -->

    <section class="sec_gap40">
        <div class="container">
            <div class="row">
                <div class="AutoWrapper">
                    <div class="col-md-12 cmn_content_box1">
                        <fieldset><?= Yii::t('modules/forms/app', 'Prehistory') ?></fieldset>

                        <div class="prehistory-blocks-row clearfix">
                            <div class="prehistory-one-third-width prehistory-block clearfix">
                                <div class="prehistory-heading clearfix">
                                <span>
                                    <?= Yii::t('modules/forms/app', 'Infarct') ?>
                                </span>
                                    <div>
                                        <?= Html::a(
                                            Html::tag('span', '', ['class' => 'glyphicon glyphicon-plus']),
                                            ['/forms/ht-report-prehistory/create', 'type' => 'infarct'],
                                            ['class' => 'prehistory btn btn-primary btn-xs pull-right']
                                        ); ?>
                                    </div>
                                </div>
                                <?php foreach ($infarctPrehistories as $prehistory) {
                                    echo $this->render('/ht-report-prehistory/_form', [
                                        'model' => $prehistory,
                                        'formAction' => ''
                                    ]);
                                }?>
                            </div>

                            <div class="prehistory-one-third-width prehistory-block clearfix">
                                <div class="prehistory-heading clearfix">
                                <span>
                                    <?= Yii::t('modules/forms/app', 'PCI') ?>
                                </span>
                                    <div>
                                        <?= Html::a(
                                            Html::tag('span', '', ['class' => 'glyphicon glyphicon-plus']),
                                            ['/forms/ht-report-prehistory/create', 'type' => 'pci'],
                                            ['class' => 'prehistory btn btn-primary btn-xs pull-right']
                                        ); ?>
                                    </div>
                                </div>

                                <?php foreach ($pciPrehistories as $prehistory) {
                                    echo $this->render('/ht-report-prehistory/_form', [
                                        'model' => $prehistory,
                                        'formAction' => ''
                                    ]);
                                }?>
                            </div>

                            <div class="prehistory-one-third-width prehistory-block clearfix">
                                <div class="prehistory-heading clearfix">
                                <span>
                                    <?= Yii::t('modules/forms/app', 'CABG') ?>
                                </span>
                                    <div>
                                        <?= Html::a(
                                            Html::tag('span', '', ['class' => 'glyphicon glyphicon-plus']),
                                            ['/forms/ht-report-prehistory/create', 'type' => 'cabg'],
                                            ['class' => 'prehistory btn btn-primary btn-xs pull-right']
                                        ); ?>
                                    </div>
                                </div>

                                <?php foreach ($cabgPrehistories as $prehistory) {
                                    echo $this->render('/ht-report-prehistory/_form', [
                                        'model' => $prehistory,
                                        'formAction' => ''
                                    ]);
                                }?>
                            </div>
                        </div> <!-- / prehistory-blocks-row -->

                        <div class="prehistory-blocks-row clearfix">

                            <div class="prehistory-one-third-width prehistory-block clearfix">
                                <div class="prehistory-heading clearfix">
                                <span>
                                    <?= Yii::t('modules/forms/app', 'Additional') ?>
                                </span>
                                    <div>
                                        <?= Html::a(
                                            Html::tag('span', '', ['class' => 'glyphicon glyphicon-plus']),
                                            ['/forms/ht-report-prehistory/create', 'type' => 'additional'],
                                            ['class' => 'prehistory btn btn-primary btn-xs pull-right']
                                        ); ?>
                                    </div>
                                </div>

                                <?php foreach ($addPrehistories as $prehistory) {
                                    echo $this->render('/ht-report-prehistory/_form', [
                                        'model' => $prehistory,
                                        'formAction' => ''
                                    ]);
                                }?>
                            </div>

                            <div class="prehistory-one-third-width prehistory-block clearfix">
                                <div class="prehistory-heading clearfix">
                            <span>
                                <?= Yii::t('modules/forms/app', 'Echo') ?>
                            </span>
                                    <div>
                                        <?= Html::a(
                                            Html::tag('span', '', ['class' => 'glyphicon glyphicon-plus']),
                                            ['/forms/ht-report-prehistory/create', 'type' => 'echo'],
                                            ['class' => 'prehistory btn btn-primary btn-xs pull-right']
                                        ); ?>
                                    </div>
                                </div>

                                <?php foreach ($echoPrehistories as $prehistory) {
                                    echo $this->render('/ht-report-prehistory/_form', [
                                        'model' => $prehistory,
                                        'formAction' => ''
                                    ]);
                                }?>
                            </div>

                        </div> <!-- /prehistory-blocks-row -->

                        <div class="width_200 box anamnese">
                            <?= $form->field($model, 'anamnese', ['template' => "{label}\n{input}\n{hint}\n"])->textarea() ?>
                        </div>

                        <div class="width_500 box left-margin ischemia-detection clearfix">
                            <fieldset><?= Yii::t('modules/forms/app', 'Ischemia-detection');?></fieldset>
                            <?= $form->field($model, 'ischemia_detection_x_ecg')
                                ->dropDownList(['1' => '+', '0' => '-']);?>
                            <?= $form->field($model, 'ischemia_detection_tc_ggm')
                                ->dropDownList(['-' => '-', '+' => '+', 'nbb' => 'nbb'])?>
                            <?= $form->field($model, 'ischemia_detection_x_mri')
                                ->dropDownList(['1' => '+', '0' => '-'])?>
                            <?= $form->field($model, 'ischemia_detection_x_echo')
                                ->dropDownList(['0' => '-', '1' => '+'])?>
                            <?= $form->field($model, 'ischemia_detection_tc_ggm_text')?>
                            <?= $form->field($model, 'ischemia_detection_x_mri_text')?>
                        </div>

                        <div class="box full-width recent">
                            <fieldset><?= Yii::t('modules/forms/app', 'Recent');?></fieldset>
                            <?= $form->field($model, 'recent_mi')
                                ->dropDownList(['0' => '1 t/m 4', '1' => '1', '2' => '2', '3' => '3', '4' => '4'])?>
                            <?= $form->field($model, 'recent_ti')
                                ->dropDownList(['0' => '1 t/m 4', '1' => '1', '2' => '2', '3' => '3', '4' => '4'])?>
                            <?= $form->field($model, 'recent_as'); ?>
                            <?= $form->field($model, 'recent_vvv'); ?>
                            <?= $form->field($model, 'recent_ef'); ?>
                            <?= $form->field($model, 'recent_ms'); ?>
                            <?= $form->field($model, 'recent_ts'); ?>
                            <?= $form->field($model, 'recent_ava'); ?>
                            <?= $form->field($model, 'recent_rvsp'); ?>
                            <?= $form->field($model, 'recent_mva'); ?>
                            <?= $form->field($model, 'recent_ai')
                                ->dropDownList(['0' => '1 t/m 4', '1' => '1', '2' => '2', '3' => '3', '4' => '4'])?>
                        </div>

                        <?= $this->render('_cag', ['model' => $model, 'form' => $form]); ?>

                        <div class="box heerlen-advice width_350">
                            <fieldset><?= Yii::t('modules/forms/app', 'HT Heerlen Advice')?></fieldset>
                            <?= $form->field($model, 'heerlen_advice_cons', ['options' => ['class' => 'form-group clearfix']]) ?>
                            <?= $form->field($model, 'heerlen_advice_ffr', ['options' => ['class' => 'form-group clearfix']]) ?>
                            <?= $form->field($model, 'heerlen_advice_consultation_ctc', ['options' => ['class' => 'form-group clearfix']])?>
                            <?= $form->field($model, 'heerlen_advice_naber_speak_with', ['options' => ['class' => 'form-group clearfix']])?>
                        </div>

                        <div class="box width_350 additional">
                            <?= $form->field($model, 'ctc_maastricht_advice')->textarea() ?>
                            <?= $form->field($model, 'additional')->textarea() ?>
                        </div>

                        <div class="box full-width bottom-section">
                            <?= $form->field($model, 'wait_advice') ?>
                            <?= $form->field($model, 'hold_included')->checkbox() ?>
                            <?= $form->field($model, 'urgent')->checkbox() ?>
                            <?= $form->field($model, 'elective')->checkbox() ?>
                        </div>

                    </div> <!-- /col-md-12.cmn_content_box1 -->
                </div>
            </div>
        </div>
    </section>

    <section class="sec_gap10 submit-buttons">
        <div class="container">
            <div class="row">
                <div class="AutoWrapper">
                    <div class="col-md-12 column_gap_1a col_0 print-buttons">
                        <?= Html::button(Yii::t('modules/forms/app', 'Print'), ['class' => 'btn btn-primary btn_custom_2 print-btn']) ?>
                        <?php if (!$isView): ?>
                        <?= Html::submitButton(Yii::t('modules/forms/app', 'Store'), ['class' => 'btn btn-primary btn_custom_2 submit-btn']) ?>
                        <?php endif; ?>
                    </div><!-- / col-md-12 -->
                </div><!-- / AutoWrapper -->
            </div>
        </div>
    </section><!-- / section -->
</section>
