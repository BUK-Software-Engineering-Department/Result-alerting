



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
  </div> <div class="form-group">
    <label for="Phone">Adm no:</label>
    <input type="text" id="adm" class="form-control" name="admno" >
  </div>
  <div class="form-group">
    <label for="Phone">Phone No:</label>
    <input type="text" minlength="11" maxlength="11" id="mobil" class="form-control" name="phone" >
  </div>
 <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" name="email" >
  </div>
   <div class="form-group">
                                    <label class="control-label" for="department"> Select Department:</label>
                      
                         <?php
            //Include database configuration file
            //include('dbConfig.php');
            
            //Get all country data
            $query = mysqli_query($conn, "SELECT * FROM department ");
            
            //Count total number of rows
            $rowCount = mysqli_num_rows($query);
            ?>
            <select  name = "department" class="form-control">
              <option value="0">- SELECT DEPARTMENT -</option>
              
              <?php
              if($rowCount > 0){
                while($row = mysqli_fetch_assoc($query)){ 
                  echo '<option value="'.$row['de_id'].'">'.$row['d_name'].'</option>';
                }
              }else{
                echo '<option value="">DEPARTMENT not available</option>';
              }
              ?>
              
            </select>
            </div>
 <div class="form-group">
                                    <label class="control-label" for="level"> Select Level:</label>
                      
         
                                <select  name = "level" class="form-control">
                                        <option value="100"> 100 Level </option>
                                        <option value="200"> Direct Entry </option>
                                        <option value="300"> Professional Addmission </option>
                                     
                                </select>
</div>

 

                                <div class = "modal-footer">
                                    <button name = "go" class="btn btn-info">Add</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                           

                                </div>
                            
                                       </div>
                
                                          
                                      
                                    </div>
                                    
                                      </form>  
                                      
                                      <?php include ('connect.php');
                                      $data = array();

                            if (isset($_POST['go'])) {

                                $data['fname'] = $_POST['fname'];
                                 $data['email'] = $_POST['email'];
                                  $data['admno'] = $_POST['admno'];
                                  $data['phone'] = $_POST['phone'];
                                 $data['level'] = $_POST['level'];
                                 $data['department'] = $_POST['department'];
                               
                                 $errors = array();

                                 foreach ($data as $value) {
                                    if ($value == "") {

                                        $errors[] = $value .  "field is empty";

                                        }
                                     
                                 }

                                  // check empty fields
                                if (count($errors) == 0) {
                                   

                                        $check = mysqli_query($conn, "SELECT * FROM student  WHERE adm_no = '".$data['admno']."' OR email = '".$data['email']."' OR phone = '".$data['phone']."' ");
                                        $ch = mysqli_num_rows($check);
                                        $fname = $data['fname'];
                                        $email = $data['email'];
                                        $admno = $data['admno'];
                                        $phone = $data['phone'];
                                        $department = $data['department'];
                                        $level = $data['level'];
                                        $pass = $data['admno'];
                                        $cpass = $data['admno'];
                                        // $addr = $data['addr'];
                                        if ($pass == $cpass) {
                                          # code...
                                        
                                        if ($ch==0){
                                            $pass = sha1($pass);
                                                              $d =mysqli_query($conn,"INSERT INTO student (fullname,email,adm_no,dept,level,pass,phone)
                                                values ('$fname','$email','$admno','$department','$level','$pass','$phone')
                                                ") or die(mysql_error($conn));


                                               if ($d) {
                                                header('location:students.php');
                                                echo "<script> alert('student added successfully...') </script>";
                                                  
                                               }else{
                                                echo "<script> alert('couldnot add student') </script>";
                                               }

                                        }else{
                                        echo "<script>alert('Warning : Duplicate phone number,email or admission number number are not allowed')</script>";

                                        }
                                      }else{
                                        echo "<script>alert('Warning : password miss match')</script>";
                                      }
                                   
                                }else{
                                    echo "<script> alert('all fields are required')</script>";
                                }
                            
                            }
                            ?>
                                      
                </div>
            </div>

             <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/jquery.maskedinput.js" type="text/javascript"></script>
        <script>
        jQuery(function($){
        $("#nic").mask("99999-9999999-9");
        $("#date").mask("99/99/9999");
        $("#phone").mask("(999) 999-999-99");
        $("#ext").mask("(999) 999-9999? Ext.99999");
        $("#mobil").mask("+2349999999999");
        $("#admn").mask("9999999999");

        $("#apno").mask("99999999999");
        $("#hno").mask("99");
        $("#percent").mask("99%");
        $("#productkey").mask("a*-999-a999");
        $("#orderno").mask("PO: aaa-999-***");
        $("#date2").mask("99/99/9999", { autoclear: false });
        $("#date3").mask("99/99/9999", { autoclear: false, completed:function(){alert("Completed!");} });
        $("#mobile2").mask("+1 999 999 999");
        });
      </script>
