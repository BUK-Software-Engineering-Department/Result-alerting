



<?php
session_start();
if (!isset($_SESSION['uid'])){
header('location:index.php');
}
$ses_id = $_SESSION['uid'];

?>