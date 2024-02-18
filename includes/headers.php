<!DOCTYPE html>
<html>
<head>
  <title> BUK | Result Alerting System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- <link rel="stylesheet" href="../css/bootstrap.min.css"> -->
 <link rel="stylesheet"  href="fontawesome/web-fonts-with-css/css/fontawesome-all.min.css">
 <style type="text/css">
    li a{
    font: 15px bold tahoma ;
    color: white;
  }
  li{
    font-style: none;
    font: 20px bold tahoma;
    list-style: none;

  }

   
 </style>

 <div class="header" style=" margin-bottom:3px;height:100px; background-color:white;">
   <h2 align="center" style="margin-top:50px; color:skyblue; margin-left:0px; font-family: arial;" > <img src="includes/buk.jpeg" width="80px"  style="padding-left: 0px; "> <small> Departmental Result Alerting System </small> </h2><P></P>
  </div>
 <!-- Navbar for larger screen like pc and destops-->

<nav>
<?php include 'session.php'; ?>
<ul class="w3-navbar  w3-text-white w3-card-2 w3-left-align"  style="background-color:skyblue ; padding:5px;">
  
  <li><a href="index.php" class="w3-hover-none w3-right w3-hover-text-grey w3-padding-large"><i class="fa fa-home"></i></a></li>
    <li class="w3-hide-small w3-right"><a href="logout.php" class="w3-padding-large"> Logout </a></li>
    <li class="w3-hide-small w3-right"><a href="coursereg.php" class="w3-padding-large"> Course Registration</a></li>
    <li class="w3-hide-small w3-right"><a href="courses.php?uid=<?php echo $ses_id ?>" class="w3-padding-large"> My Courses</a></li>
  
   <li class="w3-hide-small w3-right"><a href="result.php?uid=<?php echo $ses_id ?>" class="w3-padding-large">View Result</a></li>
   
</ul>
</div>


</nav><br>  <br>  
    
</html>
