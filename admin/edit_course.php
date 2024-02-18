



<?php include ('session.php');?>    
<?php
include('header.php');
$get_id = $_GET['id'];
ob_start();
?>
<body>

    <div id="wrapper" style="background-color:skyblue;">
       <?php include 'top_nav.php';
        
       include ('nav_sidebar.php');?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
             <div class="row">
                    <div class="col-md-5 well">
                        <div class="hero-unit-table">   
                          <div class="hero-unit-table">   
                            <?php include ('connect.php');
                            $query = mysqli_query($conn,"SELECT * from courses inner join department on courses.dept =department.de_id  where cid ='$get_id'") or die(mysqli_error($conn));
                            $row = mysqli_fetch_array($query);
                            $ccode = $row['ccode'];
                            $ctitle = $row['ctitle'];
                            $level = $row['level'];
                            $dept = $row['dept'];
                            $department = $row['d_name'];
                            $unit= $row['unit'];
                            $semester = $row['semester'];
                          
                            ?>
                        
                            <form  method="post" >
                                
                                <hr>
                                
                                 <div class="control-group">
                                           <label class="control-label" for="inputEmail">Course Code:</label>
                                           <input type="text" name="ccode" value="<?php echo $ccode; ?>" class = "form-control" placeholder="Course Code" required >
                                          
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
              <option value="<?php echo $dept ?>">- <?php echo $department ?> -</option>
              
              <?php
              if($rowCount > 0){
                while($rows = mysqli_fetch_assoc($query)){ 
                  echo '<option value="'.$rows['de_id'].'">'.$rows['d_name'].'</option>';
                }
              }else{
                echo '<option value="">DEPARTMENT not available</option>';
              }
              ?>
              
            </select>
            </div>

                             
                                 <div class="control-group">
                                    <label class="control-label" for="inputPassword">Course Title:</label>
                                    <div class="controls">
                                        <input type="text" name="ctitle" value="<?php echo $ctitle; ?>" class = "form-control" placeholder="Course Title" required >
                                    </div> 
                                
                               
                                   <div class="form-group">
                                    <label class="control-label" for="level">  Level:</label>
                      
                                            <select  name = "level" class="form-control">
                                              <option value="<?php echo $level ?> "> <?php echo $level ?> </option>
                                              <option value="100"> 100  </option>
                                              <option value="200"> 200  </option>
                                              <option value="300"> 300  </option>
                                              <option value="400"> 400  </option>
                                              <option value="500"> 500  </option>
                                              <option value="600"> 600  </option>
                                              
                                             
                                            </select>
                                   </div>
  <div class="form-group">
                                    <label class="control-label" for="semester">  Semester:</label>
                      
                                            <select  name = "semester" class="form-control">
                                              <option value="<?php echo $semester ?> "> <?php echo 'default' ?> </option>
                                              <option value="1"> First Semester  </option>
                                              <option value="2"> Second Semester  </option>
                                            
                                             
                                            </select>
                                   </div>


                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Units:</label>
                                    <div class="controls">
                                        <input type="number" name="unit" value="<?php echo $unit; ?>" class = "form-control" placeholder="Course Units" required >
                                    </div>
                                </div>

                                
 

                            
                                       </div>
                </div>
                                          
                                      
                                    </div>
                                       <button type="submit" name="update" class="btn btn-info"><i class="icon-save icon-large"></i>&nbsp;Update</button>
                                        <span><a href = "courses.php" class = "btn btn-danger"> Back</a></span>
                                    </div>
                                </div>
                            </form>

                            <?php
                            if (isset($_POST['update'])) {

                                $ccode = $_POST['ccode'];
                                $ctitle = $_POST['ctitle'];
                                $unit = $_POST['unit'];
                                $level = $_POST['level'];
                                $dept = $_POST['department'];
                                $semester = $_POST['semester'];


                               
                                
                                mysqli_query($conn,"UPDATE courses set ccode ='$ccode', ctitle='$ctitle', unit='$unit', dept ='$dept', level='$level', semester='$semester' where cid='$get_id'") or die(mysqli_error($conn));
                                header('location:courses.php');
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
