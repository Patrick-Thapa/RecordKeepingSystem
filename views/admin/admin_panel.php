<?php
session_start();
if (!$_SESSION["userID"]) {
  header("Location: /admin/login");
}
?>
<!DOCTYPE html>
<html>

<head>
  <?php include __DIR__ . '/../inc/style.php'; ?>
  <link rel="stylesheet" type="text/css" href="../../assets/css/ddash_style.css">
  <title> Admin Dashboard | P R M S</title>
</head>

<body>
  <div class="">
    <div class="top_img"><img src="../../assets/images/land2.png"></div>
    <?php include('admin.nav.php') ?>
    <div class="wrapper">
      <div class="container text-center">
        <p>Admin Dashboard</p>
      </div>
    </div>
</body>

</html>