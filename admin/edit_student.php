



<?php include ('session.php');?>    
<?php
include('header.php');
$get_id = $_GET['id'];
ob_start();
?>
<body>
    <div id="wrapper">
       <!--/. NAV TOP  -->
       <?php 
        include 'top_nav.php'; 
       include ('nav_sidebar.php');?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper"  >
            <div id="page-inner">
             <div class="row">
                    <div class="col-md-5 well">
                        <div class="hero-unit-table">   
                          <div class="hero-unit-table">   
                            <?php include ('connect.php');
                            $sql = "SELECT * FROM student INNER JOIN department ON student.dept = department.de_id WHERE student_id = '$get_id' ";
                            $query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
                            $row = mysqli_fetch_array($query);
                        
                            $id= $row['student_id']; 
                            $fname =$row['fullname'];
                            $email =$row['email'];   
                            $admno = $row['adm_no'];  
                            $department = $row['d_name'];
                           // $course = $row['p_name']; 
                            ?>
                                     <form  method="post"  id="loginForm">
                                
                                <hr>
                                
                               

  <div class="form-group">
    <label for="text">FULL NAME:</label>
    <input type="text" class="form-control" name="fname" value="<?php echo $fname; ?>" >
  </div>
  <div class="form-group">
    <label for="Phone">Adm no:</label>
    <input type="number" class="form-control" name="admno" readonly value="<?php echo $admno; ?>" >
  </div>
 <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" >
  </div>
 



                                <div class = "modal-footer">
                                    <button name = "update" class="btn btn-primary">Update</button>
                                  
                                           

                                </div>
                            
                                       </div>
                
                                          
                                      
                                    </div>
                                    
                                      </form>  
                            <?php 
                            
                            if (isset($_POST['update'])) {

                                $name = $_POST['fname'];
                                $email = $_POST['email'];
                                $admno = $_POST['admno'];
                               
                               $sql = "SELECT * FROM  student WHERE email = '$email'";
                               $chk =  mysqli_query($conn,$sql);
                               $chkemail = mysqli_num_rows($chk);
                               if ($chkemail>0) {
                                                echo "<script> alert('email already exist in the database please change email and try again') </script>";
                                  
                               }else{
                                mysqli_query($conn,"UPDATE student set fullname='$name', email = '$email' where adm_no ='$admno'") or die(mysqli_error($conn));
                                header('location:students.php');
                               }
                                
                            }
                            ?>


                        </div>
                        </div>
                        </div>
                    </div>
                </div> 
                
                
                </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
   <?php include ('script.php');?>
</body>
</html>
