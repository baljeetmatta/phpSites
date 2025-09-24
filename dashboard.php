<html>
    <body>
        <?php

        session_start();

        // if(!isset($_COOKIE['user']))
        // {
        //     header("Location:login.php");
        // }
        if(!isset($_SESSION['user']))
        {
            header("Location:login.php");
        }
        ?>
        Welcome to dashboard
        <br/>
        <a href="logout.php">Logout</a>
        
    </body>
</html>