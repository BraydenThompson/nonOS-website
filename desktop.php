<html>
    <head>
        <title>non-OS Desktop</title>
        <link rel="stylesheet" href="style.css">

        <!-- Load font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@500&display=swap" rel="stylesheet">

        <link rel="icon" type="image/x-icon" href="favicon.ico">
	</head>
    
    <!--TODO: write php to dynamically generate windows, taskbar buttons, and desktop icons -->
    <body class="desktopbody">
        <div id="desktoparea">

            <!-- HTML WINDOWS -->
            <div id="chat" class="window resizeable">
                <div class="windowheader">
                    <span class="headertext">Chat</span>
                    <img class="headerbutton" src="img/X.png" alt="Close Window" width="30px" height="30px" onclick="toggleElement('chat', true)"/>
                    <img class="headerbutton" src="img/fullscreen.png" alt="Fullscreen Window" width="30px" height="30px" onclick="toggleFullscreen('chat')"/>
                    <img class="headerbutton" src="img/minimize.png" alt="Minimize Window" width="30px" height="30px" onclick="toggleElement('chat')"/>
                </div>
                <div class="windowbody">
                    <div id="chatbox">
                        <!-- COMMENT TABLE -->
                        <table class="tablerounded">
                            <tr>
                                <td>Username</td>
                                <td>This is my comment!</td>
                                <td>10:41pm</td>
                            </tr>
                            <tr>
                                <td>joe</td>
                                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
                                <td>3:33am</td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td>hi</td>
                                <td>10:41pm</td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td>This is my wacky and cool and insightful comment!</td>
                                <td>10:41pm</td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td>This is my wacky and cool and insightful comment!</td>
                                <td>10:41pm</td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td>This is my wacky and cool and insightful comment!</td>
                                <td>10:41pm</td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td>This is my wacky and cool and insightful comment!</td>
                                <td>10:41pm</td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td>This is my wacky and cool and insightful comment!</td>
                                <td>10:41pm</td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td>This is my wacky and cool and insightful comment!</td>
                                <td>10:41pm</td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td>This is my wacky and cool and insightful comment!</td>
                                <td>10:41pm</td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td>This is my wacky and cool and insightful comment!</td>
                                <td>10:41pm</td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td>This is my wacky and cool and insightful comment!</td>
                                <td>10:41pm</td>
                            </tr>
                        </table>
                    </div> 
                    <form>
                        <div id="chatform">
                            <input type="submit" name="submit" value="Send!"/>
                            <span><input type="text" id="username" name="username" placeholder="Enter your message here!"/></span>
                        </div>
                    </form>
                </div>
            </div>

            <div id="gallery" class="window resizeable">
                <div class="windowheader">
                    <span class="headertext">Gallery</span>
                    <img class="headerbutton" src="img/X.png" alt="Close Window" width="30px" height="30px" onclick="toggleElement('gallery', true)"/>
                    <img class="headerbutton" src="img/fullscreen.png" alt="Fullscreen Window" width="30px" height="30px" onclick="toggleFullscreen('gallery')"/>
                    <img class="headerbutton" src="img/minimize.png" alt="Minimize Window" width="30px" height="30px" onclick="toggleElement('gallery')"/>
                </div>
                <div id="gallerycontainer" class="windowbody">
                    <div id="galleryinfo">
                        Image Info
                        <table class="tablerounded">
                            <tr>
                                <td>Title:</td>
                                <td>MyImage</td>
                            </tr>
                            <tr>
                                <td>Uploader:</td>
                                <td>myName</td>
                            </tr>
                            <tr>
                                <td>Upload date:</td>
                                <td>6/2/2024</td>
                            </tr>
                            <tr>
                                <td>Resolution:</td>
                                <td>300 x 300</td>
                            </tr>
                            <tr>
                                <td>Description:</td>
                                <td>This is a cool image I took of a lake!</td>
                            </tr>
                            <tr>
                                <td>Tags:</td>
                                <td>Cool, Photograph, Lake, Sunset</td>
                            </tr>
                        </table>

                        <div id="galleryinfobuttons">
                            <button onclick="toggleElement('imagesubmit')">Upload a new Image!</button>
                            <button>Delete</button>
                        </div>
                    </div>
                    <!-- GALLERY IMAGES -->
                    <!-- TODO: Generate a new window with that image when you click on it, and display image info -->
                    <div id="gallerybrowser">
                        <img class="galleryimage" src="img/X.png"/>
                        <img class="galleryimage" src="img/X.png"/>
                        <img class="galleryimage" src="img/dog.png"/>
                        <img class="galleryimage" src="img/dog2.png"/>
                        <img class="galleryimage" src="img/X.png"/>
                        <img class="galleryimage" src="img/X.png"/>
                        <img class="galleryimage" src="img/dogwide.png"/>
                        <img class="galleryimage" src="img/X.png"/>
                        <img class="galleryimage" src="img/X.png"/>
                        <img class="galleryimage" src="img/X.png"/>
                        <img class="galleryimage" src="img/X.png"/>
                        <img class="galleryimage" src="img/X.png"/>
                        <img class="galleryimage" src="img/X.png"/>
                        <img class="galleryimage" src="img/X.png"/>
                    </div>
                </div>
            </div>

            <div id="imagesubmit" class="window resizeable">
                <div class="windowheader">
                    <span class="headertext">Submit an Image</span>
                    <img class="headerbutton" src="img/X.png" alt="Close Window" width="30px" height="30px" onclick="toggleElement('imagesubmit', true)"/>
                    <img class="headerbutton" src="img/fullscreen.png" alt="Fullscreen Window" width="30px" height="30px" onclick="toggleFullscreen('imagesubmit')"/>
                    <img class="headerbutton" src="img/minimize.png" alt="Minimize Window" width="30px" height="30px" onclick="toggleElement('imagesubmit')"/>
                </div>
                <div id="imagesubmitcontainer" class="windowbody">
                    <form id="imagesubmitform">
                        <label for="image">Select an image to upload:</label>
                        <input type="file" id="image" name="image" accept="image/png, image/jpeg" required/>
                        <label for="title">Image Title:</label>
                        <input type="text" id="title" name="title" placeholder="Enter image title" required/>
                        <label for="description">Image Description:</label>
                        <textarea id="description" name="description" placeholder="Enter image description"></textarea>
                        <label for="tags">Image Tags:</label>
                        <textarea id="tags" name="tags" placeholder="Enter image tags sepparated by commas: ex (tag1, tag2, tag3)"></textarea>
                        <button type="submit">Submit Image!</button>
                    </form>
                </div>
            </div>

            <div id="exampleImage" class="window resizeable imagewindow">
                <div class="windowheader">
                    <span class="headertext">imageFilename.png</span>
                    <img class="headerbutton" src="img/X.png" alt="Close Window" width="30px" height="30px" onclick="toggleElement('exampleImage', true)"/>
                    <img class="headerbutton" src="img/fullscreen.png" alt="Fullscreen Window" width="30px" height="30px" onclick="toggleFullscreen('exampleImage')"/>
                    <img class="headerbutton" src="img/minimize.png" alt="Minimize Window" width="30px" height="30px" onclick="toggleElement('exampleImage')"/>
                </div>
                <div class="windowbody">
                    <img class="center" src="img/dog.png" alt="Image Description: A picture of a dog"/>
                </div>
            </div>

            <div id="notepad" class="window resizeable">
                <div class="windowheader">
                    <span class="headertext">Notepad+++</span>
                    <img class="headerbutton" src="img/X.png" alt="Close Window" width="30px" height="30px" onclick="toggleElement('notepad', true)"/>
                    <img class="headerbutton" src="img/fullscreen.png" alt="Fullscreen Window" width="30px" height="30px" onclick="toggleFullscreen('notepad')"/>
                    <img class="headerbutton" src="img/minimize.png" alt="Minimize Window" width="30px" height="30px" onclick="toggleElement('notepad')"/>
                </div>
                <div class="windowbody">
                    <textarea></textarea>
                </div>  
            </div>

            
            <div id="button" class="window">
                <div class="windowheader">
                    <span class="headertext">Big Button</span>
                    <img class="headerbutton" src="img/X.png" alt="Close Window" width="30px" height="30px" onclick="toggleElement('button', true)"/>
                    <img class="headerbutton" src="img/fullscreen.png" alt="Fullscreen Window" width="30px" height="30px" onclick="toggleFullscreen('button')"/>
                    <img class="headerbutton" src="img/minimize.png" alt="Minimize Window" width="30px" height="30px" onclick="toggleElement('button')"/>
                </div>
                <div class="windowbody">
                    <button onclick="alert('WOAH\nWHAT\nA\nCOOL\n\BUTTON!')">Click me :-0</button>
                </div>  
            </div>

            <ul id="icons">
                <li onclick="toggleElement('chat')"><img src="img/X.png"/>Chat</li>
                <li onclick="toggleElement('gallery')"><img src="img/X.png"/>Gallery</li>
                <li onclick="toggleElement('imagesubmit')"><img src="img/X.png"/>Image Submit</li>
                <li onclick="toggleElement('exampleImage')"><img src="img/dog.png"/>Example Image</li>
                <li onclick="toggleElement('notepad')"><img src="img/X.png"/>Notepad</li>
                <li onclick="toggleElement('button')"><img src="img/X.png"/>Big Button</li>
                <li onclick=""><img src="img/X.png"/>TEST</li>
                <li onclick=""><img src="img/X.png"/>TEST</li>
                <li onclick=""><img src="img/X.png"/>TEST</li>
                <li onclick=""><img src="img/X.png"/>TEST</li>
                <li onclick=""><img src="img/X.png"/>TEST</li>
                <li onclick=""><img src="img/X.png"/>TEST</li>
                <li onclick=""><img src="img/X.png"/>TEST</li>
            </ul> 
        </div>

        <ul id="taskbar">
            <li><a class="taskbarbutton" onclick="toggleElement('chat')"><img src="img/X.png"/>Chat</a></li>
            <li><a class="taskbarbutton" onclick="toggleElement('gallery')"><img src="img/X.png">Gallery</a></li>
            <li><a class="taskbarbutton" onclick="toggleElement('imagesubmit')"><img src="img/X.png"/>Image Submit</a></li>
            <li><a class="taskbarbutton" onclick="toggleElement('exampleImage')"><img src="img/dog.png"/>Example Image</a></li>
            <li><a class="taskbarbutton" onclick="toggleElement('notepad')" class=""><img src="img/X.png"/>Notepad</a></li>
            <li><a class="taskbarbutton" onclick="toggleElement('button')"><img src="img/X.png">Big Button</a></li>
            <li><a class="taskbarbutton" onclick=""><img src="img/X.png"/>TEST</a></li>
            <li><a class="taskbarbutton" onclick=""><img src="img/X.png"/>TEST</a></li>
            <li><a class="taskbarbutton" onclick=""><img src="img/X.png"/>TEST</a></li>

            <a class="rightlink" href="index.php">Log Out</a>
            <a class="rightlink" href="about.php">About</a>
        </ul>

        <script type="text/javascript" src="tools.js"></script>
	</body>
</html>
