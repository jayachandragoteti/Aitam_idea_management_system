<?PHP 
include "../db_connection.php";
session_start();
if(!isset($_SESSION['department_admin']))
{header('location:../logout.php');}
$username=$_SESSION['department_admin'];
$userr="SELECT * FROM `user` WHERE `username`='$username'";
$user_sql=mysqli_query($connect,$userr);
$user_row=mysqli_fetch_array($user_sql);
$user = $_SESSION['department_admin'];
$msg="";
$error="";
if (isset($_POST['change_password'])) {
    $old_Password=$_POST['old_Password'];
    $New_Password=$_POST['New_Password'];
    $Confirm_Password=$_POST['Confirm_Password'];
    $select="SELECT * FROM `user` WHERE `username`='$user'";
    $sql=mysqli_query($connect,$select);
    $row=mysqli_fetch_array($sql);
    if ($row['password'] != $old_Password) {
        $error="Old password is incorrect.";
    }elseif ($New_Password != $Confirm_Password) {
        $error="New password and Confirm password should be same.";
    }else{
        $change="UPDATE `user` SET `password` ='$Confirm_Password' WHERE `username` = '$user'";
        if($change_sql=mysqli_query($connect,$change)){
            $msg="Password changed successfully.";
        }else {
            $error="Faild try, again!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- shortcut icon-->
    <link rel="shortcut icon" href="../assets/images/logo.jpg" />
    <title>Idea Management</title>

    <!-- Custom fonts for this template-->
    <link href="../assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Custom styles for this template-->
    <link href="../assets/css/dashboard_style.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon">
                    <img src="../assets/images/logo.jpg" width="50" height="50">
                </div>
                <div class="sidebar-brand-text mx-3">Idea Management</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!--<li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Menu</h6>
                        <a class="collapse-item" href="#">Pending</a>
                        <a class="collapse-item" href="#">Accepted</a>
                        <a class="collapse-item" href="#">Rejected</a>
                    </div>
                </div>
            </li>-->
            <!-- Heading -->
            <div class="sidebar-heading">
                Project Requests
            </div>
            <li class="nav-item"  id="pending">
                <a class="nav-link" href="pending.php">
                    <i class="fas fa-exclamation-triangle"></i>
                    <span>Pending</span></a>
            </li>
            <li class="nav-item" id="accepted">
                <a class="nav-link" href="accepted.php">
                    <i class="fas fa-check"></i>
                    <span>Accepted</span></a>
            </li>
            <li class="nav-item" id="rejected">
                <a class="nav-link" href="rejected.php">
                    <i class="fas fa-trash"></i>
                    <span>Rejected</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Profile -->
            <li class="nav-item " id="my_profile"> 
                <a class="nav-link" href="my_profile.php">
                    <i class="far fa-address-card"></i>
                    <span>My Profile</span></a>
            </li>
            <li class="nav-item  active" id="change_password">
                <a class="nav-link" href="change_password.php">
                    <i class="fas fa-key"></i>
                    <span>Change Password</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">

                        </li>

                        <!-- Nav Item - Alerts -->

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">User</span>
                                <img class="img-profile rounded-circle" src="../assets/images/logo.jpg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="my_profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profile
                                </a>
                                <a class="dropdown-item" href="change_password.php" >
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i> Change Password
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                
                
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col"></div>
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Change Password</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
                                   <div class="form-group">
                                       <br>
                                            <input type="password" name="old_Password" class="form-control border-bottom border-primary" style="border-style:none;" id="old_password"  placeholder="Enter Old Password">
                                        </div>
                                        <div class="form-group">
                                        <br>
                                            <input type="password" name="New_Password" class="form-control border-bottom border-primary" style="border-style:none;" id="New_Password" placeholder="New Password">
                                        </div>
                                        <div class="form-group">
                                        <br>
                                            <input type="password" name="Confirm_Password" class="form-control border-bottom border-primary" style="border-style:none;" id="Confirm_Password" placeholder="Confirm Password">
                                        </div>
                                        <input type="submit" name="change_password" class="btn btn-primary" value='Update'>
                                </form>           
                                <hr>
                                    <?php if($error !=""){?><strong> <div class="text-danger"><i class='far fa-times-circle' ></i> <?php echo htmlentities($error); ?>  </strong></div><?php } 
                                        else if($msg !=""){?><strong><div class="text-success"><i class="far fa-check-circle" ></i> <?php echo htmlentities($msg); ?></strong> </div><?php }
                                    ?>
                                <hr>                          
                                </div>
                            </div>
                        </div>
                        <div class="col"></div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Degine and developed by <a href="http://sac.aitam.com/">AITAM SAC</a></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../assets/js/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Core plugin JavaScript
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>-->
    <!-- Custom scripts for all pages-->
    <script src="../assets/js/dashboard_js.js"></script>
    <script src="../assets/js/other_scripts.js"></script>
</body>

</html>