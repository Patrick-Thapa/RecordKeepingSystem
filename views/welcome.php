<html>

<head>
    <link rel="stylesheet" type="text/css" href="./assets/css/hsstyle.css">
    <?php include __DIR__ . '/inc/style.php'; ?>
    <title>Home | P R M S</title>

</head>

<body>
    <div class="navigation-bar">
        <img src="./assets/images/land.png" alt="logo">
        <?php
        session_start();
        if (isset($_SESSION["userID"]) && $_SESSION["uc"] == "1") {
            echo "<a href='/logout'>Logout</a>
      <a href='/patient'>Profile </a>
      <a href='/'> Home</a>";
        } elseif (isset($_SESSION["userID"]) && $_SESSION["uc"] == "2") {
            echo "<a href='logout.php'>Logout</a>
      <a href='ddashboard.php'>Profile </a>
      <a href='/'> Home</a>";
        } elseif (isset($_SESSION["userID"]) && $_SESSION["uc"] == "3") {
            echo "<a href='logout.php'>Logout</a>
      <a href='sdashboard.php'>Profile </a>
      <a href='/'> Home</a>";
        } else {
            echo " <div class='dropdown'>
    <button class='dropbtn'> Login <i class='fa fa-caret-down'></i>
    </button>
    <div class='dropdown-content'>
      <a href='/patient/login'>Patient Login</a>
      <a href='doctor.login.php'>Doctor Login</a>
      <a href='staff.login.php'>Staff Login</a>
    </div>
  </div>
  <a href='/about'>About </a>
  <a href='/'> Home</a>";
        }
        ?>
    </div>
    <div class="intro">
        <img src="./assets/images/B.jpg">
        <div class="intro_write">
            <h1 class="intro_head"> Patient Record Management System</h1><br>
            <p>- Place For All Your Medical Information!</p>
        </div>
    </div>
    <?php include __DIR__ . '/layouts/footer.php'; ?>
</body>

</html>