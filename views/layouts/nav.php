<div class="navigation-bar">
        <img src="./assets/images/land.png" alt="logo">
        <?php
        session_start();
        if (isset($_SESSION["userID"]) && $_SESSION["uc"] == "1") {
            echo "<a href='/logout'>Logout</a>
      <a href='/patient'>Profile </a>
      <a href='/'> Home</a>";
        } elseif (isset($_SESSION["userID"]) && $_SESSION["uc"] == "2") {
            echo "<a href='/logout'>Logout</a>
      <a href='/doctor'>Profile </a>
      <a href='/'> Home</a>";
        } elseif (isset($_SESSION["userID"]) && $_SESSION["uc"] == "3") {
            echo "<a href='/logout'>Logout</a>
      <a href='/staff'>Profile </a>
      <a href='/'> Home</a>";
        } else {
            echo " <div class='dropdown'>
    <button class='dropbtn'> Login <i class='fa fa-caret-down'></i>
    </button>
    <div class='dropdown-content'>
      <a href='/admin/login'>Admin Login</a>
      <a href='/patient/login'>Patient Login</a>
      <a href='/doctor/login'>Doctor Login</a>
      <a href='/staff/login'>Staff Login</a>
    </div>
  </div>
  <a href='/about'>About </a>
  <a href='/'> Home</a>";
        }
        ?>
    </div>