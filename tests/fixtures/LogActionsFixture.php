<?php
/**
 * @link https://github.com/black-lamp/blcms-sub-shop
 * @copyright Copyright (c) 2017 Vladimir Kuprienko
 * @license BSD 3-Clause License
 */

namespace tests\fixtures;

use yii\test\ActiveFixture;

use bl\cms\subshop\entities\LogActions;

/**
 * Fixture for [[LogActions]] model
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class LogActionsFixture extends ActiveFixture
{
    /**
     * @inheritdoc
     */
    public $modelClass = LogActions::class;
    /**
     * @inheritdoc
     */
    public $dataFile = '@data/LogActions.php';
}