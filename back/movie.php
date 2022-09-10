<div class="grey0 p-10">
    <div class="my-5">
        <input type="button" value="新增電影" onclick="location.href='?do=add_movie'">
    </div>

    <hr>

    <div class="movie_list p-10 overa">
        <?php
            $rows = $Movie->all(" ORDER BY `rank`");
            foreach ($rows as $key => $row) {
            $pre = (isset($rows[$key-1]['id']))?$rows[$key-1]['id']:$row['id'];
            $next = (isset($rows[$key+1]['id']))?$rows[$key+1]['id']:$row['id'];
        ?>
        <div class="d-f my-5 white p-10 a-c">
            <div class="w-20 d-f a-c j-c">
                <img src="./img/<?=$row['img']?>" alt="" style="height: 100px;">
            </div>
            <div class="w-20 d-f a-c j-c">
                分級：<img src="./icon/03C0<?=$row['type']?>.png" alt="">
            </div>
            <div class="w-60">
                <div class="d-f">
                    <div class="w-33">片名：<?=$row['name']?></div>
                    <div class="w-33">片長：<?=$row['time']?></div>
                    <div class="w-33">上映日期：<?=$row['date']?></div>
                </div>
                <div style="text-align: right;" class="my-10">
                <?php
                if($row['sh'] == 1){
                ?>
                    <input type="button" value="顯示" onclick="sh(<?=$row['id']?>,0,'<?=$do?>')">
                    <?php
                }else{
                    ?>
                    <input type="button" value="隱藏" onclick="sh(<?=$row['id']?>,1,'<?=$do?>')">
                <?php
                }
                ?>
                    <input type="button" value="往上" onclick="rank(<?=$row['id']?>,<?=$pre?>,'<?=$do?>')">
                    <input type="button" value="往下" onclick="rank(<?=$row['id']?>,<?=$next?>,'<?=$do?>')">
                    <input type="button" value="編輯" onclick="location.href='?do=edit_movie&id=<?=$row['id']?>'">
                    <input type="button" value="刪除" onclick="del(<?=$row['id']?>,'<?=$do?>')">
                </div>
                <div>
                    劇情介紹：<?=$row['intro']?>
                </div>
            </div>
        </div>
        <?php
            }   
        ?>
    </div>
</div>