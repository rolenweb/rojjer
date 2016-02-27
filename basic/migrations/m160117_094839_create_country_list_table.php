<?php

use yii\db\Schema;
use yii\db\Migration;

class m160117_094839_create_country_list_table extends Migration
{
    public function up()
    {
        $this->createTable('country_list', [
            'id' => Schema::TYPE_PK,
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'name' => Schema::TYPE_STRING . '(255) NOT NULL',
            'code' => Schema::TYPE_STRING . '(255) NOT NULL',
            
        ]); 
        $arr = ['1' => 'Andorra',
                                                                    '2' => 'Argentina',
                                                                    '3' => 'Armenia',
                                                                    '4' => 'Australia',
                                                                    '5' => 'Austria',
                                                                    '6' => 'Azerbaijan',
                                                                    '7' => 'Bahamas',
                                                                    '8' => 'Bahrain',
                                                                    '9' => 'Bangladesh',
                                                                    '10' => 'Barbados',
                                                                    '11' => 'Belarus',
                                                                    '12' => 'Belgium',
                                                                    '13' => 'Belize',
                                                                    '14' => 'Bolivia',
                                                                    '15' => 'Bosnia and Herzegovina',
                                                                    '16' => 'Brazil',
                                                                    '17' => 'Brunei',
                                                                    '18' => 'Bulgaria',
                                                                    '19' => 'Cambodia',
                                                                    '20' => 'Cameroon',
                                                                    '21' => 'Canada',
                                                                    '22' => 'Chile',
                                                                    '23' => 'China',
                                                                    '24' => 'Colombia',
                                                                    '25' => 'Congo',
                                                                    '26' => 'Costa Rica',
                                                                    '27' => 'Croatia',
                                                                    '28' => 'Cuba',
                                                                    '29' => 'Cyprus',
                                                                    '30' => 'Czech Republic',                                        
                                                                    '31' => 'Denmark',
                                                                    '32' => 'Dominica',
                                                                    '33' => 'Dominican Republic',
                                                                    '34' => 'Ecuador',                                        
                                                                    '35' => 'Egypt',
                                                                    '36' => 'Estonia',
                                                                    '37' => 'Fiji',
                                                                    '38' => 'Finland',                                                                                
                                                                    '39' => 'France',
                                                                    '40' => 'Georgia',
                                                                    '41' => 'Germany',
                                                                    '42' => 'Greece',                                        
                                                                    '43' => 'Guatemala',
                                                                    '44' => 'Haiti',
                                                                    '45' => 'Honduras',
                                                                    '46' => 'Hungary',                                        
                                                                    '47' => 'Iceland',
                                                                    '48' => 'India',
                                                                    '49' => 'Indonesia',
                                                                    '50' => 'Iran',                                                                                
                                                                    '51' => 'Iraq',
                                                                    '52' => 'Ireland',
                                                                    '53' => 'Israel',
                                                                    '54' => 'Italy',                                        
                                                                    '55' => 'Jamaica',
                                                                    '56' => 'Japan',
                                                                    '57' => 'Jordan',
                                                                    '58' => 'Kazakhstan',                                        
                                                                    '59' => 'Korea, North',
                                                                    '60' => 'Korea, South',
                                                                    '61' => 'Kyrgyzstan',
                                                                    '62' => 'Latvia',                                                                                                                        
                                                                    '63' => 'Lebanon',
                                                                    '64' => 'Liechtenstein',
                                                                    '65' => 'Lithuania',
                                                                    '66' => 'Luxembourg',                                                                                                                        
                                                                    '67' => 'Macedonia',
                                                                    '68' => 'Madagascar',
                                                                    '69' => 'Malaysia',
                                                                    '70' => 'Maldives',                                                                                                                        
                                                                    '71' => 'Mali',
                                                                    '72' => 'Malta',
                                                                    '73' => 'Mexico',
                                                                    '74' => 'Moldova',                                                                                                                        
                                                                    '75' => 'Monaco',
                                                                    '76' => 'Mongolia',
                                                                    '77' => 'Montenegro',
                                                                    '78' => 'Morocco',                                                                                                                        
                                                                    '79' => 'Mozambique',
                                                                    '80' => 'Netherlands',
                                                                    '81' => 'New Zealand',
                                                                    '82' => 'Norway',                                                                                                                                                                                                                            
                                                                    '83' => 'Palestine',
                                                                    '84' => 'Panama',
                                                                    '85' => 'Paraguay',
                                                                    '86' => 'Peru',                                                                                
                                                                    '87' => 'Philippines',                                                                                                                                                                                                                            
                                                                    '88' => 'Poland',
                                                                    '89' => 'Portugal',
                                                                    '90' => 'Qatar',
                                                                    '91' => 'Romania',                                                                                
                                                                    '92' => 'Russia',                                                                                                                                                                                                                            
                                                                    '93' => 'Saudi Arabia',
                                                                    '94' => 'Serbia',
                                                                    '95' => 'Seychelles',
                                                                    '96' => 'Singapore',                                                                                                                        
                                                                    '97' => 'Slovakia',                                                                                                                                                                                                                            
                                                                    '98' => 'Slovenia',
                                                                    '99' => 'South Africa',
                                                                    '100' => 'Spain',
                                                                    '101' => 'Sri Lanka',                                                                                
                                                                    '102' => 'Sweden',                                                                                                                                                                                                                            
                                                                    '103' => 'Switzerland',
                                                                    '104' => 'Thailand',
                                                                    '105' => 'Tunisia',
                                                                    '106' => 'Turkey',                                                                                
                                                                    '107' => 'Turkmenistan',                                                                                                                                                                                                                            
                                                                    '108' => 'Ukraine',
                                                                    '109' => 'United Arab Emirates',
                                                                    '110' => 'United Kingdom',
                                                                    '111' => 'Uruguay',                                                                                                                        
                                                                    '112' => 'USA',       ];
        foreach ($arr as $item) {
            $this->insert('country_list', ['name' => $item,'code' => '', 'created_at' => time(), 'updated_at' => time()]);
        }                                                                    
        
        

        

    }

    public function down()
    {
        echo "m160117_094839_create_country_list_table cannot be reverted.\n";

        return false;
    }
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}
