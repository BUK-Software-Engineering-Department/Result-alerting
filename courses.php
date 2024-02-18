<?php include 'includes/headers.php';
		include 'includes/connect.php';

        if($_SERVER['REQUEST_METHOD'] == 'GET') {
        
        if(isset($_GET['uid']) && $_GET['uid'] != "") {
            
            $get_id = $_GET['uid'];
        
 ?>


<div id="container">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
<div class="hero-unit-table">   
                             <table class="table table-striped table-bordered table-hover table-condensed" id="dataTables-example">
                                <div class="alert alert-info">
                                    <center><strong><i class="icon-user icon-large"></i>&nbsp;Registtered Courses    </strong></center>
                                </div>
                                <?php 
                                	
                                include 'studentdetails.php';

                                       $co ="SELECT * FROM courses INNER JOIN coursereg  ON courses.cid = coursereg.course_id WHERE std_id= $get_id AND  score <= 44 " ?>
								   
                               
                                     <?php
                                    $cart_table = mysqli_query($conn, $co) or die(mysqli_error($conn));
                                    $cart_count = mysqli_num_rows($cart_table);
                                    if ($cart_count>0) {
                                        ?>

                                         <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Course CODE</th>
                                        <th>Course Title</th>
                                        <th>Units</th>
                                        <th>Level</th>
                                        <th>Semester</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php
                                       $x=1; ?>
                                   
                                   
                                   <?php while ($cart_row = mysqli_fetch_array($cart_table)) {
                                        
                                        
                                        $ccode = $cart_row['ccode'];
                                        $ctitle = $cart_row['ctitle'];
                                        $level = $cart_row['level'];
                                        $cunit = $cart_row['unit'];
                                        $stid = $details['student_id'];
                                       
                                        $Semester = $cart_row['semester'];
                                        $course_id = $cart_row['cid'];
                                       ?>

                                        <tr>
                                           
                                            <td><?php echo $x; ?></td>
                                            <td><?php echo $ccode; ?></td>
                                            <td><?php echo $ctitle; ?></td>
                                            <td><?php echo $cunit; ?></td>
                                            <td><?php echo $level; ?></td>
                                            <td><?php echo $Semester; ?></td>
                                           
                                          
                                        <?php $x++ ?>
                                            
                                        </tr>
                                        

                                            
                                            
                                           
                                          

                                    
                                <?php } 
                                    }else {
                                        ?>
                                         <div class="alert alert-info">
                                    <center><strong><i class="icon-user icon-large"></i>&nbsp;Not registered yet and no carry over     </strong></center>
                                </div>
                                        <?php 
                                    }
                                   } 

                                    }?>
                                
                                	
                                </tbody>
                            </table>
                        </div>
                        <div class="col-sm-2"></div>
                        </div>
                        </div>


