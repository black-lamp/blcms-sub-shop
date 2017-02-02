<?php
use yii\db\Migration;

/**
 * Handles the creation of table `sub_shop_log`.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class m170202_122405_create_shop_log_table extends Migration
{
    const ENTITY_NAME_FIELD_MAX_LENGTH = 255;


    /**
     * @var string Table name
     */
    public $tableName = '{{%sub_shop_log}}';


    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable($this->tableName, [
            'id'         => $this->primaryKey(),
            'actionId'   => $this->integer()->notNull(),
            'entityName' => $this->string(self::ENTITY_NAME_FIELD_MAX_LENGTH)->notNull(),
            'entityId'   => $this->integer()->notNull(),
            'producedAt' => $this->integer()->notNull()
        ]);

        $this->addForeignKey(
            'sub_shop_log-sub_shop_log_actions-FK',
            $this->tableName, 'actionId',
            '{{%sub_shop_log_actions}}', 'id'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('sub_shop_log-sub_shop_log_actions-FK', $this->tableName);

        $this->dropTable($this->tableName);
    }
}
