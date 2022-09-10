<?php
include('./base.php');
$DB = new DB($_POST['table']);
$now = $DB->find($_POST['id']);
$ch = $DB->find($_POST['chId']);

$tmp = $now['rank'];
$now['rank'] = $ch['rank'];
$ch['rank'] = $tmp;

$DB->save($now);
$DB->save($ch);
?>