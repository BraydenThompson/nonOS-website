<?php
    session_start();
?>
<html>
    <head>
        <title>non-OS Signup</title>
        <link rel="stylesheet" href="../../css/style.css">

        <!-- Load font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@500&display=swap" rel="stylesheet">
    </head>
<body> 
    <div class="logincontainer center">
        <div class="logocontainer">            
            <video autoplay loop preload muted>
                <source src="../../img/nonOSLogoVid7000001-0024.webm" type="video/webm">
            </video>
        </div>

        <?php
            if(isset($_SESSION['status'])) {
                echo "<div class='status'>" . $_SESSION['status'] . "</div>";
                unset($_SESSION['status']);
            }
        ?>

        <form class="loginform" action="../handlers/signuphandler.php" method="POST">
            <label for="username">Create Username:</label>
            <input type="text" id="username" name="username" placeholder="Enter Username" value=<?php echo isset($_SESSION['inputs']['username']) ? "'".$_SESSION['inputs']['username']."'" : "''"?> required/>
            <label for="password">Create Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter Password" required/>
            <br>
            <input type="password" id="password_repeat" name="password_repeat" placeholder="Repeat Password" required/>
            <br>
            <button type="submit">Create Account</button>
        </form>
    </div>
</body>
</html>