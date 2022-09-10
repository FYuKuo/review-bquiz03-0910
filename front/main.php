<div class="half" style="vertical-align:top;">
    <h1>預告片介紹</h1>
    <div class="rb tab" style="width:95%;">
        <div class="poster">
            <div class="lists p-r d-f j-c" style="height: 70%;">
            <?php
            $posters = $Poster->all(['sh'=>1]);
            foreach ($posters as $key => $poster) {
            ?>
                <div class="poster_item p-a" data-ani="<?=$poster['ani']?>">
                    <img src="./img/<?=$poster['img']?>" alt="" width="220px">
                    <div class="ct my-5"><?=$poster['name']?></div>
                </div>
            <?php
            }
            ?>
            </div>
            <div class="controls d-f a-c" style="height: 30%;">
                <div class="preBtn cup" onclick="move('left')"></div>
                <div class="controls_nav overh p-r d-f a-c">
                    <div class="icons p-a d-f a-c">
                    <?php
                    foreach ($posters as $key => $poster) {
                    ?>
                    <div class="icon_item p-10 d-f a-c" onclick="ani(<?=$key?>)">
                        <img src="./img/<?=$poster['img']?>" alt="" height="80px">
                    </div>
                    <?php
                    }
                    ?>
                    </div>
                </div>
                <div class="nextBtn cup" onclick="move('right')"></div>
            </div>
        </div>
    </div>
</div>
<div class="half">
    <h1>院線片清單</h1>
    <div class="rb tab" style="width:95%;">
    <div class="d-f f-w">
        <?php
        $endDay = date("Y-m-d",strtotime("-2 days"));
        $num = $Movie->math('COUNT','id'," WHERE `sh` = 1 AND `date` BETWEEN '$endDay' AND '$today' ");
        $pages = ceil($num/4);
        $page = ($_GET['page'])??1;
        if($page <= 0 || $page > $pages){
            $page = 0;
        }
        $start = ($page-1)*4;
        $limitSql = " LIMIT $start,4 ";
        $movies = $Movie->all(" WHERE `sh` = 1 AND `date` BETWEEN '$endDay' AND '$today' ORDER BY `rank` ".$limitSql);
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

<script>
    $('.poster_item').eq(0).show();


    let aniEvent = setInterval(()=>{
        ani();
    },3000);


    function ani(num){
        let now = $('.poster_item:visible');
        let next ;

        if(num == undefined){
            if($(now).next().length == 0){
                next = $('.poster_item').eq(0);
            }else{
                next = $(now).next();
            }
        }else{
            next = $('.poster_item').eq(num);
        }

        let ani = $(next).data('ani');

        switch (ani) {
            case 1:
                $(now).fadeOut(1500,()=>{
                    $(next).fadeIn(1500);
                })
            break;

            case 2:
                $(now).slideUp(1500,()=>{
                    $(next).slideDown(1500);
                })
            break;

            case 3:
                $(now).hide(1500,()=>{
                    $(next).show(1500);
                })
            break;
        
        }
    }

    let page = 0;
    function move(type){
        let nowLeft = $('.icons').css('left').split('px')[0];
        let num = <?=count($posters);?>;
        let pages = num-4;
        let move;

        switch (type) {
            case 'left':
                if(page >= 0 && page < pages){
                    page++;
                    move = parseInt(nowLeft)-90;
                }
            break;
            case 'right':
                if(page > 0 ){
                    page--;
                    move = parseInt(nowLeft)+90;
                }
            break;
        }

        console.log('page',page);
        console.log('pages',pages);
        $('.icons').animate({left:move})
    }


    $('.icon_item').hover(function(){
        clearInterval(aniEvent);
    },function(){
    aniEvent = setInterval(()=>{
        ani();
    },3000)
    })
</script>