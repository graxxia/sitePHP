<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rose</title>
    <link rel="stylesheet" href="./css/style.css"/>
    <link rel="stylesheet" href="./css/user.css"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <script src="./js/script.js" defer></script>
</head>

<?php
    require_once('./inc/init.php');
?>

<body class="site"> 
        <header class="mainheader">
            <div id="logo">
                <img src="./img/roselogo-b.svg" alt="Rose Logo">
            </div>
            <?php include('./inc/userManage.php');?>
        </header>
    <div id="fullNav" class="nav-main">   
            <div class="fullnav-content">
                    <nav>
                        <ul>
                            <?php
                            //the number is the order in the menu -browser-
                                $menuObj = new Menu("nav-menu");
                                $pdo = DbConn::getPDO();//reference to query
                                $page = 'home';
                                $qPages = $pdo->query('SELECT `pagekey`, `title`,`showInMenu` FROM `pages`');
                                $pages = [];
                                while($row = $qPages->fetch()){
                                    $pages[$row['pagekey']]=[$row['title'],$row['showInMenu']];
                                }
                                if(isset($_GET['p'])){
                                    $tmp_page = strtolower($_GET['p']);
                                    if(array_key_exists($tmp_page,$pages)){
                                        $page = $tmp_page;
                                    }
                                }
                                $pQuery = $pdo ->prepare('SELECT `title`, `content` FROM `pages` WHERE `pagekey` = ?');
                                $pQuery->execute([$page]);
                                $pageDetails = $pQuery->fetch();

                                foreach($pages as $key=>$val){
                                    if($val[1]) {
                                        if($key === 'login') {
                                            if(isset($user) && $user['status']) {
                                                echo "<li><a href=\"?p=$key&logout\">Log Out</a></li>";
                                            } else {
                                            echo "<li><a href=\"?p=$key\">{$val[0]}</a></li>";
                                            }
                                        } else {
                                            echo "<li><a href=\"?p=$key\">{$val[0]}</a></li>";
                                        }
                                    }
                                }                  
                                $menuObj->setDesc(false);
                                echo $menuObj->render();
                            ?>
                        </ul>
                    </nav>
            </div> <!--  fullnav-content end    -->
    </div><!--  id="fullNav" class="nav-main    -->


<main id="content" class="main-area">
    <div class="main-content">
        <?php
        
        //echo "<h2>{$pageDetails['title']}</h2>"; 
        echo eval("?>{$pageDetails['content']}<?php");
        ?>
    </div>      
        <aside>
            <div class="side-main">
                <div id="user-createaccount">
                <a href="?p=createaccount" class="button">Create an account </a>   
            </div>
        </aside>
    </div>
</main>

    


<footer>
    <div class="footer-main">
        <p> &copy <?php echo date('Y');?> Rose Skin Solutions</p>
    </div>
</footer>
    
</body>
</html>

<?php
    $qGetVisit = $pdo->query('SELECT count(*) as `cnt` FROM `visits`');
    //add visit to data
    //no visits, commented out until implemented
    while($row = $qGetVisit->fetch()){
     //   echo "<br/>{$row['cnt']}";
    }
?>