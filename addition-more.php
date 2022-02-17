<?php
$f_flg = $_GET["f_flg"];
$id = $_GET["id"];//戻るボタンで必要
$name = $_GET["name"];//ログインユーザー=担当者ユーザー
$studentname = $_GET["studentname"];//追加の選択をしたユーザー
$email = $_GET["email"];
$password = $_GET["password"];
$manager_flg = $_GET["manager_flg"];
$sql = "update userdata set
manager ='".$name ."' where name='".$studentname."'";//担当されるユーザーのカラムをlog inユーザーにする
$db = mysqli_connect("localhost", "root", "", "user");
$result = mysqli_query($db, $sql);
mysqli_close($db);
?>

<?php
$id = $_GET["id"];//戻るボタンで必要
$name = $_GET["name"];//ログインユーザー=担当者ユーザー
$studentname = $_GET["studentname"];//追加の選択をしたユーザー
$email = $_GET["email"];
$password = $_GET["password"];
$manager_flg = $_GET["manager_flg"];
$sql = "update contents set manager='".$name ."' where name='".$studentname."'";
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
			echo'<div id="basic">';
			echo'<h1 id=main-title3>「'.$studentname.'さん」を管理ユーザーに追加しました。</h1>';
			if ($f_flg ==1) {
			echo'<p id="main-title">ログイン画面へ戻りますか?</p>';
			echo'<form action="index.php" method="POST">';
				echo'<div><input type="submit" value="戻る" class="btn2 btn2--orange btn2--radius"></div>';
			}else{
				echo'<p id="main-title">TOPページへ戻りますか?</p>';
				echo'<form action="uplode.php" method="POST">';
				echo'<input type="hidden" name="id" value="'.$id.'">';
				echo'<input type="hidden" name="email" value="'.$email.'">';
				echo'<input type="hidden" name="password" value="'.$password.'">';
				echo'<input type="hidden" name="manager_flg" value="'.$manager_flg.'">';
				echo'<div><input type="submit" value=戻る class="btn2 btn2 btn2--radius"></div>';
				}
			?>
		
			<?php
			if ($f_flg ==0) {
				echo'<form action="" method="post">';
				echo'<p id="main-title">管理ユーザーの変更を続けますか?</p>';
				echo'<input type="hidden" name="id" value="'.$id.'">';
				echo'<input type="hidden" name="name" value="'.$name.'">';
				echo'<input type="hidden" name="email" value="'.$email.'">';
				echo'<input type="hidden" name="password" value="'.$password.'">';
				echo'<input type="hidden" name="manager_flg" value="'.$manager_flg.'">';
				echo'<input type="hidden" name="f_flg" value="'.$f_flg.'">';
				echo'<button formaction="register-or-delete.php" class="btn2 btn2--orange btn2--radius">続ける</button></div>';
			}else{
				echo'';
			}
				?>
			</div>
		</div>
		<footer>
			<p id="footer">Daily report</p>
			<p id="footer2">お問い合わせ:00-0000-0000<br>受付時間:平日  10時～17時  ※祝日・年末年始除く</p>
		</footer>
	</body>
</html>

<?php
$id = $_GET["id"];//戻るボタンで必要
$name = $_GET["name"];
$studentname = $_GET["studentname"];
$email = $_GET["email"];
$password = $_GET["password"];
$manager_flg = $_GET["manager_flg"];
$sql = "update contents set
manager ='".$name ."' where name='".$studentname."'";//担当されるユーザーのカラむmをlog inユーザーにする
$db = mysqli_connect("localhost", "root", "", "user");
$result = mysqli_query($db, $sql);
mysqli_close($db);
?>
