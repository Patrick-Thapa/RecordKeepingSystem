<?php
session_start();
if (!$_SESSION["userID"]) {
  header("Location: /patient/login");
}
?>

<!DOCTYPE html>
<html>

<head>
  <?php include __DIR__ . '../../inc/style.php'; ?>
  <title>Patient Dashboard | P R M S</title>
  <link rel="stylesheet" type="text/css" href="../../assets/css/pdash_style.css">
</head>

<body>
  <?php
  include('patient.nav.php');
  require __DIR__ . "../../../app/config/connection.php";
  $uid = $_SESSION["userID"];
  $sql = "SELECT SSN, F_Name, CONCAT(F_Name,' ',L_Name) AS Full_name, Address, Contact_No, Email, Date_Format(Date_Of_Birth,'%M %D %Y') AS Date_Of_Birth, Gender, DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(Date_Of_Birth, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(Date_Of_Birth, '00-%m-%d')) AS age FROM patient WHERE SSN=?";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: /patient?error=sqlerror");
  } else {
    mysqli_stmt_bind_param($stmt, "s", $uid);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
      $ssn = $row["SSN"];
      $fname = strtoupper($row["F_Name"]);
      $fullname = $row["Full_name"];
      $address = $row["Address"];
      $cont = $row["Contact_No"];
      $mail = $row["Email"];
      $dob = $row["Date_Of_Birth"];
      $gen = $row["Gender"];
      $age = $row["age"];
      echo "
          <div class='welcome'><h2 class='welcome_mssg'> GREETINGS $fname</h2></div>

          <div class='pi_box'>
            <div class='pi_table'>
            <h3> Personal Info</h3>
              <table>
                <tr><th>FULL NAME</th>
                    <td>$fullname</td></tr>
                <tr><th>BIRTHDAY</th>
                   <td>$dob</td></tr>
                <tr><th>AGE</th>
                    <td>$age</td></tr>
                <tr><th>GENDER</th>
                   <td>$gen</td></tr>
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
              <a href='/patient/edit'>Edit</a>
            </div>
          </div>
          <div class='res_div'><a class='res' href='/patient/resetpassword'>Reset Password</a></div>
        <div class='footer'></div>
        ";
    }
  }
  ?>

</body>

</html>