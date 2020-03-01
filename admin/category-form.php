<?php
include("includes/head.php");

$name = "";
$summary = "";
$image = "";
$errors = array(); 


if (isset($_POST['name']) && !empty($_POST['name'])) 
{
  $name = mysqli_real_escape_string($db, $_POST['name']);

  $summary = mysqli_real_escape_string($db, $_POST['summary']);

  $image = uploadImage($_FILES['image']);

  // $image = mysqli_real_escape_string($db, $image);


  if (empty($name)) { array_push($errors, "Name is required"); }

  $user_check_query = "SELECT * FROM categories WHERE name='$name' LIMIT 1";
  $result = $db->query($user_check_query);


  if($result)
  {  $category = $result->fetch_assoc();
     if ($category) { 
    if ($category['name'] === $name) {
      array_push($errors, "Category already exists");
    }
  }
}
 

  if (count($errors) == 0) {

    $query = "INSERT into categories (name, summary, image) VALUES ('$name', '$summary', '$image')";

    // dd($query);
    $result= $db->query($query);
    if($result)
    {
      $_SESSION['success'] = 'Category successfully added..';
      header("Location: category-index.php");
      die();
    }
  }
}
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Category Form</h1>

          <form method="POST" action="" enctype="multipart/form-data">
          <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label"> Name</label>
            <div class="col-sm-10">
              <input type="name" class="form-control" id="name" name="name" required="ss">
            </div>
          </div>

          <div class="form-group row">
            <label for="summary" class="col-sm-2 col-form-label">Summary</label>
            <div class="col-sm-10">
              <textarea class="form-control" id="summary" name="summary"></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Image </label>
            <div class="col-sm-10">
              <input type="file" class="form-control" id="name" name="image">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Add Category</button>
            </div>
          </div>
        </form>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<?php require_once("./includes/foot.php");?>

 
