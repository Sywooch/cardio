<?php

use yii\helpers\Html;
?>
<?= $form->field($model, $attribute, [
    'template' => "<span>{label}</span>\n<span>{input}</span>\n{percent}\n{hint}\n{error}",
    'labelOptions' => ['class' => 'label_gap_1a'],
    'options' => ['class' => 'input-group input_group_2'],
    'parts' => [
        '{percent}' => Html::tag(
            'span',
            Html::label('%', null, ['class' => 'label_gap_1a']),
            ['class' => 'ig2_p1']
        ),
    ],
]); ?>
