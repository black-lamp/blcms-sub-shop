<?php
use yii\db\Migration;

/**
 * Handles the creation of table `sub_shop_log_actions`.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class m170202_122332_create_shop_log_actions_table extends Migration
{
    const TITLE_FIELD_MAX_LENGTH = 255;


    /**
     * @var string Table name
     */
    public $tableName = '{{%sub_shop_log_actions}}';


    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable($this->tableName , [
            'id'    => $this->primaryKey(),
            'title' => $this->string(self::TITLE_FIELD_MAX_LENGTH)->notNull()
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
