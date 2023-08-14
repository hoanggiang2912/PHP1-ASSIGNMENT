<?php 
    function getCatalog () {
        $mySQL = "select * from catalog limit 5";
        return get_all($mySQL);
    }
    function getCatalogs($limit = 0) {
        $mySQL = "SELECT * FROM catalog";
        if ($limit > 0) {
            $mySQL .= " limit " . $limit;
        }
        return get_all($mySQL);
    }
    function getProductByCatalogId ($catalogId , $limit = 0) {
        $mySQL = "select * from product where id_catalog = ". $catalogId;
        if ($limit > 0) {
            $mySQL .= " order by id desc limit " . $limit;
        }
        return get_all($mySQL);
    }
    function getCatalogNameById ($cataId) {
        $mySQL = "SELECT name FROM catalog where id = $cataId";
        return get_one($mySQL);
    }
    function getCatalogIdByProductId ($productId) {
        $mySQL = "select id_catalog from product where id = $productId";
        return get_one($mySQL);
    }
    function getRelatedCatalog ($cataId , $limit = 0) {
        $mySQL = "select * from catalog where id != $cataId";
        if ($limit > 0) {
            $mySQL .= " limit $limit";  
        }
        return get_all($mySQL);
    }
    function getCatalogByQuery ($query) {
        $mySQL = "SELECT * FROM catalog WHERE name LIKE '%".$query."%'";
        return get_all($mySQL);
    }
    function deleteCategoryById($cateId) {
        // check if category id is foreign key
        if (check_catalog($cateId) > 0) {
            $tb = "This is a foreign key constraint";
        } else {
            $mySQL = "DELETE FROM catalog WHERE id = $cateId";
            delete($mySQL);
            $tb = "Delete successfully";
        }
        return $tb;
    }
    function insertCategory($name) {
        $mySQL = "INSERT INTO catalog (name) VALUES ('$name')";
        insert($mySQL);
    }
    function getCatalogById($cateId) {
        $mySQL = "SELECT * FROM catalog WHERE id = $cateId";
        return get_all($mySQL);
    }
    function updateCatalog($name , $cateId) {
        $mySQL = "UPDATE catalog SET name='$name' WHERE id = $cateId";
        update($mySQL);
    }  
    
?>