<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\Users $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            cardionl
        </div>

        <div class="panel-body">
            <div class="box-half update-box-half">
                <div><?= $form->field($model, 'naam')->textInput(['maxlength' => 32]) ?></div>
                <div><?= $form->field($model, 'rights')->dropDownList([
                        '' => '',
                        'Cardioloog' => 'Cardioloog',
                        'Algemeen' => 'Algemeen',
                        'Cardio' => 'Cardio',
                        'Pulmo' => 'Pulmo',
                        'Nudeaire' => 'Nudeaire',
                        'Zorgmanager' => 'Zorgmanager',
                        'Radiodiagnostiek' => 'Radiodiagnostiek',
                        'Laboratorium' => 'Laboratorium',
                        'Medische Fysica' => 'Medische Fysica',
                        'Interne' => 'Interne',
                        'CTC' => 'CTC',
                        'Nightcare' => 'Nightcare',
                        'Administrator' => 'Administrator',
                        'AgnioCardio' => 'AgnioCardio',
                        'AgioCardio' => 'AgioCardio',
                        'AssInterne' => 'AssInterne',
                        'Hartteam' => 'Hartteam',
                        'Demo' => 'Demo',
                        'Intervisit' => 'Intervisit',
                        'Anesthesis' => 'Anesthesis',
                        'PPO' => 'PPO',
                        'AssCardion' => 'AssCardion',
                        'Longarts' => 'Longarts',
                        'Poortarts' => 'Poortarts'
                    ]) ?></div>
                <div><?= $form->field($model, 'doc_id')->textInput(['maxlength' => 45]) ?></div>
                <div><?= $form->field($model, 'function')->textInput(['maxlength' => 45]) ?></div>
                <div><?= $form->field($model, 'disabled')->dropDownList([
                    0 => 'Non-Disabled',
                    1 => 'Disabled'
                ]) ?></div>
            </div>
            <div class="box-half update-box-half">
                <div><?= $form->field($model, 'password')->textInput(['maxlength' => 40]) ?></div>
                <div><?= $form->field($model, 'datum_stop')->textInput(['maxlength' => 40])
//                    widget(DatePicker::classname(), [
//                   'pluginOptions' => [
//                      'autoclose' => true,
//                        'format' => 'yyyy-mm-dd',
//                   ]
//               ])
//                   ;?></div>
                <div><?= $form->field($model, 'doc_naam')->textInput(['maxlength' => 11]) ?></div>
                <div><?= $form->field($model, 'department')->textInput(['maxlength' => 45]) ?></div>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            user
        </div>

        <div class="panel-body">
            <div class="box-half update-box-half">
                <div><?= $form->field($model, 'title')->textInput(['maxlength' => 15]) ?></div>
                <div><?= $form->field($model, 'initials')->textInput(['maxlength' => 45]) ?></div>
                <div><?= $form->field($model, 'first_name')->textInput(['maxlength' => 45]) ?></div>
                <div><?= $form->field($model, 'surname')->textInput(['maxlength' => 45]) ?></div>
                <div><?= $form->field($model, 'maiden_name')->textInput(['maxlength' => 45]) ?></div>
                <div><?= $form->field($model, 'insertion')->textInput(['maxlength' => 45]) ?></div>
                <div><?= $form->field($model, 'locatie')->textInput(['maxlength' => 50]) ?></div>
                <div><?= $form->field($model, 'telefoon')->textInput(['maxlength' => 15]) ?></div>
            </div>
            <div class="box-half update-box-half">
                <div><?= $form->field($model, 'omschrijving')->dropDownList([
                        '' => '',
                        'Algemeen' => 'Algemeen',
                        'Secretariaat cardiologie' => 'Secretariaat cardiologie',
                        'Typekamer cardiologie' => 'Typekamer cardiologie',
                        'Typekamer Longziekten' => 'Typekamer Longziekten',
                        'Assistent Longziekten' => 'Assistent Longziekten',
                        'Mederprogrammeur' => 'Mederprogrammeur',
                        'Zorgmanager' => 'Zorgmanager',
                        'IC Brussum Fysica' => 'IC Brussum Fysica',
                        'Poli Kerkrade' => 'Poli Kerkrade',
                        'Cardiochirurgie Maastricht' => 'Cardiochirurgie Maastricht',
                        'NightCare' => 'NightCare',
                        'Secretariaat CTC' => 'Secretariaat CTC',
                        'Administrator' => 'Administrator',
                        'Medisch Lid RvB' => 'Medisch Lid RvB',
                        'Assistent Cardiologie' => 'Assistent Cardiologie',
                        'Longarts' => 'Longarts',
                        'Cardioloog' => 'Cardioloog',
                        'Cvdberg als longarts' => 'Cvdberg als longarts',
                        'Secretariaat Hartteam' => 'Secretariaat Hartteam',
                        'Agnio' => 'Agnio',
                        'Poortarts' => 'Poortarts',
                        'Agiocardio' => 'Agiocardio',
                        'Agniocardio' => 'Agniocardio',
                        'Agio' => 'Agio',
                        'AgioInterne' => 'AgioInterne',
                        'Agioagiocardio' => 'Agioagiocardio',
                        'AioCardio' => 'AioCardio'
                    ]) ?></div>
                <div><?= $form->field($model, 'abbreviation')->textInput(['maxlength' => 45]) ?></div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
