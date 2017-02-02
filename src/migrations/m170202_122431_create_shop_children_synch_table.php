<?php
/**
 * @link https://github.com/black-lamp/blcms-sub-shop
 * @copyright Copyright (c) 2017 Vladimir Kuprienko
 * @license BSD 3-Clause License
 */

use yii\db\Migration;

/**
 * Handles the creation of table `sub_shop_children_synch`.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class m170202_122431_create_shop_children_synch_table extends Migration
{
    /**
     * @var string Table name
     */
    public $tableName = '{{%sub_shop_children_synch}}';


    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable($this->tableName, [
            'id'          => $this->primaryKey(),
            'logId'       => $this->integer()->notNull(),
            'childId'     => $this->integer()->notNull(),
            'success'     => $this->boolean()->notNull()->defaultValue(false),
            'attemptedAt' => $this->integer()->notNull()
        ]);

        $this->addForeignKey(
            'sub_shop_children_synch-sub_shop_log-FK',
            $this->tableName, 'logId',
            '{{%sub_shop_log}}', 'id'
        );
        $this->addForeignKey(
            'sub_shop_children_synch-sub_shop_children-FK',
            $this->tableName, 'childId',
            '{{%sub_shop_children}}', 'id'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('sub_shop_children_synch-sub_shop_log-FK', $this->tableName);
        $this->dropForeignKey('sub_shop_children_synch-sub_shop_children-FK', $this->tableName);

        $this->dropTable($this->tableName);
    }
}
