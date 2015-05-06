<?php
use app\modules\forms\widgets\cag\CAG;

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;

/**
 * @var yii\web\View $this
 * @var app\modules\forms\models\PciReport $model
 * @var app\modules\admin\models\Patient $patient
 * @var yii\widgets\ActiveForm $form
 * @var boolean $isView
 */

?>
    <section class="full_container_section">
        <section class="sec_gap40 main-subform">
            <?= $this->render('_main-subform', [
                'model' => $model,
                'patient' => $patient,
                'isView' => $isView,
                ])?>
        </section><!-- / section -->


    <?php foreach ($model->getArteries()->all() as $artery) : ?>
        <?= $this->render('@forms/views/pci-report-artery/update', ['model' => $artery]);?>
    <?php endforeach; ?>
    </section>

    <section class="sec_gap10">
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
