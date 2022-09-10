<?php
$id = ($_GET['id'])??0;
?>
<div class="title rb ct p-10">預告片清單</div>

<div class="order">

    <div class="grey0 p-10 ct w-60 aut my-10">
        <table class="w-100">
            <tr class="grey2">
                <td class="w-20">電影：</td>
                <td>
                    <select name="movie" id="movie" style="width: 100%;">
                        
                    </select>
                </td>
            </tr>
            <tr class="grey3">
                <td>日期：</td>
                <td>
                    <select name="date" id="date" style="width: 100%;">
        
                    </select>
                </td>
            </tr>
            <tr class="grey2">
                <td>場次：</td>
                <td>
                    <select name="session" id="session" style="width: 100%;">
        
                    </select>
                
                </td>
            </tr>
            <tr class="grey3 ct">
                <td colspan="2">
                    <input type="button" value="確定" onclick="book()">
                    <input type="button" value="重置" onclick="get_movie()">
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
            let movie = $('#movie').val();
            get_date(movie);
        })
    }

    function get_date(movie){
        $.get('./api/get_date.php',{movie},(res)=>{
            $('#date').html(res);
            let date = $('#date').val();
            get_session(movie,date);
        })

    }
    function get_session(movie,date){
        $.get('./api/get_session.php',{movie,date},(res)=>{
            $('#session').html(res);
        })
    }

    $('#movie').on('change',function(){
        let movie = $('#movie').val();
        get_date(movie);
    })
    $('#date').on('change',function(){
        let movie = $('#movie').val();
        let date = $(this).val();
        get_session(movie,date);
    })


    function book(){
        $('.order').hide();
        $('.book').show();

        let movie = $('#movie').val();
        let date = $('#date').val();
        let session = $('#session').val();

        $.get('./api/get_book.php',{movie,date,session},(res)=>{
        $('.book').html(res);
        setEvent()
        })
    }
    let setArr = new Array();

    function setEvent(){

        $('input[type=checkbox]').on('change',function(){

            if($(this).prop('checked') == true){

                if(setArr.length < 4){
                    setArr.push($(this).val());
                    $(this).parent().parent().addClass('hasPeople');
                }else{
                    alert('最多僅能購買四張票');
                    $(this).prop('checked',false);
                }

            }else{
                setArr.splice(setArr.indexOf($(this).val()),1);
                $(this).parent().parent().removeClass('hasPeople');
            }

            // console.log(setArr);
            $('.qt').text(setArr.length);
        })

    }
</script>