<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
<body>
    <div class="center">
        <div class="logocontainer">            
            <img id="logo" alt="logo" src="/img/dog.jpg" width="300" height="300"/>
        </div>
        <form action="loginhandler.php" method="post">
            <div class="logincontainer">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Enter Username" required/>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter Password" required/>
                <button type="submit">Login</button>
                <button>Sign Up</button>
                <button>Login as Guest</button>
            </div>
        </form>
    </div>
    <h1><a href="desktop.php"> login </a></h1>
</body>
</html>