<!-- 
CREATE,READ,UPDATE,DELETE (CRUD) operations for managing records in a database.
READ -> READ ALL records from a database table.
READ PARTICULAR -> READ a particular record from a database table.

READ ALL records from a database table.
1. mysqli_connect(servername,username,password,dbname);
        servername = "localhost"
        username="root"
        password=""
        dbname="projectdb"
        returns the reference of the connection
2. mysqli_query(connection_reference,sql_query);
        sql_query = "SELECT * FROM tablename"
        returns the resultset
3. mysqli_fetch_assoc(resultset_reference);
        returns an associative array of the fetched record
4. mysqli_num_rows(resultset_reference);
        returns the number of rows in the resultset
5. mysqli_close(connection_reference);  
        closes the connection




-->
<html>
<head>
    <style>
        .flex-class{
            display: flex;
            column-gap:4px;
        }
        .flex-class div{
            background-color:blue;
            color:white;
            padding:10px;
        }
        .active{
            background-color: greenyellow!important;
        }

        div a{
            text-decoration: none;
            color:white;
        }
        </style>
</head>
<body>

<?php
 $search="";
    if(isset($_GET["search"]))
        $search=$_GET["search"];


?>

    <form method="get">
    <input type="text" placeholder="Search" name="search" value="<?php echo $search?>"/>
    <button>Search</button>
</form>


    <?php
    $pageNum=1;

    if(!isset($_GET["page"]))
        $pageNum=1;
    else
        $pageNum=$_GET["page"];
   
        

    $limit=5;
    $offset=($pageNum-1)*$limit;

    $conn = mysqli_connect("localhost", "root", "", "projectdb") or die("Connection Failed");
    $sql = "SELECT * FROM Students where name like '%$search%' order by StudentId limit $offset,$limit";
    // select * from students limit offset,limit
    //offset 0, 3 page=1  (pageNum-1)*limit =0
    // offset 3, 3 page=2 =3
    // offset 6, 3 page=3
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful");
    //echo mysqli_num_rows($result);
    if (mysqli_num_rows($result) > 0) {

    ?>

<a href="addStudent.php">Add new Student</a>

        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Class</th>
                    <th>Mobile</th>
                    <th>Registration No</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                /* while($row=mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>".$row['Name']."</td>";
                        echo "<td>".$row['StudentClass']."</td>";
                        echo "<td>".$row['Mobile']."</td>";
                        echo "<td>".$row['Registration']."</td>";
                        echo "</tr>";


                    }
                    */
                while ($row = mysqli_fetch_assoc($result)) {
                    $id=$row['StudentId'];
                ?>
                    <tr>
                        <td><?php echo $row['Name']; ?></td>
                        <td><?php echo $row['StudentClass']; ?></td>
                        <td><?php echo $row['Mobile']; ?></td>
                        <td><?php echo $row['Registration']; ?></td>
                        <td><a href="Student.php?id=<?php echo $id?>">View</a></td>

                    </tr>

                <?php
                }
                ?>



            </tbody>
        </table>
        <?php
         $sql = "SELECT count(*) as count FROM Students where name like '%$search%'";
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful");
   //echo mysqli_num_rows($result);
   $row =mysqli_fetch_assoc($result);
   $total_records=$row['count'];
  
   $total_pages=ceil( $total_records/$limit);
   //echo $total_pages;
   $active="";

   echo "<div class='flex-class'>";
   for($i=1;$i<=$total_pages;$i++)
   {
    if($i==$_GET["page"])
        $active="active";
    else
        $active="";

    echo "<div class='$active'><a href='all.php?page=$i&search=$search'>$i</a></div>";

   }
   echo "</div>"



    
        ?>
    <?php
    } else
        echo "No Records Found";
    mysqli_close($conn);

    ?>


1. Login/Signup - database users 
2. Login ->Session-> ID,title,isresolved,dated,userid
        1. Existing tasks (Session)
        2. Add a users
        3. DELETE
        4. Edit - isresolved

</body>

</html>