<html>

<body>

    <?php
    if (isset($_REQUEST['id'])) { 
        
         $conn = mysqli_connect("localhost", "root", "", "projectdb") or die("Connection Failed");
      $id=$_REQUEST['id'];

         $sql = "select * from students where StudentId=$id";


       $resultset= mysqli_query($conn, $sql) or die("Query Unsuccessful");
       echo mysqli_num_rows($resultset);

        if(mysqli_num_rows($resultset)>0){
            $row=mysqli_fetch_assoc($resultset);
            
        ?>


        <form method="post">
            Name:<input type="text" name="name" value="<?php echo $row['Name'] ?>" readonly  /><br />
            Class:<input type="text" name="class" value="<?php echo $row['StudentClass'] ?>"  /><br />
            Mobile:<input type="text" name="mobile"  value="<?php echo $row['Mobile'] ?>" /><br />
            Registration No:<input type="text" name="regno" value="<?php echo $row['Registration'] ?>"  /><br />
          
        </form>

    <?php }} ?>
</body>

</html>