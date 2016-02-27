<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\web\UploadedFile;

/**
 * This is the model class for table "orders".
 *
 * @property integer $id
 * @property integer $id_user
 * @property string $username
 * @property string $lang_from
 * @property string $lang_to
 * @property string $srok
 * @property string $category
 * @property string $title
 * @property string $text
 * @property string $filename
 * @property string $assist_expir
 * @property string $country
 * @property double $cost
 * @property string $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
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
            [['lang_from', 'lang_to', 'srok', 'category', 'title', 'cost'], 'required'],
            [['id_user', 'created_at', 'updated_at'], 'integer'],
            [['lang_from', 'lang_to', 'category', 'text', 'assist_expir', 'country', 'status'], 'string'],
            [['cost'], 'number'],
            //['srok', 'date', 'timestampAttribute' => 'srok'],
            ['srok','safe'],
            [['username', 'title'], 'string', 'max' => 255],
            [['filename'], 'string', 'max' => 100],
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
            'id_user' => 'Id User',
            'username' => 'Username',
            'lang_from' => 'Lang From',
            'lang_to' => 'Lang To',
            'srok' => 'Srok',
            'category' => 'Category',
            'title' => 'Title',
            'text' => 'Text',
            'file' => 'File',
            'assist_expir' => 'Assist Expir',
            'country' => 'Country',
            'cost' => 'Cost',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
