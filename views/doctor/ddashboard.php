<?php
 session_start();
 if(!$_SESSION["userID"])
 {
   header("Location: /doctor/login");
 }
 ?>
<!DOCTYPE html>
<html>
<head>
  <?php include __DIR__ . '/../inc/style.php'; ?>
  <link rel="stylesheet" type="text/css" href="./../assets/css/ddash_style.css">
  <title>Dashboard | P R M S </title>
  <style>
	.navigation-bar a{
		font-size: 16px;
	}
  </style>
</head>
<body>
  
  <?php
    include('doctor.nav.php');
    require __DIR__ ."../../../app/config/connection.php";
    $uid=$_SESSION["userID"];
    $sql="SELECT SSN, F_Name, CONCAT(F_Name,' ',L_Name) AS Full_name, d.Address, Contact_No, d.Email,h.name, Department, Speciality,Designation FROM doctor d, hospital h WHERE d.Hospital_ID=h.ID AND SSN=?";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
      header("Location: /doctor/dashboard?error=sqlerror");
    }
    else {
      mysqli_stmt_bind_param($stmt, "s", $uid);
      mysqli_stmt_execute($stmt);
      $result= mysqli_stmt_get_result($stmt);
      if ($row = mysqli_fetch_assoc($result))
      {
        $ssn=$row["SSN"];
        $fname=strtoupper($row["F_Name"]);
        $fullname=$row["Full_name"];
        $address=$row["Address"];
        $cont=$row["Contact_No"];
        $mail=$row["Email"];
        $hname=$row["name"];
        $dep=$row["Department"];
        $desg=$row["Designation"];
        $spec=$row["Speciality"];
        echo "
          <div class='welcome'><h2 class='welcome_mssg'> GREETINGS $fname</h2></div>

          <div class='pi_box'>
            <div class='pi_table'>
            <h3> Personal Info</h3>
              <table>
                <tr><th>FULL NAME</th>
                    <td>$fullname</td></tr>
                <tr><th>HOSPITAL NAME</th>
                   <td>$hname</td></tr>
                <tr><th>DEPARTMENT</th>
                    <td>$dep</td></tr>
                <tr><th>DESIGNATION</th>
                   <td>$desg</td></tr>
               <tr><th>SPECIALITY</th>
                  <td>$spec</td></tr>
              </table>
            </div>
          </div>

          <div class='ci_box'>
            <div class='ci_table'>
            <h3> Contact Info</h3>
              <table>
                <tr><th>ADDRESS</th>
                    <td>$address</td></tr>
                <tr><th>CONTACT NO</th>
                   <td>$cont</td></tr>
                <tr><th>E-MAIL</th>
                   <td>$mail</td></tr>
              </table>
              <a href='doctor_info_edit.php'>Edit</a>
            </div>
          </div>
          <div class='res_div'><a class='res' href='d_res_pass.php'>Reset Password</a></div>
        <div class='footer'></div>
        ";
      }
    }
   ?>
</body>
</html>
