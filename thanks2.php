<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>PHP基礎</title>
	</head>
	<body>

	<?php
		$nickname=$_POST['nickname'];
		$email=$_POST['email'];
		$goiken=$_POST['goiken'];
		
		$nickname=htmlspecialchars($nickname);
		$email=htmlspecialchars($email);
		$goiken=htmlspecialchars($goiken);

		$dsn ='mysql:dbname=phpkiso;host=localhost';
		$user ='root';
		$password='';
		$dbh= new PDO($dsn,$user,$password);
		$dbh->query('SET NAME utf8');
		
		$sql='ここにSQL文を書く';
		$stmt= $dbh->prepare($sql);
		$stmt->execute();

		//$sql='INSERT INTO anketo(nickname,email,goiken)VALUES("'.$nickname.'","'.$email.'","'.$goiken.'")';
		$sql='INSERT INTO anketo(nickname,email,goiken)VALUES(?, ?, ?)';
		$params = [];
		$params[] = $nickname;
		$params[] = $email;
		$params[] = $goiken;
		$stmt=$dbh->prepare($sql);
		$stmt->execute($params);

		print_r($stmt);
		print_r($sql);

		$dbh = null;



		echo $nickname;
		echo'様<br/>';
		echo'ご意見ありがとうございました。<br />';
		echo'頂いたご意見『';
		echo $goiken;
		echo'』<br />';
		echo $email;
		echo'にメールを送りましたのでご確認下さい。';
	?>

	</body>
</html>
