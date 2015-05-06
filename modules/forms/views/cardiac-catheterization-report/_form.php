<?php

use app\components\helpers\CustomHtml;
use app\modules\forms\widgets\cag\CAG;

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;

/**
 * @var yii\web\View $this
 * @var app\modules\forms\models\CardiacCatheterizationReport $model
 * @var yii\widgets\ActiveForm $form
 */
?>
    <section class="full_container_section">
        <?php $form = ActiveForm::begin(['id' => 'catheterization-form']); ?>
        <section class="sec_gap40">
            <div class="container">
                <div class="row">
                    <div class="AutoWrapper">
                        <div class="col-md-12 cmn_content_box1">
                        <fieldset>Hartcatheterisatie direct verslag</fieldset>
                        
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
                                            <?= Html::activeRadioList($model, 'supervised_cardiologist',
                                                [
                                                    'BE' => 'BE',
                                                    'BO' => 'BO',
                                                    'CDC' => 'CDC',
                                                    'ERD' => 'ERD',
                                                    'ERN' => 'ERN',
                                                    'HO' => 'HO',
                                                    'IL' => 'IL',
                                                    'RA' => 'RA',
                                                    'RE' => 'RE',
                                                    'VE' => 'VE',
                                                    'WE' => 'WE',
                                                ],
                                                [
                                                    'item' => function($index, $label, $name, $checked, $value) {
                                                        $inputId = $name . '-' . strtolower($value);
                                                        $options = [
                                                            'checked' => (boolean) $checked,
                                                            'id' => $inputId,
                                                        ];
                                                        $label = Yii::t('modules/forms/app', $label);
                                                        $radio = Html::label($label, $inputId, ['class' => 'label_gap_1']);
                                                        $radio .= Html::input('radio', $name, $value, $options);

                                                        $html = Html::tag('div', $radio, ['class' => 'input-group']);

                                                        $html = Html::tag('li', $html);

                                                        return $html;
                                                    }
                                                ]
                                            ) ?>
                                        </ul>
                                        <?= Html::error($model, 'supervised_cardiologist');?>
                                        <?php else: ?>
                                        <?= $model->attributeLabels()['supervised_cardiologist'] . ': ' . $model->supervised_cardiologist ?>
                                        <?php endif ?>
                                    </div><!-- / col-md-12 -->
                                </div><!-- / col-md-12 -->
                            </div><!-- / col-md-8 width_500 -->
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
                <fieldset><?= Yii::t('modules/forms/app', 'Complications')?></fieldset>
                
                <div class="col-md-12 gap_t20 col_0 cmn_content_box1b clearfix">
                    <div class="width_150">
                        <?= Html::label(Yii::t('modules/forms/app', 'Complication'))?>
                    </div><!-- / col-md-2 width_150 -->

                    <?= Html::activeRadioList($model, 'complication', ['1' => 'Yes', '0' => 'No'],
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
                
                <div class="col-md-12 gap_t20 col_0 cmn_content_box1b">
                    <div class="input-group input_group_1">
                        <?= $form->field($model, 'complication_details')->textarea(['rows' => 6]); ?>
                    </div><!-- / input-group -->
                </div><!-- / col-md-12 -->
            </div><!-- / col-md-12 -->
            </div><!-- / AutoWrapper -->
            </div>
            </div>
        </section><!-- / section -->

        <section class="sec_gap40">
            <div class="container"
                <div class="row">
                    <div class="AutoWrapper">
                        <div class="col-md-12 cmn_content_box1">
                        <fieldset>CAG</fieldset>

                        
                        <div class="col-md-12 gap_t40 col_0 cmn_content_box1b">
                            <?php
                            echo CAG::widget([
                                'form' => $form,
                                'model' => $model,
                                'attributes' => ['lm' => 'full', 'rcxp' => 'full', 'rca' => 'full', 'graft1' => 'full'],
                            ]);
                            ?>

                            <?php
                            echo CAG::widget([
                                'form' => $form,
                                'model' => $model,
                                'attributes' => ['rdap' => 'full', 'al' => 'full', 'ma' => 'full', 'graft1_details' => 'onlyInput'],
                            ]);
                            ?>

                            <?php
                            echo CAG::widget([
                                'form' => $form,
                                'model' => $model,
                                'attributes' => ['d1' => 'full', 'rcxm' => 'full', 'rdp' => 'full', 'graft2' => 'full'],
                            ]);
                            ?>

                            <?php
                            echo CAG::widget([
                                'form' => $form,
                                'model' => $model,
                                'attributes' => ['rdam' => 'full', 'mo' => 'full', 'plr1' => 'full', 'graft2_details' => 'onlyInput'],
                            ]);
                            ?>

                            <?php
                            echo CAG::widget([
                                'form' => $form,
                                'model' => $model,
                                'attributes' => ['d2' => 'full', 'rcxd' => 'full', 'plr2' => 'full', 'lima' => 'full'],
                            ]);
                            ?>

                            <?php
                            echo CAG::widget([
                                'form' => $form,
                                'model' => $model,
                                'attributes' => ['s1' => 'full', 'plx1' => 'full', 'plr3' => 'full', 'lima_details' => 'onlyInput'],
                            ]);
                            ?>

                            <?php
                            echo CAG::widget([
                                'form' => $form,
                                'model' => $model,
                                'attributes' => ['', 'plx2' => 'full', '', 'rima' => 'full'],
                            ]);
                            ?>

                            <?php
                            echo CAG::widget([
                                'form' => $form,
                                'model' => $model,
                                'attributes' => ['', 'plx3' => 'full', '', 'rima_details' => 'onlyInput'],
                            ]);
                            ?>
                            
                        </div><!-- / col-md-12 -->
                        
                        <div class="col-md-12 gap_t20 col_0 cmn_content_box1b">
                            <div class="input-group input_group_1">
                                <?= $form->field($model, 'cag_details')->textarea(['rows' => 6]); ?>
                            </div><!-- / input-group -->
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
                    <div class="col-md-12 cmn_content_box1 clearfix">
                    <fieldset><?= Yii::t('modules/forms/app', 'Proposal')?></fieldset>
                    
                    <div class="col-md-12 gap_t40 col_0">
                            <div class="input-group input_group_1">
                                <?= $form->field($model, 'proposal')->textarea(['rows' => 6]); ?>
                            </div><!-- / input-group -->
                        </div><!-- / input-group -->
                    </div><!-- / col-md-12 -->
                    </div><!-- / col-md-12 -->
                    </div><!-- / AutoWrapper -->
                </div>
            </div>
        </section><!-- / section -->

        <section class="sec_gap10">
            <div class="container">
                <div class="row">
                    <div class="AutoWrapper">
                        <div class="col-md-12 column_gap_1a col_0 print-buttons">
                            <?= Html::button(Yii::t('modules/forms/app', 'Print'), ['class' => 'btn btn-primary btn_custom_2 print-btn']) ?>
                            <?php if (!$isView): ?>
                            <?= Html::submitButton(Yii::t('modules/forms/app', 'Store'), ['class' => 'btn btn-primary btn_custom_2']) ?>
                            <?php endif; ?>
                        </div><!-- / col-md-12 -->
                    </div><!-- / AutoWrapper -->
                </div>
            </div>
        </section><!-- / section -->
    <?php ActiveForm::end(); ?>

    </section>

