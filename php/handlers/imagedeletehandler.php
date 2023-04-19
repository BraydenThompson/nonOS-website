<?php
session_start();
require_once("dao.php");

$imageid = $_POST["deleteimageid"];

$dao = new Dao();
$dao->deleteImage($imageid);
header("Location: ../web/desktop.php");
exit();