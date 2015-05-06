<?php
$action = ['/forms/pci-report-artery/update', 'id' => $model->id];

echo $this->render('_form', [
    'action' => $action,
    'model' => $model,
]);
