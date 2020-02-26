<div id="product-control">
<?php
    $products =  Product::getAll();
    //var_dump($products);
    foreach($products as $p){
        echo 'Product name: '.$p['name'];
        echo '<br>'.'<br>';
        echo 'Product description: '.$p['description'];
        echo '<br>'.'<br>';
        echo 'Price: '.$p['unitPrice'];
        echo '<br>'.'<br>';
        echo 'Picture: '.$p['picture'];
    }




?>
</div>