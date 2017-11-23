<?php
header('content-type:text/html;charset=utf-8');
error_reporting(E_ALL^E_NOTICE);
/**
 * choose lunch
 * @author zjwForPHP
 * @time 2017年11月17日15:36:41
 */


/**
 * code exc
 */

/*$arr = array(
    array('title'=>'陈记炸酱面','flag'=>1,'src'=>'dist/img/zjm.jpg'),
    array('title'=>'重庆牛肉面','flag'=>1,'src'=>'dist/img/gjf.jpg'),
    array('title'=>'汉口民生','flag'=>1,'src'=>'dist/img/cf.jpg'),
    array('title'=>'张亮麻辣烫','flag'=>1,'src'=>'dist/img/hf.jpg'),
    array('title'=>'蔡林记','flag'=>1,'src'=>'dist/img/rgm.jpg'),
    array('title'=>'华莱士','flag'=>1,'src'=>'dist/img/hls.jpg'),
    array('title'=>'黄焖鸡米饭','flag'=>0,'src'=>'dist/img/hmj.jpg'),

);
write_json($arr);*/
if($_GET['type']==1){
    write_json(json_decode($GLOBALS['HTTP_RAW_POST_DATA'],true));
    echo 1;
    //write_json($_POST,0);
}else{
    $data = read_json();

    echo json_encode($data);
}





/*************************************************function******************************************/
/**
 * 写入json文件
 * @param $data
 */
function write_json($data,$type=1){

    if($type==1){
        #转化成JSON字符串（兼容中文）
        $json_string = json_encode($data);
        /* $search = "#\\\u([0-9a-f]{1,4}+)#ie";
         $replace = "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))";
         $text=preg_replace($search, $replace, $json_string);*/
    }


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
    return  $data;




}