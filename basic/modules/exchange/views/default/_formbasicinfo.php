<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\jui\DatePicker;
?>
                                                        <?php $form = ActiveForm::begin(); ?>
                                                            <h4 class="page-header">Personal Information:</h4>
                                                            
                                                            <div class="form-group has-feedback">
                                                                
                                                                    <?= $form->field($modelprofile, 'first_name')->textInput(['maxlength' => true, 'class' => 'form-control'])->label('First Name ('.Html::tag('i','',['class' => 'fa fa-lock', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Private']).')') ?>
                                                                    
                                                                    
                                                                
                                                            </div>
                                                            <div class="form-group has-feedback">
                                                                <?= $form->field($modelprofile, 'second_name')->textInput(['maxlength' => true, 'class' => 'form-control'])->label('Second Name ('.Html::tag('i','',['class' => 'fa fa-lock', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Private']).')') ?>
                                                                
                                                            </div>
                                                            
                                                                <div class="form-group has-feedback">

                                                                    <?= $form->field($modelprofile, 'birthday')->widget(DatePicker::className(),[
                                                                          'options' => [
                                                                            'class' => 'form-control',
                                                                            'placeholder' => 'Date',
                                                                            ],
                                                                          
                                                                          ])->label('Date of Birth ('.Html::tag('i','',['class' => 'fa fa-lock', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Private']).')') ?>
                                                                    
                                                                </div>
                                                            
                                                            <div class="form-group has-feedback">
                                                                <?= $form->field($modelprofile, 'phone')->textInput(['maxlength' => true, 'class' => 'form-control'])->label('Phone ('.Html::tag('i','',['class' => 'fa fa-lock', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Private']).')') ?>
                                                                
                                                            </div>
                                                            <div class="form-group has-feedback">
                                                                <?= $form->field($modelprofile, 'skype')->textInput(['maxlength' => true, 'class' => 'form-control'])->label('Skype ('.Html::tag('i','',['class' => 'fa fa-lock', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Private']).')') ?>
                                                                
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <?= $form->field($modelprofile, 'country')->dropDownList([ 
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
                                                                
                                                                ], ['prompt' => ''])->label('Country ('.Html::tag('i','',['class' => 'fa fa-globe', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Public']).')') ?>  
                                                                
                                                            </div>
                                                            <?php
                                                            if ($model->type == 'translater') {
                                                            ?>
                                                            
                                                            <div class="form-group">
<?php
$array_language_for_dropdown = array('1' => 'Afrikaans',
                                                                 '2' => 'Albanian',
                                                                 '3' => 'Amharic',
                                                                 '4' => 'Arabic',
                                                                 '5' => 'Armenian',
                                                                 '6' => 'Azeri/Azerbaijani',
                                                                 '7' => 'Bantu',
                                                                 '8' => 'Basque',                                                                    
                                                                 '9' => 'Belarusian',
                                                                 '10' => 'Bengali',
                                                                 '11' => 'Bosnian',
                                                                 '12' => 'Bulgarian',
                                                                 '13' => 'Burmese',                                                                    
                                                                 '14' => 'Cambodian',
                                                                 '15' => 'Catalan',
                                                                 '16' => 'Chinese',
                                                                 '17' => 'Creole',
                                                                 '18' => 'Croatian',                                                                    
                                                                 '19' => 'Czech',
                                                                 '20' => 'Danish',
                                                                 '21' => 'Dari',
                                                                 '22' => 'Dutch',
                                                                 '23' => 'English (Australia)',                                                                    
                                                                 '24' => 'English (Canada)',
                                                                 '25' => 'English (UK)',
                                                                 '26' => 'English (USA)',
                                                                 '27' => 'Estonian',
                                                                 '28' => 'Farsi',                                                                    
                                                                 '29' => 'Finnish',
                                                                 '30' => 'Flemish',
                                                                 '31' => 'French',
                                                                 '32' => 'Galician',
                                                                 '33' => 'Georgian',                                                                    
                                                                 '34' => 'German',
                                                                 '35' => 'German (Austria)',
                                                                 '36' => 'German (Switzerland)',
                                                                 '37' => 'Greek',
                                                                 '38' => 'Gujarati',                                                                    
                                                                 '39' => 'Hebrew',
                                                                 '40' => 'Hindi',
                                                                 '41' => 'Hmong',
                                                                 '42' => 'Hungarian',
                                                                 '43' => 'Icelandic',                                                                                                                                                                                           
                                                                 '44' => 'Ilocano',
                                                                 '45' => 'Indonesian',
                                                                 '46' => 'Italian',
                                                                 '47' => 'Irish',
                                                                 '48' => 'Japanese',                                                                                                                                                                                                                                                                                
                                                                 '49' => 'Javanese',                                                                                                                                                                                           
                                                                 '50' => 'Karen',
                                                                 '51' => 'Kashmiri',
                                                                 '52' => 'Kazakh',
                                                                 '53' => 'Korean',
                                                                 '54' => 'Kurdish',                                                                                                                                                                                                                                                                                
                                                                 '55' => 'Laotian',                                                                                                                                                                                           
                                                                 '56' => 'Latin',
                                                                 '57' => 'Latvian',
                                                                 '58' => 'Lithuanian',
                                                                 '59' => 'Macedonian',
                                                                 '60' => 'Malay',                                                                                                                                                                                                                                                                                
                                                                 '61' => 'Maltese',                                                                                                                                                                                           
                                                                 '62' => 'Marathi',
                                                                 '63' => 'Moldovan',
                                                                 '64' => 'Mongolian',
                                                                 '65' => 'Nepali',
                                                                 '66' => 'Norwegian',                                                                                                                                                                                                                                                                                
                                                                 '67' => 'Pashto',                                                                                                                                                                                           
                                                                 '68' => 'Polish',
                                                                 '69' => 'Portuguese-Brazil',
                                                                 '70' => 'Portuguese-European',
                                                                 '71' => 'Punjabi',
                                                                 '72' => 'Romanian',                                                                                                                                                                                                                                                                                                 
                                                                 '73' => 'Russian',                                                                                                                                                                                           
                                                                 '74' => 'Serbian',
                                                                 '75' => 'Sinhalese',
                                                                 '76' => 'Slovak',
                                                                 '77' => 'Slovene',
                                                                 '78' => 'Somali',
                                                                 '79' => 'Spanish',
                                                                 '80' => 'Swahili',
                                                                 '81' => 'Swedish',
                                                                 '82' => 'Tagalog',
                                                                 '83' => 'Tamil',
                                                                 '84' => 'Thai',
                                                                 '85' => 'Turkish',
                                                                 '86' => 'Twi',
                                                                 '87' => 'Ukrainian',
                                                                 '88' => 'Urdu',
                                                                 '89' => 'Uyghur',
                                                                 '90' => 'Uzbek',
                                                                 '91' => 'Vietnamese',
                                                                 '92' => 'Welsh',
                                                                 '93' => 'Yiddish',
                                                                 '94' => 'Zulu'
                                                                 );
?>                                                            
                                                                <?= $form->field($modelprofile, 'native_language')->dropDownList($array_language_for_dropdown, ['prompt' => ''])->label('Native Language ('.Html::tag('i','',['class' => 'fa fa-globe', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Public']).')') ?>    
                                                            </div>

                                                            <button class="btn btn-default" type="button" data-toggle="collapse" data-target="#nativelanguage2" aria-expanded="false" aria-controls="collapseExample">
                                                              <i class="fa fa-plus"></i>
                                                            </button>
                                                            <div class="collapse" id="nativelanguage2">
                                                              
                                                                <div class="form-group">
                                                                    <?= $form->field($modelprofile, 'native_language2')->dropDownList($array_language_for_dropdown, ['prompt' => ''])->label('Native Language ('.Html::tag('i','',['class' => 'fa fa-globe', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Public']).')') ?>
                                                                </div>
                                                              
                                                            </div>
                                                             <button class="btn btn-default" type="button" data-toggle="collapse" data-target="#nativelanguage3" aria-expanded="false" aria-controls="collapseExample">
                                                              <i class="fa fa-plus"></i>
                                                            </button>
                                                            <div class="collapse" id="nativelanguage3">
                                                              
                                                                <div class="form-group">
                                                                    <?= $form->field($modelprofile, 'native_language3')->dropDownList($array_language_for_dropdown, ['prompt' => ''])->label('Native Language ('.Html::tag('i','',['class' => 'fa fa-globe', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Public']).')') ?>
                                                                </div>
                                                              
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <?= $form->field($modelprofile, 'first_language')->dropDownList($array_language_for_dropdown, ['prompt' => ''])->label('Foreign Language ('.Html::tag('i','',['class' => 'fa fa-globe', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Public']).')') ?>
                                                            </div>
                                                            <div class="form-group">
                                                                <?= $form->field($modelprofile, 'level_knowledge_fl')->dropDownList([ 'A1' => 'A1', 'A2' => 'A2', 'B1' => 'B1', 'B2' => 'B2', 'C1' => 'C1', 'C2' => 'C2',], ['prompt' => ''])->label('Level Knowledge Fl ('.Html::tag('i','',['class' => 'fa fa-globe', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Public']).')') ?>
                                                            </div>
                                                            <button class="btn btn-default" type="button" data-toggle="collapse" data-target="#foreign_language2" aria-expanded="false" aria-controls="collapseExample">
                                                              <i class="fa fa-plus"></i>
                                                            </button>
                                                            <div class="collapse" id="foreign_language2">
                                                              <div class="form-group">
                                                                    <?= $form->field($modelprofile, 'foreign_language2')->dropDownList($array_language_for_dropdown, ['prompt' => ''])->label('Second Foreign Language ('.Html::tag('i','',['class' => 'fa fa-globe', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Public']).')') ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <?= $form->field($modelprofile, 'level_knowledge_fl2')->dropDownList([ 'A1' => 'A1', 'A2' => 'A2', 'B1' => 'B1', 'B2' => 'B2', 'C1' => 'C1', 'C2' => 'C2',], ['prompt' => ''])->label('Level Knowledge Fl2 ('.Html::tag('i','',['class' => 'fa fa-globe', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Public']).')') ?>
                                                                </div>
                                                            </div>
                                                            <button class="btn btn-default" type="button" data-toggle="collapse" data-target="#foreign_language3" aria-expanded="false" aria-controls="collapseExample">
                                                              <i class="fa fa-plus"></i>
                                                            </button>
                                                            <div class="collapse" id="foreign_language3">
                                                              <div class="form-group">
                                                                    <?= $form->field($modelprofile, 'foreign_language3')->dropDownList($array_language_for_dropdown, ['prompt' => ''])->label('Third Foreign Language ('.Html::tag('i','',['class' => 'fa fa-globe', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Public']).')') ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <?= $form->field($modelprofile, 'level_knowledge_fl3')->dropDownList([ 'A1' => 'A1', 'A2' => 'A2', 'B1' => 'B1', 'B2' => 'B2', 'C1' => 'C1', 'C2' => 'C2',], ['prompt' => ''])->label('Level Knowledge Fl3 ('.Html::tag('i','',['class' => 'fa fa-globe', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Public']).')') ?>
                                                                </div>
                                                            </div>
                                                            <button class="btn btn-default" type="button" data-toggle="collapse" data-target="#foreign_language4" aria-expanded="false" aria-controls="collapseExample">
                                                              <i class="fa fa-plus"></i>
                                                            </button>
                                                            <div class="collapse" id="foreign_language4">
                                                              <div class="form-group">
                                                                    <?= $form->field($modelprofile, 'foreign_language4')->dropDownList($array_language_for_dropdown, ['prompt' => ''])->label('Fourth Foreign Language ('.Html::tag('i','',['class' => 'fa fa-globe', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Public']).')') ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <?= $form->field($modelprofile, 'level_knowledge_fl4')->dropDownList([ 'A1' => 'A1', 'A2' => 'A2', 'B1' => 'B1', 'B2' => 'B2', 'C1' => 'C1', 'C2' => 'C2',], ['prompt' => ''])->label('Level Knowledge Fl4 ('.Html::tag('i','',['class' => 'fa fa-globe', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Public']).')') ?>
                                                                </div>
                                                            </div>
                                                            <button class="btn btn-default" type="button" data-toggle="collapse" data-target="#foreign_language5" aria-expanded="false" aria-controls="collapseExample">
                                                              <i class="fa fa-plus"></i>
                                                            </button>
                                                            <div class="collapse" id="foreign_language5">
                                                              <div class="form-group">
                                                                    <?= $form->field($modelprofile, 'foreign_language5')->dropDownList($array_language_for_dropdown, ['prompt' => ''])->label('Fifth Foreign Language ('.Html::tag('i','',['class' => 'fa fa-globe', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Public']).')') ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <?= $form->field($modelprofile, 'level_knowledge_fl5')->dropDownList([ 'A1' => 'A1', 'A2' => 'A2', 'B1' => 'B1', 'B2' => 'B2', 'C1' => 'C1', 'C2' => 'C2',], ['prompt' => ''])->label('Level Knowledge Fl5 ('.Html::tag('i','',['class' => 'fa fa-globe', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Public']).')') ?>
                                                                </div>
                                                            </div>
                                                            <button class="btn btn-default" type="button" data-toggle="collapse" data-target="#foreign_language6" aria-expanded="false" aria-controls="collapseExample">
                                                              <i class="fa fa-plus"></i>
                                                            </button>
                                                            <div class="collapse" id="foreign_language6">
                                                              <div class="form-group">
                                                                    <?= $form->field($modelprofile, 'foreign_language6')->dropDownList($array_language_for_dropdown, ['prompt' => ''])->label('Sixth Foreign Language ('.Html::tag('i','',['class' => 'fa fa-globe', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Public']).')') ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <?= $form->field($modelprofile, 'level_knowledge_fl6')->dropDownList([ 'A1' => 'A1', 'A2' => 'A2', 'B1' => 'B1', 'B2' => 'B2', 'C1' => 'C1', 'C2' => 'C2',], ['prompt' => ''])->label('Level Knowledge Fl6 ('.Html::tag('i','',['class' => 'fa fa-globe', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Public']).')') ?>
                                                                </div>
                                                            </div>
                                                            <button class="btn btn-default" type="button" data-toggle="collapse" data-target="#foreign_language7" aria-expanded="false" aria-controls="collapseExample">
                                                              <i class="fa fa-plus"></i>
                                                            </button>
                                                            <div class="collapse" id="foreign_language7">
                                                              <div class="form-group">
                                                                    <?= $form->field($modelprofile, 'foreign_language7')->dropDownList($array_language_for_dropdown, ['prompt' => ''])->label('Seventh Foreign Language ('.Html::tag('i','',['class' => 'fa fa-globe', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Public']).')') ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <?= $form->field($modelprofile, 'level_knowledge_fl7')->dropDownList([ 'A1' => 'A1', 'A2' => 'A2', 'B1' => 'B1', 'B2' => 'B2', 'C1' => 'C1', 'C2' => 'C2',], ['prompt' => ''])->label('Level Knowledge Fl7 ('.Html::tag('i','',['class' => 'fa fa-globe', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Public']).')') ?>
                                                                </div>
                                                            </div>
                                                            <button class="btn btn-default" type="button" data-toggle="collapse" data-target="#foreign_language8" aria-expanded="false" aria-controls="collapseExample">
                                                              <i class="fa fa-plus"></i>
                                                            </button>
                                                            <div class="collapse" id="foreign_language8">
                                                              <div class="form-group">
                                                                    <?= $form->field($modelprofile, 'foreign_language8')->dropDownList($array_language_for_dropdown, ['prompt' => ''])->label('Eighth Foreign Language ('.Html::tag('i','',['class' => 'fa fa-globe', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Public']).')') ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <?= $form->field($modelprofile, 'level_knowledge_fl8')->dropDownList([ 'A1' => 'A1', 'A2' => 'A2', 'B1' => 'B1', 'B2' => 'B2', 'C1' => 'C1', 'C2' => 'C2',], ['prompt' => ''])->label('Level Knowledge Fl8 ('.Html::tag('i','',['class' => 'fa fa-globe', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Public']).')') ?>
                                                                </div>
                                                            </div>
                                                            <button class="btn btn-default" type="button" data-toggle="collapse" data-target="#foreign_language9" aria-expanded="false" aria-controls="collapseExample">
                                                              <i class="fa fa-plus"></i>
                                                            </button>
                                                            <div class="collapse" id="foreign_language9">
                                                              <div class="form-group">
                                                                    <?= $form->field($modelprofile, 'foreign_language9')->dropDownList($array_language_for_dropdown, ['prompt' => ''])->label('Ninth Foreign Language ('.Html::tag('i','',['class' => 'fa fa-globe', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Public']).')') ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <?= $form->field($modelprofile, 'level_knowledge_fl9')->dropDownList([ 'A1' => 'A1', 'A2' => 'A2', 'B1' => 'B1', 'B2' => 'B2', 'C1' => 'C1', 'C2' => 'C2',], ['prompt' => ''])->label('Level Knowledge Fl9 ('.Html::tag('i','',['class' => 'fa fa-globe', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Public']).')') ?>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="form-group">
                                                                <?= $form->field($modelprofile, 'experience')->dropDownList([ '1' => '1 year', '2' => '1 - 5 years', '3' => 'more 5 years',], ['prompt' => '']) ?>    
                                                            </div>
                                                            
                                                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                              <div class="panel panel-default">
                                                                <div class="panel-heading" role="tab" id="headingOne">
                                                                  <h4 class="panel-title">
                                                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#type_industry" aria-expanded="true" aria-controls="collapseOne">
                                                                      You have translation experience in the following areas
                                                                    </a>
                                                                  </h4>
                                                                </div>
                                                                <div id="type_industry" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                                                  <div class="panel-body">
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <?= $form->field($modelprofile, 'aviation_space_technology')->checkbox(['label'=>'Aviation and space technology' ]) ?>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <?= $form->field($modelprofile, 'cars_automotive_industry')->checkbox(['label'=>'Cars and the automotive industry' ]) ?>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <?= $form->field($modelprofile, 'business_management_economics')->checkbox(['label'=>'Business, management, Economics' ]) ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <?= $form->field($modelprofile, 'biology')->checkbox(['label'=>'Biology' ]) ?>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <?= $form->field($modelprofile, 'accounting_audit_finance')->checkbox(['label'=>'Accounting, audit, Finance' ]) ?>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <?= $form->field($modelprofile, 'military_equipment')->checkbox(['label'=>'Military equipment' ]) ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <?= $form->field($modelprofile, 'geology')->checkbox(['label'=>'Geology' ]) ?>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <?= $form->field($modelprofile, 'geophysics')->checkbox(['label'=>'Geophysics' ]) ?>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <?= $form->field($modelprofile, 'informational_technologies_computer_engineering')->checkbox(['label'=>'Informational technologies and computer engineering' ]) ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <?= $form->field($modelprofile, 'internet_sites')->checkbox(['label'=>'Internet sites' ]) ?>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <?= $form->field($modelprofile, 'mechanical')->checkbox(['label'=>'Mechanical' ]) ?>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <?= $form->field($modelprofile, 'medicine')->checkbox(['label'=>'Medicine' ]) ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <?= $form->field($modelprofile, 'metallurgy')->checkbox(['label'=>'Metallurgy' ]) ?>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <?= $form->field($modelprofile, 'music_sound_processing_light')->checkbox(['label'=>'Music, sound processing, light' ]) ?>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <?= $form->field($modelprofile, 'oil_gas_production')->checkbox(['label'=>'Oil and gas production' ]) ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <?= $form->field($modelprofile, 'perfumes_cosmetics')->checkbox(['label'=>'Perfumes and cosmetics' ]) ?>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <?= $form->field($modelprofile, 'food_industry')->checkbox(['label'=>'Food industry' ]) ?>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <?= $form->field($modelprofile, 'political_science')->checkbox(['label'=>'Political science' ]) ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <?= $form->field($modelprofile, 'industrial_automation')->checkbox(['label'=>'Industrial automation' ]) ?>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <?= $form->field($modelprofile, 'industrial_civil_construction')->checkbox(['label'=>'Industrial and civil construction' ]) ?>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <?= $form->field($modelprofile, 'advertising_pr_marketing')->checkbox(['label'=>'Advertising, PR, marketing' ]) ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <?= $form->field($modelprofile, 'agricultural_machines_equipment_technologies')->checkbox(['label'=>'Agricultural machines, equipment and technologies' ]) ?>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <?= $form->field($modelprofile, 'insurance')->checkbox(['label'=>'Insurance' ]) ?>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <?= $form->field($modelprofile, 'shipbuilding')->checkbox(['label'=>'Shipbuilding' ]) ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <?= $form->field($modelprofile, 'telecommunications_communications')->checkbox(['label'=>'Telecommunications and communications' ]) ?>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <?= $form->field($modelprofile, 'tourism')->checkbox(['label'=>'Tourism' ]) ?>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <?= $form->field($modelprofile, 'pharmaceutical_industry')->checkbox(['label'=>'Pharmaceutical industry' ]) ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <?= $form->field($modelprofile, 'physics')->checkbox(['label'=>'Physics' ]) ?>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <?= $form->field($modelprofile, 'finance')->checkbox(['label'=>'Finance' ]) ?>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <?= $form->field($modelprofile, 'chemical_industry')->checkbox(['label'=>'Chemical industry' ]) ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <?= $form->field($modelprofile, 'literary_texts')->checkbox(['label'=>'Literary texts' ]) ?>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <?= $form->field($modelprofile, 'ecology')->checkbox(['label'=>'Ecology' ]) ?>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <?= $form->field($modelprofile, 'electronics_radio_electronics')->checkbox(['label'=>'Electronics and radio-electronics' ]) ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <?= $form->field($modelprofile, 'jurisprudence')->checkbox(['label'=>'Jurisprudence' ]) ?>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <?= $form->field($modelprofile, 'other')->checkbox(['label'=>'other' ]) ?>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div> 
                                                            <div class="form-group">
                                                            
                                                                <?= $form->field($modelprofile, 'price_translation_word_f')->textInput(['maxlength' => true, 'class' => 'form-control'])->label('Price Translation Word(USD)') ?>
                                                            
                                                            </div>
                                                            <div class="form-group">
                                                                <?= $form->field($modelprofile, 'price_translation_string_f')->textInput(['maxlength' => true, 'class' => 'form-control'])->label('Price Translation String(USD)') ?>
                                                            </div>
                                                            <div class="form-group">
                                                                <?= $form->field($modelprofile, 'price_proofreading_word_f')->textInput(['maxlength' => true, 'class' => 'form-control'])->label('Price Proofreading Word(USD)') ?>
                                                            </div>
                                                            <div class="form-group">
                                                                <?= $form->field($modelprofile, 'price_proofreading_string_f')->textInput(['maxlength' => true, 'class' => 'form-control'])->label('Price Proofreading String(USD)') ?>
                                                            </div>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?= Html::submitButton('Update Profile', ['class' => 'btn btn-default']) ?>
                                                        <?php ActiveForm::end(); ?>