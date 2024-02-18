



<?php include ('session.php');?>	
<?php include ('header.php');?>	
<body>
    <div id="wrapper" style="background-color:#00802b;">
       <?php include ('top_nav.php');?>
       
        <!--/. NAV TOP  -->
       <?php include ('nav_sidebar.php');?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" style="background-color: white;" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                           
							 <center><button class="btn btn-success btn-lg" data-toggle="modal" data-target="#joke">
                              Add Department
                            </button></center>
							
						
                        </h1>
						<?php include ('add_dept_modal.php');?>
						
						<div class="hero-unit-table">   
              
                               <table cellpadding="0" cellspacing="0" border="0" class="table table-condensed table-striped table-bordered" id="dataTables-example">
                                <div class="alert alert-success">
                                    <center><strong><i class="icon-user icon-large"></i>&nbsp;Department Table</strong></center>
                                </div>
                                <thead>
                                    <tr>
                                        <th>Dept ID</th>
                                        <th>Department</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysqli_query($conn,"select * from department") or die(mysql_error());
                                    while ($row = mysqli_fetch_array($query)) {
                                        $dept_id = $row['de_id'];
                                        ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $row['de_id']; ?></td> 
                                            <td><?php echo $row['d_name']; ?></td> 
                                              <!-- user delete modal -->
                                            <td>
                                           <a href="#delete_dept<?php echo $dept_id; ?>" role="button"  data-target = "#delete_dept<?php echo $dept_id;?>"data-toggle="modal" class="btn btn-danger"><i class="icon-trash icon-large"></i>&nbsp;Delete</a> </td>
                                    <!-- end delete modal -->

                                    </tr>
									
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> 
                <?php include ('delete_dept_modal.php');?>
				
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
