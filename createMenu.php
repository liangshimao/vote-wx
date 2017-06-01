<?php
/**
 * 自定义创建菜单
 */

require_once 'tools.php';

$content = '{
            "button": [
                {
                    "name": "APP下载",
                    "sub_button": [
                        {
                            "name": "魔售",
                            "type":"view",
                            "url":"http://app.huijinmoshou.com/hugain/moshou"
                        },
                        {
                            "name": "魔掌柜",
                            "type":"view",
                            "url":"http://app.huijinmoshou.com/hugain/qiye"
                        },
                        {
                            "name": "魔确客",
                            "type":"view",
                            "url":"http://app.huijinmoshou.com/hugain/queke"
                        }
                    ]
                },
                {
                    "name": "在线问答",
                    "type":"view",
                    "url":"https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxd67d04119c2ebbe2&redirect_uri=http://wx.liangshimao.cn/view.php&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect"
                }
        ]
    }';


$token = getToken();
$url = 'https://api.weixin.qq.com/cgi-bin/menu/create?access_token='.$token;
$data = httpPost($url,$content);
var_dump($data);exit;



