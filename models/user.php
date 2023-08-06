<?php 
    function getAdmin () {
        $mySQL = "SELECT * FROM user WHERE role = 100";
        return get_all($mySQL);
    }
    function checkAdmin ($username , $password) {
        $mySQL = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        return get_one($mySQL);
    }
    function getUserById ($userId) {
        $mySQL = "SELECT * FROM user WHERE id_user = '$userId'";
        return get_one($mySQL);
    }
?>