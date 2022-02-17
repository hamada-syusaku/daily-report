<?php
$id = $_POST["id"];
$email = $_POST["email"];
$name = $_POST["name"];
$password = $_POST["password"];
$manager_flg = "0";
$sql = "update userdata set
	 manager_flg='".$manager_flg."' where id=".$id;//manager_flgを0にする記述
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
			<div id="aaa">
					<?php
					echo'<header><p id="header">Daily report</p></header>
					<div class="end">'.$name.'さんがログインしています。</div>';
					echo'<div id="basic"">
					<div id="aaa">';
					echo'<h1 id="main-title3">ユーザー機能の変更が完了しました</h1>';
					echo'<form action="uplode.php" method="POST">';
					echo'<input type="hidden" name="id" value="'.$id.'">';
					echo'<input type="hidden" name="name" value="'.$name.'">';
					echo'<input type="hidden" name="email" value="'.$email.'">';
					echo'<input type="hidden" name="password" value="'.$password.'">';
					echo'<input type="hidden" name="manager_flg" value="'.$manager_flg.'">';
					echo'<div><input type="submit" value="ホーム画面に戻る" class="btn btn--orange btn--radius"></div>';
					?>
					</div>
					</div>
					<footer>
						<p id="footer">Daily report</p>
						<p id="footer2">お問い合わせ:00-0000-0000<br>受付時間:平日  10時～17時  ※祝日・年末年始除く</p>
					</footer>
		</div>
	</body>
</html>

<?php
$name = $_POST["name"];
$sql = "update contents set manager='' where manager='".$name."'";
$db = mysqli_connect("localhost", "root", "", "user");
$result = mysqli_query($db, $sql);
mysqli_close($db);
?>


<?php
$sql = "update userdata set
manager = null where manager='".$name."'";//userdataテーブルの担当していたユーザーのmanagerを空にする記述
$db = mysqli_connect("localhost", "root", "", "user");
$result = mysqli_query($db, $sql);
mysqli_close($db);
?>
