<html>
    <body>
        <?php
       // print_r($_COOKIE);
        if(!isset($_COOKIE['user']))
            echo "Welcome Guest";
        else
        echo "Hello".$_COOKIE['user'];
        ?>
    </body>
</html>