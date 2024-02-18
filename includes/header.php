<!DOCTYPE html>
<html>
<head>
  <title>Green TECH</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- <link rel="stylesheet" href="../css/bootstrap.min.css"> -->
 <link rel="stylesheet"  href="fontawesome/web-fonts-with-css/css/fontawesome-all.min.css">
  <script type="text/javascript">
  
// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}

</script>
 <div class="logo" style=" margin-bottom:3px;height:100px; background-color:white;">
    <img src="1.png" width="100px"><h2 align="center" style="margin-top:-50px; color:green; margin-left:30px;" >GREEN TECH COLLEGE OF HEALTH TECH </h2><P></P>
  </div>
 <!-- Navbar for larger screen like pc and destops-->
<nav>
<ul class="w3-navbar  w3-text-white w3-card-2 w3-left-align"  style="background-color:green; padding:5px;">
  <li class="w3-hide-medium w3-hide-large w3-opennav w3-right">
    <a class="w3-padding-large" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
  </li>
  <li><a href="index.php" class="w3-hover-none w3-right w3-hover-text-grey w3-padding-large"><i class="fa fa-home"></i></a></li>
  <li class="w3-hide-small w3-right"><a href="javascript:void(0)" class="w3-padding-large w3-hover-red"><i class="fa fa-bars"></i></a></li>
   <li class="w3-hide-small w3-right"><a href="aboutus.php" class="w3-padding-large">ABOUT US</a></li>
    <li class="w3-hide-small w3-right"><a href="apply.php" class="w3-padding-large">APPLY </a></li>
    <li class="w3-hide-small w3-right"><a href="guidelines.php" class="w3-padding-large">GUIDELINES </a></li>

   
    <li class="w3-hide-small w3-right" data-toggle="modal" data-target="#" ><a href="login.php" class="w3-padding-large">LOGIN</a></li>
       <li class="w3-dropdown-hover w3-right">
      <a href="#" class="w3-padding-large">PROGRAMMES</a>
      <div class="w3-dropdown-content w3-white w3-card-4">
        <a href="#">COMMUNITY HEALTH</a>
        <a href="list_teachers.php">NURSING </a>
      </div>
       </li>
</ul>
</div>

<!-- Navbar on small screens for phones -->
<div id="navDemo" class="w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
  <ul class="w3-navbar w3-left-align w3-green">
    <li><a class="w3-padding-large" href="students.php">APPLY</a></li>
<p   class="pull-right login"></p>

    <li><a href="" class="w3-padding-large" data-target="#" data-toggle="modal" > <i class="fa fa-lock"></i> 
    LOGIN</a></li>
    <li><a href="teachers.php" class="w3-padding-large">APPLICATION GUIDELINES</a></li>
    <li class="w3-dropdown-hover w3-right">
      <a href="#" class="w3-padding-large">PROGRAMMES</a>
      <div class="w3-dropdown-content w3-white w3-card-4">
        <a href="list_student.php">NURSING</a>
        <a href="list_teachers.php">MID WIFERY</a>
      </div>
       </li>
       <li><a class="w3-padding-large " href="logout.html">LOGOUT</a></li>
  </ul>
</div>
</nav>
    
</html>
