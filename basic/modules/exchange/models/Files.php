<?php

namespace app\modules\exchange\models;

use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "files".
 *
 * @property integer $id
 * @property string $name
 * @property string $mimetype
 * @property integer $size
 * @property string $md5
 * @property integer $created_at
 * @property integer $updated_at
 */
class Files extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'files';
    }

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
            [['size', 'created_at', 'updated_at'], 'integer'],
            [['name', 'mimetype', 'md5'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'mimetype' => 'Mimetype',
            'size' => 'Size',
            'md5' => 'Md5',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
