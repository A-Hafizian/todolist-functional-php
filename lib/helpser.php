<?php 

function site_url($uri =null)
{
    return BASE_URL.$uri;
}

function isAjaxResquest()
{
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {
        return true;
    }else 
    return false;
}
function dieMassage($msg)
{
    echo $msg;
    die();
}