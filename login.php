<?php
include 'includes/header.inc.php'

?>
<div class="col-sm-4"></div>

<div class="col-sm-4">
	
		<form method= "post" >
		  <div class="form-group">
		  	<h3 style="margin-bottom: 50px; font: 30px bold; color: skyblue	;" >LOGIN FORM</h3>
		    <label >Email address:</label>
		    <input type="text" class="form-control" id="email" name="username">
		  </div>
		  <div class="form-group">
		    <label for="pwd">Password:</label>
		    <input type="password" class="form-control" name="password" id="pwd">
		  </div>
		  
		  <input  type="submit" name = "submit" value="submit" class="btn btn-info">
		</form>


</div>
<div class="col-sm-4"></div>
<?php
							include('includes/connect.php');
							
							if(isset($_POST['submit']))
							{
							
							$username=$_POST['username'];
							$password=sha1($_POST['password']);
							$pass = sha1($_POST['password']);
								$sqla="SELECT * FROM admin WHERE email = '$username' AND pass = '$password'";
								$sql_user = "SELECT * FROM student WHERE (adm_no = '$username' AND pass = '$pass')  || (email = '$username' AND pass = '$pass')";

								$result = mysqli_query($conn,$sqla) or die(mysqli_error($conn));
								$result_user = mysqli_query($conn,$sql_user) or die(mysqli_error($conn));
							
								$row = mysqli_fetch_array($result);
								$row_user = mysqli_fetch_array($result_user);
								$numberOfRows = mysqli_num_rows($result);	
								$numberOfRows_user = mysqli_num_rows($result_user);	

																
						if ($numberOfRows > 0)	{
																	session_start();
																	$_SESSION['id'] = $row['aid'];
																
																header("Location:admin/students.php");
																
				}else if ($numberOfRows_user>0) {
																unset($_SESSION['id']);
																session_start();
																$_SESSION['uid'] = $row_user['student_id'];
																header("Location:coursereg.php");
															}else{
															
																echo " <br><center><font color= 'red' size='3'>Invalid Username or Password </center></font>";
															
															}
							
							}
							?>
	


