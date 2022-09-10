<?php
include('./base.php');
$data = [];
if(isset($_FILES['img']['tmp_name']) && $_FILES['img']['error'] == 0){
    $data['img'] = $_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'],'../img/'.$_FILES['img']['name']);

    $data['name']  = $_POST['name'];
    $data['ani']  = rand(1,3);
    $data['rank'] = $Poster->math('MAX','rank')+1;
    $data['sh'] = 1;

    $Poster->save($data);
}
to('../back.php?do=poster');
?>