<html>
    <head>
        <link rel="stylesheet" href="style.css">

        <!-- Load font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@500&display=swap" rel="stylesheet">
    </head>
<body> 
    <div class="logincontainer center">
        <div class="logocontainer">            
            <video autoplay loop preload>
                <source src="img/nonOSLogoVid7000001-0024.webm" type="video/webm">
            </video>
        </div>
        <form class="loginform" action="loginhandler.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Enter Username" required/>
            <label for="title">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter Password" required/>
            <br>
            <button type="submit">Login</button>
        </form>

        <div class="otherloginbuttons">
            <form action="/signup.php">
                <input type="submit" value="Sign Up"/>
            </form>
            <form action="/desktop.php">
                <input type="submit" value="Login as Guest"/>
            </form>
        </div>
    </div>
</body>
</html>