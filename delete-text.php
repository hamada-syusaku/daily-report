<?php
$name = $_POST["name"];
$textid = $_POST["textid"];
$email = $_POST["email"];
$password = $_POST["password"];
$sql = "delete from contents where textid='".$textid."'";
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
		<div id="aaa">
			<?php
			echo'<header><p id="header">daily report</p></header>
				<div class="end">'.$name.'さんがログインしています。</div>';
			echo'<div id="basic"">';
			echo'<h1 id="main-title3">日報の削除が完了しました。</h1>';
			echo'<form action="uplode.php" method="post">';//これ？
			echo'<input type="hidden" name="email" value="'.$email.'">';
			echo'<input type="hidden" name="password" value="'.$password.'">';
			echo'<div><input type="submit" value=戻る></div>';
			?>
			</div>
		</div>
			<p id="footer">daily report</p>
			<p id="footer2">お問い合わせ:00-0000-0000<br>受付時間:平日  10時～17時  ※祝日・年末年始除く</p>
		</footer>
	</table>
</body>
</html>
