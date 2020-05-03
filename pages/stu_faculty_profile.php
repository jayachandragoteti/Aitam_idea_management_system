<?PHP
        include "../db_connection.php";
        session_start();
        if(!isset($_SESSION['user_name']))
        {header('location:index.php');}
        $user=$_SESSION['user_name'];
        //$user="18A51A0515";
        $sql="SELECT * FROM `user_details` WHERE  `id_number` = '$user' ";
        $result = mysqli_query($connect,$sql);
        $row = mysqli_fetch_array($result);
?>
<!--========================================================================================--> 

          <div class="col-lg-12 grid-margin stretch-card"style="display: flex;justify-content:center;" id="profile">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title"><b>Your Profile</b></h4>
                
                  <div class="form-group" >
                    <label for="project_title"><b>Name</b></label>
                    <p><?PHP echo $row['name'];?></p>
                  </div>
                  <div class="form-group">
                    <label for="project_title"> <b>User Name </b></label>
                    <p><?PHP echo $row['id_number'];?></p>
                  </div>
                  <div class="form-group">
                    <label for="project_title"> <b>Phone </b></label>
                    <p><?PHP echo $row['phone'];?></p>
                  </div>
                  <div class="form-group">
                    <label for="project_title"><b>Email </b></label>
                    <p><?PHP echo $row['email'];?></p>
                  </div>
                  <div class="form-group">
                    <label for="project_title"><b>Login Type</b></label>
                    <p><?PHP echo $row['login_type'];?></p>
                  </div>
                  <?PHP
                  //-----------------------Branch section update-------------------------------------
                  if( $row['login_type'] =="student"){
                      echo"
                            <div class='form-group'>
                            <label for='project_title'><b>Branch </b></label>
                            <p>".$row['branch']."</p>
                            </div>
                            <div class='form-group'>
                            <label for='project_title'><b> Section </b></label>
                            <p>".$row['section']."</p>
                            </div>
                      ";
                  }


                        if( $row['login_type'] =="student"){
                          if ($row['branch']=="" || $row['section']=="") {
                            echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#branch_section">
                            Select Branch and Section
                          </button>';
                          }
                        }
                    ?>
                    
                  <form class="forms-sample">
                    <br>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#profile_edit"> 
                        Edit
                    </button>
                    </form>
              </div>
            </div>
          </div>
<!--========================================================================================--> 
</section>
          </div>
          <!-- content-wrapper ends -->
          <footer class="footer">
            <div class="container-fluid clearfix">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">
                Design and developed by <a href="#" >AITAM</a> Web developers club.
              </span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
                <a href="#" >AITAM SAC</a> 
              </span>
            </div>
          </footer>
          <!-------------------/ partial --------------------------------------->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
<!--===========================================================================-->
<!-- branch & section update Modal -->
<div class="modal fade" id="branch_section" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Select Branch and Section</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
            <div class="modal-body">
                <div class="form-group">
                    <label for="branch">Branch</label>
                        <select name="branch" class="form-control" id="branch" aria-describedby="emailHelp" placeholder="Enter email">
                            <option value="CSE">CSE</option>
                            <option value="ECE">ECE</option>
                            <option value="IT">IT</option>
                            <option value="MECH">MECH</option>
                            <option value="CIVIL">CIVIL</option>
                            <option value="EEE">EEE</option>
                        </select>
                </div>
                <div class="form-group">
                    <label for="section">Section</label>
                        <select name="section" class="form-control" id="section" aria-describedby="emailHelp" placeholder="Enter email">
                            <option value="A">A Section</option>
                            <option value="B">B Section</option>
                            <option value="C">C Section</option>
                        </select>
                </div>      
            </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" name="save_branch_section" id="save_branch_section" class="btn btn-primary" value="Save Changes"/>
        </div>
      </form>
    </div>
  </div>
</div>
<!-----------------------------------------------Profile Edit ------------------------------------ -->
<div class="modal fade" id="profile_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  method="POST" id="profile_update">
            <div class="form-group">
            <label for="name">NAME</label>
                <input type="text" class="form-control" name="name" id="name" value="<?PHP echo $row['name'];?>"  required />
            </div>
            <div class="form-group">
                <label for="phone"> Phone</label>
                <input type="tel" id="phone" name="phone" class="form-control"  value="<?PHP echo $row['phone'];?>" required/>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email"  value="<?PHP echo $row['email'];?>" required/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" name="profile_edit" id="profile_edit" class="btn btn-primary" value="Save Changes"/>
            </div>
        </form>
      </div>
      <div id="response"></div>
    </div>
  </div>
</div>
<!----------------------------------------------- /Profile Edit ------------------------------------ -->

<!------------------------------------------------------------------------------------------------------>
<?PHP 

        include "db_connection.php";
        $user=$_SESSION['user_name'];
        //$user="18A51A0515";
        //---------------Profile Edit -------------------------
        if(isset($_POST['save_branch_section'])){
            $branch = $_POST['branch'];
            $section = $_POST['section'];

            $update="UPDATE `user_details` SET `branch`='$branch',`section`= '$section' WHERE `id_number` = '$user'";
            $sqlupdate= mysqli_query($connect,$update);
            if ($sqlupdate) {
                echo "<script>alert('Branch and Section are Updated ')</script>";
            }else{
                echo "<script>alert('Update Faild ')</script>";
            }

        }
        //---------------profele update------------------
        /*if(isset($_POST['profile_edit'])){
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];

            $update_profile="UPDATE `user_details` SET `name`='$name',`phone`= '$phone',`email`= '$email' WHERE `id_number` = '$user'";
            $sqlupdate_update_profile= mysqli_query($connect,$update_profile);
            if ($sqlupdate_update_profile) {
                 echo "<script>alert('Profile Updated')</script>";
               # echo "<script>window.location='stu_faculty_profile.php';</script>";
            }else{
                echo "<script>alert('Update Faild ')</script>";
               # echo "<script>window.location=' stu_faculty_profile.php';</script>";
            }

        }*/
       //---------------/profele update------------------
      ?>
<!--===========================================================================-->
<script>


$(document).ready(function(){  
  
    $('#profile_edit').click(function(){  
     /*    var project_title = $('#project_title').val();  
         var estimated_amount = $('#estimated_amount').val();
         var file = $('#file').val();  
         var project_description = $('#project_description').val();  
         if(project_title == '' || estimated_amount == ''|| file == '' || project_description == '')  
         {  
              $('#response').html('<span class="text-danger">All Fields are required</span>');  
         }  
         else  
         {  */
              $.ajax({  
                   url:"./db_files/stu_faculty_profile_edit_db.php",  
                   method:"POST",  
                   data:$('#profile_update').serialize(),  
                   beforeSend:function(){  
                        $('#response').html('<span class="text-info">Loading response...</span>');  
                   },  
                   success:function(data){  
                       // $('form').trigger("reset");  
                        $('#response').html(data);  
                        alert("AJAX request successfully completed");
                   }  
              });  
         //}  
    });  
});  

</script>
<!--===========================================================================-->
    <script src="assets/js/vendor.bundle.base.js"></script>
    <script src="assets/js/vendor.bundle.addons.js"></script>
    <script src="assets/js/bootstrap.min.js" ></script>
    <script src="assets/js/shared/off-canvas.js"></script>
<!--==========================================================================-->
  </body>
</html>