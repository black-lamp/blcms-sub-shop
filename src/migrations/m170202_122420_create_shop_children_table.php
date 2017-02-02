<?php
/**
 * @link https://github.com/black-lamp/blcms-sub-shop
 * @copyright Copyright (c) 2017 Vladimir Kuprienko
 * @license BSD 3-Clause License
 */

use yii\db\Migration;

/**
 * Handles the creation of table `sub_shop_children`.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class m170202_122420_create_shop_children_table extends Migration
{
    const DOMAIN_NAME_FIELD_MAX_LENGTH = 255;


    /**
     * @var string Table name
     */
    public $tableName = '{{%sub_shop_children}}';


    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable($this->tableName, [
            'id'         => $this->primaryKey(),
            'companyId'  => $this->integer()->notNull(),
            'domainName' => $this->string(self::DOMAIN_NAME_FIELD_MAX_LENGTH)->notNull(),
            'createdAt'  => $this->integer()->notNull()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable($this->tableName);
    }
}
