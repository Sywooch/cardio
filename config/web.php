<?php

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');
$modules = require(__DIR__ . '/modules.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'language' => 'nl',
    'bootstrap' => ['log', 'moduleRegistration'],
    'extensions' => require(__DIR__ . '/../vendor/yiisoft/extensions.php'),
    'modules' => $modules,
    'components' => [
        'request' => [
            'enableCookieValidation' => true,
            'enableCsrfValidation' => true,
            'cookieValidationKey' => '123654',
        ],

        'patientScraper' => [
            'class' => 'app\components\PatientScraper',
            'urlTemplate' => 'http://172.16.31.20/mv%20patient%20info/patientcoordinates.asp?patientcode={patientId}&languagefid=2',
        ],
        'physicianScraper' => [
            'class' => 'app\components\PhysicianScraper',
            'urlTemplate' => 'http://172.16.31.20/mv%20patient%20info/seh/consult%20seh.asp?patient_code={patientId}',
        ],
        'urlManager' => [
            'showScriptName' => false,
            'enablePrettyUrl' => true,
            'rules' => [
                'api/patient/by-pid/<pid>' => 'api/patient/by-pid',
            ],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\UserIdentity',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mail' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'moduleRegistration' => [
            'class' => 'app\components\ModuleRegistration',
        ],
        'db' => $db,
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
