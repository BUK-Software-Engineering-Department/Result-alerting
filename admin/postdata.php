



<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">


                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                          
                                            <div class="alert alert-info"><strong><center>Post DATA </center></strong></div>
                                        </div>
                                        <div class="modal-body">
                              
                              <form  method="post" enctype="multipart/form-data">

                               
                                
                                 <div class="control-group">
                                           <label class="control-label">Import CSV File:</label>
                                           <input type = 'file' name = 'sel_file' class = "form-control" placeholder="import CSV" required>

                                          
                                 </div>
                                 <div class = "modal-footer">
                                    <button name = "submit" class="btn btn-primary">Add</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                           

                                </div>
        
          </form>
   </div>
            </div>

                                      <?php include ('connect.php');

                           if (isset($_POST["submit"])) {
              // $cid= $_POST['course'];

    $fname = $_FILES['sel_file']['name'];
    $filename= explode('.', $fname);
    if ($filename[1] == 'csv') {
      $handle = fopen($_FILES['sel_file']['tmp_name'], "r");
      

      //$cid=3;
      while ($data = fgetcsv($handle)) {

        $A = mysqli_real_escape_string($conn, $data[0]);
        $B = mysqli_real_escape_string($conn, $data[1]);
        $C = mysqli_real_escape_string($conn, $data[2]);
        $D = mysqli_real_escape_string($conn, $data[3]);
        $E = mysqli_real_escape_string($conn, $data[4]);
        $F = mysqli_real_escape_string($conn, $data[5]);

        $sql = "INSERT INTO  courses( ccode, ctitle, level, dept, unit, semester) VALUES('$A','$B','$C','$D', '$E','$F') ";
        $i= mysqli_query($conn,$sql)or die(mysqli_error($conn));
        
      }
            fclose($handle);

if($i){
            echo "<script>alert('Result CSV Uploaded')</script>";
            echo "<script>window.open('result.php')</script>";
            }else{
              echo " couldnot addd result ";
            }

    }

    # code...
  }
                                      
?>             

</div></div>