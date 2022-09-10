<div class="grey0 p-10 ct">
    <div class="title rb">預告片清單</div>
    <div class="d-f my-5">
        <div class="grey1 w-25 mx-2">
            預告片海報
        </div>
        <div class="grey1 w-25 mx-2">
            預告片片名
        </div>
        <div class="grey1 w-25 mx-2">
            預告片排序
        </div>
        <div class="grey1 w-25 mx-2">
            操作
        </div>
    </div>
    <form action="./api/edit_poster.php" method="post">
        <div class="overa poster_list">
            <?php
            $rows = $Poster->all(" ORDER BY `rank`");
            foreach ($rows as $key => $row) {
                $pre = (isset($rows[$key-1]['id']))?$rows[$key-1]['id']:$row['id'];
                $next = (isset($rows[$key+1]['id']))?$rows[$key+1]['id']:$row['id'];
            ?>
            <div class="d-f my-5 white p-10 a-c">
                <div class=" w-25 mx-2">
                    <img src="./img/<?=$row['img']?>" alt="" style="height: 80px;">
                </div>
                <div class=" w-25 mx-2">
                    <input type="text" name="name[]" class="name" value="<?=$row['name']?>">
                </div>
                <div class=" w-25 mx-2">
                    <input type="button" value="往上" onclick="rank(<?=$row['id']?>,<?=$pre?>,'<?=$do?>')">
                    <input type="button" value="往下" onclick="rank(<?=$row['id']?>,<?=$next?>,'<?=$do?>')">
                </div>
                <div class=" w-25 mx-2">
                    
                    <input type="hidden" name="id[]"  value="<?=$row['id']?>">
                    <input type="checkbox" name="sh[]" class="sh" <?=($row['sh'] == 1)?'checked':''?> value="<?=$row['id']?>">顯示
                    <input type="checkbox" name="del[]" class="sh" value="<?=$row['id']?>">刪除
                    <select name="ani[]" class="ani">
                        <option value="1" <?=($row['ani'] == 1)?'selected':''?>>淡入淡出</option>
                        <option value="2" <?=($row['ani'] == 2)?'selected':''?>>滑入滑出</option>
                        <option value="3" <?=($row['ani'] == 3)?'selected':''?>>縮放</option>
                    </select>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
        <div class="ct my-5">
            <input type="submit" value="修改">
            <input type="reset" value="重置">
        </div>
    </form>
</div>

<hr>

<div class="grey0 p-10 ct">
    <div class="title rb">新增預告片海報</div>
    <form action="./api/add_poster.php" method="post" enctype="multipart/form-data">
        <div class="d-f a-c my-10">
            <div class="w-50">
                預告片海報： <input type="file" name="img" id="img">
            </div>
            <div class="w-50">
                預告片海報： <input type="text" name="name" id="name">
            </div>
        </div>
        <div class="ct">
            <input type="submit" value="新增">
            <input type="reset" value="重置">
        </div>
    </form>
</div>