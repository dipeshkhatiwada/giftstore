<?php
include("db_connect.php");
//require_once('./helpers.php');


session_start();


$username = "";
$fullname = "";
$email    = "";
$errors = array(); 

if (isset($_POST['username'])) 
{
  $username = mysqli_real_escape_string($db, $_POST['username']);

  $email = mysqli_real_escape_string($db, $_POST['email']);
  $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($fullname)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
  array_push($errors, "The two passwords do not match");
}

  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = $db->query($user_check_query);


  if($result)
  {  $user = $result->fetch_assoc();
     if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }
}
 

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password_1);//encrypt the password before saving in the database

    $query = "INSERT into users (username, fullname, email, password) VALUES ('$username', '$fullname', '$email', '$password')";

    // dd($query);
    $result= $db->query($query);
    if($result)
    {
    $_SESSION['login_user'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header('location: index.php');
  }
  }
}
?>
<html>
<html lang="en">
<head>
  <title>Registration Form</title>
  <?php require_once('includes/head.php'); ?>
</head>

<body>
  <?php require_once('includes/nav.php'); ?>
  <div class="header">
    <h2 style="margin-top:200px:">
    <h2 align="center">Register</h2>
  </div>
  <div class="container">
  <div class="jumbotron">
  <form method="post" action="">
      <?php include('./error.php') ?>

      <label>Username</label>
      <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" >


      <label>Fullname</label>
      <input type="text" name="fullname" class="form-control" value="<?php echo $fullname; ?>">
    
      <label>Email</label>
      <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
    
      <label>Password</label>
      <input type="password" name="password_1" class="form-control">
    
      <label>Confirm password</label>
      <input type="password" name="password_2" class="form-control"><br>

    
      <button type="submit" class="btn btn-primary">Register</button> <br> 
      Already a member? <a href="login.php">Sign in</a>
  </form>

</div>
</div>
<?php require_once('includes/footer.php'); ?>
<?php require_once('includes/script.php'); ?>
</body>
</html>