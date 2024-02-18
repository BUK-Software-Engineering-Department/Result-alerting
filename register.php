



<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">


                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                          
                                            <div class="alert alert-info"><strong><center>Add Course </center></strong></div>
                                        </div>
                                        <div class="modal-body">
                              <form  method="post" enctype="multipart/form-data">
                                
                                 <div class="control-group">
                                           <label class="control-label" for="inputEmail">Course Code:</label>
                                           <input type="text" name="ccode" class = "form-control" placeholder="Course Code" required >
                                          
                                 </div>
                               
                                
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Course Title:</label>
                                    <div class="controls">
                                        <input type="text" name="ctitle" class = "form-control" placeholder="Course Title" required>
                                    </div>
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

                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Course Unit:</label>
                                    <div class="controls">
                                        <input type="number" name="unit" placeholder="Course Unit"  class = "form-control" max ='7' min="0" required >
                                    </div>
                                </div>

                                 <div class="control-group">
                                    <label class="control-label" for="">Level:</label>
                                    <select  name = "level" class="form-control">
                                    <option value="100"> 100 </option>
                                    <option value="200"> 200 </option>
                                    <option value="300"> 300 </option>
                                  </select>
              
                                </div> 

                                 <div class="control-group">
                                    <label class="control-label" for="">Semester:</label>
                                    <select  name = "Semester" class="form-control">
                                    <option value="First"> First Semester </option>
                                    <option value="Second"> Second Semester </option>
                                  </select>
              
                                </div>

                                

                                <div class = "modal-footer">
                                    <button name = "go" class="btn btn-primary">Add</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                           

                                </div>
                            
                                       </div>
                
                                          
                                      
                                    </div>
                                    
                                      </form>
                                      <?php include ('connect.php');
                                      $data = array();

                            if (isset($_POST['go'])) {

                                $data['ccode'] = $_POST['ccode'];
                                 $data['department'] = $_POST['department'];
                                 $data['ctitle'] = $_POST['ctitle'];
                                  $data['unit'] = $_POST['unit'];
                                 $data['level'] = $_POST['level'];
                                 $data['semester'] = $_POST['Semester'];
                                 $errors = array();

                                 foreach ($data as $value) {
                                    if ($value == "") {

                                        $errors[] = $value .  "field is empty";

                                        }
                                     
                                 }

                                // check empty fields
                                if (count($errors) == 0) {
                                   

                                        $check = mysqli_query($conn, "SELECT * FROM course WHERE ccode = '".$data['ccode']."' OR ctitle = '".$data['cctitle']."' ");
                                        $ch = mysqli_num_rows($check);
                                        $level = $data['level'];
                                        $department = $data['department'];
                                        $unit = $data['unit'];
                                        $semester = $data['semester'];
                                        $ccode = $data['ccode'];
                                        $ctitle = $data['ctitle'];
                                        // $addr = $data['addr'];

                                        if ($ch==0){
                                                              $d =mysqli_query($conn,"INSERT INTO course (ccode,ctitle,level,unit,dep_id,semester)
                                                values ('$ccode','$ctitle','$level','$unit','$department','$semester')
                                                ") or die(mysql_error());


                                               if ($d) {
                                                header('location:member.php');
                                                echo "<script> alert('course added successfully...') </script>";
                                                  
                                               }else{
                                                echo "<script> alert('couldnot add course') </script>";
                                               }

                                        }else{
                                        echo "<script>alert('Warning : Duplicate course code or course title number is not allowed')</script>";

                                        }
                                   
                                }else{
                                    echo "<script> alert('all fields are required')</script>";
                                }
                            
                            }
                            ?>
                                      
                </div>
            </div>