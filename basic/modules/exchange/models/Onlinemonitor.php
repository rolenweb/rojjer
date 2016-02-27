<?php

namespace app\modules\exchange\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\web\UploadedFile;

/**
 * This is the model class for table "onlinemonitor".
 *
 * @property integer $id
 * @property integer $id_order
 * @property integer $id_user
 * @property integer $id_translater
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $text
 * @property integer $done
 * @property integer $status
 * @property string $filename
 */
class Onlinemonitor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'onlinemonitor';
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

    public $file;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            
            [['id_order', 'id_user', 'id_translater', 'created_at', 'updated_at', 'done', 'status'], 'integer'],
            [['text'], 'string'],
            [['filename'], 'string', 'max' => 255],
            [['file'], 'file', 'extensions' => 'jpg, png, pdf, doc, docx', 'maxSize' => 5*1024*1024]
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
            'done' => 'Done',
            'status' => 'Status',
            'filename' => 'Filename',
        ];
    }
}
