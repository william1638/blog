<?php
header("Content-type:text/html;charset=utf-8");

function  show($status, $message,$data=array()) {
    $result = array(
        'status' => $status,
        'message' => $message,
        'data' => $data,
    );

    exit(json_encode($result));
}


// 设置验证码
function show_verify($config=''){
    if($config==''){
        $config=array(
            'codeSet'=>'1234567890',
            'fontSize'=>30,
            'useCurve'=>false,
            'imageH'=>60,
            'imageW'=>240,
            'length'=>4,
            'fontttf'=>'4.ttf',
        );
    }
    $verify=new \Think\Verify($config);
    return $verify->entry();
}

//验证验证码
function check_verify($code){
    $verify = new \Think\Verify();
    return $verify->check($code);
}

/**
 * 传递ueditor生成的内容获取其中图片的路径
 * @param  string $str 含有图片链接的字符串
 * @return array       匹配的图片数组
 */
function get_ueditor_image_path($str){
    $preg='/\/Upload\/image\/ueditor\/\d*\/\d*\.[jpg|jpeg|png|bmp]*/i';
    preg_match_all($preg, $str,$data);
    return current($data);
}
/**
 * 将ueditor存入数据库的文章中的图片绝对路径转为相对路径
 * @param  string $content 文章内容
 * @return string          转换后的数据
 */
function preg_ueditor_image_path($data){
    // 兼容图片路径
    $root_path=rtrim($_SERVER['SCRIPT_NAME'],'/index.php');
    // 正则替换图片
    $data=htmlspecialchars_decode($data);
    $data=preg_replace('/src=\"^\/.*\/Upload\/image\/ueditor$/','src="'.$root_path.'/Upload/image/ueditor',$data);
    return $data;
}

/**
 * 传递图片路径根据配置项添加水印
 * @param string $path 图片路径
 */
function add_water($path){
    $image=new \Think\Image();
    if(C('WATER_TYPE')==1){
        $image->open($path)->text(C('TEXT_WATER_WORD'),C('TEXT_WATER_TTF_PTH'),C('TEXT_WATER_FONT_SIZE'),C('TEXT_WATER_COLOR'),C('TEXT_WATER_LOCATE'),0,C('TEXT_WATER_ANGLE'))->save($path);
    }elseif(C('WATER_TYPE')==2){
        $image->open($path)->water(C('IMAGE_WATER_PIC_PTAH'),C('IMAGE_WATER_LOCATE'),C('IMAGE_WATER_ALPHA'))->save($path);
    }elseif(C('WATER_TYPE')==3){
        $image->open($path)->text(C('TEXT_WATER_WORD'),C('TEXT_WATER_TTF_PTH'),C('TEXT_WATER_FONT_SIZE'),C('TEXT_WATER_COLOR'),C('TEXT_WATER_LOCATE'),0,C('TEXT_WATER_ANGLE'))->save($path);
        $image->open($path)->water(C('IMAGE_WATER_PIC_PTAH'),C('IMAGE_WATER_LOCATE'),C('IMAGE_WATER_ALPHA'))->save($path);
    }
}

/**
 * 传入时间戳,计算距离现在的时间
 * @param  number $time 时间戳
 * @return string     返回多少以前
 */
 function word_time($time){
    $time = (int)substr($time,0,10);
    $int = time()-$time;
    $str = "";
    if($int<=2){
        $str = printf("刚刚");
    }elseif($int<60){
        $str = printf("%d秒前",$int);
    }elseif($int<3600){
        $str = printf("%分钟前",$int);
    }elseif ($int < 86400){
        $str = sprintf('%d小时前', floor($int / 3600));
    }elseif ($int < 1728000){
        $str = sprintf('%d天前', floor($int / 86400));
    }else{
        $str = date('Y-m-d H:i:s', $time);
    }
    return $str;
}

















