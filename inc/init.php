<?php
    $dir = dirname(dirname(__FILE__));
    require_once($dir.'/inc/DbConn.php');
    DbConn::init("127.0.0.1",'root','','utf8','rose');
    require_once($dir.'/inc/Menu.php');
    require_once($dir.'/inc/User.php');
    require_once($dir.'/inc/Product.php');
    $pdo = DbConn::getPDO();
   
$user = null;

if(isset($_GET['logout'])){
    setcookie('ch','', 1);
    setcookie('u','','',1);
}else{

    if(isset($_POST['username']) && isset($_POST['pass']) && isset($_POST['action']) && $_POST['action'] === 'login') {
        $user = User::loginWithPass($_POST['username'],$_POST['pass']);
    } else if(isset($_COOKIE['ch']) && isset($_COOKIE['u'])){   
        $user = User::loginWithCookie($_COOKIE['u'],$_COOKIE['ch']);

    }

    if(isset($user) && $user['status'] === true) {
        setcookie('ch',$user['cookie'], time()+60*60*24*3);
        setcookie('u', $user['user']['username'],time()+60*60*24*3);
    }
}