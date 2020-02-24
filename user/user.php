<link rel="stylesheet" href="./css/user.css"/>


<div id="user-content">
<h4>Log In User </h4>
<div>
    
<?php


class User{

    static function theUser($username){
        $pdo = DbConn::getPDO();//reference to query
        //SELECT * FROM `users` WHERE username = 'Alejandro'
        $pdo->prepare("SELECT * FROM `users` WHERE username = ?");
        $q->execute([$username]);

        //if rowcount is not empty
        if(!empty ($q->rowCount())){
            return true;
        }
        return false;

    }

    static function createUser($username, $pass){
        $pdo = DbConn::getPDO();
        //[msg,status trueor false]
        if(User::isUser($username)){
            return ["msg"=>"User <em>$username</em> already exist", "status"=>false];
        }  
        //from varchar sql
        $salt = random_bytes(32);
        $passHash = password_hash($passwordHash.$salt, PASSWORD_BCRYPT);
        

        $q = $pdo->prepare("INSERT INTO `users` (`username`, `passwordHash`, `salt`) VALUES (?,?,?);");

        $q->execute([$username,$passwordHash,$salt]);

        if(!empty($q->rowCount())){
            return ["msg"=>"User <em>$username</em> created", "status"=>true];
        }

        return ["msg"=>"Could not create <em>$username</em> user", "status"=>false];

    }

    static function loginWithPass($username, $pass){

        ///check database

    }



}