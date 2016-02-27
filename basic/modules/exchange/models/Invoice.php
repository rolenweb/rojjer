<?php

namespace app\modules\exchange\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "invoice".
 *
 * @property integer $id
 * @property integer $id_user
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $status
 * @property double $amount
 * @property integer $paymentsyst
 * @property string $comment
 */
class Invoice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'invoice';
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
            [['amount'], 'required'],
            [['amount'], 'number'],
            [['id_user', 'created_at', 'updated_at', 'status', 'paymentsyst'], 'integer'],
            [['comment'], 'string', 'max' => 1000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
            'amount' => 'Amount',
            'paymentsyst' => 'Paymentsyst',
            'comment' => 'Comment',
        ];
    }
}
