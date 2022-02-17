<?php
$id = $_POST["id"];
$username = $_POST["username"];
$textid = $_POST["textid"];
$message = $_POST["message"];
$sql = "update contents set
	message='".$message."' where textid=".$textid;
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
					$id = $_POST["id"];
					$db = mysqli_connect("localhost","root", "","user");
					$sql = "select*from userdata where id=".$id;
					$result = mysqli_query($db, $sql);
					mysqli_close($db);
					//var_dump ($id);
					?>
					
					<?php
					echo'<header><p id="header">daily report</p></header>
					<div class="end">'.$username.'さんがログインしています。</div>';
					echo'<div id="basic"">';
					echo'<h1 id="main-title3">コメントを追加しました</h1>';
					while ($data = mysqli_fetch_assoc($result)) {
					//echo'<input type="hidden" name="userid" value="'.$userid.'">';//追加
					//いけるはいける　echo'<form action="index.php" method="post">';//これ？追加
					echo'<form action="uplode.php" method="post">';//これ？追加
					echo'<input type="hidden" name="textid" value="'.$textid.'">';//追加
					//!!! echo'<input type="hidden" name="name" value="'.$data["name"].'">';
					echo'<input type="hidden" name="email" value="'.$data["email"].'">';
					echo'<input type="hidden" name="password" value="'.$data["password"].'">';
					//echo'<div><input type="submit" formaction="addition.php" value="内容を変更する"></div>';
					//"いけるはいける　echo'<button form action="uplode.php" method="POST">';
					echo'<input type="hidden" name="email" value="'.$data["email"].'">';
					echo'<input type="hidden" name="password" value="'.$data["password"].'">';
					echo'<input type="hidden" name="id" value="'.$id.'">';
					//echo'<div><input type="submit" formaction="uplode.php" value="戻る"></div>';
					//echo'<div><input type="submit" value="戻る"></div>';
					echo'<input type="hidden" name="name" value="'.$username.'">';
					echo'<div><input type="submit" value="ホーム画面に戻る" class="btn btn--orange btn--radius"></div>
		</div>
	</div>';
				echo'<footer>
		<p id="footer">daily report</p>
	<p id="footer2">お問い合わせ:00-0000-0000<br>受付時間:平日  10時～17時  ※祝日・年末年始除く</p>
	</footer>';
			}
			?>
		</body>
</html>
