<?php
include('./base.php');
$DB = new DB($_POST['table']);
$now = $Poster->find($_POST['id']);
$ch = $Poster->find($_POST['chId']);

$tmp = $now['rank'];
$now['rank'] = $ch['rank'];
$ch['rank'] = $tmp;

$Poster->save($now);
$Poster->save($ch);
?>