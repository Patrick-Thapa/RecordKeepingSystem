<?php
session_start();
if (!$_SESSION["userID"]) {
  header("Location: /patient/login");
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <?php include __DIR__ . '../../inc/style.php'; ?>
  <link rel="stylesheet" type="text/css" href="../../assets/css/precords_style.css">
  <title>Records | P R M S</title>
</head>

<body>

  <?php
  include('patient.nav.php');
  require __DIR__ . "../../../app/config/connection.php";

  $uid = $_SESSION["userID"];

  #Consultation
  $sql = "SELECT CONCAT(p.SSN,d.SSN,DATE_FORMAT(c.Date_Time,'%Y%m%d%s%i%k')) AS Reference, DATE_FORMAT(c.Date_Time,'%M %D %Y %r') AS Date_Time, CONCAT(d.F_Name,' ',d.L_Name) AS doctor_fullname,Doctor_SSN, Complains, Findings, Treatments, Allergies FROM consultation c,patient p, doctor d WHERE Patient_SSN=? AND p.SSN=Patient_SSN AND Doctor_SSN=d.SSN";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: /patient/records?error=sqlerror");
  } else {
    mysqli_stmt_bind_param($stmt, "s", $uid);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) > 0) {
      echo "<div class='welcome'><h2 class='mssg'> Counsultation Records </h2></div>
          <div class='table_box'>
            <table class='content-table'>
              <thead>
              <tr>
              <th>Date & Time</th>
              <th>Doctor Name</th>
              <th>Doctor ID</th>
              <th>Complains</th>
              <th>Findings</th>
              <th>Treatments</th>
              <th>Allergies</th>
              <th>Reference No</th>
              </tr>
              </thead>

          ";

      while ($row = mysqli_fetch_assoc($result)) {
        $ref = $row["Reference"];
        $dt = $row["Date_Time"];
        $dfullname = $row["doctor_fullname"];
        $comp = $row["Complains"];
        $find = $row["Findings"];
        $treat = $row["Treatments"];
        $alg = $row["Allergies"];
        $dssn = $row["Doctor_SSN"];

        echo "
          <tbody>
          <tr>
            <td>$dt</td>
            <td>$dfullname</td>
            <td>$dssn</td>
            <td>$comp</td>
            <td>$find</td>
            <td>$treat</td>
            <td>$alg</td>
            <td>$ref</td>
          </tr>
          ";
      }
      echo "</tbody></table>

        </div>";
    } elseif (mysqli_num_rows($result) == 0) {
      echo "<div class='welcome'><h2 class='mssg'> No Consultation Records Found </h2></div>";
    }
  }

  #Surgery
  $sql = "SELECT CONCAT(p.SSN,d.SSN,DATE_FORMAT(c.Date_Time,'%Y%m%d%s%i%k')) AS Reference, DATE_FORMAT(c.Date_Time,'%M %D %Y %r') AS Date_Time, CONCAT(d.F_Name,' ',d.L_Name) AS doctor_fullname,Doctor_SSN, Description, Complications, Allergies FROM operation c,patient p, doctor d WHERE Patient_SSN=? AND p.SSN=Patient_SSN AND Doctor_SSN=d.SSN";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: /patient/records?error=sqlerror");
  } else {
    mysqli_stmt_bind_param($stmt, "s", $uid);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) > 0) {
      echo "<div class='welcome'><h2 class='mssg'> Surgery Records </h2></div>
          <div class='table_box'>
            <table class='content-table'>
              <thead>
              <tr>
              <th>Date & Time</th>
              <th>Doctor Name</th>
              <th>Doctor ID</th>
              <th>Description</th>
              <th>Complications</th>
              <th>Allergies</th>
              <th>Reference No</th>
              </tr>
              </thead>
          ";

      while ($row = mysqli_fetch_assoc($result)) {
        $ref = $row["Reference"];
        $dt = $row["Date_Time"];
        $dfullname = $row["doctor_fullname"];
        $desc = $row["Description"];
        $compl = $row["Complications"];
        $alg = $row["Allergies"];
        $dssn = $row["Doctor_SSN"];

        echo "
          <tbody>
          <tr>
            <td>$dt</td>
            <td>$dfullname</td>
            <td>$dssn</td>
            <td>$desc</td>
            <td>$compl</td>
            <td>$alg</td>
            <td>$ref</td>
          </tr>
          ";
      }
      echo "</tbody></table></div>";
    } elseif (mysqli_num_rows($result) == 0) {
      echo "<div class='welcome'><h2 class='mssg'> No Surgery Records Found </h2></div>";
    }
  }

  #Diagnosis
  $sql = "SELECT CONCAT(p.SSN,d.SSN,DATE_FORMAT(c.Date_Time,'%Y%m%d%s%i%k')) AS Reference, DATE_FORMAT(c.Date_Time,'%M %D %Y %r') AS Date_Time, CONCAT(d.F_Name,' ',d.L_Name) AS doctor_fullname,Doctor_SSN, c.Diagnosis_Name, Description, Complications, Allergies FROM diagnosis c,patient p, doctor d WHERE Patient_SSN=? AND p.SSN=Patient_SSN AND Doctor_SSN=d.SSN";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: /patient/records?error=sqlerror");
  } else {
    mysqli_stmt_bind_param($stmt, "s", $uid);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) > 0) {
      echo "<div class='welcome'><h2 class='mssg'> Diagnosis Records </h2></div>
          <div class='table_box'>
            <table class='content-table'>
              <thead>
              <tr>
              <th>Date & Time</th>
              <th>Doctor Name</th>
              <th>Doctor ID</th>
              <th>Diagnosis Name</th>
              <th>Description</th>
              <th>Complications</th>
              <th>Allergies</th>
              <th>Reference No</th>
              </tr>
              </thead>
          ";

      while ($row = mysqli_fetch_assoc($result)) {
        $ref = $row["Reference"];
        $dt = $row["Date_Time"];
        $dfullname = $row["doctor_fullname"];
        $dn = $row["Diagnosis_Name"];
        $desc = $row["Description"];
        $compl = $row["Complications"];
        $alg = $row["Allergies"];
        $dssn = $row["Doctor_SSN"];

        echo "
          <tbody>
          <tr>
            <td>$dt</td>
            <td>$dfullname</td>
            <td>$dssn</td>
            <td>$dn</td>
            <td>$desc</td>
            <td>$compl</td>
            <td>$alg</td>
            <td>$ref</td>
          </tr>
          ";
      }
      echo "</tbody></table></div>";
    } elseif (mysqli_num_rows($result) == 0) {
      echo "<div class='welcome'><h2 class='mssg'> No Diagnosis Records Found </h2></div>";
    }
  }

  #Medicine Administration

  $sql = "SELECT CONCAT(p.SSN,d.SSN,DATE_FORMAT(c.Date_Time,'%Y%m%d%s%i%k')) AS Reference, DATE_FORMAT(c.Date_Time,'%M %D %Y %r') AS Date_Time, CONCAT(d.F_Name,' ',d.L_Name) AS staff_fullname,Staff_SSN,d.Designation, c.Description, c.Complication,c.Medicine, c.Allergies FROM medical_adminstration c,patient p, medical_staff d WHERE Patient_SSN=? AND p.SSN=Patient_SSN AND Staff_SSN=d.SSN";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: /patient/records?error=sqlerror");
  } else {
    mysqli_stmt_bind_param($stmt, "s", $uid);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) > 0) {
      echo "<div class='welcome'><h2 class='mssg'> Medical Staff Dosage Record </h2></div>
          <div class='table_box'>
            <table class='content-table'>
              <thead>
              <tr>
              <th>Date & Time</th>
              <th>Staff Name</th>
              <th>Staff SSN</th>
              <th>Designation</th>
              <th>Description</th>
              <th>Complications</th>
              <th>Medicine</th>
              <th>Allergies</th>
              <th>Reference No</th>
              </tr>
              </thead>

          ";

      while ($row = mysqli_fetch_assoc($result)) {
        $ref = $row["Reference"];
        $dt = $row["Date_Time"];
        $dfullname = $row["staff_fullname"];
        $dn = $row["Designation"];
        $desc = $row["Description"];
        $compl = $row["Complication"];
        $med = $row["Medicine"];
        $alg = $row["Allergies"];
        $dssn = $row["Staff_SSN"];

        echo "
          <tbody>
          <tr>
            <td>$dt</td>
            <td>$dfullname</td>
            <td>$dssn</td>
            <td>$dn</td>
            <td>$desc</td>
            <td>$compl</td>
            <td>$med</td>
            <td>$alg</td>
            <td>$ref</td>
          </tr>
          ";
      }
      echo "</tbody></table>
        </div>";
    } elseif (mysqli_num_rows($result) == 0) {
      echo "<div class='welcome'><h2 class='mssg'> No Dosage Records Found </h2></div>";
    }
  }
  ?>

  <div class="footer">
  </div>
</body>

</html>