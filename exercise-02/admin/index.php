<!DOCTYPE html> <?php session_start(); ?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Backend</title>
</head>
<body>

<?php

if(@$_SESSION['user'] == ""){ if(isset($_POST['login'])){
	$_SESSION['user'] = "true";
	header("location: index.php");
} ?>

<form action="" method="POST">
	<input type="password" name="password"><br>
	<button name="login">Login</button>
</form>

<?php }else{
	require_once '../oop.php';
	$validate_pdo = new validator();
	$connpdo_all = new validator();


	if(isset($_GET['create'])){

	if(isset($_POST['createblog'])){
		$title = $_POST['title'];
		$text = $_POST['text'];
		$date = $_POST['date'];

		$validate_pdo->connpdo_1("INSERT INTO `blog` (`id`, `title`, `text`, `date`) VALUES (NULL, '$text', '$text', '$date');", array());
	}

	?>

	<form action="" method="POST">
		<input type="text" name="title" placeholder="title"><br>
		<textarea name="text"></textarea><br>
		<input type="date" name="date"><br><br>
		<button name="createblog">Create Blog</button>
	</form>

	<?php
	}
	if(isset($_GET['edit'])){

	if(isset($_POST['editblog'])){
		$title = $_POST['title'];
		$text = $_POST['text'];
		$date = $_POST['date'];


		$id = $_GET['edit'];
		$validate_pdo->connpdo_1("UPDATE `blog` SET `title` = '$title', `text` = '$text', `date` = '$date' WHERE id = ?", array($id));
	}

	$getpdoarray = array($_GET['edit']);
	$validate_pdo->connpdo_1("SELECT * FROM blog where id = ?", $getpdoarray);
	$array_pdo = (array)$validate_pdo;
	$array_1 = json_decode(json_encode($array_pdo), True);

	?>

	<form action="" method="POST">
		<input type="text" name="title" placeholder="title" value="<?=$array_1['mysqlpdo']['title']?>"><br>
		<textarea name="text"><?=$array_1['mysqlpdo']['text']?></textarea><br>
		<input type="date" name="date" value="<?=$array_1['mysqlpdo']['date']?>"><br><br>
		<button name="editblog">Edit Blog</button>
	</form>

	<?php }
	if(isset($_GET['delete'])){
		$delete = $_GET['delete'];
		$validate_pdo->connpdo_1("DELETE FROM blog where id = ?", array($delete));
	}

	echo "<br>";
	echo "<br>";
	echo "<br>";

	$connpdo_all->connpdo_all("SELECT * FROM blog");
	$array_pdo_all = (array)$connpdo_all;
	$array_pdo_all = json_decode(json_encode($array_pdo_all), True);

	echo '<a href="../index.php">Back To blog</a> / <a href="?create=true">Create An Blog</a><br><br>';

	foreach($array_pdo_all['mysqlpdo'] as $result) {
	    echo $result['title']. ' '.$result['date'].' <a href="?edit='.$result['id'].'">Edit</a> <a href="?delete='.$result['id'].'">Delete</a><br>';
	}
}

?>
	
</body>
</html>