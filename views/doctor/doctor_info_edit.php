<?php
session_start();
if (!$_SESSION["userID"])
  header("Location: /doctor/login")
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <?php include __DIR__ . '/../inc/style.php'; ?>
  <link rel="stylesheet" type="text/css" href="../../assets/css/pedit_style.css">
  <style>
    .navigation-bar a {
      font-size: 16px;
    }
  </style>
  <title> Edit | P R M S </title>
</head>

<body>
  <?php include __DIR__ . '/../inc/style.php'; ?>
  <div class='welcome'>
    <h2 class='welcome_mssg'>Contact Information Edit </h2>
  </div>

  <div class="wrapper">
    <div class="container">
      <form class="ci_edit_form" action="/doctor/edit" method="post">
        <input type="text" name="ads" placeholder="Enter New Address"><br>
        <input type="text" name="ctc" placeholder="Enter New Contact Number"><br>
        <input type="text" name="mail" placeholder="Enter New Email">
        <input type="submit" name="info-submit" value="Save">
      </form>
    </div>
  </div>

  <?php
  require "connection.php";
  if (isset($_POST["info-submit"])) {
    if (!empty($_POST["ads"]) && !empty($_POST["ctc"]) && !empty($_POST["mail"])) {
      $uid = $_SESSION["userID"];
      $ads = $_POST["ads"];
      $ctc = $_POST["ctc"];
      $mail = $_POST["mail"];

      if (!preg_match("/^[0-9]*$/", $ctc)) {
        echo "<p class='alert'>Contact Number: Only numbers allowed</p>";
      }
      if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        echo "<p class='alert'>Email: Invalid Email</p>";
      }

      $sql = "UPDATE doctor SET Address = '$ads', Contact_No = '$ctc', Email = '$mail' WHERE doctor.SSN = '$uid'";
      $is_updated = mysqli_query($conn, $sql);

      if ($is_updated) {
        echo "<p class='alert'>Information Updated Successfully</p>";
      } else {
        header("Location: /doctor/edit?Error");
      }
    } elseif (!empty($_POST["ads"]) && !empty($_POST["ctc"]) && empty($_POST["mail"])) {
      $uid = $_SESSION["userID"];
      $ads = $_POST["ads"];
      $ctc = $_POST["ctc"];

      $sql = "UPDATE doctor SET Address = '$ads', Contact_No = '$ctc' WHERE doctor.SSN = '$uid'";
      $is_updated = mysqli_query($conn, $sql);

      if ($is_updated) {
        echo "<p class='alert'>Information Updated Successfully</p>";
      } else {
        header("Location: /doctor/edit?Error");
      }
    } elseif (!empty($_POST["ads"]) && empty($_POST["ctc"]) && !empty($_POST["mail"])) {
      $uid = $_SESSION["userID"];
      $ads = $_POST["ads"];
      $mail = $_POST["mail"];

      $sql = "UPDATE doctor SET Address = '$ads', Email = '$mail' WHERE doctor.SSN = '$uid'";
      $is_updated = mysqli_query($conn, $sql);

      if ($is_updated) {
        echo "<p class='alert'>Information Updated Successfully</p>";
      } else {
        header("Location: /doctor/edit?Error");
      }
    } elseif (empty($_POST["ads"]) && !empty($_POST["ctc"]) && !empty($_POST["mail"])) {
      $uid = $_SESSION["userID"];
      $ctc = $_POST["ctc"];
      $mail = $_POST["mail"];

      $sql = "UPDATE doctor SET Contact_No = '$ctc', Email = '$mail' WHERE doctor.SSN = '$uid'";
      $is_updated = mysqli_query($conn, $sql);

      if ($is_updated) {
        echo "<p class='alert'>Information Updated Successfully</p>";
      } else {
        header("Location: /doctor/edit?Error");
      }
    } elseif (!empty($_POST["ads"]) && empty($_POST["ctc"]) && empty($_POST["mail"])) {
      $uid = $_SESSION["userID"];
      $ads = $_POST["ads"];

      $sql = "UPDATE doctor SET Address = '$ads' WHERE doctor.SSN = '$uid'";
      $is_updated = mysqli_query($conn, $sql);

      if ($is_updated) {
        echo "<p class='alert'>Information Updated Successfully</p>";
      } else {
        header("Location: /doctor/edit?Error");
      }
    } elseif (empty($_POST["ads"]) && !empty($_POST["ctc"]) && empty($_POST["mail"])) {
      $uid = $_SESSION["userID"];
      $ctc = $_POST["ctc"];

      $sql = "UPDATE doctor SET  Contact_No = '$ctc' WHERE doctor.SSN = '$uid'";
      $is_updated = mysqli_query($conn, $sql);

      if ($is_updated) {
        echo "<p class='alert'>Information Updated Successfully</p>";
      } else {
        header("Location: /doctor/edit?Error");
      }
    } elseif (empty($_POST["ads"]) && empty($_POST["ctc"]) && !empty($_POST["mail"])) {
      $uid = $_SESSION["userID"];
      $mail = $_POST["mail"];

      $sql = "UPDATE doctor SET  Email = '$mail' WHERE doctor.SSN = '$uid'";
      $is_updated = mysqli_query($conn, $sql);

      if ($is_updated) {
        echo "<p class='alert'>Information Updated Successfully</p>";
      } else {
        header("Location: /doctor/edit?Error");
      }
    }
  }
  ?>
  <div class="footer"></div> 
</body>

</html>
