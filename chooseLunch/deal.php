<?php
header('content-type:text/html;charset=utf-8');
/**
 * choose lunch
 * @author zjwForPHP
 * @time 2017年11月17日15:36:41
 */


/**
 * code exc
 */


$data = read_json();

echo json_encode($data);





/*************************************************function******************************************/
/**
 * 写入json文件
 * @param $data
 */
function write_json($data){

    #转化成JSON字符串（兼容中文）
    $json_string = json_encode($data);
   /* $search = "#\\\u([0-9a-f]{1,4}+)#ie";
    $replace = "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))";
    $text=preg_replace($search, $replace, $json_string);*/

    // 写入文件
    file_put_contents('tsconfig.json', $json_string);
}


/**
 * 读取json文件
 * @param string $filename
 * @return mixed
 */
function read_json($filename = 'tsconfig.json'){

    $json_string = file_get_contents($filename);
    // 把JSON字符串转成PHP数组
    $data = json_decode($json_string, true);

    return $data;


}