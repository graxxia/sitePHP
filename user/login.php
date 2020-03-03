<?php
require_once('../inc/init.php');

    if(isset($user)){
        echo $user['msg'];
    }

?>


<!-- <a href="../user/login.php?logout">logout</a> -->

<a href="?p=home">logout</a>


<?php
include('./inc/userManage.php');
?>