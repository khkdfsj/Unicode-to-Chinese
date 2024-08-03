<?php
header("Content-Type:text/html; charset=utf-8");

$unicodeString = "\u98df\u54c1\u8d28\u91cf\u4e0e\u5b89\u5168";//unicode编码的字符串
$chineseString = unicode_decode($unicodeString);//转义成中文后的字符串

echo $chineseString; // 输出: 食品质量与安全

function unicode_decode($str)
{
    $json = '{"str": "' . str_replace(['\\u', '\\\\'], ['\\u', '\\'], $str) . '"}';
    $data = json_decode($json, true);
    if (json_last_error() === JSON_ERROR_NONE) {
        return $data['str'];
    }
    // 如果json_decode失败（尽管这种情况很少见，因为我们已经预处理了字符串），则返回一个错误消息  
    return 'Error decoding Unicode string';
}