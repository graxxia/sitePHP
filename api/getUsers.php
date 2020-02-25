<?php

if(isset($_REQUEST['key'])){

require_once('../inc/DbConn.php');
DbConn::init("127.0.0.1",'root','','utf8','rose');
require_once('../inc/User.php');


$result = User::getAll();
header("content-type: application/json");

echo json_encode($result);

}