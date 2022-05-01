<html>
<head>
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="./assets/favicon/site.webmanifest">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/hsstyle.css">
    <title>Home | P R M S</title>

</head>
<body>
    <div class="navigation-bar">
        <img src="./assets/images/land.png" alt="logo">
        <?php
        session_start();
        if (isset($_SESSION["userID"]) && $_SESSION["uc"] == "1") {
            echo "<a href='logout.php'>Logout</a>
      <a href='pdashboard.php'>Profile </a>
      <a href='index.php'> Home</a>";
        } elseif (isset($_SESSION["userID"]) && $_SESSION["uc"] == "2") {
            echo "<a href='logout.php'>Logout</a>
      <a href='ddashboard.php'>Profile </a>
      <a href='index.php'> Home</a>";
        } elseif (isset($_SESSION["userID"]) && $_SESSION["uc"] == "3") {
            echo "<a href='logout.php'>Logout</a>
      <a href='sdashboard.php'>Profile </a>
      <a href='index.php'> Home</a>";
        } else {
            echo " <div class='dropdown'>
    <button class='dropbtn'> Login <i class='fa fa-caret-down'></i>
    </button>
    <div class='dropdown-content'>
      <a href='patient.login.php'>Patient Login</a>
      <a href='doctor.login.php'>Doctor Login</a>
      <a href='staff.login.php'>Staff Login</a>
    </div>
  </div>
  <a href='about.php'>About </a>
  <a href='index.php'> Home</a>";
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

    <div class="footer">
        <a href="#">
            <p> Designed By Shahriar Khan</p>
        </a>
    </div>
</body>

</html>