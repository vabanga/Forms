<?php

if($_FILES['userfile']){
    $des = 'tests/';
    $file = $_FILES['userfile'];
    define(PATH_UPLOAD,'tests');
    $ext = explode(".", $file['name']);
    $uploadfile = $des . basename($_FILES['userfile']['name']);
    if($ext[1]=='json'){
        if(move_uploaded_file($file["tmp_name"],$uploadfile) == true){
            echo"Файл отправлен";
        }else{
            echo"Файл НЕ отправлен";
        }
    }else{
        echo"Файл НЕ отправлен";
    }
}
if($_POST['redirect']){
    header('Location: index.php');
}

?>
<form method="post" enctype="multipart/form-data">
	<input type="file" name="userfile">
	<input type="submit" value="Отправить">
	<input type="submit" value="Редирект" name="redirect">
</form>

