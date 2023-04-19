<?php
    session_start();
    $_SESSION["logged_in"] = false;
    $_SESSION["user_id"] = null;
    session_destroy();
    header("Location: ../web/index.php");
