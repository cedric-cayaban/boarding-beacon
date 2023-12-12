<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/login.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=3.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/979ee355d9.js" crossorigin="anonymous"></script>

    <title>Document</title>
</head>

<body>
    
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="header">
            <img class="logo" src="images/boarding-logo.png" alt="Boarding Beacon Logo">
        </div>

    <!-- Login Form -->
    <form action="tenant-login.php" method="post">
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="Username" required>
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password" required> 
      <input type="submit" class="fadeIn fourth" name="login" value="Log In">
    </form>

    <div id="formFooter">
      <a class="underlineHover" href="tenant-reg.php">Create Account</a>
    </div>

  </div>
</div>

</body>
</html>


<?php
if (isset($_POST['login'])) {

    require 'db.php';
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {

        $sql = "SELECT * FROM tenant WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) >= 1) {
            $row = mysqli_fetch_assoc($result);

            if ($row['username'] === $username && $row['password'] === $password) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['password'] = $row['password'];

                header("Location: tenant-home.php");
            }
        }
    }
    echo "<script>
            alert('Invalid Credentials');
        </script>";
}
?>

