<?php
$orders = $Order->all();
$movies = [];
foreach ($orders as $key => $order) {
    if(!in_array($order['movie'],$movies)){
        $movies[] = $order['movie'];
    }
}
?>
<div class="grey0 p-10">
    <div class="title rb ct">預告片清單</div>
    <div class="my-5">
        快速刪除：<input type="radio" name="fastDel" value="date" class="fastDel" checked>依日期<input type="text" name="date" id="date">
        <input type="radio" name="fastDel" class="fastDel" value="movie">依電影
        <select name="movie" id="movie">
            <?php
            foreach ($movies as $key => $movie) {
            ?>
            <option value="<?=$movie?>"><?=$Movie->find($movie)['name']?></option>
            <?php
            }
            ?>
        </select>
        <input type="button" value="刪除" onclick="fastDel()">
    </div>

    <div class="d-f ct my-5">
        <div class="mx-2 grey1 w-15">訂單編號</div>
        <div class="mx-2 grey1 w-15">電影名稱</div>
        <div class="mx-2 grey1 w-15">日期</div>
        <div class="mx-2 grey1 w-15">場次時間</div>
        <div class="mx-2 grey1 w-15">訂購數量</div>
        <div class="mx-2 grey1 w-15">訂購位置</div>
        <div class="mx-2 grey1 w-15">操作</div>
    </div>
    <div class="order_list overa">
        <?php
        foreach ($orders as $key => $order) {
            $sets = unserialize($order['sets']);
            rsort($sets);
        ?>
        <div class="white d-f ct my-5 a-c p-10">
        <div class="mx-2 w-15"><?=$order['no']?></div>
        <div class="mx-2 w-15"><?=$Movie->find($order['movie'])['name']?></div>
        <div class="mx-2 w-15"><?=$order['date']?></div>
        <div class="mx-2 w-15"><?=$order['session']?></div>
        <div class="mx-2 w-15"><?=$order['qt']?></div>
        <div class="mx-2 w-15">
        <?php
                foreach ($sets as $key => $set) {
                ?>
                <div><?=floor($set/5)+1?>排<?=floor($set%5)+1?>號</div>
                <?php
                }
                ?>
        </div>
        <div class="mx-2 w-15">
        <input type="button" value="刪除" onclick="del(<?=$order['id']?>,'<?=$do?>')">
        </div>
        </div>
        <?php
        }
        ?>
    </div>
</div>    


<script>
    function fastDel(){
        let type = $('.fastDel:checked').val();
        let val = $(`#${type}`).val();
        let text = '';

        switch (type) {
        case 'date':
            text = $('#date').val()
        break;
        case 'movie':
            text = $('#movie').children('option:selected').text();
        break;
        }

        let anser = confirm(`您確定要刪除 ${text} 的全部資料嗎?`);

        if(anser){
            $.post('./api/fastDel.php',{type,val},()=>{
                location.reload();
            })
        }
    }
</script>