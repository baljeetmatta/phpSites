<html>
    <body>
        <?php 
        if(!isset($_REQUEST['submit']))
        {
            ?>

        <form method="post" enctype="multipart/form-data">
            Name:<input type="text" name="name"/><br/>
            Age:<input type="text" name="age"/><br/>
            <input type="file" name="file"/><br/>
            <input type="submit" name="submit" value="Submit"/>
        </form>
        <?php
        }
        ?>
        <?php
        if(isset($_REQUEST['submit']))
        {
            $a=$_REQUEST['name'];

            echo "Hello ".$_REQUEST['name']." Your age is ".$_REQUEST['age'];
            print_r($_FILES);
            echo "/uploads/$a.png";
            echo $_FILES['file']['tmp_name'];
           if( move_uploaded_file($_FILES['file']['tmp_name'],"uploads/$a.png"))
            echo "File uploaded";
        else
            echo "File not uploaded";



        }


    ?>


    </body>
</html>