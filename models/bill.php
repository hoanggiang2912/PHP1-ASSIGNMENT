<?php
    function createBill ($address , $email , $tel , $shipping , $totalBill) {
        $mySQL = "INSERT INTO bill (address, email, tel , shipping , total) VALUES ('$address','$email' , '$tel' ,'$shipping' , '$totalBill')";
        $last_id = insertBill($mySQL);
        return $last_id;
    }
    function createCart ($billId , $product_name , $product_img , $unit_price , $product_qty , $total_cost) {
        $mySQL = "INSERT INTO cart (id_bill , product_name , product_img , unit_price , product_qty , total_cost) VALUES ('$billId' , '$product_name' , '$product_img' , '$unit_price' , '$product_qty' , '$total_cost')";
        insert($mySQL);
    }
    function totalBill ($cart) {
        $total = 0;
        foreach ($cart as $item) {
            extract($item);
            $subTotal = $price * $qty;    
            $total += $subTotal;
        }
        return $total;
    }
    function getShippingMethodByBillId ($billId) {
        $mySQL = "SELECT shipping FROM bill WHERE id = '$billId'";
        return get_one($mySQL);
    }
    function getBillInfoById ($billId) {
        $mySQL = "SELECT * FROM bill WHERE id = '$billId'";
        return get_one($mySQL);
    }
    function updatePaymentMethodByBillId ($billId , $payment) {
        $mySQL = "UPDATE bill SET pm='$payment' WHERE id=$billId";
        insert($mySQL);
    }
    function getShippingMethodNameById ($shipping) {
        $mySQL = "SELECT name FROM shipping WHERE id=$shipping";
        return get_one($mySQL);
    }
?>