



<div class="modal fade" id="joke" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                          
                                            <h4 class="modal-title" id="myModalLabel"></h4>
                                        </div>
                                        <div class="modal-body">
                            <form  method="post" enctype="multipart/form-data">
                                <div class="alert alert-success"><strong><center>Add Department </center></strong></div>
                                <hr>
								
								<div class="control-group">
                                    <label class="control-label" for="inputEmail">Department:</label>
                                    <div class="controls">
                                        <input type="text" class = "form-control" name="dept" id="inputEmail" placeholder="Department Name">
                                    </div>
                                </div>
                               
                               
								<div class = "modal-footer">
											 <button name = "go" class="btn btn-success">Save</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                           

								</div>
							
									   </div>
                                     
                                          
                                      
                                    </div>
									
									  </form>  

                            <?php
                            if (isset($_POST['go'])) {

                                $dept = $_POST['dept'];

                          
								
										$query = mysqli_query($conn,"select * from department where d_name= '$dept'") or die (mysqli_error($conn));
										$count = mysqli_num_rows($conn,$query);

									if ($count  > 0){ 
									?>
										<script>
											alert("Department Already exist");
										</script>
									<?php
										}
										else{
									 mysqli_query($conn,"insert into department (d_name) values('$dept')") or die(mysql_error());
									?>
									<script>
										alert('Department Successfully Save');
										header('location:department.php');
									
									</script>
									<?php }} ?>	
									  
									  
									  
									  
                                </div>
                            </div>