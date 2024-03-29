<?php
require __DIR__ . "../../../app/config/connection.php";

  session_start();
  if(!isset($_SESSION["userID"]))
  {
    header("Location: /doctor/login");
  }

  if (isset($_POST["input-submit"])) {
   $pssn=$_POST["pssn"];
   $uid=$_SESSION['userID'];
   $newdate=date_Create($_POST["date"]);
   $date=date_format($newdate,"Y-m-d");
   $newtime=date_Create($_POST["time"]);
   $time=date_format($newtime,"H:i:s");
   $datetime=$date." ".$time;
   $comp=$_POST["complication"];
   $dn=$_POST["diagname"];
   $desc=$_POST["description"];
   $alg=$_POST["allergies"];

    $sql="INSERT INTO diagnosis (Patient_SSN, Doctor_SSN, Date_Time,
       Diagnosis_Name, Description , Complications,  Allergies)
       VALUES ('$pssn', '$uid', '$datetime',
         '$dn', '$desc','$comp','$alg')";
    $is_inserted=mysqli_query($conn,$sql);
    if($is_inserted){
      header("Location: /doctor/insert?login=success");
      exit();}
    else
    {
      header("Location: /doctor/insert?error=wronguser");
      exit();
    }
  }
  else {
    header("Location: /doctor/insert");
    exit();
  }
