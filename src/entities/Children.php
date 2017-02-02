<?php
namespace bl\cms\subshop\entities;

use Yii;

/**
 * This is the model class for table "sub_shop_children".
 *
 * @property integer $id
 * @property integer $companyId
 * @property string $domainName
 * @property integer $createdAt
 *
 * @property ChildrenSynch[] $synchInfo
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class Children extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sub_shop_children}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['companyId', 'domainName', 'createdAt'], 'required'],
            [['companyId', 'createdAt'], 'integer'],
            [['domainName'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'         => Yii::t('subshop.entity', 'ID'),
            'companyId'  => Yii::t('subshop.entity', 'Company ID'),
            'domainName' => Yii::t('subshop.entity', 'Domain name'),
            'createdAt'  => Yii::t('subshop.entity', 'Created at'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSynchInfo()
    {
        return $this->hasMany(ChildrenSynch::class, ['childId' => 'id']);
    }
}
