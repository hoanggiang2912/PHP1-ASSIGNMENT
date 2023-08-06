<?php 
    function getBanner ($limit = 0) {
        $mySQL = "SELECT * FROM banner";
        if ($limit > 0) {
            $mySQL .= " LIMIT $limit";
        }
        return get_all($mySQL);
    }
?>