<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>PHP基礎</title>
	</head>
	<body>

	<?php
		$nickname='tttt';
		$email='kkkk';
		$goiken='oooo';

		$dsn ='mysql:dbname=phpkiso;host=localhost';
		$user ='root';
		$password='';
		$dbh= new PDO($dsn,$user,$password);
		$dbh->query('SET NAME utf8');
		
		$sql='ここにSQL文を書く';
		$stmt= $dbh->prepare($sql);
		$stmt->execute();

		$sql='INSERT INTO anketo(nickname,email,goiken)VALUES("'.$nickname.'","'.$email.'","'.$goiken.'")';
		$stmt=$dbh->prepare($sql);
		$stmt->execute();

		$dbh = null;
?>
	</body>
</html>