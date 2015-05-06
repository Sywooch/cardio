<?php

use app\components\helpers\CustomHtml;

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;

/**
 * @var yii\web\View $this
 * @var app\modules\forms\models\PciReport $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<?php $form = ActiveForm::begin(['id' => 'pci-report-form']); ?>
    <div class="container">
        <div class="row">
            <div class="AutoWrapper">
                <div class="col-md-12 cmn_content_box1">
                <fieldset>PCI verslag</fieldset>
                
                <div class="col-md-12 gap_t40 col_0">
                    <div class="width_250">
                        <?= $form->field($model, 'small_description', [
                            'template' => "{input}\n{hint}\n{error}\n",
                            'inputOptions' => [
                                'class' => 'form-control textarea_1',
                                'placeholder' => Yii::t('modules/forms/app', 'Name') . ": {$patient->name}, Pid: {$patient->pid}, " . Yii::t('modules/forms/app', 'Birth date') . ": {$patient->birth_date}",
                            ],
                            'options' => ['class' => 'input-group input_group_1'],
                        ])->textarea();?>
                    </div><!-- / col-md-4 width_250 -->
                    
                    <div class="width_500">

                        <div class="col-md-12 column_gap_1 col_0">
                            <?=
                            CustomHtml::activeButtonRadioList($model, 'clinical', ['1' => 'Clinic', '0' => 'Polyclinic'], $this);
                            ?>
                        </div><!-- / col-md-12 -->

                        <div class="col-md-12 column_gap_2 col_0">
                                <div class="width_300">
                                <div class="col-md-12 column_gap_np1 col_0">
                                    <?= $form->field($model, 'movie_date', [
                                        'template' => "{label}\n",
                                        'inputOptions' => ['class' => 'form-control form_control_1'],
                                        'options' => ['class' => 'width_150'],
                                    ]);?>

                                    <div><?= $form->field($model, 'movie_date', [
                                        'template' => "{input}\n{hint}\n{error}",
                                    ])->widget(DatePicker::classname(), [
                                        'pluginOptions' => [
                                            'autoclose' => true,
                                            'format' => 'yyyy-mm-dd',
                                        ]
                                    ]);?></div>
                                </div><!-- / col-md-12 -->
                                
                                <div class="col-md-12 column_gap_np1 col_0">
                                    <?= $form->field($model, 'phd_candidate', [
                                        'template' => "{label}\n",
                                        'options' => ['class' => 'width_150'],
                                    ]);?>
                                    
                                    <?= $form->field($model, 'phd_candidate', [
                                        'template' => "{input}\n{hint}\n{error}",
                                        'inputOptions' => ['class' => 'form-control form_control_1'],
                                        'options' => ['class' => 'width_150'],
                                    ]);?>
                                </div><!-- / col-md-12 -->
                            </div><!-- / col-md-8 width_300 -->
                            
                            <div class="width_160">
                                <?= $form->field($model, 'supervisor_present', [
                                    'template' => "{label}\n{error}\n",
                                    'labelOptions' => ['class' => 'size'],
                                    'options' => ['class' => 'col-md-12'],
                                ]);?>
                                
                                <div class="col-md-12">
                                    <?= Html::activeRadioList($model, 'supervisor_present', ['1' => 'Yes', '0' => 'No'],
                                        [
                                            'item' => function($index, $label, $name, $checked, $value) {
                                                $options = [
                                                    'checked' => (boolean) $checked,
                                                ];
                                                $label = Yii::t('modules/forms/app', $label);
                                                $radio= Html::label(Html::input('radio', $name, $value, $options) . ' ' . $label, null);

                                                $html = Html::tag('div', $radio, ['class' => 'input-group']);

                                                $html = Html::tag('div', $html, ['class' => 'width_80']);

                                                return $html;
                                            }
                                        ]
                                    ) ?>
                                </div><!-- / col-md-12 -->
                            </div><!-- / col-md-4 width_160 -->
                        </div><!-- / col-md-12 -->
                        
                        <div class="col-md-12 cmn_content_box1a column_gap_2 col_0">
                            <fieldset><?= Yii::t('modules/forms/app', 'Supervised cardiologist')?></fieldset>
                                
                            <div class="col-md-12 <?php if (!$isView) {
                                    echo 'gap_t30';
                                } else {
                                    echo 'sec_gap40';
                                }
                                ?>">
                                <?php if (!$isView): ?>
                                <ul class="list_1">
                                    <?= CustomHtml::activeCheckboxList($model, 'supervised_cardiologist',
                                        $model::$scValuesThirdRow,
                                        [
                                            'item' => function($index, $label, $name, $checked, $value) {
                                                $inputId = $name . '-' . strtolower($value);
                                                $options = [
                                                    'checked' => (boolean) $checked,
                                                    'id' => $inputId,
                                                ];
                                                $label = Yii::t('modules/forms/app', $label);
                                                $radio = Html::label($label, $inputId, ['class' => 'label_gap_1']);
                                                $radio .= Html::input('checkbox', $name, $value, $options);

                                                $html = Html::tag('div', $radio, ['class' => 'input-group']);

                                                $html = Html::tag('li', $html);

                                                return $html;
                                            },
                                        ]
                                    ) ?>
                                </ul>
                                <ul class="list_1">
                                    <?= CustomHtml::activeCheckboxList($model, 'supervised_cardiologist',
                                        $model::$scValuesFourthRow,
                                        [
                                            'item' => function($index, $label, $name, $checked, $value) {
                                                $inputId = $name . '-' . strtolower($value);
                                                $options = [
                                                    'checked' => (boolean) $checked,
                                                    'id' => $inputId,
                                                ];
                                                $label = Yii::t('modules/forms/app', $label);
                                                $radio = Html::label($label, $inputId, ['class' => 'label_gap_1']);
                                                $radio .= Html::input('checkbox', $name, $value, $options);

                                                $html = Html::tag('div', $radio, ['class' => 'input-group']);

                                                $html = Html::tag('li', $html);

                                                return $html;
                                            },
                                            'unselect' => false,
                                        ]
                                    ) ?>
                                </ul>
                                <?= Html::error($model, 'supervised_cardiologist');?>
                                <?php else: ?>
                                <?= $model->attributeLabels()['supervised_cardiologist'] . ': ' . mb_strtoupper(implode(', ', (array) $model->supervised_cardiologist)) ?>
                                <?php endif ?>
                            </div><!-- / col-md-12 -->
                        </div><!-- / col-md-12 -->
                    </div><!-- / col-md-8 width_500 -->
                </div><!-- / col-md-12 -->
            </div><!-- / col-md-12 -->
            </div><!-- / AutoWrapper -->
        </div>
    </div>

<?php ActiveForm::end(); ?>
