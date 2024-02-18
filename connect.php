



<?php
$local= 'localhost';
$user = 'root';
$pass= '';
$db= 'result';
$conn = mysqli_connect($local,$user, $pass, $db);
if ($conn) {
	
}else{
	die('couldnot connect to database');
}
?>
