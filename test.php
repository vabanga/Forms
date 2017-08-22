<?php
$ot1q1 =[];
$ot2q1 =[];
$ot3q1 = [];
$ot4q1 = [];
$right1 = [];
$title1 = [];
$ot1q2 =[];
$ot2q2 =[];
$ot3q2 = [];
$ot4q2 = [];
$right2 = [];
$title2 = [];
$pr1 = '';
$pr2 = '';
$or1 = '';
$or2 = '';


if(isset($_POST["send"])){
	$po1 = 10;
	$polo1 = (int)$_POST['q1'];
	if($polo1 !== null){
		if($polo1 == $po1){
			$pr1 = 'Вы ответели правильно!';
		}else{
			$or1 = 'Вы ответили НЕ правельно!';
		}
	}else{}
}else{}


if(isset($_POST["sendd"])){
	$po2 = 100;
	$polo2 = (int)$_POST['q2'];
	if($polo2 !== null){
		if($polo2 == $po2){
			$pr2 = 'Вы ответели правильно!';
		}else{
			$or2 = 'Вы ответили НЕ правельно!';
		}
	}else{}
}else{}



if(isset($_GET["fileid"])) {
	define(PATH_UPLOAD,'test');
	$files = array();
	$k = 1;
	foreach (glob(PATH_UPLOAD."/*.json") as $filename) {
		$files[$k] = $filename;
		$k++;
		}
	if (file_exists($files[$_GET['fileid']])) {
		$cont = file_get_contents($files[$_GET['fileid']]);
		$tests = json_decode($cont,true);
		/*var_dump($tests[1]);*/
		foreach ($tests[0] as $v){
			$title1 = $tests[0]["title"];
			foreach ($tests[0]["answer"] as $v1){
				list($ot1q1,$ot2q1,$ot3q1,$ot4q1) = $tests[0]["answer"];
				break;
			}
			$right1 = $tests[0]["right"];
			?>
			<form action="" method="POST">
				<fieldset>
					<legend><?= $title1; ?></legend>
					<label>
						<input type="radio" name="q1" value="1"><?= $ot1q1 ?>
					</label>
					<label>
						<input type="radio" name="q1" value="10"><?= $ot2q1 ?>
					</label>
					<label>
						<input type="radio" name="q1" value="100"><?= $ot3q1 ?>
					</label>
					<label>
						<input type="radio" name="q1" value="1000"><?= $ot4q1 ?>
					</label>
					<label>
						<?php echo $pr1;?>
					</label>
					<label>
						<?php echo $or1;?>
					</label>
				</fieldset>
				<input type="submit" name="send" value="Отправить">
			</form>
			<?php
			break;

		}
		foreach ($tests[1] as $v3){
			$title2 = $tests[1]["title"];
			foreach ($tests[1]["answerr"] as $v4){
				list($ot1q2,$ot2q2,$ot3q2,$ot4q2) = $tests[1]["answerr"];
				break;
			}
			$right2 = $tests[1]["right"];
			?>
			<form action="" method="POST">
				<fieldset>
					<legend><?= $title2; ?></legend>
					<label>
						<input type="radio" name="q2" value="1"><?= $ot1q2 ?>
					</label>
					<label>
						<input type="radio" name="q2" value="10"><?= $ot2q2 ?>
					</label>
					<label>
						<input type="radio" name="q2" value="100"><?= $ot3q2 ?>
					</label>
					<label>
						<input type="radio" name="q2" value="1000"><?= $ot4q2 ?>
					</label>
					<label>
						<?php echo $pr2;?>
					</label>
					<label>
						<?php echo $or2;?>
					</label>
				</fieldset>
				<input type="submit" name="sendd" value="Отправить">
			</form>
			<?php
			break;
		}

	} else {
		?>
		<p style="color:red">Файл не найден</p>
		<?php
	}

}else{
	?>
	<p style="color:red">Неверные параметры</p>
	<?php
}


?>

