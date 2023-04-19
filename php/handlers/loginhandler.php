<?php
    session_start();
    require_once("dao.php");

    $username = $_POST['username'];
    $password = $_POST['password'];
    $_SESSION["inputs"] = $_POST;


    $dao = new Dao();
    $user = $dao->getUserFromName("'" . $username . "'");

    // Check if a user w/ username exists
    if (sizeof($user) == 1 && $username == $user[0]["username"] && password_verify($password, $user[0]["password"])
    && $user[0]["guest"] == 0) {
        $_SESSION["logged_in"] = true;
        $_SESSION["user_id"] = $user[0]["user_id"];
        $_SESSION["user_name"] = $user[0]["username"];
        $_SESSION["admin"] = $user[0]["admin"];
        header("Location: ../web/desktop.php");
    } else {
        $status = "Invalid username or password";
        $_SESSION["status"] = $status;
        $_SESSION["logged_in"] = false;
        header("Location: ../../index.php");
    }


    
    
