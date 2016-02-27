<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Orders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-sm-4">
             <?= $form->field($model, 'type')->dropDownList([0 => 'Translation', 1 => 'Proofreading']) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'lang_from')->dropDownList([
                 1 => 'Afrikaans',
                 2 => 'Albanian',
                 3 => 'Amharic',
                 4 => 'Arabic',
                 5 => 'Armenian',
                 6 => 'Azeri/Azerbaijani',
                 7 => 'Bantu',
                 8 => 'Basque',                                                                    
                 9 => 'Belarusian',
                 10 => 'Bengali',
                 11 => 'Bosnian',
                 12 => 'Bulgarian',
                 13 => 'Burmese',                                                                    
                 14 => 'Cambodian',
                 15 => 'Catalan',
                 16 => 'Chinese',
                 17 => 'Creole',
                 18 => 'Croatian',                                                                    
                 19 => 'Czech',
                 20 => 'Danish',
                 21 => 'Dari',
                 22 => 'Dutch',
                 23 => 'English (Australia)',                                                                    
                 24 => 'English (Canada)',
                 25 => 'English (UK)',
                 26 => 'English (USA)',
                 27 => 'Estonian',
                 28 => 'Farsi',                                                                    
                 29 => 'Finnish',
                 30 => 'Flemish',
                 31 => 'French',
                 32 => 'Galician',
                 33 => 'Georgian',                                                                    
                 34 => 'German',
                 35 => 'German (Austria)',
                 36 => 'German (Switzerland)',
                 37 => 'Greek',
                 38 => 'Gujarati',                                                                    
                 39 => 'Hebrew',
                 40 => 'Hindi',
                 41 => 'Hmong',
                 42 => 'Hungarian',
                 43 => 'Icelandic',                                                                                                                                                                                           
                 44 => 'Ilocano',
                 45 => 'Indonesian',
                 46 => 'Italian',
                 47 => 'Irish',
                 48 => 'Japanese',                                                                                                                                                                                                                                                                                
                 49 => 'Javanese',                                                                                                                                                                                           
                 50 => 'Karen',
                 51 => 'Kashmiri',
                 52 => 'Kazakh',
                 53 => 'Korean',
                 54 => 'Kurdish',                                                                                                                                                                                                                                                                                
                 55 => 'Laotian',                                                                                                                                                                                           
                 56 => 'Latin',
                 57 => 'Latvian',
                 58 => 'Lithuanian',
                 59 => 'Macedonian',
                 60 => 'Malay',                                                                                                                                                                                                                                                                                
                 61 => 'Maltese',                                                                                                                                                                                           
                 62 => 'Marathi',
                 63 => 'Moldovan',
                 64 => 'Mongolian',
                 65 => 'Nepali',
                 66 => 'Norwegian',                                                                                                                                                                                                                                                                                
                 67 => 'Pashto',                                                                                                                                                                                           
                 68 => 'Polish',
                 69 => 'Portuguese-Brazil',
                 70 => 'Portuguese-European',
                 71 => 'Punjabi',
                 72 => 'Romanian',                                                                                                                                                                                                                                                                                                 
                 73 => 'Russian',                                                                                                                                                                                           
                 74 => 'Serbian',
                 75 => 'Sinhalese',
                 76 => 'Slovak',
                 77 => 'Slovene',
                 78 => 'Somali',
                 79 => 'Spanish',
                 80 => 'Swahili',
                 81 => 'Swedish',
                 82 => 'Tagalog',
                 83 => 'Tamil',
                 84 => 'Thai',
                 85 => 'Turkish',
                 86 => 'Twi',
                 87 => 'Ukrainian',
                 88 => 'Urdu',
                 89 => 'Uyghur',
                 90 => 'Uzbek',
                 91 => 'Vietnamese',
                 92 => 'Welsh',
                 93 => 'Yiddish',
                 94 => 'Zulu',
              ], ['prompt' => ''])->label('Source Language') ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'lang_to')->dropDownList([

                1 => 'Afrikaans',
                 2 => 'Albanian',
                 3 => 'Amharic',
                 4 => 'Arabic',
                 5 => 'Armenian',
                 6 => 'Azeri/Azerbaijani',
                 7 => 'Bantu',
                 8 => 'Basque',                                                                    
                 9 => 'Belarusian',
                 10 => 'Bengali',
                 11 => 'Bosnian',
                 12 => 'Bulgarian',
                 13 => 'Burmese',                                                                    
                 14 => 'Cambodian',
                 15 => 'Catalan',
                 16 => 'Chinese',
                 17 => 'Creole',
                 18 => 'Croatian',                                                                    
                 19 => 'Czech',
                 20 => 'Danish',
                 21 => 'Dari',
                 22 => 'Dutch',
                 23 => 'English (Australia)',                                                                    
                 24 => 'English (Canada)',
                 25 => 'English (UK)',
                 26 => 'English (USA)',
                 27 => 'Estonian',
                 28 => 'Farsi',                                                                    
                 29 => 'Finnish',
                 30 => 'Flemish',
                 31 => 'French',
                 32 => 'Galician',
                 33 => 'Georgian',                                                                    
                 34 => 'German',
                 35 => 'German (Austria)',
                 36 => 'German (Switzerland)',
                 37 => 'Greek',
                 38 => 'Gujarati',                                                                    
                 39 => 'Hebrew',
                 40 => 'Hindi',
                 41 => 'Hmong',
                 42 => 'Hungarian',
                 43 => 'Icelandic',                                                                                                                                                                                           
                 44 => 'Ilocano',
                 45 => 'Indonesian',
                 46 => 'Italian',
                 47 => 'Irish',
                 48 => 'Japanese',                                                                                                                                                                                                                                                                                
                 49 => 'Javanese',                                                                                                                                                                                           
                 50 => 'Karen',
                 51 => 'Kashmiri',
                 52 => 'Kazakh',
                 53 => 'Korean',
                 54 => 'Kurdish',                                                                                                                                                                                                                                                                                
                 55 => 'Laotian',                                                                                                                                                                                           
                 56 => 'Latin',
                 57 => 'Latvian',
                 58 => 'Lithuanian',
                 59 => 'Macedonian',
                 60 => 'Malay',                                                                                                                                                                                                                                                                                
                 61 => 'Maltese',                                                                                                                                                                                           
                 62 => 'Marathi',
                 63 => 'Moldovan',
                 64 => 'Mongolian',
                 65 => 'Nepali',
                 66 => 'Norwegian',                                                                                                                                                                                                                                                                                
                 67 => 'Pashto',                                                                                                                                                                                           
                 68 => 'Polish',
                 69 => 'Portuguese-Brazil',
                 70 => 'Portuguese-European',
                 71 => 'Punjabi',
                 72 => 'Romanian',                                                                                                                                                                                                                                                                                                 
                 73 => 'Russian',                                                                                                                                                                                           
                 74 => 'Serbian',
                 75 => 'Sinhalese',
                 76 => 'Slovak',
                 77 => 'Slovene',
                 78 => 'Somali',
                 79 => 'Spanish',
                 80 => 'Swahili',
                 81 => 'Swedish',
                 82 => 'Tagalog',
                 83 => 'Tamil',
                 84 => 'Thai',
                 85 => 'Turkish',
                 86 => 'Twi',
                 87 => 'Ukrainian',
                 88 => 'Urdu',
                 89 => 'Uyghur',
                 90 => 'Uzbek',
                 91 => 'Vietnamese',
                 92 => 'Welsh',
                 93 => 'Yiddish',
                 94 => 'Zulu',

            ], ['prompt' => ''])->label('Target Language') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'srok')->widget(DatePicker::className(),[
                    'options' => ['class' => 'form-control'],
                    
                    ])->label('Deadline') ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'category')->dropDownList([
                1 => 'Architecture/Building',
                2 => 'Business/Economics',
                3 => 'Design',
                4 => 'Engineering/Shipbuilding/Aviation',
                5 => 'Fashion',
                6 => 'Food',
                7 => 'Industry',
                8 => 'IT & Softwar',
                9 => 'Legal',
                10 => 'Literature (Belles-lettres/Scientific)',
                11 => 'Medicine/Pharmaceuticals',
                12 => 'PR/Marketing/Advertisement',
                13 => 'Social Media',
                14 => 'Supply',
                15 => 'Travel/Tourism',
                16 => 'Personal documents',
                17 => 'Websites',
                0 => 'Other',
            ], ['prompt' => ''])->label('Category') ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'monitor')->dropDownList([0 => 'OFF', 1 => 'ON'])->label('Online monitoring') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'assistant')->dropDownList([0 => 'OFF', 1 => 'ON'])->label('Project assistant') ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'experience')->dropDownList([ 0 => 'irrelevant', 1 => 'up to one year', 2 => 'from one year to five years', 3 => 'more than five years'])->label('Experience') ?>    
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'level')->dropDownList([ 
                0 => 'All',
                1 => '1 star',
                2 => '2 star',
                3 => '3 star',
                4 => '4 star',
                5 => '5 star',
            ])->label('Rating') ?>    
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'nsymbol')->textInput()->label('N symbols') ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'nword')->textInput()->label('N words') ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'nstring')->textInput()->label('N string') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'cost')->textInput()->label('Cost') ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'totalcost')->textInput()->label('Total cost') ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'status')->dropDownList([ 
                -1 => 'Stop',
                0 => 'New',
                1 => 'Moderation',
                2 => 'Edit',
                3 => 'Active',
                4 => 'In working',
                5 => 'Сheck Administrator',
                6 => 'Check Client',
                7 => 'Revision',
                8 => 'Paid',

                ]) ?>
        </div>
    </div>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label('Title') ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6])->label('Description')->widget(letyii\tinymce\Tinymce::className(),[
                                                            'options' => ['rows' => 16],
                                                            'configs' => [ 
                                                                


                                                            ],

                                                            
                                                        
                                                        
                                                    
                                                        
                                                        ]) ?>

    <?= $form->field($model, 'texthiden')->textarea(['rows' => 6])->label('Description Hiden')->widget(letyii\tinymce\Tinymce::className(),[
                                                            'options' => ['rows' => 6],
                                                            'configs' => [ 
                                                                


                                                            ],

                                                            
                                                        
                                                        
                                                    
                                                        
                                                        ]) ?>

    <?= $form->field($model, 'commentclient')->textarea(['rows' => 6])->label('Comments to client')->widget(letyii\tinymce\Tinymce::className(),[
                                                            'options' => ['rows' => 6],
                                                            'configs' => [ 
                                                                


                                                            ],

                                                            
                                                        
                                                        
                                                    
                                                        
                                                        ])->widget(letyii\tinymce\Tinymce::className(),[
                                                            'options' => ['rows' => 6],
                                                            'configs' => [ 
                                                                


                                                            ],

                                                            
                                                        
                                                        
                                                    
                                                        
                                                        ]) ?>

    <?= $form->field($model, 'commenttranslate')->textarea(['rows' => 6])->label('Comments to translater')->widget(letyii\tinymce\Tinymce::className(),[
                                                            'options' => ['rows' => 6],
                                                            'configs' => [ 
                                                                


                                                            ],

                                                            
                                                        
                                                        
                                                    
                                                        
                                                        ]) ?>

    <div class="row">
        
        <div class="col-sm-3"><?= $form->field($model, 'country')->dropDownList([
                    '0' => 'All',
                    '1' => 'Andorra',
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
                    '112' => 'USA',                                                                                                                                                                                                                            
            ], ['multiple' => true])->label('Country') ?>
        </div>
    </div>
    
    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
