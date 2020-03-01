<?php
ob_start();

$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'ecommerce_giftstore';
global $db;
$db= new mysqli($db_host,$db_user,$db_pass,$db_name);

function dd($data){
	echo "<pre>".var_dump($data)."</pre>";
	die();
}

function loginCheck(){
	if(!isset($_SESSION['login_admin'])){
		header ('Location: 	http://localhost/template/admin/login.php');
	}
}

function errorIfLogged(){
	if(isset($_SESSION['login_admin'])){
		header ('Location: 	http://localhost/template/404.php');		
	}
}

function uploadImage($image){
	    
	$allowed_exts = array('jpg','png','jpeg','gif','bmp','svg');

	$dir = "./uploads/images";


	if(!is_dir($dir)){
	  mkdir($dir,0777,true);
	}

	if($image['error'] == 0){

		if($image['size'] <= 2000000){
			$ext = pathinfo($image['name'], PATHINFO_EXTENSION);

			if(in_array( strtolower($ext), $allowed_exts)){
				$file_name = "Image-".date('Ymdhis').rand(0,999).".".$ext;
				
				$success = move_uploaded_file($image['tmp_name'], $dir."/".$file_name);

				return $file_name;
			}
		}
	}
}


function uploadImageCat($image){
	    
	$allowed_exts = array('jpg','png','jpeg','gif','bmp','svg');

	$dir = "./uploads/img";


	if(!is_dir($dir)){
	  mkdir($dir,0777,true);
	}

	if($image['error'] == 0){

		if($image['size'] <= 2000000){
			$ext = pathinfo($image['name'], PATHINFO_EXTENSION);

			if(in_array( strtolower($ext), $allowed_exts)){
				$file_name = "Image-".date('Ymdhis').rand(0,999).".".$ext;
				
				$success = move_uploaded_file($image['tmp_name'], $dir."/".$file_name);

				return $file_name;
			}
		}
	}
}