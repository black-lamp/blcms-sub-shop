<?php
/**
 * @link https://github.com/black-lamp/blcms-sub-shop
 * @copyright Copyright (c) 2017 Vladimir Kuprienko
 * @license BSD 3-Clause License
 */

namespace bl\cms\subshop\entities;

use Yii;

/**
 * This is the model class for table "sub_shop_log".
 *
 * @property integer $id
 * @property integer $actionId
 * @property string $entityName
 * @property integer $entityId
 * @property integer $producedAt
 *
 * @property ChildrenSynch[] $childrensSynch
 * @property LogActions $action
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class Log extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sub_shop_log}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['actionId', 'entityName', 'entityId', 'producedAt'], 'required'],
            [['actionId', 'entityId', 'producedAt'], 'integer'],
            [['entityName'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'         => Yii::t('subshop.entity', 'ID'),
            'actionId'   => Yii::t('subshop.entity', 'Action ID'),
            'entityName' => Yii::t('subshop.entity', 'Entity name'),
            'entityId'   => Yii::t('subshop.entity', 'Entity ID'),
            'producedAt' => Yii::t('subshop.entity', 'Produced at'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildrensSynch()
    {
        return $this->hasMany(ChildrenSynch::class, ['logId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAction()
    {
        return $this->hasOne(LogActions::class, ['id' => 'actionId']);
    }
}
