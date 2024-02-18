



<?php include ('session.php');?>	
<?php include ('header.php');?>	
<body>
    <div id="wrapper" style="background-color:skyblue;">
       <?php include 'top_nav.php' ?>;
       
        <!--/. NAV TOP  -->
       <?php include ('nav_sidebar.php');?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" style="background-color: white;"  >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
							 <center><button class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
                              Add STUDENT
                            </button></center>
							
						
                        </h1>
						<?php include ('addstudent.php');?>
						
						<div class="hero-unit-table">   
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                               <center><div class="alert alert-info">
                                    <strong><i class="icon-user icon-large"></i>&nbsp; STUDENTS TABLE!!!</strong>
                                </div></center>
                                <thead>
                                    <tr>
                                        <th>Student ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Adm No.</th>
                                        <th>Department</th>
                                        <th>Status</th>
                                      
                                       
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php include ('connect.php');
                                   

                                     $sql = "SELECT * FROM student INNER JOIN department ON student.dept = department.de_id";
                                     $query= mysqli_query($conn,$sql) or die(mysqli_error($conn));
                                    while ($row = mysqli_fetch_array($query)) {
                                        $id = $row['student_id'];
										
																
										
                                        ?>
                                        <tr class="warning">
                                            <td><?php echo $row['student_id']; ?></td> 
                                            <td><?php echo $row['fullname']; ?></td>
                                            <td><?php echo $row['email']; ?></td>  
                                            <td><?php echo $row['adm_no']; ?></td> 
                                            <td><?php echo $row['d_name']; ?></td>
                                            <td><?php echo $row['regstatus']; ?></td> 
                                           
                                            <td width="140">
                                           
                                                <a href="#delete_student<?php echo $id; ?>" role="button"  data-target = "#delete_student<?php echo $id;?>"data-toggle="modal" class="btn btn-danger"><i class="icon-trash icon-large"></i>&nbsp;Delete</a>


                                                 <a href="edit_student.php<?php echo '?id=' . $id; ?>" class="btn btn-info"><i class="icon-pencil icon-large"></i>&nbsp;Edit</a>



                                            </td>
                                            <!-- student delete modal -->
                                   <?php include ('delete_student_modal.php');?>
                                    <!-- end delete modal -->

                                    </tr> 
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                         <h1 class="page-header">
                             <center><button class="btn btn-success btn-lg" data-toggle="modal" data-target="#poststudents">
                              Insert New In Take
                            </button></center>
                            
                        
                        </h1>
                        <?php include 'poststudents.php'; ?>
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
