<?php
session_start();
require_once("dao.php");

$commentid = $_POST["deletecommentid"];

$dao = new Dao();
$dao->deleteComment($commentid);
header("Location: ../web/desktop.php");
exit();