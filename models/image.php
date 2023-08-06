<?php 
    function getProductImageById ($id) {
        $mySQL = "SELECT * FROM image WHERE id_product = $id AND position = 0";
        return get_all($mySQL);
    }
?>