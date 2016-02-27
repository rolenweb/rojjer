<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "profile_client".
 *
 * @property integer $id
 * @property integer $id_user
 * @property string $first_name
 * @property string $second_name
 * @property string $photo
 * @property string $birthday
 * @property string $phone
 * @property string $skype
 * @property integer $created_at
 * @property integer $updated_at
 */
class ProfileClient extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile_client';
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
            [['id_user'], 'required'],
            [['id_user', 'created_at', 'updated_at'], 'integer'],
            [['first_name', 'second_name', 'birthday', 'phone', 'skype'], 'string', 'max' => 30],
            [['photo'], 'string', 'max' => 100]
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
            'first_name' => 'First Name',
            'second_name' => 'Second Name',
            'photo' => 'Photo',
            'birthday' => 'Birthday',
            'phone' => 'Phone',
            'skype' => 'Skype',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
