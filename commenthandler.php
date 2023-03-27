<?php
    session_start();
    require_once("dao.php");

    $comment = $_POST["comment"];
    $_SESSION["inputs"] = $_POST;

    if (empty($comment)) {
        $_SESSION['status'] = "ERROR: Please enter a comment"; //TODO: Add error messages in page
        header("Location: desktop.php");
        exit();
    }

    $dao = new Dao();
    $dao->saveComment($comment, $_SESSION["user_id"]);
    header("Location: desktop.php");
    exit();