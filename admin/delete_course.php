<?php
include('connect.php');

$get_id=$_GET['id'];

mysqli_query($conn,"DELETE from courses where cid='$get_id'")or die(mysqli_error($conn));
header('location:students.php');
?>
