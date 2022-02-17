<?php
	$id = $_POST["id"];
	$email = $_POST["email"];
	$name = $_POST["name"];
	$password = $_POST["password"];
	$gender = $_POST["gender"];
	$blood = $_POST["blood"];
	$old = $_POST["old"];
	$memo = $_POST["memo"];
	$manager_flg = $_POST["manager_flg"];
	$sql = "update userdata set
	email='".$email."', password='".$password."', name='".$name."',
	gender='".$gender."', blood='".$blood."', old=".$old.",memo='".$memo."', manager_flg='".$manager_flg."' where id=".$id;
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
				echo'<header><p id="header">Daily report</p></header>
					<div class="end">'.$name.'さんがログインしています。</div>';
				echo'<div id="aaa">';
				echo'<div id="basic"">';
				echo'<h1 id="main-title3">更新完了しました</h1>';
				echo'<form action="uplode.php" method="POST">';
				echo'<input type="hidden" name="name" value="'.$name.'">';
				echo'<input type="hidden" name="email" value="'.$email.'">';
				echo'<input type="hidden" name="password" value="'.$password.'">';
				echo'<div><input type="submit" value="ホーム画面に戻る" class="btn btn--orange btn--radius"></div>';
			?>
		</div>
			<footer>
				<p id="footer">Daily report</p>
				<p id="footer2">お問い合わせ:00-0000-0000<br>受付時間:平日  10時～17時  ※祝日・年末年始除く</p>
			</footer>
		</div>
	</body>
</html>
