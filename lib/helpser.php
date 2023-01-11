<?php defined('SITE_TITLE') OR die('premision denied');

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