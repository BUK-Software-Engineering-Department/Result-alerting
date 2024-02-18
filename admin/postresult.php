



<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">


                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                          
                                            <div class="alert alert-info"><strong><center>Post Result </center></strong></div>
                                        </div>
                                        <div class="modal-body">
                              
                              <form  method="post" enctype="multipart/form-data">

                                  <div class="form-group">
                                    <label class="control-label" for="course"> Select Course:</label>
                      
                         <?php
        include('mail.php');            
            $query = mysqli_query($conn, "SELECT * FROM courses ");
            
            //Count total number of rows
            $rowCount = mysqli_num_rows($query);
            ?>
            <select  name = "course" class="form-control">
              <option value="0">- SELECT COURSE -</option>
              
              <?php
              if($rowCount > 0){
                while($row = mysqli_fetch_assoc($query)){ 
                  echo '<option value="'.$row['cid'].'">'.$row['ccode'].'</option>';
                }
              }else{
                echo '<option value="">No course available available</option>';
              }
              ?>
              
            </select>
            </div>
                                
                                 <div class="control-group">
                                           <label class="control-label">Import CSV File:</label>
                                           <input type = 'file' name = 'sel_file' class = "form-control" placeholder="import CSV" required>

                                          
                                 </div>
                                 <div class = "modal-footer">
                                    <button name = "submit" class="btn btn-info">Add</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                           

                                </div>
        
          </form>
   </div>
            </div>

                                      <?php include ('connect.php');
                                          include 'functions.php';

                           if (isset($_POST["submit"])) {
               $cid= $_POST['course'];
               $coursesql = mysqli_query($conn, "SELECT * FROM courses WHERE cid = '$cid'") or die (mysqli_error($conn));
               $rowc = mysqli_fetch_array($coursesql);
               $ccode = $rowc['ccode'];
    $fname = $_FILES['sel_file']['name'];
    $filename= explode('.', $fname);
    if ($filename[1] == 'csv') {
      $handle = fopen($_FILES['sel_file']['tmp_name'], "r");
      

      //$cid=3;
      while ($data = fgetcsv($handle)) {

        $admno = mysqli_real_escape_string($conn, $data[0]);
        $score = mysqli_real_escape_string($conn, $data[1]);
        $promotion= promotion($score);
        $grade = grade($score);
        $sql = "UPDATE coursereg SET score = '$score', promotion = '$promotion', status = 'UPLOADED' WHERE admno = '$admno' AND  course_id = '$cid' ";
          $msgsql= "SELECT * FROM student WHERE adm_no = '$admno'";
          $msg_run = mysqli_query($conn, $msgsql) or die(mysqli_error($conn));
          $rowd = mysqli_fetch_assoc($msg_run);
          $name = $rowd['fullname'];
          $email = $rowd['email'];
          $admno = $rowd['adm_no'];
          $phone = $rowd['phone'];

                                $Message ='Dear '.$name. ' Your '.$ccode. ' result is  ' .$grade ;
                               // $p1 = $row['s_phone'];
 $i= mysqli_query($conn,$sql)or die(mysqli_error($conn));
        $tlt = $ccode.' Result';
    if(sending($email,$tlt,$Message)) { 
        
        } else { 
            echo "<script>alert('Could not send message....')</script>";
        } 
  if($i){
         
            }else{
              echo " couldnot addd result ";
            }
 

       
       
      }
            fclose($handle);


    }

    # code...
  }
    
     function smss($p1,$Message){ 
            $url = "http://smsclone.com/components/com_spc/smsapi.php"; 
            $url.= "?username=abdullahiprotech"; 
            $url.= "&password=1610308078"; 
            $url.= "&sender=FUGUSRS"; 
            $url.= "&recipient='$p1'"; 
            $url.= "&message='$Message'"; 
            $fp = @fopen($url,"r",255); 
            return $fp; 
        }                                   
?>             

</div></div>



