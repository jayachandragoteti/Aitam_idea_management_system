<?PHP 
include "db_connection.php";
$user_name = $_POST['user_name'];
$password = $_POST['user_pass'];
 #echo $user_name;
 #echo $password;
 $sql="SELECT *  FROM `user_details` WHERE  `id_number` = '$user_name' AND `password` = '$password'";
 $result = mysqli_query($connect,$sql);
 $row = mysqli_fetch_array($result);

if ($row) {
    session_start();
    $_SESSION['user_name']=$user_name;
    $_SESSION['login_type']=$row['login_type'];
    if ($row['login_type'] == "student" || $row['login_type'] == "faculty" ) {
        echo "<script>alert('successfully logged in.')</script>";
        echo "<script>window.location='stu_faculty_main_dashboard.php';</script>";
       # header('location:stu_faculty_dashboard.php');

    } elseif ($row['login_type']=="department_admin") {
        echo "<script>alert('successfully logged in.')</script>";
    } elseif ($row['login_type']=="central_committee") {
        echo "<script>alert('successfully logged in.')</script>";
    }else {
        echo "<script>alert('Login faild Try again')</script>";
        echo "<script>window.location='index.php';</script>";
        
    }
} else {
    echo "<script>alert('Login faild Try again ')</script>";
    echo "<script>window.location='index.php';</script>";
}

    





?>