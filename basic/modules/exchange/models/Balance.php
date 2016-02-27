<?php

namespace app\modules\exchange\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "balance".
 *
 * @property integer $id
 * @property integer $id_user
 * @property integer $created_at
 * @property integer $updated_at
 * @property double $balance
 * @property double $hold
 */
class Balance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'balance';
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
            [['balance', 'hold'], 'number'],
            [['id_user', 'created_at', 'updated_at'], 'integer']
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
            'balance' => 'Balance',
        ];
    }
}
