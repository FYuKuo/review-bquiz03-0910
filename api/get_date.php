<?php
include('./base.php');
$movie = $Movie->find($_GET['movie']);
$days = 2-((strtotime($today)-strtotime($movie['date']))/60/60/24);

for ($i=0; $i <= $days ; $i++) { 
    $date = date('Y-m-d',strtotime("+$i days"));
    $dateFront = date('m月d日 l',strtotime("+$i days"));
    echo "<option value='$date'>$dateFront </option>";
}
?>