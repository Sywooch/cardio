<?php

use yii\helpers\Html;
?>
<?= $form->field($model, $attribute, [
    'template' => "<span>{input}</span>\n{hint}\n{error}",
]); ?>
