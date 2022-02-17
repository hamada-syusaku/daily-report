<?php
$id = $_POST["id"];
$sql = "delete from userdata where id='".$id."'";
$db =mysqli_connect("localhost" ,"root","","user");
$result =mysqli_query($db, $sql);
mysqli_close($db);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="../css/style.css" rel="stylesheet" type="text/css">
	</head>
		<body>
		<html>
			<head>
				<meta charset="UTF-8">
				<link href="../css/style.css" rel="stylesheet" type="text/css">
			</head>
			<header><p id="header">Daily report</p></header>
			<div id="basic">
				<div id="aaa">
					<p id="main-title">会員登録の削除が完了しました。</p>
					<div id="a2"><a href="index.php">ログイン画面へ戻る</a></div>
				</div>
			</div>
					<footer>
						<p id="footer">Daily report</p>
						<p id="footer2">お問い合わせ:00-0000-0000<br>受付時間:平日  10時～17時  ※祝日・年末年始除く</p>
					</footer>
				</div>
			</div>
		</table>
	</body>
</html>
