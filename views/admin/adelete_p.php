<?php
  require __DIR__ . '../../../app/config/connection.php';

  session_start();
  if(!isset($_SESSION["userID"]))
  {
    header("Location: /admin");
  }

  if(isset($_POST["input-submit"]))
  {
    $pssn=$_POST["pssn"];

    $sql="DELETE FROM patient WHERE SSN = '$pssn'";

    $is_deleted=mysqli_query($conn,$sql);

    if($is_deleted)
    {
      header("Location: /admin/delete?login=success");
    }
    else {
      header("Location: /admin/delete?error=wronguser");
    }
  }
  else {
    header("Location: /admin/delete");
  }




 ?>
