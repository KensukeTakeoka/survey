<?php
try{
	//1.データーベースに接続する
	$dsn = 'mysql:dbname=phpkiso;host=localhost';
	$user = 'root';
	$password = '';
	$dbh = new PDO($dsn,$user,$password);
	$dbh->query('SET NAMES utf8');

	?>

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

		// $dsn ='mysql:dbname=phpkiso;host=localhost';
		// $user ='root';
		// $password='';
		// $dbh= new PDO($dsn,$user,$password);
		// $dbh->query('SET NAME utf8');
		
		// $sql='ここにSQL文を書く';
		// $stmt= $dbh->prepare($sql);
		// $stmt->execute();

		//SQLインジェクション対策なし。
		//$sql='INSERT INTO anketo(nickname,email,goiken)VALUES("'.$nickname.'","'.$email.'","'.$goiken.'")';
		//$stmt=$dbh->prepare($sql);
		//$stmt->execute();

		// //SQLインジェクション対策あり。
		// $sql='INSERT INTO anketo(nickname,email,goiken)VALUES(?, ?, ?)';
		// $params = [];
		// $params[] = $nickname;
		// $params[] = $email;
		// $params[] = $goiken;
		// $stmt=$dbh->prepare($sql);
		// $stmt->execute($params);

		// $dbh = null;



		echo $nickname;
		echo'様<br/>';
		echo'ご意見ありがとうございました。<br />';
		echo'頂いたご意見『';
		echo $goiken;
		echo'』<br />';
		echo $email;
		echo 'にメールを送りましたのでご確認下さい。';

		//2.SQLで指令を出す
		$sql = 'INSERT INTO anketo (nickname,email,goiken)VALUES("';
		$sql .= $nickname.'","'.$email.'","'.$goiken.'")';

		//echo $sql;
		$stmt = $dbh->prepare($sql);

		$stmt->execute();

		//3.データーベースから切断する
		$dbh=null;
}
catch(exception $e)
{
	echo'只今障害が発生しております。ご不便お掛けし申し訳ありません';

}


	?>


	</body>
</html>
