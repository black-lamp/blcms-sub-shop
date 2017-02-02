<?php
return [
    'db' => require(__DIR__ . '/db.php'),
    'i18n' => [
        'translations' => [
            '*' => [
                'class' => \yii\i18n\PhpMessageSource::class
            ]
        ]
    ],

    'shopLog' => [
        'class' => \bl\cms\subshop\components\Logger::class
    ]
];