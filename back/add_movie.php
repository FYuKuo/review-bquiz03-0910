<div class="grey0 p-10 ">
    <div class="title rb ct my-5">新增院線片</div>

    <form action="./api/add_movie.php" method="post" enctype="multipart/form-data">
    <div class="d-f w-70 aut">
        <div class="w-20 d-f j-c">
            影片資料
        </div>
        <div class="w-80 grey1">
            <table class="w-100">
                <tr>
                    <td class="w-20">片名：</td>
                    <td><input type="text" name="name" id="name" style="width: 97%;"></td>
                </tr>
                <tr>
                    <td class="w-20">分級：</td>
                    <td>
                        <select name="type" id="type">
                            <option value="1">普遍級</option>
                            <option value="2">保護級</option>
                            <option value="3">輔導級</option>
                            <option value="4">限制級</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="w-20">片長：</td>
                    <td><input type="text" name="time" id="time" style="width: 97%;"></td>
                </tr>
                <tr>
                    <td class="w-20">上映日期：</td>
                    <td>
                        <select name="year" id="year">
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                        </select>
                        <select name="month" id="month">
                            <?php
                            for ($i=1; $i <= 12; $i++) { 
                            ?>
                            <option value="<?=$i?>"><?=$i?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <select name="day" id="day">
                            <?php
                            for ($i=1; $i <= 31; $i++) { 
                            ?>
                            <option value="<?=$i?>"><?=$i?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="w-20">發行商：</td>
                    <td><input type="text" name="pub" id="pub" style="width: 97%;"></td>
                </tr>
                <tr>
                    <td class="w-20">導演：</td>
                    <td><input type="text" name="dir" id="dir" style="width: 97%;"></td>
                </tr>
                <tr>
                    <td class="w-20">預告影片：</td>
                    <td><input type="file" name="movie" id="movie"><div class="red">檔案請使用英文檔名</div></td>
                </tr>
                <tr>
                    <td class="w-20">電影海報：</td>
                    <td><input type="file" name="img" id="img"><div class="red">檔案請使用英文檔名</div></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="d-f w-70 aut">
        <div class="w-20 d-f j-c">
            劇情簡介
        </div>
        <div class="w-80">
            <textarea name="intro" id="intro" cols="20" rows="2" style="width: 98%;"></textarea>
        </div>
    </div>
    <div class="ct my-5">
            <input type="submit" value="新增">
            <input type="reset" value="重置">
        </div>
    </form>
</div>