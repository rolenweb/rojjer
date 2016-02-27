<?php

namespace app\modules\admin\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "orders2".
 *
 * @property integer $id
 * @property integer $id_user
 * @property integer $id_translater
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $username
 * @property integer $lang_from
 * @property integer $lang_to
 * @property string $srok
 * @property integer $category
 * @property string $title
 * @property string $text
 * @property string $texthiden
 * @property string $textready
 * @property string $filename
 * @property integer $assist_expir
 * @property integer $country
 * @property double $cost
 * @property double $totalcost
 * @property integer $status
 * @property string $comment
 */
class Orders2 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders2';
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
            [['lang_from', 'lang_to', 'srok', 'category', 'title', 'text', 'cost'], 'required'],
            [['id_user', 'id_translater', 'created_at', 'updated_at', 'lang_from', 'lang_to', 'category', 'assist_expir', 'country', 'status'], 'integer'],
            [['srok'], 'safe'],
            [['text', 'texthiden', 'textready'], 'string'],
            [['cost', 'totalcost'], 'number'],
            [['username', 'title'], 'string', 'max' => 255],
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
            'id_user' => 'Id User',
            'id_translater' => 'Id Translater',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'username' => 'Username',
            'lang_from' => 'Lang From',
            'lang_to' => 'Lang To',
            'srok' => 'Srok',
            'category' => 'Category',
            'title' => 'Title',
            'text' => 'Text',
            'texthiden' => 'Texthiden',
            'textready' => 'Textready',
            'filename' => 'Filename',
            'assist_expir' => 'Assist Expir',
            'country' => 'Country',
            'cost' => 'Cost',
            'totalcost' => 'Totalcost',
            'status' => 'Status',
            'comment' => 'Comment',
        ];
    }
}
