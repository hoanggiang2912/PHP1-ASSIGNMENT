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
    function insertProductById ($name , $price , $idCata) {
        $mySQL = "INSERT INTO product (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";
    }
    function getProductByQuery ($query) {
        $mySQL = "SELECT * FROM product WHERE name LIKE '%".$query."%'";
        return get_all($mySQL);
    }
    function check_catalog ($cataId) {
        $mySQL = "SELECT * FROM product WHERE id_catalog = " . $cataId;
        $productList = get_all($mySQL);
        return count($productList);
    }
?>