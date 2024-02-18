



<?php include ('session.php');?>    
<?php include ('header.php');?> 
<body>
    <div id="wrapper" style="background-color:skyblue;">
       <?php include 'top_nav.php';
$get_id = $_GET['id'];

        ?>;
       
        <!--/. NAV TOP  -->
       <?php include ('nav_sidebar.php');?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" style="background-color:white;" >
            <div id="page-inner">
             <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                          <?php 
                           $sqlcourse = "SELECT * FROM courses  WHERE cid  = '$get_id' ";
                                     $querycourse= mysqli_query($conn,$sqlcourse) or die(mysqli_error($conn));
                                    $row = mysqli_fetch_array($querycourse);
                                        $ccode = $row['ccode'];
                                        $ctitle = $row['ctitle'];
                                        $unit = $row['unit'];
                                        $semester = $row['semester'];
                                        $level = $row['level'];

                          ?>
                             <center><button class="btn btn-info btn-lg" data-toggle="modal" data-target="#">
                              <?php echo $ccode . '  RESULT  SHEET'; ?>
                            </button></center>
                            
                        
                        </h1>
                        <?php include ('addstudent.php');?>
                        <div class="alert alert-info">
                                  <table>  <strong><i class="icon-user icon-large"></i>&nbsp; <tr>
                                      <td>Course Title:</td> <td> <?php echo $ctitle;?> </td></tr>
                                     <tr> <td> Course Code: </td><td> <?php echo $ccode;?></td> </tr>
                                     <tr> <td>Course Unit: </td><td><?php echo $unit;?></td> </tr>
                                      <tr><td>Semester: </td><td> <?php echo $semester;?></td> </tr>
                                     <tr> <td>Level: </td><td> <?php echo $level;?></td>
                                    </tr> </strong> </table>
                                </div>
                        <div class="hero-unit-table">   
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                               
                                <thead>
                                    <tr>
                                        <th>Student ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Adm No.</th>
                                        <th>Score </th>
                                        <th>Grade</th>
                                       
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php include ('connect.php');
                                          include '../includes/functions.php';
                                   

                                     $sql = "SELECT * FROM student INNER JOIN department ON student.dept = department.de_id INNER JOIN coursereg ON student.student_id = coursereg.std_id  WHERE coursereg.course_id = '$get_id' ";
                                     $query= mysqli_query($conn,$sql) or die(mysqli_error($conn));
                                    while ($row = mysqli_fetch_array($query)) {
                                        $id = $row['coursereg_id'];
                                        
                                                                
                                        
                                        ?>
                                        <tr class="warning">
                                            <td><?php echo $row['student_id']; ?></td> 
                                            <td><?php echo $row['fullname']; ?></td>
                                            <td><?php echo $row['email']; ?></td>  
                                            <td><?php echo $row['adm_no']; ?></td> 
                                            <td><?php echo $row['score']; ?></td> 
                                            <td><?php echo grade($row['score']); ?></td> 
                                           
                                            <td>
                                           
                                              

                                                 <a href="edit_result.php<?php echo '?id=' . $id; ?>" class="btn btn-info"><i class="icon-pencil icon-large"></i>&nbsp;Edit</a>



                                            </td>
                                

                                    </tr> 
                                <?php } ?>
                                </tbody>
                            </table>
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
