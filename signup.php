<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
<body> 
    <div class="logincontainer center">
        <div class="logocontainer">            
            <video autoplay loop preload>
                <source src="nonOSLogoVid7000001-0024.webm" type="video/webm">
            </video>
        </div>
        <form action="loginhandler.php" method="post">
            <div class="loginform">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Enter Username" required/>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter Password" required/>
                <br>
                <input type="password" id="password" name="password" placeholder="Repeat Password" required/>
                <br>
                <button type="submit">Create Account</button>
            </div>
        </form>
    </div>
    <h1><a href="desktop.php"> login </a></h1>
</body>
</html>