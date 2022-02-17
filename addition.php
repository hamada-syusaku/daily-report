<?php
$textid = $_POST["textid"];
$review = $_POST["review"];
$judge = $_POST["judge"];
$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$sql = "update contents set
	name='".$name."', review='".$review."' , judge='".$judge."' where textid=".$textid;
$db = mysqli_connect("localhost", "root", "", "user");
$result = mysqli_query($db, $sql);
mysqli_close($db);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="../css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<?php
		echo'<header><p id="header">daily report</p></header>
		<div class="end">'.$name.'さんがログインしています。</div>';
		echo'<div id="basic"">
			<div id="aaa">
				<ul id="nav">';
					echo'<h1 id="main-title3">更新が完了しました</h1>';
					echo'<form action="uplode.php" method="post">';
					echo'<input type="hidden" name="email" value="'.$email.'">';
					echo'<input type="hidden" name="password" value="'.$password.'">';
					echo'<div><input type="submit" value="ホーム画面に戻る" class="btn btn--orange btn--radius"></div>';
					echo'</div>
					</div>';
					echo'<footer>
					<p id="footer">daily report</p>
					<p id="footer2">お問い合わせ:00-0000-0000<br>受付時間:平日  10時～17時  ※祝日・年末年始除く</p>
					</footer>';
		?>
	</body>
</html>
