<html>
<body>

<?php
if(!isset($_REQUEST['submit']))
{?>

   
<form action="login.php" method="post">
    Username:<input type="text" name="username"/><br/>
    Password:<input type="password" name="password"/><br/>
    <input type="submit" name="submit" value="Login"/>
</form>
<?php
}
else
{
   $user=$_POST['username'];

   session_start();
   $_SESSION['user']=$user;
   
  //  setcookie("user",$user,time()+3600,"/"); //1 hour
   // echo "Hello ".$user;
   header("Location:Dashboard.php");
   
}
?>

</body>

</html>