<?php
include('./base.php');
if($_GET['acc'] == 'admin' && $_GET['pw'] == '1234'){
    $_SESSION['admin'] = 1;
    echo 1;
}else{
    echo 0;
}

?>