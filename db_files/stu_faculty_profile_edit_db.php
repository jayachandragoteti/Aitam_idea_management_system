<?PHP
include "../db_connection.php";
session_start();
  if(!isset($_SESSION['user_name']))
  {header('location:index.php');}
  $user=$_SESSION['user_name'];


  $name =  mysqli_real_escape_string($connect, $_POST['name']);// $_POST['name'];
  $phone = mysqli_real_escape_string($connect, $_POST['phone']);//$_POST['phone'];
  $email = mysqli_real_escape_string($connect, $_POST['email']);//$_POST['email'];

  $update_profile="UPDATE `user_details` SET `name`='$name',`phone`= '$phone',`email`= '$email' WHERE `id_number` = '$user'";
  $sqlupdate_update_profile= mysqli_query($connect,$update_profile);
  if ($sqlupdate_update_profile) {
    echo 'Profile Updated';
     //  echo "<script>alert('Profile Updated')</script>";
     # echo "<script>window.location='stu_faculty_profile.php';</script>";
  }else{
    echo 'Update Faild';
      //echo "<script>alert('Update Faild ')</script>";
     # echo "<script>window.location=' stu_faculty_profile.php';</script>";
  }

z


?>