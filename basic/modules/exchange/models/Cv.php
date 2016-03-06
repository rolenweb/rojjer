<?php

namespace app\modules\exchange\models;

use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "cv".
 *
 * @property integer $id
 * @property integer $file_id
 * @property integer $profile_id
 * @property integer $created_at
 * @property integer $updated_at
 */
class Cv extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cv';
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
            [['file_id', 'profile_id', 'created_at', 'updated_at'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'file_id' => 'File ID',
            'profile_id' => 'Profile ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
