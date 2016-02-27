<?php

namespace app\modules\exchange\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "alerts".
 *
 * @property integer $id
 * @property integer $id_user
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $status
 * @property integer $id_order
 * @property integer $type
 * @property string $comment
 */
class Alerts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'alerts';
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
            
            [['id_user', 'created_at', 'updated_at', 'status', 'id_order', 'type'], 'integer'],
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
            'id_order' => 'Id Order',
            'type' => 'Type',
            'comment' => 'Comment',
        ];
    }
}
