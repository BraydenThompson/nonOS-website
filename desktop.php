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
    
    <!--TODO: write php to dynamically generate windows -->
    <body>
        <div id="desktoparea">

            <!-- HTML WINDOWS -->
            <div id="chat" class="window resizeable">
                <div class="windowheader">
                    <span class="headertext">Chat</span>
                    <img class="headerbutton" src="img/X.png" alt="Close Window" width="30px" height="30px" onclick="toggleElement('chat', true)"/>
                    <img class="headerbutton" src="img/X.png" alt="Fullscreen Window" width="30px" height="30px" onclick="toggleFullscreen('chat')"/>
                    <img class="headerbutton" src="img/X.png" alt="Minimize Window" width="30px" height="30px" onclick="toggleElement('chat')"/>
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

            <div id="gallery" class="window resizeable" style="visibility: visible">
                <div class="windowheader">
                    <span class="headertext">Gallery</span>
                    <img class="headerbutton" src="img/X.png" alt="Close Window" width="30px" height="30px" onclick="toggleElement('hideMe', true)"/>
                    <img class="headerbutton" src="img/X.png" alt="Fullscreen Window" width="30px" height="30px" onclick="toggleFullscreen('hideMe')"/>
                    <img class="headerbutton" src="img/X.png" alt="Minimize Window" width="30px" height="30px" onclick="toggleElement('hideMe')"/>
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
                                <td>This is a cool image I took of a lake! And also a bunch of other text so that this table entry wraps to multiple rows when the window is resized.</td>
                            </tr>
                            <tr>
                                <td>Tags:</td>
                                <td>Cool, Photograph, Lake, Sunset</td>
                            </tr>
                        </table>
                    </div>
                    <!-- GALLERY IMAGES -->
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
                    </div>
                </div>
            </div>

            <div id="notepad" class="window resizeable">
                <div class="windowheader">
                    <span class="headertext">Notepad+++</span>
                </div>
                <div class="windowbody">
                    <textarea></textarea>
                </div>  
            </div>

            
            <div id="button" class="window">
                <div class="windowheader">
                    <span class="headertext">Button</span>
                </div>
                <div class="windowbody">
                    <button onclick="alert('WOAH\nWHAT\nA\nCOOL\n\BUTTON!')">Click me :-0</button>
                </div>  
            </div>

            <ul id="icons">
                <li onclick="toggleElement('hideMe')"><img src="img/X.png"/>Hide Me!</li>
                <li onclick="toggleElement('notepad')"><img src="img/X.png"/>Notepad</li>
                <li onclick="toggleElement('button')"><img src="img/X.png"/>Big Button</li>
                <li onclick="toggleElement('chat')"><img src="img/X.png"/>Chat</li>
                <li onclick=""><img src="img/X.png"/>TEST</li>
                <li onclick=""><img src="img/X.png"/>TEST</li>
                <li onclick=""><img src="img/X.png"/>TEST</li>
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
            <li><a class="taskbarbutton" onclick="toggleElement('notepad')" class=""><img src="img/X.png" width=30 height=30/>Notepad</a></li>
            <li><a class="taskbarbutton" onclick="toggleElement('chat')"><img src="img/X.png" width=30 height=30/>Chat</a></li>
            <li><a class="taskbarbutton" onclick="toggleElement('gallery')"><img src="img/X.png" width=30 height=30/>Gallery</a></li>
            <li><a class="taskbarbutton" onclick=""><img src="img/X.png" width=30 height=30/>TEST</a></li>
            <li><a class="taskbarbutton" onclick=""><img src="img/X.png" width=30 height=30/>TEST</a></li>
            <li><a class="taskbarbutton" onclick=""><img src="img/X.png" width=30 height=30/>TEST</a></li>

            <a id="aboutlink" href="about.php">About</a>
        </ul>

        <script type="text/javascript" src="tools.js"></script>
	</body>
</html>
