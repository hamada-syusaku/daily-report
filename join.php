<?php
$f_flg = $_POST["f_flg"];
$id = $_POST["id"];
$email = $_POST["email"];
$password = $_POST["password"];
$name = $_POST["name"];
$gender = $_POST["gender"];
$blood = $_POST["blood"];
$old = $_POST["old"];
$memo = $_POST["memo"];
//$m = $_POST["m"];
$manager_flg = $_POST["manager_flg"];
$sql = "insert into userdata
(email, password, name, gender, blood, old, memo, manager_flg) value
('".$email."','".$password."','".$name."','".$gender."','".$blood."',".$old.",'".$memo."' ,'".$manager_flg."')";//$student2追加 上も
$db = mysqli_connect("localhost", "root", "", "user");
$result = mysqli_query($db, $sql);
mysqli_close($db);
//var_dump ($names);
//var_dump ($student);
//var_dump ($sql);
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
			echo'<h1 id="main-title">会員登録が完了しました</h1>';
			echo'<div id="a2"><a href="index.php">ログインページはコチラ</a></div>';
			if ($manager_flg ==0) {
				echo'';
			}else{
				echo'<p id="main-title">続けて管理ユーザーを登録しますか?</p>';
				echo'<form action="judge-student.php" method="post">';
				echo'<input type="hidden" name="id" value="'.$id.'">';
				echo'<input type="hidden" name="name" value="'.$name.'">';
				echo'<input type="hidden" name="email" value="'.$email.'">';
				echo'<input type="hidden" name="password" value="'.$password.'">';
				echo'<input type="hidden" name="manager_flg" value="'.$manager_flg.'">';
				echo'<input type="hidden" name="j_flg" value="1">';
				echo'<input type="hidden" name="f_flg" value="1">';
				echo'<div><input type="submit" value="登録する" class="btn2 btn2--orange btn2--radius"></div>';
			}
			echo'</div>';
			?>
			<footer>
				<p id="footer">Daily report</p>
				<p id="footer2">お問い合わせ:00-0000-0000<br>受付時間:平日  10時～17時  ※祝日・年末年始除く</p>
			</footer>
		</div>
	</body>
</html>
