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
  <title>Reset</title>
</head>

<body>
  <?php
    include('doctor.nav.php'); 
  ?>
  <div class='welcome'>
    <h2 class='welcome_mssg'> Reset Password </h2>
  </div>

  <div class="wrapper">
    <div class="container">
      <form class="ci_edit_form" action="/doctor/resetpassword/save" method="post">
        <input type="password" name="cp" placeholder="Current Password" required><br>
        <input type="text" name="np" placeholder="New Password" required><br>
        <input type="text" name="npr" placeholder="Re-enter Password" required>
        <input type="submit" name="info-submit" value="Save">
      </form>
    </div>
  </div>

  <?php
  require __DIR__ ."../../../app/config/connection.php";
  if (isset($_POST["info-submit"])) {
    if (!empty($_POST["cp"]) && !empty($_POST["np"]) && !empty($_POST["npr"])) {
      $uid = $_SESSION["userID"];
      $cp = $_POST["cp"];
      $np = $_POST["np"];
      $npr = $_POST["npr"];

      $sql = "SELECT pass FROM doctor_login WHERE d_ssn = '$uid'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      if ($cp == $row["pass"]) {
        if ($np == $npr) {
          $sql = "UPDATE doctor_login SET pass= '$np' WHERE d_ssn='$uid'";
          $is_updated = mysqli_query($conn, $sql);
          if ($is_updated) {
            echo "<p class='alert'>Password Updated Successfully</p>";
          } else {
            header("Location: /doctor/resetpassword?Error");
            exit();
          }
        } else {
          echo "<p class='alert'>Please Enter Same Password</p>";
        }
      } else {
        echo "<p class='alert'>Current Password Does Not Match</p>";
      }
    }
  }
  ?>

  <div class="footer"></div>
</body>

</html>