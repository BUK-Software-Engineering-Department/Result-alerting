<?php include 'includes/headers.php';
ob_start();
        include 'includes/connect.php';
 ?>


<div id="container">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
<div class="hero-unit-table">   
                             <table class="table table-striped table-bordered table-hover table-condensed" id="dataTables-example">
                                <div class="alert alert-info">
                                    <center><strong><i class="icon-user icon-large"></i>&nbsp;Course Regisration form</strong></center>
                                </div>
                               
                                <?php 

                                include 'studentdetails.php';

                               $co ="SELECT * FROM `courses` WHERE  level = '$level' ";
                                $carryover = "SELECT * FROM `coursereg` INNER JOIN courses on coursereg.course_id=courses.cid WHERE admno = '$admno' AND  score <= '44' AND status = 'UPLOADED' ";
                                 ?>
								   
                                <thead>
                                    <?php
                                     if ($status == 'NOT REGISTERED') {
                                            # code...
                                       
                                     ?>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Course CODE</th>
                                        <th>Course Title</th>
                                        <th>Units</th>
                                        <th>Level</th>
										<th>Semester</th>
										<th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php 
                                    $cart_table = mysqli_query($conn, $co) or die(mysqli_error($conn));
                                    $carryover_table = mysqli_query($conn, $carryover) or die(mysqli_error($conn));
                                    $cart_count = mysqli_num_rows($cart_table);
                                    $x=1; ?>
                                    <form method="POST" action="" >
                                    	
                                   
                                   <?php while ($cart_row = mysqli_fetch_array($cart_table)) {
                                        
                                        
                                        $ccode = $cart_row['ccode'];
                                        $ctitle = $cart_row['ctitle'];
                                        $level = $cart_row['level'];
                                        $cunit = $cart_row['unit'];
                                        $stid = $details['student_id'];
                                        $adm = $details['adm_no'];
                                       
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
                                           
                                            <td width="70"><input type="checkbox" value="<?php echo $course_id ?>" name="coursereg[]"></td>
                                        <?php $x++; }
                                        $cx=$x;
                                         while ($co_row = mysqli_fetch_array($carryover_table)) {
                                        
                                        
                                        $cccode = $co_row['ccode'];
                                        $cctitle = $co_row['ctitle'];
                                        $clevel = $co_row['level'];
                                        $ccunit = $co_row['unit'];
                                        $cstid = $details['student_id'];
                                        $cadm = $details['adm_no'];
                                       
                                        $cSemester = $co_row['semester'];
                                        $ccourse_id = $co_row['cid'];
                                       ?>

                                        <tr>
                                           
                                            <td><?php echo $cx; ?></td>
                                            <td><?php echo $cccode; ?></td>
                                            <td><?php echo $cctitle; ?></td>
                                            <td><?php echo $ccunit; ?></td>
                                            <td><?php echo $clevel; ?></td>
                                            <td><?php echo $cSemester; ?></td>
                                           
                                            <td width="70"><input type="checkbox" value="<?php echo $ccourse_id ?>" name="ccoursereg[]" checked  ></td>
                                        <?php $cx++ ?>
											
                                        </tr>
                                        

                                            
                                            
                                           
                                          

                                    
                                <?php } ?>
                                <tr>
                                	<td></td>
                                	<td></td>
                                	<td></td>
                                	<td></td>
                                	<td></td>
                                	<td></td>
                                	<td><input type="submit" name="submit" class="btn btn-success" value="submit"></td>
                                </tr>
                                	 </form> 
                                	
                                </tbody>
                            </table>
                            <?php  }else{
                                ?> 
                                 <div class="alert alert-success">
                                    <center><strong><i class="icon-user icon-large"></i>&nbsp; Dear <?php echo $name.' you registerd already  contact  your administrator if you have any corrections '; ?></strong></center>
                                </div>
                                <?php
                            }

                            ?>
                        </div>
                        <div class="col-sm-2"></div>
                        </div>
                        </div>


<?php 
if (isset($_POST["submit"])) {
    if (!empty($_POST["coursereg"])) {
                    $stid = $details['student_id'];

        $check = "DELETE FROM coursereg WHERE std_id = '$stid' AND status = 'REGISTERED' ";
        mysqli_query($conn,$check);     
  //      echo "<h3> The scholars you have selected are as follows </h3>";
        $check = $_POST['coursereg'];
        foreach ($_POST["coursereg"] as $key => $value) {
            if (in_array($_POST['coursereg'][$key], $check)) {
                    $course = $_POST['coursereg'][$key];
                    $stid = $details['student_id'];
                    $adm = $details['adm_no'];
            $insert = "INSERT INTO coursereg(course_id, std_id,admno) VALUES ('$course', '$stid','$adm')";

            $in = mysqli_query($conn,$insert) or die(mysqli_error($conn));
            if ($insert) {
                $update = "UPDATE student SET regstatus = 'REGISTERED' WHERE adm_no = '$admno'";
                $u = mysqli_query($conn, $update) or die(mysqli_error($conn));
                if ($u) {
                echo "You registered successfully...";


                header("Location:courses.php?uid=$ses_id");
                  
                }
              //  echo 'the scholars'.$course.' added successfull..';
            }else{
                echo "couldnot add scholars please try again...";
            }
                        }
        }
    }else{
        echo "<script> alert'Please select at least one scholar of your choince' </script>";
    }
}else{      

        echo "alertaflkads";

}
?>