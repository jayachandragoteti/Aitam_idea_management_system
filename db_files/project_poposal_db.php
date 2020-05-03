<?PHP
include "../db_connection.php";
session_start();
  if(!isset($_SESSION['user_name']))
  {header('location:index.php');}
  $id_number=$user=$_SESSION['user_name'];

$project_title = mysqli_real_escape_string($connect, $_POST["project_title"]);  //$_POST['project_title'];
$estimated_amount =mysqli_real_escape_string($connect, $_POST["estimated_amount"]);// $_POST['estimated_amount'];
$project_description = mysqli_real_escape_string($connect, $_POST["project_description"]);//$_POST['project_description'];
$status="PENDING";
  //------------ $proposal_id ----------
   $letters = array_merge(range('A','Z'));

   $proposal_id="AIM".rand(100,100000).$letters[rand(1,26)].$letters[rand(1,26)];
  //------------ $proposal_id ----------

  //combine random digit to you file name to create new file name
  //use dot (.) to combile these two variables

  // name of the uploaded file

  $filename = mysqli_real_escape_string($connect, $_FILES['myfile']['name']);//$_FILES['myfile']['name'];
  // get the file extension
  $extension = pathinfo($filename, PATHINFO_EXTENSION);
  // destination of the file on the server & change file name
  $destination = 'assets/project_files/' . $proposal_id.".".$extension; 
  //change file name
  $modefide_file_name=$proposal_id.".".$extension;
  // the physical file on a temporary uploads directory on the server
  $file = $_FILES['myfile']['tmp_name'];
  $size = $_FILES['myfile']['size'];

  if (!in_array($extension, ['zip','pdf','docx']))
   {
      //echo "<script>alert('You file extension must be .pdf ')</script>";
     // echo "You file extension must be .zip, .pdf or .docx";
  } 
  elseif ($_FILES['myfile']['size'] > 10000000) 
  { // file shouldn't be larger than 1Megabyte
     // echo "<script>alert('File too large!')</script>";
      ///echo "File too large!";
  } 
  else 
  {
      // move the uploaded (temporary) file to the specified destination
      if (move_uploaded_file($file, $destination)) 
      {
          $sql = "INSERT INTO `project_proposals` (`id_number`, `proposal_id`, `project_title`, `estimated_amunt`, `project_file`, `project_description`, `status`) VALUES ('$user','$proposal_id','$project_title','$estimated_amount','$modefide_file_name','$project_description','$status') ";
          $query=mysqli_query($connect, $sql);
                  if ($query)
                  {
                     // echo "<script>alert('Request submitted successfully')</script>";
                      echo "Request submitted successfully"; 
                  }
                  else{
                     //  echo "<script>alert('Request Failed submit')</script>";
                       echo "Request Failed submit." ;
                      }
      }
      else{
            //echo "<script>alert('file name is already exist')</script>";
          //  echo "file name is already exist"; 
          }
  }
}

?>