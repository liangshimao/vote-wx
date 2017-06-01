<?php
require_once 'config.php';
require_once 'curl.php';

function getToken()
{
    $url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=' . APP_ID . '&secret=' . APP_SECRET;
    if ($tokenResponse = httpGet($url)) {
        $token = $tokenResponse->access_token;
        return $token;
    }else{
        return false;
    }
}

/**
 * 说明:通过code换取网页授权access_token，expires_in，refresh_token，openid，scope 数据
 * 返回:属性值 或者 false
 */
function getInfoByCode($code,$property = '')
{
    $url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.APP_ID.'&secret='.APP_SECRET.'&code='.$code.'&grant_type=authorization_code';
    $result = httpGet($url);
    if(empty($property)){
        return $result;
    }
    if(property_exists($result,$property))
    {
        return $result->$property;
    }else
    {
        return false;
    }
}
//根据openid获取用户的基本信息
function getUserInfo($openId)
{
    $token= getToken();
    $url = 'https://api.weixin.qq.com/cgi-bin/user/info?access_token='.$token.'&openid='.$openId;
    return httpGet($url);
}

/**
 * 说明：根据web中获取的access_token 和 openid 获取用用户信息
 */
function getWebUserInfo($access_token,$openid){
    $url = 'https://api.weixin.qq.com/sns/userinfo?access_token='.$access_token.'&openid='.$openid.'&lang=zh_CN';
    return file_get_contents($url);
}