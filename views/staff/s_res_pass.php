<?php
session_start();
if (!$_SESSION["userID"])
  header("Location:staff.login.php")
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <?php include __DIR__ . '../../inc/style.php'; ?>
  <link rel="stylesheet" type="text/css" href="../../assets/css/pedit_style.css">
  <title>Reset | P R M S</title>
</head>

<body>
  <?php include('staff.nav.php'); ?>
  <div class='welcome'>
    <h2 class='welcome_mssg'> Reset Password </h2>
  </div>

  <div class="wrapper">
    <div class="container">
      <form class="ci_edit_form" action="/staff/resetpassword" method="post">
        <input type="password" name="cp" placeholder="Current Password" required><br>
        <input type="text" name="np" placeholder="New Password" required><br>
        <input type="text" name="npr" placeholder="Re-enter Password" required>
        <input type="submit" name="info-submit" value="Save">
      </form>
    </div>
  </div>

  <?php
  require __DIR__ . "../../../app/config/connection.php";

  if (isset($_POST["info-submit"])) {
    if (!empty($_POST["cp"]) && !empty($_POST["np"]) && !empty($_POST["npr"])) {
      $uid = $_SESSION["userID"];
      $cp = $_POST["cp"];
      $np = $_POST["np"];
      $npr = $_POST["npr"];

      $sql = "SELECT pass FROM staff_login WHERE s_ssn = '$uid'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      if ($cp == $row["pass"]) {
        if ($np == $npr) {
          $sql = "UPDATE staff_login SET pass= '$np' WHERE s_ssn='$uid'";
          $is_updated = mysqli_query($conn, $sql);
          if ($is_updated) {
            echo "<p class='alert'>Password Updated Successfully</p>";
          } else {
            header("Location: /staff/resetpassword?Error");
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