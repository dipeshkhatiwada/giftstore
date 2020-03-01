<?php
include("includes/head.php");
//fetching data

function fetch($table,$id,$db)
  {
  $table = mysqli_real_escape_string($db,$table);
  $id    = (int) $id;
  $sql = "SELECT * FROM `{$table}` WHERE `id` = {$id}";
  $query = $db->query($sql);
  $data = $query->fetch_assoc();
  return $data;
  }

  if ( ! isset($_GET['id']) )
  {
    header('location: index.php');
    die();
  }
  $data = fetch('categories',$_GET['id'],$db);

$name = "";
$summary = "";
$image = "";
$id = $_GET['id'];
$errors = array(); 


if (isset($_POST['name']) && !empty($_POST['name'])) 
{
  $name = mysqli_real_escape_string($db, $_POST['name']);

  $summary = mysqli_real_escape_string($db, $_POST['summary']);

  $image = uploadImage($_FILES['image']);

  // $image = mysqli_real_escape_string($db, $image);


  if (empty($name)) { array_push($errors, "Name is required"); }


 

  if (count($errors) == 0) {
    if($_FILES['image']['error']==0){

    $query = "UPDATE categories set name = '$name', summary = '$summary', image = '$image' where id = $id";
  }else{
      $query = "UPDATE categories set name = '$name', summary = '$summary' where id = $id";
  }

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
              <input type="name" class="form-control" id="name" name="name" required="ss" value="<?php echo $data['name']; ?>" >
            </div>
          </div>

          <div class="form-group row">
            <label for="summary" class="col-sm-2 col-form-label">Summary</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="summary" name="summary" value="<?php echo $data['summary'] ?>">
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
              <button type="submit" class="btn btn-primary">Edit Category</button>
            </div>
          </div>
        </form>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<?php require_once("./includes/foot.php");?>

 
