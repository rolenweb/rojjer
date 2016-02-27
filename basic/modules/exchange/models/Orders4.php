<?php

namespace app\modules\exchange\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\web\UploadedFile;

/**
 * This is the model class for table "orders4".
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
 * @property string $othercategory
 * @property string $title
 * @property string $text
 * @property string $texthiden
 * @property string $filename
 * @property string $textready
 * @property string $filenameready
 * @property integer $proofreading
 * @property integer $country
 * @property string $country2
 * @property double $cost
 * @property double $totalcost
 * @property integer $status
 * @property integer $monitor
 * @property integer $nsymbol
 * @property integer $nword
 * @property double $nstring
 * @property integer $type
 * @property integer $assistant
 * @property integer $experience
 * @property integer $level
 * @property integer $rating
 * @property string $commentclient
 * @property string $commenttranslate
 */
class Orders4 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders4';
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
            [['id_user', 'id_translater', 'created_at', 'updated_at', 'lang_from', 'lang_to', 'category', 'proofreading', 'country', 'status', 'monitor', 'nsymbol', 'nword', 'type', 'assistant', 'experience', 'level', 'rating'], 'integer'],
            [['srok'], 'safe'],
            [['text', 'texthiden', 'textready'], 'string'],
            [['cost', 'totalcost', 'nstring'], 'number'],
            [['username', 'othercategory', 'title', 'country2'], 'string', 'max' => 255],
            [['filename', 'filenameready'], 'string', 'max' => 100],
            [['commentclient', 'commenttranslate'], 'string', 'max' => 1000],
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
            'id_translater' => 'Id Translater',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'username' => 'Username',
            'lang_from' => 'Source Language',
            'lang_to' => 'Target Language',
            'srok' => 'Deadline',
            'category' => 'Category',
            'othercategory' => 'Othercategory',
            'title' => 'Title',
            'text' => 'Text',
            'texthiden' => 'Texthiden',
            'filename' => 'Filename',
            'textready' => 'Textready',
            'filenameready' => 'Filenameready',
            'proofreading' => 'Proofreading',
            'country' => 'Country',
            'country2' => 'Country',
            'cost' => 'Cost',
            'totalcost' => 'Totalcost',
            'status' => 'Status',
            'monitor' => 'Monitor',
            'nsymbol' => 'Nsymbol',
            'nword' => 'Nword',
            'nstring' => 'Nstring',
            'type' => 'Type',
            'assistant' => 'Assistant',
            'experience' => 'Experience',
            'level' => 'Level',
            'rating' => 'Rating',
            'commentclient' => 'Commentclient',
            'commenttranslate' => 'Commenttranslate',
        ];
    }
}
