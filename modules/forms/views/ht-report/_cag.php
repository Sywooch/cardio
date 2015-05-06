<?php
use app\modules\forms\widgets\cag\CAG;

/**
 * @var app\modules\forms\models\HtReport $model
 * @var yii\widgets\ActiveForm $form
 */
?>
<div class="box full-width cag">
    <fieldset>CAG</fieldset>
    <div class="col-md-12 col_0 cmn_content_box1b">
        <?php
        echo CAG::widget([
            'form' => $form,
            'model' => $model,
            'attributes' => ['cag_lm' => 'full', 'cag_rcxp' => 'full', 'cag_rca' => 'full', 'cag_graft1' => 'full'],
        ]);
        ?>

        <?php
        echo CAG::widget([
            'form' => $form,
            'model' => $model,
            'attributes' => ['cag_rdap' => 'full', 'cag_al' => 'full', 'cag_ma' => 'full', 'cag_graft1_details' => 'onlyInput'],
        ]);
        ?>

        <?php
        echo CAG::widget([
            'form' => $form,
            'model' => $model,
            'attributes' => ['cag_d1' => 'full', 'cag_rcxm' => 'full', 'cag_rdp' => 'full', 'cag_graft2' => 'full'],
        ]);
        ?>

        <?php
        echo CAG::widget([
            'form' => $form,
            'model' => $model,
            'attributes' => ['cag_rdam' => 'full', 'cag_mo' => 'full', 'cag_plr1' => 'full', 'cag_graft2_details' => 'onlyInput'],
        ]);
        ?>

        <?php
        echo CAG::widget([
            'form' => $form,
            'model' => $model,
            'attributes' => ['cag_d2' => 'full', 'cag_rcxd' => 'full', 'cag_plr2' => 'full', 'cag_lima' => 'full'],
        ]);
        ?>

        <?php
        echo CAG::widget([
            'form' => $form,
            'model' => $model,
            'attributes' => ['cag_s1' => 'full', 'cag_plx1' => 'full', 'cag_plr3' => 'full', 'cag_lima_details' => 'onlyInput'],
        ]);
        ?>

        <?php
        echo CAG::widget([
            'form' => $form,
            'model' => $model,
            'attributes' => ['', 'cag_plx2' => 'full', '', 'cag_rima' => 'full'],
        ]);
        ?>

        <?php
        echo CAG::widget([
            'form' => $form,
            'model' => $model,
            'attributes' => ['', 'cag_plx3' => 'full', '', 'cag_rima_details' => 'onlyInput'],
        ]);
        ?>
    </div><!-- / col-md-12 -->
</div>
