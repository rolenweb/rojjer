<?php
use yii\helpers\Html;
if ($modelorder->category == 0) {
	if ($modelorder->othercategory !== NULL) {
		echo Html::encode($modelorder->othercategory);
	}
	else{
		echo "Other";
	}
	
}
if ($modelorder->category == 1) {
	echo "Architecture/Building";
}
if ($modelorder->category == 2) {
	echo "Business/Economics";
}
if ($modelorder->category == 3) {
	echo "Design";
}
if ($modelorder->category == 4) {
	echo "Engineering/Shipbuilding/Aviation";
}
if ($modelorder->category == 5) {
	echo "Fashion";
}
if ($modelorder->category == 6) {
	echo "Food";
}
if ($modelorder->category == 7) {
	echo "Industry";
}
if ($modelorder->category == 8) {
	echo "IT & Softwar";
}
if ($modelorder->category == 9) {
	echo "Legal";
}
if ($modelorder->category == 10) {
	echo "Literature (Belles-lettres/ Scientific)";
}
if ($modelorder->category == 11) {
	echo "Medicine/Pharmaceuticals";
}
if ($modelorder->category == 12) {
	echo "PR/Marketing/Advertisement";
}
if ($modelorder->category == 13) {
	echo "Social Media";
}
if ($modelorder->category == 14) {
	echo "Supply";
}
if ($modelorder->category == 15) {
	echo "Travel/Tourism";
}
if ($modelorder->category == 16) {
	echo "Personal documents";
}
if ($modelorder->category == 17) {
	echo "Websites";
}

?>