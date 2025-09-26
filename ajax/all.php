<?php
$conn= mysqli_connect("localhost","root","","projectdb");
$sql="select * from students";
$result= mysqli_query($conn,$sql);
//$row =mysqli_fetch_assoc($result);

$output= mysqli_fetch_all($result,MYSQLI_ASSOC);
// print_r($output);
print_r(json_encode($output));
//json_decode(json_object,associtive array)
?>
