<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Blog</title>
</head>
<body>

<?php

require_once './oop.php';
$validate_pdo = new validator();
$connpdo_all = new validator();

echo '<a href="admin">Bo To Admin</a><br><br><br>';

if(isset($_GET['blog'])){
	$getpdoarray = array($_GET['blog']);
	$validate_pdo->connpdo_1("SELECT * FROM blog where id = ?", $getpdoarray);
	$array_pdo = (array)$validate_pdo;
	$array_1 = json_decode(json_encode($array_pdo), True);

	echo "title: <br>";
	echo $array_1['mysqlpdo']['title'];
	echo "<hr>";
	echo "text: <br>";
	echo $array_1['mysqlpdo']['text'];
}else{
	echo "List All Item Here ! <br><br>";

	$connpdo_all->connpdo_all("SELECT * FROM blog");
	$array_pdo_all = (array)$connpdo_all;
	$array_pdo_all = json_decode(json_encode($array_pdo_all), True);

	foreach($array_pdo_all['mysqlpdo'] as $result) {
	    echo '<a href="?blog='.$result['id'].'">'.$result['title'].'</a>' . '<hr><br>';
	}
}



?>
	

</body>
</html>