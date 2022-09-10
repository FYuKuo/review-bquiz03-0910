<?php
$id = ($_GET['id'])??0;
?>
<div class="title rb">預告片清單</div>

<div class="order">

    <div class="grey0 p-10 ct w-60 aut">
        <table class="w-100">
            <tr class="grey2">
                <td class="w-20">電影：</td>
                <td>
                    <select name="movie" id="movie" style="width: 98%;">
                        
                    </select>
                </td>
            </tr>
            <tr class="grey3">
                <td>日期：</td>
                <td>
                    <select name="date" id="date" style="width: 98%;">
        
                    </select>
                </td>
            </tr>
            <tr class="grey2">
                <td>場次：</td>
                <td>
                    <select name="session" id="session" style="width: 98%;">
        
                    </select>
                
                </td>
            </tr>
            <tr class="grey3 ct">
                <td colspan="2">
                    <input type="button" value="確定" onclick="">
                    <input type="button" value="重置" onclick="">
                </td>
            </tr>
        </table>
    </div>
</div>

<div class="book" style="display: none;">
    123
</div>

<script>
    get_movie()

    function get_movie(){

        let id = <?=$id;?>; 

        $.get('./api/get_movie.php',{id},(res)=>{
            $('#movie').html(res);
        })
    }
    // function get_date(){

    // }
    // function get_session(){

    // }
</script>