<?php

namespace app\modules\exchange\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "recomendations".
 *
 * @property integer $id
 * @property integer $id_user
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $name
 * @property string $namefile
 */
class Recomendations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'recomendations';
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
            [['name', 'file'], 'required'],
            [['id_user', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['namefile'], 'string', 'max' => 100],
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
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'name' => 'Name',
            'namefile' => 'Namefile',
        ];
    }
}
