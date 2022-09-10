<?php
include('./base.php');
if(isset($_POST['id'])){
    foreach ($_POST['id'] as $key => $id) {
        if(isset($_POST['del']) && in_array($id,$_POST['del'])){
            $Poster->del($id);
            // echo $id;
        }else{
            $data = $Poster->find($id);

            $data['sh'] = (isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
            $data['ani'] = $_POST['ani'][$key];
            $data['name'] = $_POST['name'][$key];

            // dd($data);
            $Poster->save($data);
        }
    }
}
to('../back.php?do=poster');
?>