 <?php 
                                	$sql = "SELECT * FROM student JOIN department ON student.dept = department.de_id where student_id = $ses_id";
                                	$qury_run = mysqli_query($conn, $sql);
                                	$details = mysqli_fetch_array($qury_run) or die(mysqli_error($conn));
                                	$name = $details['fullname'];
                                    $admno = $details['adm_no'];
                                     
                                        $level = $details['level'];
                                        $admno = $details['adm_no'];
                                        $program = $details['d_name'];
                                        $status = $details['regstatus'];
                                        ?>

                                         <ul>
								    	<li> <strong> Name:</strong> <?php echo $name ?> </li> 
								    	<li><strong>Admission Number:</strong><?php echo $admno ?></li> 
								        <li><strong>Program Name:</strong> <?php echo $program ?> </li> <strong>  <li>Level: </strong> <?php echo $level .' Level' ?> </li>
								    	<li><strong>Session:</strong> <?php echo date("Y").'/'. date("Y"); ?></li>
								    </ul>