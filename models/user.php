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
    function validateUserData($name, $password, $email) {
        $errors = [];

        // Validate name
        if (empty($name)) {
            $errors['usernameError'] = "Name is required.";
        }

        // Validate password
        if (empty($password)) {
            $errors['passwordError'] = "Password is required.";
        } elseif (strlen($password) < 6) {
            $errors['passwordError'] = "Password must be at least 6 characters long.";
        }

        // Validate email
        if (empty($email)) {
            $errors['emailError'] = "Email is required.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['emailError'] = "Invalid email format.";
        }

        return $errors;
    }
    function addUser ($name , $email , $password) {
        $mySQL = "INSERT INTO user (username , email , password) VALUES ('$name', '$email', '$password')";
        insert($mySQL);
    }
    function updateUserGeneral ($username , $email , $userId) {
        $mySQL = "UPDATE user SET username = '$username', email = '$email' WHERE id_user = $userId";
        update($mySQL);
    }
    function updateUserProfile ($fullname , $bio , $userId) {
        $mySQL = "UPDATE user SET fullname = '$fullname', bio = '$bio' WHERE id_user = $userId";
        update($mySQL);
    }
    function updateUserPassword ($newPassword , $userId) {
        $mySQL = "UPDATE user SET password = '$newPassword' WHERE id_user = $userId";
        update($mySQL);
    }
    function deleteAccountById ($userId){
        $mySQL = "DELETE FROM user WHERE id_user = $userId";
        delete($mySQL);
    }
?>