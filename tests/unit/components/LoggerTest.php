<?php
namespace tests\unit\components;

use Yii;

use tests\fixtures\LogActionsFixture;
use tests\unit\DbTestCase;

use bl\cms\subshop\entities\LogActions;
use bl\cms\subshop\components\Logger;

/**
 * Test case for [[Logger]] component
 *
 * @property \UnitTester $tester
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class LoggerTest extends DbTestCase
{
    /**
     * @var Logger
     */
    private $log;
    /**
     * @var string
     */
    private $tableName = 'sub_shop_log';


    public function fixtures()
    {
        return [
            'logActions' => [
                'class' => LogActionsFixture::class
            ]
        ];
    }

    public function _before()
    {
        $this->log = Yii::$app->get('shopLog');
    }

    public function testCreate()
    {
        $params = [
            'entityName' => 'test create',
            'entityId' => 1,
            'actionId' => LogActions::ACTION_CREATE
        ];

        $this->log->create($params['entityName'], $params['entityId']);

        $this->tester->seeInDatabase($this->tableName, $params);
    }

    public function testEdit()
    {
        $params = [
            'entityName' => 'Test edit',
            'entityId' => 7,
            'actionId' => LogActions::ACTION_EDIT
        ];

        $this->log->edit($params['entityName'], $params['entityId']);

        $this->tester->seeInDatabase($this->tableName, $params);
    }

    public function testRemove()
    {
        $params = [
            'entityName' => 'Test remove',
            'entityId' => 8,
            'actionId' => LogActions::ACTION_REMOVE
        ];

        $this->log->remove($params['entityName'], $params['entityId']);

        $this->tester->seeInDatabase($this->tableName, $params);
    }
}