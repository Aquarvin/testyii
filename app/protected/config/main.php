<?php

return [
    'name' => 'My Yii Application',
    'defaultController' => 'site',

    'components' => [
        'db' => [
            'connectionString' => sprintf(
                'mysql:host=%s;port=%s;dbname=%s',
                getenv('DB_HOST') ?: 'db',
                getenv('DB_PORT') ?: '3306',
                getenv('DB_NAME') ?: 'yii_db'
            ),
            'username'         => getenv('DB_USER') ?: 'yii_user',
            'password'         => getenv('DB_PASSWORD') ?: 'yii_password',
            'charset'          => 'utf8mb4',
            'enableProfiling'  => YII_DEBUG,
            'enableParamLogging' => YII_DEBUG,
        ],

        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'log' => [
            'class'  => 'CLogRouter',
            'routes' => [
                [
                    'class'  => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ],
            ],
        ],

        'urlManager' => [
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => [
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ],
        ],
    ],
];
