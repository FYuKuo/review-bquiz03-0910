function del(id,table)
{
    $.post('./api/del.php',{id,table},()=>{
        location.reload();
    })
}

function sh(id,sh,table)
{
    $.post('./api/sh.php',{id,sh,table},()=>{
        location.reload();
    })
}