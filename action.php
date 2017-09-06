<?php
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