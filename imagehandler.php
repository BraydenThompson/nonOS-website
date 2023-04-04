<?php
    session_start();
    require_once("dao.php");

    $title = $_POST["title"];
    $description = $_POST["description"];

    
    if (empty($title)) {
        $_SESSION['status'] = "ERROR: Please enter a title";
        $_SESSION["inputs"] = $_POST;
        header("Location: ./desktop.php");
        exit();
    }

    if (empty($description)) {
        $_SESSION['status'] = "ERROR: Please enter a description";
        $_SESSION["inputs"] = $_POST;
        header("Location: ./desktop.php");
        exit();
    }
    $description = str_replace(array("\r", "\n"), '', $description); // Sanitize description from newlines, causes errors in table

    $imagePath = "";
    $imgWidth = 0;
    $imgHeight = 0;
    if (count($_FILES) > 0) {
      if ($_FILES["image"]["error"] > 0) {
        $_SESSION['status'] = "ERROR: Please select an image";
        $_SESSION["inputs"] = $_POST;
        header("Location: ./desktop.php");
        exit();
      } else {
        
        // TODO: check image filesize
        /*$filesize = filesize($_FILES["image"]["name"]);
        if ($filesize > 1000000) {
            $_SESSION['status'] = "ERROR: Images must be under 1 Megabyte, yours is: " . ($filesize / 1000000) ;
            header("Location: ./desktop.php");
            exit();
        }*/
        
        $imagePath = "./img/" . $_FILES["image"]["name"];
        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) {
            throw new Exception("File move failed");
        }
        // TODO: pull image resolution
        $imageSize = getimagesize($imagePath);
        $imgWidth = $imageSize[0];
        $imgHeight = $imageSize[1];
      }
    }
    
    
    $dao = new Dao();
    $dao->saveImage($imagePath, $imgWidth, $imgHeight, $title, $description, $_SESSION["user_id"]);
    header("Location: desktop.php");
    exit();