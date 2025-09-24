<?php
session_start();
session_unset();//remove all session variables
session_destroy();//remove session
header("Location:login.php");




?>