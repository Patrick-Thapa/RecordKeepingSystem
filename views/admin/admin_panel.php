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
    <div class="navigation-bar" style="text-align: center">
      <a href="/admin">Home</a>
      <a href="/register">Register</a>
      <a href="/delete">Delete</a>
      <a class='logout' href="/logout">Logout</a>
    </div>
    <div class="container">
      <h1 class="text-center mt-5">Admin Dashboard</h1>
    </div>
  </div>
</body>

</html>