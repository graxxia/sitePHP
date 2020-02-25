<link rel="stylesheet" href="./css/style.css"/>
<link rel="stylesheet" href="./css/user.css"/>
<?php
    require_once('./inc/init.php');
?>

<nav>
    <div class="nav-main">
    <div id="logo">
    <img src="./img/roselogo-w.svg" alt="Rose Logo">
    </div>
                <?php
                //the number is the order in the menu -browser-
                    $menuObj = new Menu("nav-menu");
                    $pdo = DbConn::getPDO();//reference to query
                    $page = 'home';
                    $qPages = $pdo->query('SELECT `pagekey`, `title` FROM `pages`');
                    $pages = [];
                    while($row = $qPages->fetch()){
                        $pages[$row['pagekey']]=$row['title'];
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
                         echo "<li><a href=\"?p=$key\">$val</a></li>";
                    }                  
                    $menuObj->setDesc(false);
                    echo $menuObj->render();
                ?>
    </div>
</nav>

<main>
    <div class="main-content">
     <?php
      echo "<h2>{$pageDetails['title']}</h2>";
      echo "<p>".eval("?>{$pageDetails['content']}<?php")."</p>";
      ?>

    <div id="user-content">
        <h4>Log In User </h4>
<<<<<<< HEAD
        <?php
//WHERE DO I NEED TO INVLUDE THE FORM FOR USER????
        ?>
=======

>>>>>>> web
    </div>      
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
    while($row = $qGetVisit->fetch()){
        echo "<br/>{$row['cnt']}";
    }
?>