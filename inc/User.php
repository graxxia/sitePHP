 
<?php

class User{

    static function getAll(){
        $pdo = DbConn::getPDO();
        $r = $pdo->query("SELECT `userID`, `username` FROM `users`");
        $results =[];
        while($row = $r->fetch()){
            $results[] = $row;
        }
        return $results;
    }

    static function theUser($username){
        $pdo = DbConn::getPDO();//reference to query
        //SELECT * FROM `users` WHERE username = 'Alejandro'
        $q = $pdo->prepare("SELECT `userID` FROM `users` WHERE `username` = ?");
        $q->execute([$username]);

        //if rowcount is not empty
        if(!empty ($q->rowCount())){
              return true;
        }
        return false;
    }

    static function createUser($username, $pass){
        $pdo = DbConn::getPDO();
        //[msg,status true or false]
        if(User::theUser($username)){
            return ["msg"=>"User <em>$username</em> already exist", "status"=>false];
        }  
        $passwordHash = password_hash($pass, PASSWORD_BCRYPT);
        $salt='';
        $q = $pdo->prepare("INSERT INTO `users` (`username`, `passwordHash`, `salt`) VALUES (?,?,?);");
        $q->execute([$username,$passwordHash,$salt]);

        if(!empty($q->rowCount())){
            return ["msg"=>"User <em>$username</em> created", "status"=>true];
        }
        return ["msg"=>"Could not create <em>$username</em> user", "status"=>false];
    }

    static function loginWithCookie($username, $cookie){
        $pdo = DbConn::getPDO();
        $q = $pdo->prepare("SELECT `username`, `cookieHash` FROM `users` WHERE `username`= ?");
        $q->execute([$username]);

        if(!empty ($q->rowCount())){
              $row = $q->fetch();

              if(password_verify($cookie, $row['cookieHash'] )) {
              return ['msg'=>"$username logged in", 'status'=>true,'cookie'=>$cookie];  
            }
        }
        return ['msg'=>"Could not log in", 'status'=>false];
    }

    static function loginWithPass($username, $pass){
        $pdo = DbConn::getPDO();
        $q = $pdo->prepare("SELECT `username`, `passwordHash`, `salt` FROM `users` WHERE `username`= ?");
        $q->execute([$username]);
        if(!empty($q->rowCount())) {
            $row = $q->fetch();
            if(password_verify($pass,$row['passwordHash'])) {
                $cookie = bin2hex(random_bytes(10));
                $cookieHash = password_hash($cookie, PASSWORD_BCRYPT);
                $pdo->query("UPDATE `users` SET `cookieHash` = '$cookieHash' WHERE `username` = '$username';");

                return ['msg'=>"$username logged in", 'status'=>true,'cookie'=>$cookie, 'user'=>$row];
            }
        }
        return ['msg'=>"Could not log in", 'status'=>false];      
    }
}