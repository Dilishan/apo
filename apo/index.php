<?php
include('login.php');
if(isset($_SESSION['login_user'])){
header("location: home.php");}
?>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="css/login.css">
</head>
<body>

<div id="wrapper">
  <form method="post" action="" class="login">
    <p>
      <label for="login">User Name:</label>
      <input type="text" name="username" class="input">
    </p>

    <p>
      <label for="password">Password:</label>
      <input type="password" name="password" class="input">
    </p>

    <p class="login-submit">
      <button type="submit" name="submit" class="login-button">Login</button>
    </p>
	
	<div id="error"><span><?php echo $error; ?></span></div>
	
  </form>
  </div>
</body>
</html>