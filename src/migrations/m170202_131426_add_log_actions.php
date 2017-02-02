<?php
/**
 * @link https://github.com/black-lamp/blcms-sub-shop
 * @copyright Copyright (c) 2017 Vladimir Kuprienko
 * @license BSD 3-Clause License
 */

use yii\db\Migration;

/**
 * Add log actions to `sub_shop_log_actions` table
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class m170202_131426_add_log_actions extends Migration
{
    /**
     * @var string Table name
     */
    public $tableName = 'sub_shop_log_actions';


    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->batchInsert($this->tableName, ['id', 'title'], [
            [ 1, 'Create' ],
            [ 2, 'Edit' ],
            [ 3, 'Remove' ]
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->delete($this->tableName, 'id = 1');
        $this->delete($this->tableName, 'id = 2');
        $this->delete($this->tableName, 'id = 3');
    }
}
