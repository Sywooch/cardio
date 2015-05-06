<?php

Yii::setAlias('@tests', dirname(__DIR__) . '/tests');

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');
$modules = require(__DIR__ . '/modules.php');

return [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'app\commands',
    'extensions' => require(__DIR__ . '/../vendor/yiisoft/extensions.php'),
    'components' => [
        'i18n' => [
            'translations' => [
                'xecg' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'fileMap' => [
                        'xecg' => 'xecg.php',
                    ],
                ],
            ],
        ],

        'curl' => [
            'class' => 'app\components\Curl',
            'userAgent' => "Mozilla/5.0 (Windows; U; Windows NT 5.2; en-US; rv:1.9.2.12) Gecko/20101026 Firefox/3.6.12 GTB7.1",
            'connectTimeout' => 20,
            'cookieFile' => "@app/tmp/cookieant.txt",
        ],
        'centricyEcho' => [
            'class' => 'app\components\CentricyEcho',
            'BASEURL' => "http://10.1.6.50/",
            'USERAGENT' => "Mozilla/5.0 (Windows; U; Windows NT 5.2; en-US; rv:1.9.2.12) Gecko/20101026 Firefox/3.6.12 GTB7.1",
            'HTTPAUTH' => CURLAUTH_NTLM,
            'USERPWD' => "echoweb:echo",
        ],
        'pidReader' => [
            'class' => 'app\components\PidReader',
            'dir' => 'D:\\',
        ],
        'sehFileCollector' => [
            'class' => 'app\components\SehFileCollector',
            'remotePath' =>  '\\\\172.16.31.20\MVDynaDoc$\\41',
            'remoteDirectorySeparator' => "\\",  // separator used for remote folder
            'temporaryPath' => '@app/tmp/tmp',
            'storePath' => '@app/tmp/store',
            'localDirectorySeparator' => '/', // separator used for temporary and store pathes
        ],
        'patientScraper' => [
            'class' => 'app\components\PatientScraper',
            'urlTemplate' => 'http://172.16.31.20/mv%20patient%20info/patientcoordinates.asp?patientcode={patientId}&languagefid=2',
        ],
        'physicianScraper' => [
            'class' => 'app\components\PhysicianScraper',
            'urlTemplate' => 'http://172.16.31.20/mv%20patient%20info/seh/consult%20seh.asp?patient_code={patientId}',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'logFile' => '@app/runtime/logs/emergency-collector.log',
                    'categories' => ['collector'],
                    'levels' => ['info'],
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'logFile' => '@app/runtime/logs/medview.log',
                    'categories' => ['curl', 'medview'],
                    'levels' => ['info', 'error'],
                ],
            ],
        ],
        'db' => $db,
    ],
    'params' => $params,
];
