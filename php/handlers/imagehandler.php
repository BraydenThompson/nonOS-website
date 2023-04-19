<?php
    session_start();
    require_once("dao.php");

    $title = $_POST["title"];
    $description = $_POST["description"];

    
    if (empty($title)) {
        $status .= "ERROR: Please enter a title<br>";
    }

    if (empty($description)) {
        $status .= "ERROR: Please enter a description<br>";
    }

    $description = str_replace(array("\r", "\n"), '', $description); // Sanitize description from newlines, causes errors in table

    $imagePath = "";
    $imgWidth = 0;
    $imgHeight = 0;
    if (count($_FILES) > 0) {
      if ($_FILES["image"]["error"] > 0) {
        $status .= "ERROR: Please select an image<br>";
      } else {
        $imagePath = "../../img/" . $_FILES["image"]["name"];
        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) {
          $status .= "ERROR: File move failed, please try again<br>";
        } else {
          $imageSize = getimagesize($imagePath);
          $imgWidth = $imageSize[0];
          $imgHeight = $imageSize[1];
        }
      }
    }

    if (isset($status)) {
      $_SESSION['status'] = $status;
      $_SESSION["inputs"] = $_POST;
      header("Location: ../web/desktop.php");
      exit();
    }
    
    
    $dao = new Dao();
    $dao->saveImage($imagePath, $imgWidth, $imgHeight, $title, $description, $_SESSION["user_id"]);
    header("Location: ../web/desktop.php");
    exit();