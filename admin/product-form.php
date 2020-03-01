<?php
  include("includes/head.php");

  $query = "SELECT * from categories";

  $result = $db->query($query);


  $categories = [];
  while ($row = $result->fetch_assoc()) {
    $categories[] = $row;
  }


  $name = "";
  $quantity = null;
  $description = "";
  $category_id = "";
  $image = "";
  $errors = array(); 


  if (isset($_POST['name']) && !empty($_POST['name'])) 
  {

    // dd($_FILES);

    $name = mysqli_real_escape_string($db, $_POST['name']);

    $quantity = mysqli_real_escape_string($db, $_POST['quantity']);

    $description = mysqli_real_escape_string($db, $_POST['description']);

    $category_id = mysqli_real_escape_string($db, $_POST['category_id']);

    $image = uploadImageCat($_FILES['image']);



   


      $query = "INSERT into products (name, category_id, quantity, description, image) VALUES ('$name', $category_id, $quantity, '$description', '$image')";

      // dd($query);
      $result= $db->query($query);
      if($result)
      {
        $_SESSION['success'] = 'Category successfully added..';
        header("Location: product-index.php");
        die();
      }
    }
  
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Product Form</h1>

          <form method="POST" action="" enctype="multipart/form-data">
          <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label"> Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="name" required="" name="name">
            </div>
          </div>

          <div class="form-group row">
            <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="quantity" required="" min="1" name="quantity">
            </div>
          </div>

          <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
              <textarea class="form-control" id="description" required="" name="description"></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
            <select class="custom-select" name="category_id">
              <option selected disabled="">Select Category</option>
              <?php foreach ($categories as $value) { ?>
              <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
              <?php } ?>
            </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="image" class="col-sm-2 col-form-label">Image </label>
            <div class="col-sm-10">
              <input type="file" class="form-control" id="image" required="" name="image">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Add Product</button>
            </div>
          </div>
        </form>
 
        </div>
        <!-- /.container-fluid -->
<?php
  include("includes/foot.php");
  ?>
