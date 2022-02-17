<?php
$name = $_POST["name"];
$judge = $_POST["judge"];
$review = $_POST["review"];
$email = $_POST["email"];
$password = $_POST["password"];
$manager = $_POST["manager"];
$message = '';
$sql = "insert into contents
(name, judge, review,manager,message) value
('".$name."','".$judge."','".$review."','".$manager."' ,'".$message."')";
$db = mysqli_connect("localhost", "root", "", "user");
$result = mysqli_query($db, $sql);
mysqli_close($db);//更新DBの指定と更新箇所
//var_dump ($sql);
//var_dump ($password);
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
				
		echo'<div id="basic"">
		<div id="aaa">';
		echo'<h1 id="main-title3">登録が完了しました。</h1>';
					//echo'<h1>登録が完了しました。</h1>';
					echo '<form method="post" action="uplode.php">';
					echo '<input type="hidden" name="email" value="'.$email.'">';
					echo '<input type="hidden" name="password" value="'.$password.'">';
					//echo '<input type="submit" value="ホーム画面に戻る">';
		//echo'<div><button formaction="uplode.php" class="btn btn--orange btn--radius">ホーム画面に戻る</button><div>';
		echo'<div><input type="submit" value="ホーム画面に戻る" class="btn btn--orange btn--radius"></div>';
					//var_dump ($email);
					//var_dump ($password);
		echo'</div>';
		echo'</div>';
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
