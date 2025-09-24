<html>

<body>

    <?php
    if (!isset($_REQUEST['submit'])) { ?>


        <form method="post">
            Name:<input type="text" name="name" /><br />
            Class:<input type="text" name="class" /><br />
            Mobile:<input type="text" name="mobile" /><br />
            Registration No:<input type="text" name="regno" /><br />
            <input type="submit" name="submit" value="Add Student" />
        </form>

    <?php } else {

        $name = $_POST['name'];
        $class = $_POST['class'];
        $mobile = $_POST['mobile'];
        $regno = $_POST['regno'];

        $conn = mysqli_connect("localhost", "root", "", "projectdb") or die("Connection Failed");
        $sql = "insert into students(name,StudentClass,Mobile,Registration) values ('$name','$class','$mobile',$regno)";

        mysqli_query($conn, $sql) or die("Query Unsuccessful");
        header("Location:all.php");
    } ?>
</body>

</html>