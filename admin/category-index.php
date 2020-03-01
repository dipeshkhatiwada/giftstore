<?php
  include("includes/head.php");

  $query = "SELECT * from categories";

  $result = $db->query($query);


  $categories = [];
  while ($row = $result->fetch_assoc()) {
		$categories[] = $row;
	}

	//dd($categories[0]['id']);
  ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <h1 class="h3 mb-4 text-gray-800">Category List</h1>

	        <table class="table">
			  <thead class="thead-dark">
			    <tr>
			      <th scope="col">ID</th>
			      <th scope="col">Name</th>
			      <th scope="col">Summary</th>
			      <th scope="col">Image</th>
			      <th scope="col" colspan="2">Action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php foreach ($categories as $key => $value) { ?>
			    <tr>
			      <th scope="row"><?php echo $key + 1 ?></th>
			      <td><?php echo $value['name'] ?></td>
			      <td><?php echo $value['summary'] ?></td>
			      <td><img src="uploads/images/<?php echo $value['image'] ?>" style="max-height: 200px;"></td>
			        <td><a href="edit-category.php?id=<?php echo $value['id']; ?>" class="btn btn-danger">Edit</a></td>
			      <td><a href="delete-category.php?id=<?php echo $value['id']; ?>" class="btn btn-danger">Delete</a></td>
			    </tr>
				<?php } ?>
			  </tbody>
			</table>
        </div>
        <!-- /.container-fluid -->

<?php
  include("includes/foot.php");
  ?>
