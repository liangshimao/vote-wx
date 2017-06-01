<?php
/**
 * 封装curl方法
 */
function httpGet($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $response = curl_exec($ch);
    curl_close($ch);
    if( !$response )
        return false;
    return json_decode($response);
}

function httpPost($url, $postData = null)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);

    if( !is_null($postData) )
    {
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    }

    $response = curl_exec($ch);
    curl_close($ch);
    if( !$response )
        return false;
    return json_decode($response);
}