<h3>Список тестов</h3>
<?php
define(PATH_UPLOAD,'tests');
$files = array();
$k = 1;
foreach (glob(PATH_UPLOAD."/*.json") as $filename) {
	$files[$k] = $filename;
	$exp = explode('.',$filename);
	$ext = explode('/',$exp[0]);
	?>
	<ul>
		<li><a href="/test.php?act=test&fileid=<?=$k?>"><?= $ext[1] ?></a></li>
	</ul>
	<?php
	$k++;
}
?>