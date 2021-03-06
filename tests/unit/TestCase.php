<?php
/**
 * @link https://github.com/black-lamp/blcms-sub-shop
 * @copyright Copyright (c) 2017 Vladimir Kuprienko
 * @license BSD 3-Clause License
 */

namespace tests\unit;

use yii\test\FixtureTrait;

/**
 * Base test case for unit tests
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class TestCase extends \Codeception\Test\Unit
{
    use FixtureTrait;


    /**
     * @var \UnitTester
     */
    protected $tester;
}