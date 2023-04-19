<?php
    session_start();
    require_once("dao.php");
    //require_once("KLogger.php");
    //$logger = new KLogger ("log.txt" , KLogger::WARN); //TODO: ADD LOGGER

    // Create a new guest account
    $dao = new Dao();
    $hashedPass = password_hash("guestpassword", PASSWORD_DEFAULT);
    $user = $dao->createAndGetNewGuest($hashedPass);

    // Update the username to have the user id concattenated, making the username unique
    $dao->changeUsername($user[0]["user_id"], "guest" . $user[0]["user_id"]);

    $_SESSION["logged_in"] = true;
    $_SESSION["user_id"] = $user[0]["user_id"];
    $_SESSION["user_name"] = $user[0]["username"];
    $_SESSION["admin"] = $user[0]["admin"];
    

    header("Location: ../web/desktop.php");
    exit();