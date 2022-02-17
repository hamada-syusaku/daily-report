<?php
$id = $_GET["id"];//log inユーザーにする
$name = $_GET["name"];//担当されてるユーザーの名前
$email = $_GET["email"];
$password = $_GET["password"];
$manager_flg = $_GET["manager_flg"];
$sql = "update userdata set
manager = null where name='".$name."'";//担当されてるユーザーのカラムをnullにする
$db = mysqli_connect("localhost", "root", "", "user");
$result = mysqli_query($db, $sql);
mysqli_close($db);
?>

<?php
$id = $_GET["id"];//log inユーザーにする
$name = $_GET["name"];//担当されてるユーザーの名前
$sql = "update contents set manager='' where name='".$name."'";//contentsテーブルの担当されてるユーザーのmカラムを空にする
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
			echo'<header><p id="header">Daily report</p></header>';
			echo'<div id="basic">
			<div id="aaa">';
			echo'<h1 id=main-title3>「'.$name.'さん」を管理ユーザーから削除しました。</h1>';
			echo'<p id="main-title">TOPページへ戻りますか?</p>';
			echo'<form action="uplode.php" method="POST">';
			echo'<input type="hidden" name="id" value="'.$id.'">';
			echo'<input type="hidden" name="name" value="'.$name.'">';
			echo'<input type="hidden" name="email" value="'.$email.'">';
			echo'<input type="hidden" name="password" value="'.$password.'">';
			echo'<input type="hidden" name="manager_flg" value="'.$manager_flg.'">';
			echo'<div><input type="submit" value="戻る" class="btn2 btn2 btn2--radius"></div>';
			?>
			
			<?php
			echo'<form action="" method="post">';
			echo'<p id="main-title">管理ユーザーの変更を続けますか?</p>';
			echo'<form action="register-or-delete.php" method="POST">';
			echo'<input type="hidden" name="id" value="'.$id.'">';
			echo'<input type="hidden" name="name" value="'.$name.'">';
			echo'<input type="hidden" name="email" value="'.$email.'">';
			echo'<input type="hidden" name="password" value="'.$password.'">';
			echo'<input type="hidden" name="manager_flg" value="'.$manager_flg.'">';
			echo'<input type="hidden" name="f_flg" value="0">';
			echo'<button formaction="register-or-delete.php" class="btn2 btn2 btn2--radius">続ける</button></div>';
			?>
			</ul>
		</div>
		</div>
<footer>
	<p id="footer">Daily report</p>
	<p id="footer2">お問い合わせ:00-0000-0000<br>受付時間:平日  10時～17時  ※祝日・年末年始除く</p>
</footer>
	</body>
</html>
