 <?php
  include("../db_connect.php");
  @session_start();


  // include('./session.php');
  
  errorIfLogged();


  if($_SERVER['REQUEST_METHOD']=="POST")
  {

    $username=mysqli_real_escape_string($db,$_POST['username']);
    $password=mysqli_real_escape_string($db,$_POST['password']);

    $password = md5($password);

    $sql="SELECT * FROM `users` where username='$username' and password='$password' and role='admin'";
    
    if($sql){
      $result=$db->query($sql);
      //dd($result);
    $count=0;
    }
    

    if($result)
    {
      $row=$result->fetch_assoc();
      //dd($row);
      $count=$result->num_rows;
      echo $count;
    }

    // echo $username;
    // echo $password;
    
    if($count==1)
    {
      
        $_SESSION['login_admin']=$username;
        header("location:index.php"); 
    }
    elseif ($count==0) 
    {
      $error="Your login name or password is invalid";
      echo $error;
    }
  }
?>

<!DOCTYPE html>
<htmL>
<head>
  <title>Admin login Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Font Awesome Icons -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../vendor/bootstrap/js/bootstrap.js" rel="stylesheet" type="text/css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

  <!-- Plugin CSS -->
  <link href="../vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

  <!-- Theme CSS - Includes Bootstrap -->
  <link href="../css/creative.min.css" rel="stylesheet">
</head>
   

   <body>
	    
    <?php include('../includes/nav.php'); ?> 
    </br>
  </br>
  <h2 style="margin-top:150px:">

 <h2 align="center">LOGIN TO ACCESS ADMIN PANNEL</h2>
  </br>
  <div class="container">
  <div class="jumbotron">
  <form method="post" action="">

      <label>Username</label>
      <input type="text" name="username" class="form-control">
    
      <label>Password</label>
      <input type="password" name="password" class="form-control">
      <br>
      <button type="submit" class="btn btn-primary" value="submit">Login
      </button> <br> <br>
      
  </form>

</div>
</div>
      <?php require_once('../includes/footer.php'); ?>
      <?php require_once('../includes/script.php'); ?>
   </body>
</html>