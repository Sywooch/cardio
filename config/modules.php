<?php
return [
    'admin' => [
        'class' => 'app\modules\admin\AdminModule',
        'aliases' => [
            'admin' => '@app/modules/admin',
        ],
    ],
    'forms' => [
        'class' => 'app\modules\forms\FormsModule',
        'aliases' => [
            'forms' => '@app/modules/forms',
        ],
        'basePath' => '@forms',
        'layout' => 'main',
    ],
    'api' => [
        'class' => 'app\modules\api\ApiModule',
        'aliases' => [
            'api' => '@app/modules/api',
        ],
        'basePath' => '@api',
    ]
];
