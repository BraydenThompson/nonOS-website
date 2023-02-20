<html>
    <head>
        <title>non-OS Desktop</title>
        <link rel="stylesheet" href="style.css">
        <link rel="icon" type="image/x-icon" href="favicon.ico">
	</head>
    
    <!--TODO: write php to dynamically generate windows -->
    <body>
        <div id="desktoparea">
            <div id="hideMe" class="window resizeable">
                <div id="hideMeWindow" class="windowheader">
                    <span class="headertext">Hide Me!</span>
                    <img class="headerbutton" src="img/X.png" alt="Close Window" width="30px" height="30px" onclick="toggleElement('hideMe', true)"/>
                    <img class="headerbutton" src="img/X.png" alt="Fullscreen Window" width="30px" height="30px" onclick="toggleFullscreen('hideMe')"/>
                    <img class="headerbutton" src="img/X.png" alt="Minimize Window" width="30px" height="30px" onclick="toggleElement('hideMe')"/>
                </div>
                <div class="windowbody">
                    <button> This is a cool button! </button>
                </div>
            </div>

            <div id="chat" class="window resizeable">
                <div class="windowheader">
                    <span class="headertext">Chat</span>
                    <img class="headerbutton" src="img/X.png" alt="Close Window" width="30px" height="30px" onclick="toggleElement('chat', true)"/>
                    <img class="headerbutton" src="img/X.png" alt="Fullscreen Window" width="30px" height="30px" onclick="toggleFullscreen('chat')"/>
                    <img class="headerbutton" src="img/X.png" alt="Minimize Window" width="30px" height="30px" onclick="toggleElement('chat')"/>
                </div>
                <div class="windowbody">
                    <div id="chatbox">
                        <table>
                            <tr>
                                <td>Username</td>
                                <td>This is my comment!</td>
                                <td>10:41pm</td>
                            </tr>
                            <tr>
                                <td>joe</td>
                                <td>The moon landing was a hoax I tell u, the guy neil armstrong siad so in this here interview from 1995 i tell yuo what</td>
                                <td>3:33am</td>
                            </tr>
                            <tr>
                                <td>coolUserNAME12thethird:)))</td>
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
                        Info
                    </div>
                    <div id="gallerybrowser">
                        <img class="galleryimage" src="img/X.png"/>
                        <img class="galleryimage" src="img/X.png"/>
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
                <li onclick="toggleElement('button')"><img src="img/X.png"/>Button woah</li>
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

        <ul class="taskbar">
            <li><a onclick="" class="active"><img src="img/X.png" width=30 height=30/>Chat</a></li>
            <li><a onclick="" class="active"><img src="img/X.png" width=30 height=30/>Gallery</a></li>
            <li><a onclick="" class="active"><img src="img/X.png" width=30 height=30/>Gallery</a></li>
            <li><a onclick="" class="active"><img src="img/X.png" width=30 height=30/>Gallery</a></li>
            <li><a onclick="" class="active"><img src="img/X.png" width=30 height=30/>Gallery</a></li>
            <li><a onclick="toggleElement('notepad')" class=""><img src="img/X.png" width=30 height=30/>Notepad</a></li>
        </ul>

        <script type="text/javascript" src="tools.js"></script>
	</body>
</html>
