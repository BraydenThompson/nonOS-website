<?php
    session_start();
    require_once("dao.php");
    //require_once("KLogger.php");
    //$logger = new KLogger ("log.txt" , KLogger::WARN); //TODO: ADD LOGGER

    $username = $_POST['username'];
    $password = $_POST['password'];

    //$logger->LogDebug("User [{$username}] attempting to log in");

    $dao = new Dao();
    $user = $dao->getUserFromName("'" . $username . "'");

    // Check if a user w/ username exists
    if (sizeof($user) == 1 && $username == $user[0]["username"] && $password == $user[0]["password"]
    && $user[0]["guest"] == 0) {
        $_SESSION["logged_in"] = true;
        $_SESSION["user_id"] = $user[0]["user_id"];
        header("Location: desktop.php");
    } else {
        $status = "Invalid username or password";
        $_SESSION["status"] = $status;
        $_SESSION["logged_in"] = false;
        header("Location: index.php");
    }


    
    
