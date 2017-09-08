<h3>Тесты</h3>
<?php
if(isset($_GET["fileid"])) {
	define(PATH_UPLOAD,'tests');
	$files = array();
	$k = 1;
	foreach (glob(PATH_UPLOAD."/*.json") as $filename) {
		$files[$k] = $filename;
		$k++;
	}
	if (file_exists($files[$_GET['fileid']])) {
		$cont = file_get_contents($files[$_GET['fileid']]);
		$tests = json_decode($cont,true);
		$v = [];
		?>
		<form action="" method="post">
			<fieldset>
			<legend><?= $tests[0]["title"] ?></legend>
                <?php
                foreach ($tests as $v) {
                    foreach ($v['answers'] as $ot) {
                        ?>
                        <label>
                            <input type="radio" name="q1" value="<?=$ot?>"><?php echo $ot; ?>
                        </label>
                        <?php
                    }
                }
				if($_POST['q1']){
					if($_POST['q1'] == $v['right']){
						$right = 'Вы ответели правильно!';
					}else{
						$nRight = 'Вы ответели НЕ правильно!';
					}
				}
				?>
				<label>
					<?php echo $right; echo $nRight?>
				</label>
			</fieldset>
			<input type="submit" name="vop1" value="Ответить">
			<input type="submit" name="rTest" value="Назад">
			<?php
			if($_POST['rTest']){
				header('Location: index.php');
			}
			?>
		</form>
		<?php

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