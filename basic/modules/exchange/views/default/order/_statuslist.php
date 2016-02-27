<?php
if ($modelorder->status == -1) {
?>
									Stop
<?php
}
if ($modelorder->status == 0) {
?>
									New
<?php
}
if ($modelorder->status == 1) {
?>
									Moderation
<?php
}
if ($modelorder->status == 2) {
?>
									Edit
<?php
}
if ($modelorder->status == 3) {
?>
									Active
<?php
}
if ($modelorder->status == 4) {
?>
									In working
<?php
}
if ($modelorder->status == 5) {
?>
									Сheck Administrator
<?php
}
if ($modelorder->status == 6) {
?>
									Check
<?php
}
if ($modelorder->status == 7) {
?>
									Revision
<?php
}
if ($modelorder->status == 8) {
?>
									Paid
<?php
}
?>