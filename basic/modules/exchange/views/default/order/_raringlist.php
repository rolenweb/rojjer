<?php

if ($modelorder->level == 0) {
	echo "All";
}
if ($modelorder->level == 1) {
?>
<i class="fa fa-certificate goldstar fa-2x"></i>
<?php
}
if ($modelorder->level == 2) {
?>
<i class="fa fa-certificate goldstar fa-2x"></i><i class="fa fa-certificate goldstar fa-2x"></i>
<?php
}
if ($modelorder->level == 3) {
?>
<i class="fa fa-certificate goldstar fa-2x"></i><i class="fa fa-certificate goldstar fa-2x"></i><i class="fa fa-certificate goldstar fa-2x"></i>
<?php
}
if ($modelorder->level == 4) {
?>
<i class="fa fa-certificate goldstar fa-2x"></i><i class="fa fa-certificate goldstar fa-2x"></i><i class="fa fa-certificate goldstar fa-2x"></i><i class="fa fa-certificate goldstar fa-2x"></i>
<?php
}
if ($modelorder->level == 5) {
?>
<i class="fa fa-certificate goldstar fa-2x"></i><i class="fa fa-certificate goldstar fa-2x"></i><i class="fa fa-certificate goldstar fa-2x"></i><i class="fa fa-certificate goldstar fa-2x"></i><i class="fa fa-certificate goldstar fa-2x"></i>
<?php
}
?>
