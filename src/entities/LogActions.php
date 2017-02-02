<?php
namespace bl\cms\subshop\entities;

use Yii;

/**
 * This is the model class for table "sub_shop_log_actions".
 *
 * @property integer $id
 * @property string $title
 *
 * @property Log[] $logs
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class LogActions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sub_shop_log_actions}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'    => Yii::t('subshop.entity', 'ID'),
            'title' => Yii::t('subshop.entity', 'Title'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLogs()
    {
        return $this->hasMany(Log::class, ['actionId' => 'id']);
    }
}
