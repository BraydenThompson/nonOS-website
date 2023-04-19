<?php
    session_start();
    require_once("../handlers/dao.php");

    // Make sure user is logged in 
    if (isset($_SESSION["logged_in"]) && !$_SESSION["logged_in"] || !isset($_SESSION["logged_in"])) {
        $_SESSION["status"] = "You must log in before accessing the main page!";
        header("Location: ../../index.php");
    }

    // Create username variable to pass to JS for ajax
    $username = $_SESSION["user_name"];
?>

<html>
    <head>
        <title>non-OS Desktop</title>
        <link rel="stylesheet" href="../../css/style.css">
        <script>
            // Let JS access the username for ajax
            var username = "<?php echo $username; ?>" ;
        </script>
        <script type="text/javascript" src="../../javascript/jquery-3.6.4.min.js" defer></script>
        <script type="text/javascript" src="../../javascript/tools.js" defer></script>
        <script src="../../javascript/ajax.js" type="text/javascript" defer></script>

        <!-- Load font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@500&display=swap" rel="stylesheet">

        <link rel="icon" type="image/x-icon" href="../../img/favicon.ico">

	</head>
    
    <!--TODO: write php to dynamically generate windows, taskbar buttons, and desktop icons -->
    <body class="desktopbody">
        <div id="desktoparea">

            <!-- HTML WINDOWS -->
            <div id="chat" class="window resizeable">
                <div class="windowheader">
                    <span class="headertext">Chat</span>
                    <img class="headerbutton" src="../../img/X.png" alt="Close Window" width="30px" height="30px" onclick="toggleElement('chat', true)"/>
                    <img class="headerbutton" src="../../img/fullscreen.png" alt="Fullscreen Window" width="30px" height="30px" onclick="toggleFullscreen('chat')"/>
                    <img class="headerbutton" src="../../img/minimize.png" alt="Minimize Window" width="30px" height="30px" onclick="toggleElement('chat')"/>
                </div>
                <div class="windowbody">
                    <div id="chatbox">
                        <!-- COMMENT TABLE -->
                        <table class="tablerounded">
                            <?php
                                $dao = new Dao();
                                $comments = $dao->getComments();
                                foreach ($comments as $rowarray) {
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($rowarray["username"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($rowarray["message"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($rowarray["sent_time"]) . "</td>";

                                    // If you uploaded the comment, then create a delete button
                                    if ($_SESSION["user_id"] == $rowarray["sender_id"] || $_SESSION["admin"] == 1){
                                        echo "<td>";
                                        echo "<form class='imagedelete' id='imagedeleteform' method='POST' action='../handlers/commentdeletehandler.php' enctype='multipart/form-data'>";
                                        echo "<input type='hidden' name='deletecommentid' value=" . $rowarray["message_number"] . ">";
                                        echo "<input type='image' name='delete' alt='Delete Comment' src='../../img/X.png' width='20' height='20'>";
                                        echo "</form>";
                                        echo "</td>";
                                    };

                                    echo "</tr>";
                                }

                            ?>
                        </table>
                    </div> 
                    <form id="chatform" method="POST" enctype="multipart/form-data">
                        <div>
                            <input type="submit" name="submit" value="Send!"/>
                            <span><input type="text" id="comment" name="comment" placeholder="Enter your message here!" required/></span>
                        </div>
                    </form>
                </div>
            </div>

            <div id="gallery" class="window resizeable">
                <div class="windowheader">
                    <span class="headertext">Gallery</span>
                    <img class="headerbutton" src="../../img/X.png" alt="Close Window" width="30px" height="30px" onclick="toggleElement('gallery', true)"/>
                    <img class="headerbutton" src="../../img/fullscreen.png" alt="Fullscreen Window" width="30px" height="30px" onclick="toggleFullscreen('gallery')"/>
                    <img class="headerbutton" src="../../img/minimize.png" alt="Minimize Window" width="30px" height="30px" onclick="toggleElement('gallery')"/>
                </div>
                <div id="gallerycontainer" class="windowbody">
                    <div id="galleryinfo">
                        Image Info - Click image to inspect!
                        <table class="tablerounded">
                            <tr>
                                <td>Title:</td>
                                <td id="imageName"></td>
                            </tr>
                            <tr>
                                <td>Uploader:</td>
                                <td id="imageUploaderName"></td>
                            </tr>
                            <tr>
                                <td>Upload date:</td>
                                <td id="imageUploadTime"></td>
                            </tr>
                            <tr>
                                <td>Resolution:</td>
                                <td id="imageResolution"></td>
                            </tr>
                            <tr>
                                <td>Description:</td>
                                <td id="imageDescription"></td>
                            </tr>
                            <!--<tr>
                                <td>Tags:</td>
                                <td>Cool, Photograph, Lake, Sunset</td>
                            </tr>-->
                        </table>

                        <div id="galleryinfobuttons">
                            <button onclick="toggleElement('imagesubmit')">Upload a new Image!</button>
                        </div>
                    </div>
                    <!-- GALLERY IMAGES -->
                    <!-- TODO: Generate a new window with that image when you click on it, and display image info -->
                    <div id="gallerybrowser">
                        <?php
                            $dao = new Dao();
                            $images = $dao->getImages();
                            foreach ($images as $rowarray) {
                                echo "<div class='imagecontainer'>";

                                // This creates a new gallery image with a pre-populated on-click event that updates the galley info with the relavent info
                                echo "<img class=\"galleryimage\" alt='" . htmlspecialchars($rowarray["title"]) . "' src='" . htmlspecialchars($rowarray["image_path"]) 
                                . "' onclick=\"updateGalleryInfo('".htmlspecialchars($rowarray["title"])."', '".htmlspecialchars($rowarray["username"])
                                ."', '".htmlspecialchars($rowarray["upload_time"])."', '".htmlspecialchars($rowarray["width"])
                                ."', '".htmlspecialchars($rowarray["height"])."', '".htmlspecialchars($rowarray["description"])."'); "
                                ."openImageWindow('" . htmlspecialchars($rowarray["title"]) . "', '".htmlspecialchars($rowarray["description"]). "', '".htmlspecialchars($rowarray["image_path"]). "', '" . htmlspecialchars($rowarray["image_id"])."');\"/>";
                                
                                // If you uploaded the image, then create a delete button
                                if ($_SESSION["user_id"] == $rowarray["uploader_id"] || $_SESSION["admin"] == 1){
                                    echo "<form class='imagedelete' id='imagedeleteform' method='POST' action='../handlers/imagedeletehandler.php' enctype='multipart/form-data'>";
                                    echo "<input type='hidden' name='deleteimageid' value=" . $rowarray["image_id"] . ">";
                                    echo "<input type='image' name='delete' alt='Delete Image' src='../../img/X.png' width='20' height='20'>";
                                    echo "</form>";
                                };

                                echo "</div>";
                            }
                        ?>
                    </div>
                </div>
            </div>

            <div id="imagesubmit" class="window resizeable">
                <div class="windowheader">
                    <span class="headertext">Submit an Image</span>
                    <img class="headerbutton" src="../../img/X.png" alt="Close Window" width="30px" height="30px" onclick="toggleElement('imagesubmit', true)"/>
                    <img class="headerbutton" src="../../img/fullscreen.png" alt="Fullscreen Window" width="30px" height="30px" onclick="toggleFullscreen('imagesubmit')"/>
                    <img class="headerbutton" src="../../img/minimize.png" alt="Minimize Window" width="30px" height="30px" onclick="toggleElement('imagesubmit')"/>
                </div>
                <div id="imagesubmitcontainer" class="windowbody">
                    <form id="imagesubmitform" method="POST" action="../handlers/imagehandler.php" enctype="multipart/form-data">
                        <label for="image">Select an image to upload:</label>
                        <input type="file" id="image" name="image" accept="image/png, image/jpeg" required/> <!-- HTML does not allow file fields to be pre-filled --->
                        <label for="title">Image Title:</label>
                        <input type="text" id="title" name="title" placeholder="Enter image title" value=<?php echo isset($_SESSION['inputs']['title']) ? "'".$_SESSION['inputs']['title']."'" : "''"?> required/>
                        <label for="description">Image Description:</label>
                        <textarea id="description" name="description" placeholder="Enter image description" required><?php echo isset($_SESSION['inputs']['description']) ? $_SESSION['inputs']['description'] : '' ?></textarea>
                        <button type="submit">Submit Image!</button>
                    </form>
                    <?php
                        if(isset($_SESSION['status'])) {
                            echo "<div class='status'>" . $_SESSION['status'] . "</div>";
                            unset($_SESSION['status']);
                        }
                    ?>
                </div>
            </div>

            <div id="info" class="window resizeable">
                <div class="windowheader">
                    <span class="headertext">Info</span>
                    <img class="headerbutton" src="../../img/X.png" alt="Close Window" width="30px" height="30px" onclick="toggleElement('info', true)"/>
                    <img class="headerbutton" src="../../img/fullscreen.png" alt="Fullscreen Window" width="30px" height="30px" onclick="toggleFullscreen('info')"/>
                    <img class="headerbutton" src="../../img/minimize.png" alt="Minimize Window" width="30px" height="30px" onclick="toggleElement('info')"/>
                </div>
                <div class="windowbody">
                    <p>This website was made by Brayden Thompson for CS401 - Web Development at Boise State University. Thanks for visiting, leave a comment and upload an image if you want!</p>
                    <p>Contact me at braydenthompson@u.boisestate.edu</p>
                    <p>Copyright Brayden Thompson 2023</p>
                </div>  
            </div>

            <div id="notepad" class="window resizeable">
                <div class="windowheader">
                    <span class="headertext">Notepad+++</span>
                    <img class="headerbutton" src="../../img/X.png" alt="Close Window" width="30px" height="30px" onclick="toggleElement('notepad', true)"/>
                    <img class="headerbutton" src="../../img/fullscreen.png" alt="Fullscreen Window" width="30px" height="30px" onclick="toggleFullscreen('notepad')"/>
                    <img class="headerbutton" src="../../img/minimize.png" alt="Minimize Window" width="30px" height="30px" onclick="toggleElement('notepad')"/>
                </div>
                <div class="windowbody">
                    <textarea></textarea>
                </div>  
            </div>

            
            <div id="button" class="window">
                <div class="windowheader">
                    <span class="headertext">Big Button</span>
                    <img class="headerbutton" src="../../img/X.png" alt="Close Window" width="30px" height="30px" onclick="toggleElement('button', true)"/>
                    <img class="headerbutton" src="../../img/fullscreen.png" alt="Fullscreen Window" width="30px" height="30px" onclick="toggleFullscreen('button')"/>
                    <img class="headerbutton" src="../../img/minimize.png" alt="Minimize Window" width="30px" height="30px" onclick="toggleElement('button')"/>
                </div>
                <div class="windowbody">
                    <button onclick="alert('WOAH\nWHAT\nA\nCOOL\n\BUTTON!')">Click me :-0</button>
                </div>  
            </div>

            <ul id="icons">
                <li onclick="toggleElement('chat')"><img src="../../img/chat.png"/>Chat</li>
                <li onclick="toggleElement('gallery')"><img src="../../img/gallery.png"/>Gallery</li>
                <li onclick="toggleElement('imagesubmit')"><img src="../../img/upload.png"/>Image Submit</li>
                <li onclick="toggleElement('notepad')"><img src="../../img/notepad.png"/>Notepad</li>
                <li onclick="toggleElement('info')"><img src="../../img/info.png"/>Info</li>
                <li onclick="toggleElement('button')"><img src="../../img/X.png"/>Big Button</li>
            </ul> 
        </div>

        <ul id="taskbar">
            <li><a class="taskbarbutton" onclick="toggleElement('chat')"><img src="../../img/chat.png"/>Chat</a></li>
            <li><a class="taskbarbutton" onclick="toggleElement('gallery')"><img src="../../img/gallery.png">Gallery</a></li>
            <li><a class="taskbarbutton" onclick="toggleElement('imagesubmit')"><img src="../../img/upload.png"/>Image Submit</a></li>
            <li><a class="taskbarbutton" onclick="toggleElement('notepad')"><img src="../../img/notepad.png"/>Notepad</a></li>
            <li><a class="taskbarbutton" onclick="toggleElement('info')"><img src="../../img/info.png"/>info</a></li>
            <li><a class="taskbarbutton" onclick="toggleElement('button')"><img src="../../img/X.png">Big Button</a></li>

            <a class="rightlink" href="../handlers/logouthandler.php">
                <img src="../../img/power.png" width="50" height="50" alt="Log Out">
            </a>
        </ul>
	</body>
</html>
