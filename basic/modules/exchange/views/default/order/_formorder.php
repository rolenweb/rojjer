<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\jui\DatePicker;
use kartik\rating\StarRating;
use letyii\tinymce\Tinymce;

$this->registerJsFile(Yii::$app->request->baseUrl.'/exchange/js/custom.js',['depends' => [\yii\web\JqueryAsset::className()]]);
?>
<?php 
if (!\Yii::$app->user->isGuest && Yii::$app->user->identity->type == 'client') {
    
?>

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="row">

        <div class="col-sm-8">
            <div class="form-group">
                <label class="control-label">Title <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Please describe what you need in as few words as possible."></i></label>
                <?= $form->field($modelneworder, 'title')->textInput(['maxlength' => true, 'class' => 'form-control'])->label(false) ?>
            </div>        
            <div class="form-group">
                <label class="control-label">Description <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Please describe your order in detail."></i></label>
                <?= $form->field($modelneworder, 'text')->textarea(['maxlength' => true, 'rows' => 6])->label(false)->widget(letyii\tinymce\Tinymce::className(),[
                                                        'options' => ['rows' => 16],
                                                        'configs' => [ 
                                                            'plugins' => 'preview table code emoticons hr insertdatetime searchreplace textcolor visualblocks wordcount',
                                                            'convert_urls' => false,
                                                            'image_advtab' => true,
                                                            
                                                        ],
                                                    ]) ?>
            </div>
            <div class="form-group">
            <label class="control-label">Description only for translator <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="This information is only avalaible for selected translators."></i></label>
                <?= $form->field($modelneworder, 'texthiden')->textarea(['maxlength' => true, 'rows' => 6])->label(false)->widget(letyii\tinymce\Tinymce::className(),[
                                                        'options' => ['rows' => 10],
                                                        'configs' => [ 
                                                            'plugins' => 'preview table code emoticons hr insertdatetime searchreplace textcolor visualblocks wordcount',
                                                            'convert_urls' => false,
                                                            'image_advtab' => true,
                                                            
                                                        ],
                                                    ]) ?>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label class="control-label">Type</label>
                 <?= $form->field($modelneworder, 'type')->dropDownList([ 0 => 'Translation', 1 => 'Proofreading'])->label(false) ?>    
            </div>
            <div class="form-group">
                <label class="control-label">Source Language <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Please indicate what is the language of your order."></i></label>
                 <?= $form->field($modelneworder, 'lang_from')->dropDownList([ 
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
                 
                 ], ['prompt' => ''])->label(false) ?>    
            </div>
            <div class="form-group">
            <label class="control-label">Target Language <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Please choose the language to translate your order"></i></label>
                 <?= $form->field($modelneworder, 'lang_to')->dropDownList([ 
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

                    ], ['prompt' => ''])->label(false) ?>    
            </div>
            <div class="form-group">
            <label class="control-label">Order subject area <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Please select the subject area of your order. In case your field is not mentioned please choose «other» and indicate your order specialization. Order subject area is important for selection of translators with experience of a particular specializiation."></i></label>
                 <?= $form->field($modelneworder, 'category')->dropDownList([ 
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
                    16 => 'Personal documents',
                    12 => 'PR/Marketing/Advertisement',
                    13 => 'Social Media',
                    14 => 'Supply',
                    15 => 'Travel/Tourism',
                    17 => 'Websites',
                    0 => 'Other',
                    ], ['prompt' => ''])->label(false) ?>    
            </div>
            <div id='catdiv'>
                <div class="form-group">
                    <label class="control-label">Order subject area <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Order subject area"></i></label>
                    <?= $form->field($modelneworder, 'othercategory')->textInput(['maxlength' => true, 'class' => 'form-control'])->label(false) ?>
                </div>        
            </div>
            <div class="form-group">
            <label class="control-label">Deadline <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="When should the order be complete?"></i></label>
                <?= $form->field($modelneworder,'srok')->widget(DatePicker::className(),[
                    'options' => ['class' => 'form-control'],
                    
                    ])->label(false) ?>

            </div>  
            <hr>
            <div class="form-group">
                <?= $form->field($modelneworder, 'monitor')->checkbox(['label'=>'Online monitoring '.Html::tag('i','',['class' => 'fa fa-question-circle', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'For online order tracking please select  «Online monitoring».  Translators will edit online the done work step-by-step. You have the opportunity to review, monitor, make changes or to stop the order.']) ]) ?>
            </div>
            <div class="form-group">
                <?= $form->field($modelneworder, 'assistant')->checkbox(['label'=>'Project assistant '.Html::tag('i','',['class' => 'fa fa-question-circle', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'RoJJoR team takes care of your order personaly. We review your proposal saving you time vetting translators. Let us find you the right translator for the order.']) ]) ?>
            </div>
            
            
            
            <hr>
            <div class="well well-sm"><b>Please describe your translator:</b></div>
            
            <div class="form-group">
                <label class="control-label">Rating <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Tooltip on top"></i></label>
                 <?= $form->field($modelneworder, 'level')->widget(StarRating::classname(), [
                    'pluginOptions' => [
                        'size'=>'xs',
                        //'showCaption' => false,
                        'step' => 1,
                        'max' => 4,
                        'stars' => 4,
                        'symbol' => '*',
                        'clearButtonTitle' => 'irrelevant',
                        'clearButton' => Html::tag('button',' irrelevant',['class' => 'btn btn-default btn-xs']),
                        'starCaptions' => [
                            1 => 'Extremely Poor',
                            2 => 'Very Poor',
                            3 => 'Poor',
                            4 => 'Ok',
                            5 => 'Good',
                            
                        ],
                    ]
                ])->label(false) ?>    
            </div>

            <div class="form-group">
            <label class="control-label">Country <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Please select the residence of your translator"></i></label>
                 <?= $form->field($modelneworder, 'country2')->dropDownList([ 
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
                    
                    ],['multiple' => true])->label(false) ?>    
            </div>
            <hr>
            <div class="form-group">
                <label class="control-label">Price(<i class="fa fa-usd"></i>) <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="What budget do you have in mind?"></i></label>
                <?= $form->field($modelneworder, 'cost')->textInput(['maxlength' => true, 'class' => 'form-control'])->label(false) ?>
            </div>
            <hr>
            <div class="form-group">
                <label class="control-label">File <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Please add the document for working."></i></label>
                <?= $form->field($modelneworder, 'file')->fileInput()->label(false) ?>
                <p class="help-block"><i class="fa fa-warning"></i> Supported formats: JPG, PNG, PDF, DOC, DOCX</p>
            </div>
        </div>
    </div>
    
    
    <?= $form->field($modelneworder, 'id_user')->textInput(['value' => Yii::$app->user->identity->id, 'type' =>'hidden'])->label(false) ?>                                                
<?php
    }
?>
    <?= Html::submitButton('Send', ['class' => 'btn btn-default']) ?>
    <?php ActiveForm::end(); ?>