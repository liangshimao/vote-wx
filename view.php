<?php
require 'curl.php';
require 'tools.php';

$code = isset($_GET['code']) ? $_GET['code'] : '';
if (!empty($code)) {
    $result = getInfoByCode($code);
    $user_info = $_GET['wx_user_info'];
    if(!empty($result) && empty($user_info)){
        $user_info = getWebUserInfo($result->access_token,$result->openid);
        var_dump($user_info);
    }
}

echo 'haha';