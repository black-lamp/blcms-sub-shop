<?php
/**
 * @link https://github.com/black-lamp/blcms-sub-shop
 * @copyright Copyright (c) 2017 Vladimir Kuprienko
 * @license BSD 3-Clause License
 */

namespace tests\unit\events;

use tests\unit\TestCase;

/**
 * Test case for [[LoggerBootstrap]]
 *
 * @property \UnitTester $tester
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class LoggerBootstrapTest extends TestCase
{
    /**
     * @var EventTrigger
     */
    private $trigger;
    /**
     * @var string
     */
    private $tableName = 'sub_shop_log';

    protected function _before()
    {
        $this->trigger = new EventTrigger();
    }

    public function testEventCreate()
    {
        $this->trigger->triggerCreate();

        $this->tester->seeInDatabase($this->tableName, [
            'entityName' => 'Create event test',
            'entityId' => 1
        ]);
    }

    public function testEventEdit()
    {
        $this->trigger->triggerEdit();

        $this->tester->seeInDatabase($this->tableName, [
            'entityName' => 'Edit event test',
            'entityId' => 2
        ]);
    }

    public function testEventRemove()
    {
        $this->trigger->triggerRemove();

        $this->tester->seeInDatabase($this->tableName, [
            'entityName' => 'Remove event test',
            'entityId' => 3
        ]);
    }
}