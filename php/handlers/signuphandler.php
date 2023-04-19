<?php
    session_start();
    require_once("dao.php");
    //require_once("KLogger.php");
    //$logger = new KLogger ("log.txt" , KLogger::WARN); //TODO: ADD LOGGER

    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_repeat = $_POST['password_repeat'];
    $_SESSION["inputs"] = $_POST;

    //$logger->LogDebug("User [{$username}] attempting to sign up");

    $dao = new Dao();
    $user = $dao->getUserFromName("'" . $username . "'");

    // Check if passwords match
    if ($password != $password_repeat) {
        $status .= "Passwords must both match<br>";
    }

    // Check if password is of the correct length
    if (strlen($password) < 3) { //TODO: make longer, shot for testing purposes
        $status .= "Passwords must be at least 3 characters<br>";
    }

    // Check if username is of right length
    if (strlen($username) > 16) {
        $status .= "Username must be 16 characters or less<br>";
    }

    // Check if username already exists
    if (sizeof($user) != 0) {
        $status .= "Username already taken<br>";
    }

    // Check if username contains "guest" so as not to take an autogenerated name
    if (str_contains($username, "guest")) {
        $status .= "Username cannot contain 'guest' (reserved keyword)<br>";
    }

    if (isset($status)) {
        $_SESSION["status"] = $status;
        $_SESSION["logged_in"] = false;
        header("Location: ../web/signup.php");
        exit();
    }

    // Hash password, and creat a new user
    $hashedPass = password_hash($password, PASSWORD_DEFAULT);
    $dao->createUser($username, $hashedPass);
    $user = $dao->getUserFromName("'" . $username . "'");
    $_SESSION["logged_in"] = true;
    $_SESSION["user_id"] = $user[0]["user_id"];
    $_SESSION["user_name"] = $user[0]["username"];
    header("Location: ../web/desktop.php");
    exit();