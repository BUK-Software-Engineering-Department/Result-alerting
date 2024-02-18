



<?php include ('session.php');?>    
<?php
include('header.php');
$get_id = $_GET['id'];
ob_start();
?>
<body>
    <div id="wrapper" style="background-color:skyblue;">
     <?php include 'top_nav.php'; ?>
        <!--/. NAV TOP  -->
       <?php include ('nav_sidebar.php');?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" style="background-color:white;" >
            <div id="page-inner">
             <div class="row">
                    <div class="col-md-5 well">
                        <div class="hero-unit-table">   
                          <div class="hero-unit-table">   
                            <?php include ('connect.php');
                           
                                     $sql = "SELECT * FROM coursereg INNER JOIN courses ON coursereg.course_id = courses.cid INNER JOIN student ON student.student_id = coursereg.std_id  WHERE coursereg_id = '$get_id'  ";
                                     $query= mysqli_query($conn,$sql) or die(mysqli_error($conn));
                            $row = mysqli_fetch_array($query);
                        
                            $id= $row['coursereg_id']; 
                            $fname =$row['fullname'];
                            $course_id= $row['course_id'];
                            $ccode =$row['ccode'];   
                            $admno = $row['adm_no'];  
                            $score = $row['score'];  
                            $ctitle = $row['ctitle']
                           // $coutrse = $row['p_name']; 
                            ?>
                                     <form  method="post"  id="loginForm">
                                
                                <hr>
                                
                               

  <div class="form-group">
    <label for="text">FULL NAME:</label>
    <input type="text" class="form-control" name="fname" value="<?php echo $fname; ?>" readonly >
  </div>
  <div class="form-group">
    <label for="Phone">Adm no:</label>
    <input type="number" class="form-control" name="admno" readonly value="<?php echo $admno; ?>" >
  </div>
 <div class="form-group">
    <label for="score">Course Code:</label>
    <input type="text" class="form-control" name="ccode" value="<?php echo $ccode; ?>" readonly  >
  </div>
 <div class="form-group">
    <label for="score">Course Title:</label>
    <input type="text" class="form-control" name="ctitle" value="<?php echo $ctitle; ?>" readonly  >
  </div>
 <div class="form-group">
    <label for="score">Score:</label>
    <input type="text" id="score"class="form-control" name="score" value="<?php echo $score; ?>" >
  </div>
 



                                <div class = "modal-footer">
                                    <button name = "update" class="btn btn-info ">Update</button>
                                  
                                           

                                </div>
                            
                                       </div>
                
                                          
                                      
                                    </div>
                                    
                                      </form>  
                            <?php 
                            
                            if (isset($_POST['update'])) {

                                
                                $score = $_POST['score'];
                               
                               
                             
                                mysqli_query($conn,"UPDATE coursereg set score = '$score' where coursereg_id ='$id'") or die(mysqli_error($conn));
                                header('location:viewcourse.php'."?id=$course_id");
                               
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
<script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/jquery.maskedinput.js" type="text/javascript"></script>
        <script>
        jQuery(function($){
        $("#nic").mask("99999-9999999-9");
        $("#date").mask("99/99/9999");
        $("#phone").mask("(999) 999-999-99");
        $("#ext").mask("(999) 999-9999? Ext.99999");
        $("#mobil").mask("+2349999999999");
        $("#admn").mask("9999999999");

        $("#apno").mask("99999999999");
        $("#score").mask("99");
        $("#percent").mask("99%");
        $("#productkey").mask("a*-999-a999");
        $("#orderno").mask("PO: aaa-999-***");
        $("#date2").mask("99/99/9999", { autoclear: false });
        $("#date3").mask("99/99/9999", { autoclear: false, completed:function(){alert("Completed!");} });
        $("#mobile2").mask("+1 999 999 999");
        });
      </script>