




<?php include ('session.php');?>	
<?php include ('header.php');?>	
<body>
    <div id="wrapper" style="background-color:skyblue;">
       <?php include ('top_nav.php');?>
       
        <!--/. NAV TOP  -->
       <?php include ('nav_sidebar.php');?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" style="background-color: white;" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
						  <h1 class="page-header">
                             <center><button class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
                              Add Course
                            </button></center>
                             
                        </h1>
                        <?php include ('addcourse.php');?>

						
						<div class="hero-unit-table">   
                             <table class="table table-striped table-bordered table-hover table-condensed" id="dataTables-example">
                                <div class="alert alert-info">
                                    <center><strong><i class="icon-user icon-large"></i>&nbsp;Courses</strong></center>
                                </div>
								    <ul class="breadcrumb"> 
										<li>Courses /</li>				
									
									
									</ul>
                                <thead>
                                    <tr>
                                        <th>Course ID</th>
                                        <th>Course CODE</th>
                                        <th>Course Title</th>
                                        <th>Units</th>
                                        <th>Level</th>
                                        <th>Department</th>
										<th>Semester</th>
										<th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php include ('connect.php');
                                    $cart_table = mysqli_query($conn, "SELECT * FROM courses INNER JOIN department on courses.dept = department.de_id") or die(mysqli_error($conn));
                                    $cart_count = mysqli_num_rows($cart_table);
                                    while ($cart_row = mysqli_fetch_array($cart_table)) {
                                        $id = $cart_row['cid'];
                                        $course_id = $cart_row['cid'];
                                        $ccode = $cart_row['ccode'];
                                        $ctitle = $cart_row['ctitle'];
                                        $level = $cart_row['level'];
                                        $cunit = $cart_row['unit'];
                                        $department = $cart_row['d_name'];
                                        $Semester = $cart_row['semester'];
                                       ?>

                                        <tr>
                                           
                                            <td><?php echo $course_id; ?></td>
                                            <td><?php echo $ccode; ?></td>
                                            <td><?php echo $ctitle; ?></td>
                                            <td><?php echo $cunit; ?></td>
                                            <td><?php echo $level; ?></td>
                                            <td><?php echo $department; ?></td>
                                            <td><?php echo $Semester; ?></td>
                                           
										    <td width="140">
                                                 <a href="#delete_course<?php echo $id; ?>" role="button"  data-target = "#delete_course<?php echo $id;?>"data-toggle="modal" class="btn btn-danger"><i class="icon-trash icon-large"></i>&nbsp;Delete</a>

											
                                             <a href="edit_course.php<?php echo '?id=' . $id; ?>" class="btn btn-info"><i class="icon-pencil icon-large"></i>&nbsp;Edit</a></td>
                        <?php include ('delete_course_modal.php');?>
                                             
                                        </tr>
                                            
                                            
                                           
                                         
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
