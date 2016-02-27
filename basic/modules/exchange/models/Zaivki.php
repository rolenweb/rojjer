<?php

namespace app\modules\exchange\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "zaivki".
 *
 * @property integer $id
 * @property integer $id_order
 * @property integer $id_user
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $status
 * @property integer $price
 * @property string $comment
 * @property string $avatar
 * @property string $username
 */
class Zaivki extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zaivki';
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
            [['price'], 'required'],
            [['id_order', 'id_user', 'created_at', 'updated_at', 'status', 'price'], 'integer'],
            [['comment'], 'string', 'max' => 1000],
            [['avatar'], 'string', 'max' => 100],
            [['username'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_order' => 'Id Order',
            'id_user' => 'Id User',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
            'price' => 'Price',
            'comment' => 'Comment',
        ];
    }
}
