<?php
session_start();
if (!$_SESSION["userID"])
  header("Location: /staff/login")
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <?php include __DIR__ . '../../inc/style.php'; ?>
  <link rel="stylesheet" type="text/css" href="../../assets/css/pedit_style.css">
  <title>Edit | P R M S</title>
</head>

<body>
  <?php include('staff.nav.php'); ?>
  <div class='welcome'>
    <h2 class='welcome_mssg'>Contact Information Edit </h2>
  </div>

  <div class="wrapper">
    <div class="container">
      <form class="ci_edit_form" action="/staff/edit" method="post">
        <input type="text" name="ads" placeholder="Enter New Address"><br>
        <input type="text" name="ctc" placeholder="Enter New Contact Number"><br>
        <input type="text" name="mail" placeholder="Enter New Email">
        <input type="submit" name="info-submit" value="Save">
      </form>
    </div>
  </div>

  <?php
  require __DIR__ . "../../../app/config/connection.php";
  if (isset($_POST["info-submit"])) {
    if (!empty($_POST["ads"]) && !empty($_POST["ctc"]) && !empty($_POST["mail"])) {
      $uid = $_SESSION["userID"];
      $ads = $_POST["ads"];
      $ctc = $_POST["ctc"];
      $mail = $_POST["mail"];

      $sql = "UPDATE medical_staff SET Address = '$ads', Contact_No = '$ctc', Email = '$mail' WHERE SSN = '$uid'";
      $is_updated = mysqli_query($conn, $sql);

      if ($is_updated) {
        echo "<p class='alert'>Information Updated Successfully</p>";
      } else {
        header("Location: /staff/edit?Error");
      }
    } elseif (!empty($_POST["ads"]) && !empty($_POST["ctc"]) && empty($_POST["mail"])) {
      $uid = $_SESSION["userID"];
      $ads = $_POST["ads"];
      $ctc = $_POST["ctc"];

      $sql = "UPDATE medical_staff SET Address = '$ads', Contact_No = '$ctc' WHERE SSN = '$uid'";
      $is_updated = mysqli_query($conn, $sql);

      if ($is_updated) {
        echo "<p class='alert'>Information Updated Successfully</p>";
      } else {
        header("Location: /staff/edit?Error");
      }
    } elseif (!empty($_POST["ads"]) && empty($_POST["ctc"]) && !empty($_POST["mail"])) {
      $uid = $_SESSION["userID"];
      $ads = $_POST["ads"];
      $mail = $_POST["mail"];

      $sql = "UPDATE medical_staff SET Address = '$ads', Email = '$mail' WHERE SSN = '$uid'";
      $is_updated = mysqli_query($conn, $sql);

      if ($is_updated) {
        echo "<p class='alert'>Information Updated Successfully</p>";
      } else {
        header("Location: /staff/edit?Error");
      }
    } elseif (empty($_POST["ads"]) && !empty($_POST["ctc"]) && !empty($_POST["mail"])) {
      $uid = $_SESSION["userID"];
      $ctc = $_POST["ctc"];
      $mail = $_POST["mail"];

      $sql = "UPDATE medical_staff SET Contact_No = '$ctc', Email = '$mail' WHERE SSN = '$uid'";
      $is_updated = mysqli_query($conn, $sql);

      if ($is_updated) {
        echo "<p class='alert'>Information Updated Successfully</p>";
      } else {
        header("Location: /staff/edit?Error");
      }
    } elseif (!empty($_POST["ads"]) && empty($_POST["ctc"]) && empty($_POST["mail"])) {
      $uid = $_SESSION["userID"];
      $ads = $_POST["ads"];

      $sql = "UPDATE medical_staff SET Address = '$ads' WHERE SSN = '$uid'";
      $is_updated = mysqli_query($conn, $sql);

      if ($is_updated) {
        echo "<p class='alert'>Information Updated Successfully</p>";
      } else {
        header("Location: /staff/edit?Error");
      }
    } elseif (empty($_POST["ads"]) && !empty($_POST["ctc"]) && empty($_POST["mail"])) {
      $uid = $_SESSION["userID"];
      $ctc = $_POST["ctc"];

      $sql = "UPDATE medical_staff SET  Contact_No = '$ctc' WHERE SSN = '$uid'";
      $is_updated = mysqli_query($conn, $sql);

      if ($is_updated) {
        echo "<p class='alert'>Information Updated Successfully</p>";
      } else {
        header("Location: /staff/edit?Error");
      }
    } elseif (empty($_POST["ads"]) && empty($_POST["ctc"]) && !empty($_POST["mail"])) {
      $uid = $_SESSION["userID"];
      $mail = $_POST["mail"];

      $sql = "UPDATE medical_staff SET  Email = '$mail' WHERE SSN = '$uid'";
      $is_updated = mysqli_query($conn, $sql);

      if ($is_updated) {
        echo "<p class='alert'>Information Updated Successfully</p>";
      } else {
        header("Location: /staff/edit?Error");
      }
    }
  }
  ?>

  <div class="footer"></div>
</body>
 
</html>