<?php
for ($i=1; $i < 10; $i++) { 
    $type = rand(1,4);
    $date = ['2022-09-08','2022-09-08','2022-09-09','2022-09-10','2022-09-11'];
    echo "INSERT INTO `movie`(`name`, `type`, `time`, `date`, `pub`, `dir`, `movie`, `img`, `intro`, `rank`, `sh`) VALUES ('院線片$i','$type','90','{$date[$type]}','院線片$i 發行商','院線片$i 導演','03B0{$i}v.mp4','03B0$i.png','院線片$i 簡介','$i','1');";
}
?>