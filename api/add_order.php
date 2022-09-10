<?php
include('./base.php');
$_POST['sets'] = serialize($_POST['sets']);
$_POST['no'] = date('Ymd') . str_pad($Order->math('MAX','id')+1,4,STR_PAD_LEFT);
$Order->save($_POST);
echo $_POST['no'];
?>