<?php

if($_FILES['userfile']){
	$des = 'C:/OpenServer/domains/tes/tests/';
	$file = $_FILES['userfile'];
	define(PATH_UPLOAD,'tests');
	$ext = explode(".", $file['name']);
	$uploadfile = $des . basename($_FILES['userfile']['name']);
	if($ext[1]=='json'){
		move_uploaded_file($file["tmp_name"],$uploadfile);
		echo"Файл отправлен";
	}else{
		echo"Файл НЕ отправлен";
	}
}

if(!isset($_GET['act'])){

}else{
	if($_GET['act']=='admin'){
		include_once 'admin.php';
	}
	if($_GET['act']=='list'){
		include_once 'list.php';
	}
	if($_GET['act']=='test'){
		include_once 'test.php';
	}

}

if($_POST['redirect']){
	header('Location: index.php');
}
if($_POST['Act']){
	header('Location: admin.php');
}
if($_POST['List']){
	header('Location: list.php');
}
?>
<br>
<form action="action.php" method="post"><input type="submit" value="Назад" name="Act"></form>
<form action="action.php" method="post"><input type="submit" value="Список тестов" name="List"></form>