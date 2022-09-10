<div class="half" style="vertical-align:top;">
    <h1>預告片介紹</h1>
    <div class="rb tab" style="width:95%;">
        <div id="abgne-block-20111227">
            <ul class="lists">
            </ul>
            <ul class="controls">
            </ul>
        </div>
    </div>
</div>
<div class="half">
    <h1>院線片清單</h1>
    <div class="rb tab" style="width:95%;">
    <div class="d-f f-w">
        <?php
        $num = $Movie->math('COUNT','id',['sh'=>1]);
        $pages = ceil($num/4);
        $page = ($_GET['page'])??1;
        if($page <= 0 || $page > $pages){
            $page = 0;
        }
        $start = ($page-1)*4;
        $limitSql = " LIMIT $start,4 ";
        $movies = $Movie->all(['sh'=>1]," ORDER BY `rank` ".$limitSql);
        foreach ($movies as $key => $movie) {
            switch ($movie['type']) {
                case 1:
                    $type = '普遍級';
                break;
                case 2:
                    $type = '保護級';
                break;
                case 3:
                    $type = '輔導級';
                break;
                case 4:
                    $type = '限制級';
                break;
                
            }
        ?>
        
            <div class="w-45 p-10 my-10 d-f f-w ">
                <div class="w-50">
                    <img src="./img/<?=$movie['img']?>" alt="" style="width: 80px;">
                </div>
                <div class="w-50 fs-12">
                    <div class="my-5"><?=$movie['name']?></div>
                    <div class="my-5">
                    分級：<img src="./icon/03C0<?=$movie['type']?>.png" alt="" style="width: 15px;"> <?=$type?>
                    </div>
                    <div class="my-5">
                        上映日期：<?=$movie['date']?>
                    </div>
                </div>
                <div class="w-100 ct my-5">
                    <input type="button" value="劇情簡介" onclick="location.href='?do=intro&id=<?=$movie['id']?>'">
                    <input type="button" value="線上訂片" onclick="location.href='?do=order&id=<?=$movie['id']?>'">
                </div>
            </div>
        <?php
        }
        ?>
    </div>    

        <div class="ct page">
            <?php
            if($page > 1){
            ?>
            <a href="?page=<?=$page-1?>">&lt;</a>
            <?php
            }
            for ($i=1; $i <= $pages ; $i++) { 
            ?>
            <a href="?page=<?=$i?>" class="<?=($page == $i)?'nowPage':''?>"><?=$i?></a>
            <?php
            }
            if($page < $pages){
            ?>
            <a href="?page=<?=$page+1?>">&gt;</a>
            <?php
            }
            ?>
        </div>
    </div>
</div>