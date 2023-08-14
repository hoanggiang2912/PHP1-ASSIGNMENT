<?php 
    function getShippingFee($shippingId) {
        $mySQL = "SELECT price FROM shipping WHERE id = $shippingId";
        return get_one($mySQL);
    }
?>