<?php
/**
 * application configurations shared by all test types
 */
return [
    'components' => [
        'mail' => [
            'useFileTransport' => true,
        ],
        'urlManager' => [
            'showScriptName' => false,
        ],
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
    ],
];
