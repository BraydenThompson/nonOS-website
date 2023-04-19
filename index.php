<?php
    session_start();
?>

<html>
    <head>
        <title>non-OS Login</title>
        <link rel="stylesheet" href="./css/style.css">

        <!-- Load font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@500&display=swap" rel="stylesheet">
    </head>
<body> 
    <div class="logincontainer center">
        <div class="logocontainer">            
            <video autoplay loop preload muted>
                <source src="./img/nonOSLogoVid7000001-0024.webm" type="video/webm">
            </video>
        </div>

        <?php
            if(isset($_SESSION['status'])) {
                echo "<div class='status'>" . $_SESSION['status'] . "</div>";
                unset($_SESSION['status']);
            }
        ?>


        <form class="loginform" action="./php/handlers/loginhandler.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Enter Username" value=<?php echo isset($_SESSION['inputs']['username']) ? "'".$_SESSION['inputs']['username']."'" : "''" ?> required/>
            <label for="title">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter Password" required/>
            <br>
            <button type="submit">Login</button>
        </form>

        <div class="otherloginbuttons">
            <form action="./php/web/signup.php">
                <input type="submit" value="Sign Up"/>
            </form>
            <form action="./php/handlers/guesthandler.php">
                <input type="submit" value="Login as Guest"/>
            </form>
        </div>
    </div>
</body>
</html>