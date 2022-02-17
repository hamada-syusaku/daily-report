<?php
$id = "id";
$db = mysqli_connect("localhost","root","","user");
$sql ="select * from userdata where id=".$id;
$result = mysqli_query($db, $sql);
mysqli_close($db);
?>
<!DOCTYPE html
<html>
<head>
	<meta charset="UTF-8">
	<link href="../css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
		<div id="aaa">
				<?php
				echo'<header><p id="header">Daily report</p></header>';
				echo'<div id="sub-body">';
				echo'<div id="topic">';
				echo '<p><div>ユーザー機能を選択</div></p>';
				echo'</div>';
				echo'<div id="sub_">';
				echo'<table border="1">';
				echo'<tr>
				<th>ユーザーの種類</th><th>日報の登録</th><th>自分の日報を閲覧</th><th>管理ユーザーの登録</th><th>管理ユーザーの日報にコメントをする</th>';
				echo'</tr>';
				echo'<tr>';
				echo'<td>通常ユーザー</td>';
				echo'<td class="table-color">◎</td>';
				echo'<td class="table-color">◎</td>';
				echo'<td>×</td>';
				echo'<td>×</td>';
				echo'</tr>';
				echo'<tr>';
				echo'<td>担当者ユーザー</td>';
				echo'<td>×</td>';
				echo'<td>×</td>';
				echo'<td class="table-color">◎</td>';
				echo'<td class="table-color">◎</td>';
				echo'</tr>';
				?>
		
				<?php
				echo'<form action="insert.php" method="post">';
				if (["manager_flg"] ==0) {
					echo'<div><input type="radio" name="manager_flg" required="required" value="0">通常ユーザーとして使用する</div>';
					echo'<div><input type="radio" name="manager_flg" required="required" value="1" checked=checked>担当者ユーザーとして使用する</div>';
				} else {
					echo'<div><input type="radio" name="manager_flg" required="required" value="0" checked=checked>通常ユーザーとして使用する</div>';
					echo'<div><input type="radio" name="manager_flg" required="required" value="1">担当者ユーザーとして使用する</div>';
				}
					echo'<div><input type="submit" value="次へ" class="btn2 btn2 btn2--radius"></div>';
					echo'<div><input type="submit" formaction="index.php" class="btn2 btn2-top btn2--radius" value="戻る"><div>';
				?>
			</table>
	</div>
</div>
<footer>
	<p id="footer">Daily report</p>
	<p id="footer2">お問い合わせ:00-0000-0000<br>受付時間:平日  10時～17時  ※祝日・年末年始除く</p>
</footer>
</body>
</html>
