<?php
include('./base.php');
?>
<div class="book_bg ct">
    <div class="d-f f-w sets_group">
        <?php
        $ords = $Order->all(['movie'=>$_GET['movie'],'date'=>$_GET['date'],'session'=>$_GET['session']]);
        $set = [];
        foreach ($ords as $key => $ord) {
            $set = array_merge($set,unserialize($ord['sets']));
        }
        for ($i=0; $i < 20; $i++) { 
        if(in_array($i,$set)){
        ?>
            <div class="set d-f hasPeople">
                <div><?=floor($i/5)+1?>排<?=floor($i%5)+1?>號</div>
                <div style="text-align: right;">
                </div>
            </div>
        <?php
        }else{
        ?>
            <div class="set d-f">
                <div><?=floor($i/5)+1?>排<?=floor($i%5)+1?>號</div>
                <div style="text-align: right;">
                    <input type="checkbox" name="set[]" value="<?=$i?>">
                </div>
            </div>
        <?php
        }
        }
        ?>
    </div>
</div>

<div class="title rb ct p-10">
    <div>您選擇的電影是：<?=$Movie->find($_GET['movie'])['name']?></div>
    <div>您選擇的日期是：<?=$_GET['date']?> &nbsp; <?=$_GET['session']?></div>
    <div>您已經勾選 <span class="qt">0</span> 張票，最多可以購買四張票</div>
    <div>
        <input type="button" value="上一步" onclick="$('.book,.order').toggle(),$('.book').html('')">
        <input type="button" value="訂購" onclick="checkout()">
    </div>
</div>

<script>
    function checkout(){
        let movie = '<?=$_GET['movie'];?>';
        let date = '<?=$_GET['date'];?>';
        let session = '<?=$_GET['session'];?>';
        let qt = setArr.length;

        $.post('./api/add_order.php',{movie,date,session,qt,sets:setArr},(no)=>{
            location.href=`?do=result&no=${no}`
        })
    }
</script>