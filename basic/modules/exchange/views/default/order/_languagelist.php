<?php
use yii\helpers\Html;

$applang = [	 1 => 'Afrikaans',
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
                 ];
foreach ($applang as $key => $value) {
	if ($modelorder->lang_from == $key) {
		echo $value;
		break;

	}                 	
}                 


?>
&nbsp;<i class="fa fa-arrow-right"></i>&nbsp;
<?php
foreach ($applang as $key => $value) {
	if ($modelorder->lang_to == $key) {
		echo $value;
		break;

	}                 	
}                 
?>