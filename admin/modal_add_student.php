<?php include 'functions.php'; ?>
<script type="text/javascript">
     function validatePassword() {
        var validator = $("#loginForm").validate({
            rules: {
                password: "required",
                confirmpassword: {
                    equalTo: "#password"
                }
            },
            messages: {
                password: " Enter Password",
                confirmpassword: " Enter Confirm Password Same as Password"
            }
        });
        if (validator.form()) {
            alert('Password accepted');
        }

         $("#loginForm").validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                    remote: {
                        url: "checkemail.php",
                        type: "post"
                     }
                }
            },
            messages: {
                email: {
                    required: "Please Enter Email!",
                    email: "This is not a valid email!",
                    remote: "Email already in use!"
                }
            }
        });
    }
 

</script>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">


                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                          
                                            <div class="alert alert-info"><strong><center>Add Student </center></strong></div>
                                        </div>
                                        <div class="modal-body">
                              <form  method="post" enctype="multipart/form-data" id="loginForm">
                                
                                <hr>
                                
                               

  <div class="form-group">
    <label for="text">FULL NAME:</label>
    <input type="text" class="form-control" name="fname" >
  </div>
  <div class="form-group">
    <label for="Phone">Phone no:</label>
    <input type="number" class="form-control" name="phone" >
  </div>
 <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" name="email" >
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" name="password" id="pwd" >
  </div>
   <div class="form-group">
    <label for="pwd">Confirm Password:</label>
    <input type="password" class="form-control" name="confirmpassword" id="pwd" >
  </div>
    <div class="form-group">
                       <label>GENDER:</label>    <input type="radio" name="gender" value="male" checked> Male
  <input type="radio" name="gender" value="female"> Female
  <input type="radio" name="gender" value="other"> Other
                        </div>
                                <div class = "modal-footer">
                                    <button name = "go" class="btn btn-primary">Add</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                           

                                </div>
                            
                                       </div>
                
                                          
                                      
                                    </div>
                                    
                                      </form>  
                                      
                                       <?php include ('connect.php');
                            if (isset($_POST['go'])) {

                                $name = clean($_POST['fname']);
                                $email = clean($_POST['email']);
                                $phone = clean($_POST['phone']);
                                $password = sha1(clean($_POST['password']));
                                $confirmpassword = sha1(clean($_POST['confirmpassword']));
                                 $gender = clean($_POST['gender']);

                                //image
                               /*

                                 $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                                $image_name = addslashes($_FILES['image']['name']);
                                $image_size = getimagesize($_FILES['image']['tmp_name']);
//
                                move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $_FILES["image"]["name"]);
                                $location = "upload/" . $_FILES["image"]["name"];
                               */
                               


                                     $queryemail = "SELECT * FROM student WHERE email = '$email'";
                                $queryphone = "SELECT * FROM student WHERE phone = '$phone'";
                                $checkemail = mysqli_query($conn,$queryemail);
                                $checkphone = mysqli_query($conn,$queryphone);
                                 $chck1 = mysqli_num_rows($conn, $checkemail);
                                 $chck2 = mysqli_num_rows($conn, $checkphone);
                                 if ($chk1>0) {
                                     echo"<script> alert('Email already exist in the database please change email and try again.')</script>";

                                     # code...
                             }else{
                                if ($chck2>0) {
                                    # code...
                                    echo"<script> alert('phone number already exist in the database please change phone number and try again.')</script>";
                                }else{
                                    if (empty($name) || empty($email) || empty($phone) || empty($password)) {
                                         echo"<script> alert('all fields are required')</script>";
                                    }else{
                                        if ($password!=$confirmpassword) {
                                             echo"<script> alert('passwords mismatch the confirmpassword.')</script>";
                                        }else{
                                             $sql = "INSERT INTO student (fullname,phone,email,pass) VALUES('$name','$phone','$email', '$password') " ;

                               $query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
                               if ($query) {
                                header('location:students.php');
                                    echo"<script> alert('Student is added successfull... buy scratch card and continue registration ')</script>";

                                           # code...
                               }else{
                                    echo"<script> alert('all field required')";
                                
                               }
                                        }
                                    }
                                }
                            }
                                     
                               
                            }
                            ?>
                                      
                                      
                                      
                                      
                </div>
            </div>