<div id="login-control">
<?php
     if(isset($user)&& $user['status']){
         echo "Logged in as: {$user['user']['username']}"
         ?>
         <a href="?p=home&logout">logout</a>
         <?php
         
     }else{   
?>
        Not logget in <a href="../user/login.php">Login</a>

    <?php }  ?>
</div>