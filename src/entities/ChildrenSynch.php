<?php
/**
 * @link https://github.com/black-lamp/blcms-sub-shop
 * @copyright Copyright (c) 2017 Vladimir Kuprienko
 * @license BSD 3-Clause License
 */

namespace bl\cms\subshop\entities;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "sub_shop_children_synch".
 *
 * @property integer $id
 * @property integer $logId
 * @property integer $childId
 * @property integer $success
 * @property integer $attemptedAt
 *
 * @property Children $child
 * @property Log $log
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class ChildrenSynch extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'attemptedAt',
                'updatedAtAttribute' => 'attemptedAt'
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sub_shop_children_synch}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['attemptedAt'], 'safe'],
            [['logId', 'childId'], 'required'],
            [['logId', 'childId'], 'integer'],
            [['success'], 'boolean'],
            [['success'], 'default', 'value' => false],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'          => Yii::t('subshop.entity', 'ID'),
            'logId'       => Yii::t('subshop.entity', 'Log ID'),
            'childId'     => Yii::t('subshop.entity', 'Child ID'),
            'success'     => Yii::t('subshop.entity', 'Success'),
            'attemptedAt' => Yii::t('subshop.entity', 'Attempted at'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChild()
    {
        return $this->hasOne(Children::class, ['id' => 'childId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLog()
    {
        return $this->hasOne(Log::class, ['id' => 'logId']);
    }
}
