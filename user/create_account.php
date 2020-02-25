<?php
require_once('../inc/init.php');
?>

<h3>Sign Up </h3>
<?php
    if(isset($res)){
        echo $res['msg'];
    }

    if(isset($_POST['username']) && isset($_POST['pass']) && isset($_POST['pass_reenter']) &&($_POST['pass'] === $_POST['pass_reenter'])){
        $result = User::createUser($_POST['username'], $_POST['pass']);
        echo $result['msg'];
    }else {
?>
    <form action="create_account.php" method="post">
    <div class="form-signin">
        <div>Username: </div> 
        <div><input type="text" name="username"></div>
        
        <div>Password: </div> 
        <input type="password" name="pass"/>

        <div>Re-enter Password: </div> 
        <input type="password" name="pass_reenter"/>

        <div><input type="submit" value="Create" name="submit" /></div>
    </div>
    </form>

<?php } ?>