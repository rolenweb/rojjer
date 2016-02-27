<?php

namespace app\models;


use Yii;
use yii\behaviors\TimestampBehavior;
use app\modules\exchange\models\BillingAddress;

/**
 * This is the model class for table "profile_translate".
 *
 * @property integer $id
 * @property integer $id_user
 * @property string $first_name
 * @property string $second_name
 * @property string $photo
 * @property string $birthday
 * @property string $phone
 * @property string $skype
 * @property string $country
 * @property string $native_language
 * @property string $native_language2
 * @property string $native_language3
 * @property string $level_knowledge_nl
 * @property string $first_language
 * @property string $level_knowledge_fl
 * @property string $foreign_language2
 * @property string $level_knowledge_fl2
 * @property string $foreign_language3
 * @property string $level_knowledge_fl3
 * @property string $foreign_language4
 * @property string $level_knowledge_fl4
 * @property string $foreign_language5
 * @property string $level_knowledge_fl5
 * @property string $foreign_language6
 * @property string $level_knowledge_fl6
 * @property string $foreign_language7
 * @property string $level_knowledge_fl7
 * @property string $foreign_language8
 * @property string $level_knowledge_fl8
 * @property string $foreign_language9
 * @property string $level_knowledge_fl9
 * @property string $experience
 * @property string $type_industry
 * @property string $aviation_space_technology
 * @property string $cars_automotive_industry
 * @property string $business_management_economics
 * @property string $biology
 * @property string $accounting_audit_finance
 * @property string $military_equipment
 * @property string $geology
 * @property string $geophysics
 * @property string $informational_technologies_computer_engineering
 * @property string $internet_sites
 * @property string $mechanical
 * @property string $medicine
 * @property string $metallurgy
 * @property string $music_sound_processing_light
 * @property string $oil_gas_production
 * @property string $perfumes_cosmetics
 * @property string $food_industry
 * @property string $political_science
 * @property string $industrial_automation
 * @property string $industrial_civil_construction
 * @property string $advertising_pr_marketing
 * @property string $agricultural_machines_equipment_technologies
 * @property string $insurance
 * @property string $shipbuilding
 * @property string $telecommunications_communications
 * @property string $tourism
 * @property string $pharmaceutical_industry
 * @property string $physics
 * @property string $finance
 * @property string $chemical_industry
 * @property string $literary_texts
 * @property string $ecology
 * @property string $electronics_radio_electronics
 * @property string $jurisprudence
 * @property string $other
 * @property string $recomend
 * @property string $price_translation_word
 * @property double $price_translation_word_f
 * @property string $price_translation_string
 * @property double $price_translation_string_f
 * @property string $price_proofreading_word
 * @property double $price_proofreading_word_f
 * @property string $price_proofreading_string
 * @property double $price_proofreading_string_f
 * @property string $summary
 * @property string $level
 * @property integer $created_at
 * @property integer $updated_at
 */
class ProfileTranslate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile_translate';
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
            [[
                'native_language',
                'native_language2',
                'native_language3',
                'level_knowledge_nl',
                'first_language',
                'level_knowledge_fl',
                'foreign_language2',
                'level_knowledge_fl2',
                'foreign_language3',
                'level_knowledge_fl3',
                'foreign_language4',
                'level_knowledge_fl4',
                'foreign_language5',
                'level_knowledge_fl5',
                'foreign_language6',
                'level_knowledge_fl6',
                'foreign_language7',
                'level_knowledge_fl7',
                'foreign_language8',
                'level_knowledge_fl8',
                'foreign_language9',
                'level_knowledge_fl9',
                'experience',
                'type_industry',
                'price_translation_word',
                'price_translation_string',
                'price_proofreading_word',
                'price_proofreading_string',
                'level',
                'aviation_space_technology',
                'cars_automotive_industry',
                'business_management_economics',
                'biology',
                'accounting_audit_finance',
                'military_equipment',
                'geology',
                'geophysics',
                'informational_technologies_computer_engineering',
                'internet_sites',
                'mechanical',
                'medicine',
                'metallurgy',
                'music_sound_processing_light',
                'oil_gas_production',
                'perfumes_cosmetics',
                'food_industry',
                'political_science',
                'industrial_automation',
                'industrial_civil_construction',
                'advertising_pr_marketing',
                'agricultural_machines_equipment_technologies',
                'insurance',
                'shipbuilding',
                'telecommunications_communications',
                'tourism',
                'pharmaceutical_industry',
                'physics',
                'finance',
                'chemical_industry',
                'literary_texts',
                'ecology',
                'electronics_radio_electronics',
                'jurisprudence',
                'other'
                ],
                'string'
            ],
            [['first_name', 'second_name', 'phone', 'skype', 'country'], 'string', 'max' => 30],
            ['birthday', 'safe'],
            [['photo', 'recomend', 'summary'], 'string', 'max' => 100],
            [['price_translation_word_f', 'price_translation_string_f', 'price_proofreading_word_f', 'price_proofreading_string_f'], 'number', 'max' => 100],
            [['price_translation_word_f', 'price_proofreading_word_f'], 'compare', 'compareValue' => 0.12, 'operator' => '>='],
            [['price_translation_string_f', 'price_proofreading_string_f'], 'compare', 'compareValue' => 1.0, 'operator' => '>=']
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
            'country' => 'Country',
            'native_language' => 'Native Language',
            'native_language2' => 'Second Native Language',
            'native_language3' => 'Third Native Language',
            'level_knowledge_nl' => 'Level Knowledge Nl',
            'first_language' => 'First Language',
            'level_knowledge_fl' => 'Level Knowledge Fl',
            'experience' => 'Experience',
            'type_industry' => 'Type Industry',
            'recommendations' => 'Recommendations',
            'price_translation_word' => 'Price Translation Word',
            'price_translation_string' => 'Price Translation String',
            'price_proofreading_word' => 'Price Proofreading Word',
            'price_proofreading_string' => 'Price Proofreading String',
            'summary' => 'Summary',
            'level' => 'Level',
            'created_at' => 'Created At',
            'updated_at' => 'Update At',
        ];
    }

    public function getBillingAddress()
    {
        return $this->hasOne(BillingAddress::className(), ['id_profile' => 'id']);
    }
}
