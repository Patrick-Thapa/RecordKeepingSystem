<?php
session_start();
if (isset($_SESSION["userID"]) && $_SESSION["uc"] == "3") {
  header("Location: /staff");
}
?>
<!DOCTYPE html>
<html>

<head>
  <?php include __DIR__ . '../../inc/style.php'; ?>
  <link rel="stylesheet" type="text/css" href="../../assets/css/dlogin_style.css">
  <title> Login | P R M S</title>
</head>

<body style="background-image: url(../../assets/images/H.jpg); background-size: cover;">
  <div class="login_box">
    <form class="login_form" action="/staff/loginprocess" method="post">
      <img src="../../assets/images/logo.black.png">
      <h2>Staff | Sign In </h2>
      <?php
      if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyfields") {
          echo "<p class=login_error>Fill in all the fields</p>";
        } else if ($_GET["error"] == "wrongpass") {
          echo "<p class=login_error>Password does not match</p>";
        } else if ($_GET["error"] == "nouser") {
          echo "<p class=login_error>No User Found!</p>";
        }
      } else if (isset($_GET["login"])) {
        if ($_GET["login"] == "success") {
          echo "<p class=login_success>Login Succesful!</p>";
        }
      }
      ?>

      <label for="userID">User ID</label>
      <input type="text" name="userID" placeholder="Enter your SSN or NID number or Passport Number">
      <label for="pass">Password</label>
      <input type="password" name="pass" placeholder="Enter your Password">
      <input type="submit" name="login-submit" value="Login">
    </form>
  </div>
  </div>
  </div>
</body>