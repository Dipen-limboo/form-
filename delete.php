<?php require('connection.php');
$name =$_GET["name"];
$query = "DELETE FROM student_info where name = '$name'";
// echo $query;die;
if ($connection->query($query) ==TRUE) {
    header ('Location:fetch.php');
    
}
else
{
    echo $connection->error;
}
?>