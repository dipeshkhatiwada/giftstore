<?php
  include("includes/head.php");
   $query = "SELECT * from products";

  $result = $db->query($query);


  $products = [];
  while ($row = $result->fetch_assoc()) {
		$products[] = $row;
	}
  ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <h1 class="h3 mb-4 text-gray-800">Product List</h1>

	        <table class="table">
			  <thead class="thead-dark">
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Name</th>
			      <th scope="col">Quantity</th>
			      <th scope="col">Description</th>
			      <th scope="col">Category</th>
			      <th scope="col">Image</th>
			      <th scope="col" colspan="2">Action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php foreach ($products as $key => $value) { ?>
			    <tr>
			      <th scope="row"><?php echo $key + 1 ?></th>
			      <td><?php echo $value['name'] ?></td>
			      <td><?php echo $value['quantity'] ?></td>
			      <td><?php echo $value['description'] ?></td>
			      <td><?php echo $value['category_id'] ?></td>
			      <td><img src="uploads/images/<?php echo $value['image'] ?>" style="max-height: 200px;"></td>
			      <td><a href="edit-post.php?id=<?php echo $value['id']; ?>" class="btn btn-danger">Edit</a></td> 
			      <td><a href="delete-post.php?id=<?php echo $value['id']; ?>" class="btn btn-danger">Delete</a></td>
			    </tr>
				<?php } ?>
			  </tbody>
			</table>
        </div>
        <!-- /.container-fluid -->

<?php
  include("includes/foot.php");
  ?>
