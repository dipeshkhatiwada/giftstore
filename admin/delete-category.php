<?php 
	include('includes/head.php'); 
	
	function delete($table, $id,$db) {
	$table = mysqli_real_escape_string($db,$table);
	$id    = (int) $id;

	$db->query("DELETE FROM `{$table}` WHERE `id` = {$id}");
	}

if ( ! isset($_GET['id']) )
{
	header('location: index.php');
	die();
}
	
delete('categories', $_GET['id'],$db);
header("Location: category-index.php");
die();