<?php
$action = ['/forms/pci-report-artery/create'];

echo $this->render('_form', [
    'action' => $action,
    'model' => $model,
]);
