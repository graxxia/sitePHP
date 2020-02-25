<?php
    $dir = dirname(dirname(__FILE__));
    require_once($dir.'/inc/DbConn.php');
    DbConn::init("127.0.0.1",'root','','utf8','rose');
    require_once($dir.'/inc/Menu.php');
    require_once($dir.'/user/User.php');
    $pdo = DbConn::getPDO();
   
$res = null;
if(isset($_POST['username']) && isset($_POST['pass']) && isset($_POST['action']) && $_POST['action'] === 'login') {
    $res = User::loginWithPass($_POST['username'],$_POST['pass']);
    $res['username'] = $_POST['username'];
} else if(isset($_COOKIE['ch']) && isset($_COOKIE['u'])){
    $res = User::loginWithCookie($_COOKIE['u'],$_COOKIE['ch']);
    $res['username'] = $_COOKIE['u'];
}

if(isset($res) && $res['status'] === true) {
    setcookie('ch',$res['cookie'], time()+60*60*24*3);
    setcookie('u', $res['username'],time()+60*60*24*3);
}