<?php include 'includes/headers.php';
		include 'includes/connect.php';
                                     include 'includes/functions.php';

        
            $get_id = $_GET['uid'];
        
 ?>

<div id="container">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
<div class="hero-unit-table">   
                             <table class="table table-striped table-bordered table-hover table-condensed" id="dataTables-example">
                                <div class="alert alert-info    ">
                                    <center><strong><i class="icon-user icon-large"></i>&nbsp;Result History   </strong></center>
                                </div>
                                <?php 
                                include 'studentdetails.php';
                                   
                                	   $co ="SELECT * FROM courses INNER JOIN coursereg  ON courses.cid = coursereg.course_id WHERE std_id= $get_id " ?>
								   
                                
                                     <?php
                                     
                                      $reg = "SELECT * FROM coursereg WHERE std_id = $get_id AND score != '' ";
                                    $regs = mysqli_query($conn, $reg) or die(mysqli_error($conn));
                                    $regs_count = mysqli_num_rows($regs);
                                    
                                    if ($regs_count>0) {
                                         $cart_table = mysqli_query($conn, $co) or die(mysqli_error($conn));
                                    $cart_count = mysqli_num_rows($cart_table);
                                    $x=1;
                                    $totalunit=0;
                                    $totalgp = 0;

                                    ?> 
                                    <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Course CODE</th>
                                        <th>Course Title</th>
                                        <th>Units</th>
                                        <th>Grade</th>
                                        <th>Points</th>
                                        <th>GP</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    
                                    while ($cart_row = mysqli_fetch_array($cart_table)) {
                                        
                                        
                                        $ccode = $cart_row['ccode'];
                                        $ctitle = $cart_row['ctitle'];
                                        $level = $cart_row['level'];
                                        $cunit = $cart_row['unit'];
                                        $stid = $details['student_id'];
                                        $level = $details['level'];
                                       
                                        $Semester = $cart_row['semester'];
                                        $course_id = $cart_row['cid'];
                                        $score = $cart_row['score'];
                                        $grade = grade($score);
                                        $points = points($score);
                                         $gp = gp($points,$cunit);
                                       // $grade = '-'
                                       ?>

                                        <tr>
                                           
                                            <td><?php echo $x; ?></td>
                                            <td><?php echo $ccode; ?></td>
                                            <td><?php echo $ctitle; ?></td>
                                            <td><?php echo $cunit; ?></td>
                                            <td><?php echo $grade; ?></td>
                                            <td><?php  echo $points; ?></td>
                                            <td><?php echo $gp; ?></td>
                                           
                                          
                                        <?php 
                                       $totalunit =$totalunit+$cunit;
                                       $totalgp =$totalgp+$gp;
                                        $x++; ?>
                                            
                                        </tr>

                                  
                                <?php }

                               
                                 $cgpa = cgp($totalgp,$totalunit);

                                ?>
                              
                                    
                                </tbody>
                            </table>
                             
                                  <ul>
                                        <li>Total Unit Registered: <?php echo $totalunit; ?> </li> 
                                        <li>Total Grade points:  <?php echo $totalgp ?></li> 
                                        <li>CGPA: <?php echo ' '. round($cgpa,2); ?> </li>
                                    </ul>
                        </div>
                                   <?php  }else{ ?>
                                    <div class="alert alert-danger">
                                    <center><strong><i class="icon-user icon-large"></i>&nbsp;No Result Uploaded Yet      </strong></center>
                                </div>

                                   <?php

                                   }
                          ?>

                                     
                                   
                        <div class="col-sm-2"></div>
                        </div>
                        </div>


