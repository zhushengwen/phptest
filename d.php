<?php
error_reporting(E_ALL | E_STRICT);
$code = $_POST['code'];
if (isset($_POST['hidden']) && $_POST['hidden'] == 1) {
    echo get_magic_quotes_gpc() ? stripslashes($code) : $code;
    exit();
} else {
    //$code = stripslashes(trim($code));
    date_default_timezone_set('PRC');
    $path=dirname(__FILE__).DIRECTORY_SEPARATOR.'code'.DIRECTORY_SEPARATOR.date('y.m.d.H.i',time()).'.txt';
    $com="////////////////////".date('Y-m-d H:i:s',time())."/////////////////////////\r\n\r\n";
    if(!file_exists(dirname(__FILE__).DIRECTORY_SEPARATOR.'code/'))(mkdir('code'));
    file_put_contents($path,(file_exists($path)?"\r\n\r\n":'').$com.$code,FILE_APPEND);
    echo eval($code);
    exit();
}
?>