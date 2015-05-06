<?php

use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var app\modules\forms\models\Artery $model
 */

?>
<section class="sec_gap40">
<?php $form = ActiveForm::begin(['id' => 'artery-form-' . rand(), 'action' => $action]); ?>
    <div class="container">
        <div class="row">
            <div class="AutoWrapper">
                <div class="col-md-12 cmn_content_box1">

                <div class="col-md-12 gap_t20 col_0 float-child clearfix">
                    <!-- Artery -->
                    <div class="width-150">
                        <?= $form->field($model, 'artery', [
                            'template' => "{input}"
                            ])
                            ->dropDownList(
                                array_merge(
                                        ['0' => 'Artery'],
                                        $model::$arteries
                                ),
                                ['class' => 'active-select form-control']
                            );?>
                    </div>
                    <!-- / Artery -->

                    <!-- is_ffr -->
                    <div class="width-50 edge-space-10 no-label-padding">
                        <?= $form->field($model, 'is_ffr', [
                            'template' => '{input} {label}'
                            ])
                            ->checkbox();
                        ?>
                    </div>
                    <!-- / is_ffr -->

                    <!-- ffr1 -->
                    <div class="width-75 edge-space-5">
                        <?= $form->field($model, 'ffr1', [
                            'template' => '{input}'
                            ]);
                        ?>
                    </div>
                    <!-- / ffr1 -->

                    <!-- ffr2 -->
                    <div class="width-75 edge-space-5">
                        <?= $form->field($model, 'ffr2', [
                            'template' => '{input}'
                            ]);
                        ?>
                    </div>
                    <!-- / ffr2 -->

                    <!-- ffr3 -->
                    <div class="width-75 edge-space-5">
                        <?= $form->field($model, 'ffr3', [
                            'template' => '{input}'
                            ]);
                        ?>
                    </div>
                    <!-- / ffr3 -->

                    <!-- is_adenosine -->
                    <div class="width-90 edge-space-10 no-label-padding">
                        <?= $form->field($model, 'is_adenosine', [
                            'template' => '{input} {label}'
                            ])
                            ->checkbox();
                        ?>
                    </div>
                    <!-- / is_adenosine -->

                    <!-- ic_iv -->
                    <div class="width-90 edge-space-10 no-label-padding">
                        <?= $form->field($model, 'ic_iv', [
                            'template' => '{input}'
                            ])
                            ->radioList([
                                'ic' => 'I.C',
                                'iv' => 'I.V',
                            ]);
                        ?>
                    </div>
                    <!-- / ic_iv -->
                </div>

                <div class="col-md-12 col_0">
                    <?=
                        $form->field($model, 'small_description', [
                            'template' => '{input}',
                        ])->textarea();
                    ?>
                </div>

                </div>
            </div>
        </div>
    </div>
<?php ActiveForm::end(); ?>
</section>
