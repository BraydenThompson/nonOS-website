<?php
    session_start();
    require_once("dao.php");

    $title = $_POST["title"];
    $description = $_POST["description"];
    //$tags = $_POST["tags"];
    $_SESSION["inputs"] = $_POST; //TODO: re-fill out form if incorrect

    
    if (empty($title)) {
        $_SESSION['status'] = "ERROR: Please enter a title";
        header("Location: ./desktop.php");
        exit();
    }

    if (empty($description)) {
        $_SESSION['status'] = "ERROR: Please enter a description";
        header("Location: ./desktop.php");
        exit();
    }

    $imagePath = "";
    $imgWidth = 0;
    $imgHeight = 0;
    if (count($_FILES) > 0) {
      if ($_FILES["image"]["error"] > 0) {
        throw new Exception("Error: " . $_FILES["image"]["error"]);
      } else {
        $basePath = "";
        $imagePath = "./img/" . $_FILES["image"]["name"];
        // TODO: pull image resolution
        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $basePath . $imagePath)) {
          throw new Exception("File move failed");
        }
      }
    }
    
    $dao = new Dao();
    $dao->saveImage($imagePath, $imgWidth, $imgHeight, $title, $description, $_SESSION["user_id"]);
    header("Location: desktop.php");
    exit();