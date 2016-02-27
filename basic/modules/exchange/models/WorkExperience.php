<?php

namespace app\modules\exchange\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "work_experience".
 *
 * @property integer $id
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $id_profile
 * @property string $category
 * @property integer $category2
 * @property integer $total_experience
 * @property string $text
 * @property integer $status
 */
class WorkExperience extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'work_experience';
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
            [['created_at', 'updated_at', 'id_profile', 'category2', 'total_experience', 'status'], 'integer'],
            [['category', 'text'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'id_profile' => 'Id Profile',
            'category' => 'Category',
            'category2' => 'Category2',
            'total_experience' => 'Total Experience',
            'text' => 'Text',
            'status' => 'Status',
        ];
    }
}
