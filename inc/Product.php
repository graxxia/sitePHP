<?php

class Product{

    static function getAll(){
        $pdo = DbConn::getPDO();
        $r = $pdo->query("SELECT `productID`, `productTypeID`, `productCategoryID`, `name`, `description`, `unitPrice`,`picture` FROM `product`");
        $products =[];
        while($row = $r->fetch()){
            $products[] = $row;
        }
        return $products;
    }

    static function getAllType($typeID){
        $pdo = DbConn::getPDO();
        $r = $pdo->prepare("SELECT `productID`, `productTypeID`, `productCategoryID`, `name`, `description`, `unitPrice`,`picture` FROM `product` WHERE `productTypeID` = ?");
        $r->execute([$typeID]);
        $products =[];
        while($row = $r->fetch()){
            $products[] = $row;
        }
        return $products;
    }

    static function getAllCategory($categoryID){
        $pdo = DbConn::getPDO();
        $r = $pdo->prepare("SELECT `productID`, `productTypeID`, `productCategoryID`, `name`, `description`, `unitPrice`,`picture` FROM `product` WHERE `productCategoryID` = ?");
        $r->execute([$categoryID]);
        $products =[];
        while($row = $r->fetch()){
            $products[] = $row;
        }
        return $products;
    }



}