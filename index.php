<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
<body> 
    <div class="logincontainer center">
        <div class="logocontainer">            
            <video autoplay loop preload>
                <source src="img/nonOSLogoVid7000001-0024.webm" type="video/webm">
            </video>
        </div>
        <form action="loginhandler.php" method="post">
            <div class="loginform">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Enter Username" required/>
                <label for="title">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter Password" required/>
                <br>
                <button type="submit">Login</button>
            </div>
        </form>
        <form action="/signup.php">
            <input type="submit" value="Sign Up"/>
        </form>
        <form action="/desktop.php">
            <input type="submit" value="Login as Guest"/>
        </form>
    </div>
    <h1><a href="desktop.php"> login </a></h1>
</body>
</html>