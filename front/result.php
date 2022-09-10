<?php
$order = $Order->find(['no'=>$_GET['no']]);
$sets = unserialize($order['sets']);
sort($sets);
?>

<div class="grey0 w-60 aut p-10 my-10">
    <table class="w-100">
        <tr class="grey2">
            <td colspan="2">
                感謝您的訂購，您的訂單編號是：<?=$_GET['no']?>
            </td>
        </tr>
        <tr>
            <td class="grey3 w-30">電影名稱：</td>
            <td class="grey1"><?=$Movie->find($order['movie'])['name']?></td>
        </tr>
        <tr>
            <td class="grey2">日期：</td>
            <td class="grey1"><?=$order['date']?></td>
        </tr>
        <tr>
            <td class="grey3">場次時間：</td>
            <td class="grey1"><?=$order['session']?></td>
        </tr>
        <tr class="grey1">
            <td colspan="2">
                座位：
                <?php
                foreach ($sets as $key => $set) {
                ?>
                <div><?=floor($set/5)+1?>排<?=floor($set%5)+1?>號</div>
                <?php
                }
                ?>
                共<?=$order['qt']?>張電影票
            </td>
        </tr>
        <tr class="grey2 ct">
            <td colspan="2">
                <input type="button" value="確認" onclick="location.href='./index.php'">
            </td>
        </tr>
    </table>
</div>