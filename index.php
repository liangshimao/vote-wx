<?php

$echoStr = $_GET['echostr'];
$signature = $_GET['signature'];
$timestamp = $_GET['timestamp'];
$nonce = $_GET['nonce'];

$token = "hugain";
$tmpArr = array($token, $timestamp, $nonce);

sort($tmpArr, SORT_STRING);
$tmpStr = implode( $tmpArr );
$tmpStr = sha1( $tmpStr );

if( $tmpStr == $signature ){
    echo $echoStr;
    exit;
}else{
    return false;
}