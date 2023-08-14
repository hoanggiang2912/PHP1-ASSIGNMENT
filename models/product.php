<?php
    function getAllProduct($limit = 0) {
        $mySQL = "SELECT * FROM product";
        if ($limit > 0) {
            $mySQL .= " LIMIT $limit";
        }
        return get_all($mySQL);
    }
    /**
     * Summary of getProductsByCatalogId
     * @param mixed $catalogId
     * @param mixed $limit
     * @return array
     */
    function getProductsByCatalogId($catalogId , $limit = 8) {
        $mySQL = "SELECT * FROM product WHERE id_catalog = " . $catalogId . ' LIMIT ' . $limit;
        return get_all($mySQL);
    }
    function getProductDetail($productId) {
        $mySQL = "SELECT * FROM product WHERE id = " . $productId;
        return get_one($mySQL);
    }
    function getProductSpectById ($productId) {
        $mySQL = "SELECT * FROM spectifications where id_product = $productId";
        return get_all($mySQL);
    }
    function getProductOptionsById ($productId) {
        $mySQL = "SELECT * FROM product_options where id_product = $productId";
        return get_all($mySQL);
    }
    function deleteProductById ($productId) {
        $mySQL = "DELETE FROM product WHERE id = $productId";
        delete($mySQL);
    }
    function updateProductById ($productId , $name , $cataId , $price , $amount , $promotion , $description , $detail) {
        $mySQL = "UPDATE product
                    SET 
                        name ='$name' , 
                        id_catalog ='$cataId' , 
                        price = '$price' , 
                        amount = '$amount' , 
                        promotion = '$promotion' , 
                        description = '$description' , 
                        detail = '$detail'
                    WHERE id = $productId";
        update($mySQL);
    }
    function insertProductById ($name , $price , $idCata , $amount = 1, $promotion = 0 , $description = null , $detail = null ) {
        $mySQL = "INSERT INTO product (name, id_catalog , price, amount , promotion , description , detail)
VALUES ('$name', '$idCata' , '$price', '$amount', '$promotion', '$description', '$detail')";
        insert($mySQL);
    }
    function getProductByQuery ($query , $limit = 0) {
        $mySQL = "SELECT * FROM product WHERE name LIKE '%".$query."%'";
        if ($limit > 0) {
            $mySQL .= ' LIMIT '.$limit;
        }
        return get_all($mySQL);
    }
    function check_catalog ($cataId) {
        $mySQL = "SELECT * FROM product WHERE id_catalog = " . $cataId;
        $productList = get_all($mySQL);
        return count($productList);
    }
    function getProductById($productId) {
        $mySQL = "SELECT * FROM product WHERE id= $productId";
        return get_one($mySQL);
    }
    function  getImageById($productId) {
        $mySQL = "SELECT img FROM product WHERE id= $productId";
        $item = get_one($mySQL);
        extract($item);
        return $img;
    }
    function getDescById ($productId) {
        $mySQL = "SELECT * FROM description WHERE id_product = $productId"; 
        return get_one($mySQL);
    }
    function getProductByPriceFilter ($min , $max) {
        $mySQL = "SELECT * FROM product WHERE price <= $max AND price >= $min"; 
        return get_all($mySQL);
    }
?>