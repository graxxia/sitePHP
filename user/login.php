<<<<<<< HEAD
<?php
require_once('./inc/init.php');

    if(isset($res)){
        echo $res['msg'];
    }

?>

<div class="login-form">
    <form action="login.php" method="post">
        <input type="hidden" name="action" value="login"/>
        <div>Username: </div> 
        <div><input type="text" name="username"></div>
            
        <div>Password: </div> 
        <input type="password" name="pass"/>

        <div><input type="submit" value="Login" name="submit" /></div>
</div>

=======
<?php
require_once('../inc/init.php');

    if(isset($user)){
        echo $user['msg'];
    }

?>

<a href="../user/login.php?logout">logout</a>


<?php
include('../inc/userManage.php');
?>
>>>>>>> web
