<?php
return [
    'id' => 'test-app',
    'class' => 'yii\console\Application',

    'basePath' => Yii::getAlias('@tests'),
    'vendorPath' => Yii::getAlias('@vendor'),
    'runtimePath' => Yii::getAlias('@tests/_output'),

    'bootstrap' => [
        [
            'class' => \bl\cms\subshop\components\LoggerBootstrap::class,
            'logger' => 'shopLog'
        ]
    ],
    'components' => require(__DIR__ . '/components.php'),
    'params' => require(__DIR__ . '/params.php'),
];