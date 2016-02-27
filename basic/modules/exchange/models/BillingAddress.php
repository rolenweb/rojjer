<?php

namespace app\modules\exchange\models;

use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "billing_address".
 *
 * @property integer $id
 * @property integer $id_profile
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $title
 */
class BillingAddress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'billing_address';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['id_profile', 'created_at', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_profile' => 'Id Profile',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'title' => 'Title',
        ];
    }
}
