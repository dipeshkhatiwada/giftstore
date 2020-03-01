<?php

	function add_product($name,$category,$quantity,$contents,$db)
	{
		$name=mysqli_real_escape_string($db,$name);
		$category=(int) $category;
		$quantity=(int) $quantity;
		$contents=mysqli_real_escape_string($db,$contents);

		$db->query("INSERT INTO `products` (`id`, `p_name`, `cat_id`, `quantity`, `contents`) 
			VALUES (NULL, '{$name}', {$category}', '{$quantity}', '{$contents}' ");
		echo $db->query();
		die();
	}

	// function update_product($id,$name,$category,$quantity,$contents,$db)
	// {
	// 	$id=(int) $id;
	// 	$name=mysqli_real_escape_string($db,$name);
	// 	$category=(int) $category;
	// 	$quantity=(int) $quantity;
	// 	$contents=mysqli_real_escape_string($db,$contents);

	// 	$db->query("UPDATE `gift_products` SET
	// 		`p_name`	=	'{$name},
	// 		`category`	=	'{$category}',
	// 		`quantity`	=	'{$quantity}',
	// 		`contents'	=	'{$contents}'
	// 		WHERE id={$id}");
	// }zz

	function get_product($id = null, $cat_id = null,$db) {
	$products = array();
	$query = "SELECT gift_products.p_id AS product_id, categories.id AS category_id, p_name, quantity, contents, categories.name FROM gift_products INNER JOIN categories ON categories.id = gift_products.cat_id ";
	
	// if ( isset($id) ) {
	// 	$id = (int) $id;
	// 	$query .= " WHERE `gift_products` . `p_id` = {$id}";
	// }

	// if (isset($cat_id) ){
	// 	$cat_id = (int) $cat_id;
	// 	$query .= " WHERE `cat_id` = {$cat_id}";
	// }

	$query .= " ORDER BY `gift_products` . `p_id` DESC";

	$result = $db->query($query);

	while ($row = $result->fetch_assoc() ) {
		$products[] = $row;
	}


	return $products;
}

	// function categories($id = null, $)
?>