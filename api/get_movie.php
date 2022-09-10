<?php
include('./base.php');
$endDay = date("Y-m-d",strtotime("-2 days"));

$movies = $Movie->all(" WHERE `sh` = 1 AND `date` BETWEEN '$endDay' AND '$today' ORDER BY `rank`");

foreach ($movies as $key => $movie) {
    $selected = ($movie['id'] == $_GET['id'])?'selected':'';
    echo "<option value='{$movie['id']}' $selected>{$movie['name']}</option>";
}

?>