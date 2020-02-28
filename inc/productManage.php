<div id="product-control">

<label>Browse all products<label>
<form action="#" method="post">
<input type="submit" name="submitAll" value="Show me all products!" />
</form>
<?php
    global $products;
    if(isset($_POST['submitAll'])){
        $products = 1;
    }
    
?>

<label>Browse by category</label>
<form action="#" method="post">
<select name="category">
<option value="5">Body</option>
<option value="6">Face</option>
<option value="7">Hair</option>
<option value="8">Other</option>
</select>
<input type="submit" name="submitCategory" value="Show category" />
</form>
<?php
global $category;   

if(isset($_POST['submitCategory'])){    
    $category = $_POST['category'];  // Storing Selected Value In Variable
   // echo "You have selected: ".$category.'<br>';  // Displaying Selected Value
    }
?>

<label>Browse by type</label>
<form action="#" method="post">
<select name="type">
<option value="11">Soap</option>
<option value="10">Cream</option>
<option value="8">Lotion</option>
<option value="6">Shampoo</option>
<option value="7">Lip Balm</option>
</select>
<input type="submit" name="submitType" value="Show type" />
</form>
<?php
global $type;

if(isset($_POST['submitType'])){    
    $type = $_POST['type'];  // Storing Selected Value In Variable
   // echo "You have selected: ".$type;  // Displaying Selected Value
    
}

    $sortby = null;
    if($products != null){
      $products =  Product::getAll();
        foreach($products as $p){
                    echo 'Product name: '.$p['name'];
                    echo '<br>'.'<br>';
                    echo 'Product description: '.$p['description'];
                    echo '<br>'.'<br>';
                    echo 'Price: '.$p['unitPrice'];
                    echo '<br>'.'<br>';
                    if($p['productTypeID'] == 10){
                        echo "<img src='./img/generic/genericCreams.jpg' width='300px' height='200px' alt='picture of diverse creams' />";
                       
                    } else if($p['productTypeID'] == 7){
                        echo "<img src='./img/generic/genericLipBalm.jpg' width='300px' height='200px' alt='picture of diverse lip balms' />";
    
                    } else if($p['productTypeID'] == 8){
                        echo "<img src='./img/generic/genericLotionBar.jpg' width='300px' height='200px' alt='picture of diverse lotion bars' />";
                    
                    } else if($p['productTypeID'] == 6){
                        echo "<img src='./img/generic/genericShampooBar.jpg' width='300px' height='200px' alt='picture of diverse shampoo bars' />";
    
                    } else if($p['productTypeID'] == 11){
                        echo "<img src='./img/generic/genericSoap.jpg' width='300px' height='200px' alt='picture of diverse soaps' />";
                    }
                    echo '<br>'.'<br>';
                }
    }
 
    if($type != null){
      $productsByType = Product::getAllType($type);  
        foreach($productsByType as $p){
                echo 'Product name: '.$p['name'];
                echo '<br>'.'<br>';
                echo 'Product description: '.$p['description'];
                echo '<br>'.'<br>';
                echo 'Price: '.$p['unitPrice'];
                echo '<br>'.'<br>';
                if($p['productTypeID'] == 10){
                    echo "<img src='./img/generic/genericCreams.jpg' width='300px' height='200px' alt='picture of diverse creams' />";
                   
                } else if($p['productTypeID'] == 7){
                    echo "<img src='./img/generic/genericLipBalm.jpg' width='300px' height='200px' alt='picture of diverse lip balms' />";

                } else if($p['productTypeID'] == 8){
                    echo "<img src='./img/generic/genericLotionBar.jpg' width='300px' height='200px' alt='picture of diverse lotion bars' />";
                
                } else if($p['productTypeID'] == 6){
                    echo "<img src='./img/generic/genericShampooBar.jpg' width='300px' height='200px' alt='picture of diverse shampoo bars' />";

                } else if($p['productTypeID'] == 11){
                    echo "<img src='./img/generic/genericSoap.jpg' width='300px' height='200px' alt='picture of diverse soaps' />";
                }
                echo '<br>'.'<br>';
            }
    }
    
    if($category != null){
        $productsByCategory = Product::getAllCategory($category);
        foreach($productsByCategory as $p){
                echo 'Product name: '.$p['name'];
                echo '<br>'.'<br>';
                echo 'Product description: '.$p['description'];
                echo '<br>'.'<br>';
                echo 'Price: '.$p['unitPrice'];
                echo '<br>'.'<br>';
                if($p['productTypeID'] == 10){
                    echo "<img src='./img/generic/genericCreams.jpg' width='300px' height='200px' alt='picture of diverse creams' />";
                   
                } else if($p['productTypeID'] == 7){
                    echo "<img src='./img/generic/genericLipBalm.jpg' width='300px' height='200px' alt='picture of diverse lip balms' />";

                } else if($p['productTypeID'] == 8){
                    echo "<img src='./img/generic/genericLotionBar.jpg' width='300px' height='200px' alt='picture of diverse lotion bars' />";
                
                } else if($p['productTypeID'] == 6){
                    echo "<img src='./img/generic/genericShampooBar.jpg' width='300px' height='200px' alt='picture of diverse shampoo bars' />";

                } else if($p['productTypeID'] == 11){
                    echo "<img src='./img/generic/genericSoap.jpg' width='300px' height='200px' alt='picture of diverse soaps' />";
                }
                echo '<br>'.'<br>';

            }
    }

 




?>
</div>