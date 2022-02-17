<?php
$manager_flg = "1";
$manager_flg = $_POST["manager_flg"];
$id = "id";
$names = "";//空箱 担当者→後から追加 否→空送信
$db = mysqli_connect("localhost","root","","user");
$sql = "select*from userdata where manager_flg =0 and manager is null";//プルダウンに表記するsql文
$result = mysqli_query($db, $sql);
mysqli_close($db);
//var_dump($manager_flg);
?>
<!DOCTYPE html
<html>
<head>
	<meta charset="UTF-8">
	<link href="../css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
				<?php
				echo'<header><p id="header">Daily report</p></header>';
				echo'<div id="sub-body">';//背景
				echo'<div id="aaa">';
				echo'<div id="topic">';
					echo'<p>登録情報の入力</p>';
				echo '</div>';
				echo'<div id="sub_">';
				echo'<form action="join.php" method="post">';//送信先
				echo '<div><label for="email" >Email（必須）</label></div>';//email
				echo '<div><input type="text" id="email" name="email" required="required"></div>';//email
				echo '<div><label for="password" >Password（必須）</label></div>';
				echo '<div><input type="password" id="password" name="password" required="required"></div>';
				echo '<div><label for="name">名前（必須）</label></div>';
				echo '<div><input type="text" id="name" name="name" required="required"></div>';
				echo '<div><form action="entry.php" method="post"></div>';
				echo '<div><label for="gender">性別（必須）</label></div>';
				if (["gender"] ==0) {
					echo'<div><input type="radio" name="gender" required="required" value="0">男</div>';
					echo'<div><input type="radio" name="gender" required="required" value="1" checked=checked>女</div>';
				} else {
					echo'<div><input type="radio" name="gender" required="required" value="0" checked=checked>男</div>';
					echo'<div><input type="radio" name="gender" required="required" value="1">女</div>';
				}
				echo'<div><label for="blood">血液型（必須）</label></div>';
				$bloodList = array("A","B","O","AB");
				echo '<select name="blood" required="required">';
				for ($i=0; $i<count($bloodList);$i++) {
					if(["blood"] ==$bloodList[$i]) {
						echo '<option value="'.$bloodList[$i].'">'.$bloodList[$i].'型</option>';
					} else {
						echo '<option value="'.$bloodList[$i].'">'.$bloodList[$i].'型</option>';
					}
				}
				echo'</select>';
				echo'<div><label for="old">年齢（必須）</label></div>';
				echo'<div><input type="text" id="old" name="old"required="required"></div>';
				echo'<div><label for="memo" >備考（任意）</label></div>';
				echo'<div><textarea name="memo" rows="4" cols="20" maxlength="100"></textarea></div>';
				echo'<input type="hidden" name="id" value="'.$id.'">';
				//echo'<input type="hidden" name="names" value="'.$names.'">'; 分岐点？
				echo'<input type="hidden" name="manager_flg" value="'.$manager_flg.'">';
	echo'<input type="hidden" name="f_flg" value="'.$manager_flg.'">';
				echo'<div><input type="submit" value="登録" class="btn2 btn2-top btn2--radius"></div>';
				echo'</form>';
?>
</div>
</div>
	</div>
	<footer>
		<p id="footer">Daily report</p>
		<p id="footer2">お問い合わせ:00-0000-0000<br>受付時間:平日  10時～17時  ※祝日・年末年始除く</p>
	</footer>
</div>
</body>
</html>
