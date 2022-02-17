<?php
$f_flg = $_POST["f_flg"];
$id = $_POST["id"];
$name = $_POST["name"];
$db = mysqli_connect("localhost","root", "","user");
$sql = "select*from userdata where id=".$id;
$result = mysqli_query($db, $sql);
mysqli_close($db);
var_dump ($f_flg);
?>

<?php
while ($data = mysqli_fetch_assoc($result)) {
	$id = $data["id"];
	$email = $data["email"];
	$name = $data["name"];
	$password = $data["password"];
	$manager_flg = $data["manager_flg"];
	}
	?>

<!DOCTYPE html
<html>
<head>
	<meta charset="UTF-8">
	<link href="../css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<header><p id="header">daily report</p></header>
	<div id="aaa">
		<?php
			echo'<div class="end">'.$name.'さんがログインしています。</div>';
			echo'<div id="sub-body2">';//背景
			echo'<div id="topic">';
			echo'<p>追加or削除を選択</p>';
			echo'</div>';
		echo'<div id="sub_">';
		echo'<form action="judge-student.php" method="post">';
		if (["j_flg"] ==0) {
			echo'<div><input type="radio" name="j_flg" required="required" value="0">管理ユーザーの削除</div>';
			echo'<div><input type="radio" name="j_flg" required="required" value="1" checked=checked>管理ユーザーの追加</div>';
		} else {
			echo'<div><input type="radio" name="j_flg" required="required" value="0" checked=checked>管理ユーザーの削除</div>';
			echo'<div><input type="radio" name="j_flg" required="required" value="1">管理ユーザーの追加</div>';
		}
		echo'<input type="hidden" name="id" value="'.$id.'">';
		echo'<input type="hidden" name="name" value="'.$name.'">';
		echo'<input type="hidden" name="email" value="'.$email.'">';
		echo'<input type="hidden" name="password" value="'.$password.'">';
		echo'<input type="hidden" name="manager_flg" value="'.$manager_flg.'">';
		echo'<input type="hidden" name="f_flg" value="0">';
		echo'<div><input type="submit" class="btn2 btn2-top btn2--radius" value="次へ"></div>';
		echo'<div><input type="submit" formaction="uplode.php" class="btn2 btn2-top btn2--radius" value="戻る"></div>';
		echo'</table>';
		echo'</div>';
		echo'</div>';
		echo'</div>';
		echo'</div>';
		echo'</div>';
		echo'<footer>
		<p id="footer">daily report</p>
		<p id="footer2">お問い合わせ:00-0000-0000<br>受付時間:平日  10時～17時  ※祝日・年末年始除く</p>
		</footer>';
		?>
	</body>
</html>
