<?php

namespace app\modules\admin\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "orderready".
 *
 * @property integer $id
 * @property integer $id_order
 * @property integer $id_user
 * @property integer $id_translater
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $text
 * @property string $filename
 * @property integer $status
 * @property string $comment
 */
class Orderready extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orderready';
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
            
            [['id_order', 'id_user', 'id_translater', 'created_at', 'updated_at', 'status'], 'integer'],
            [['text'], 'string'],
            [['filename'], 'string', 'max' => 100],
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
            'id_order' => 'Id Order',
            'id_user' => 'Id User',
            'id_translater' => 'Id Translater',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'text' => 'Text',
            'filename' => 'Filename',
            'status' => 'Status',
            'comment' => 'Comment',
        ];
    }
}
