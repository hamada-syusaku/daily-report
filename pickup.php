<?php
$sflug ='0';
$id = $_GET["id"];
$email = "";
$password = "";
$username = $_GET["username"];//ログインユーザー本人の名前
$name = $_GET["name"];
$sql = "select*from contents where name='".$name."'ORDER BY textid DESC";
$db =mysqli_connect("localhost" ,"root","","user");
$result =mysqli_query($db, $sql);
mysqli_close($db);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="../css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<header><p id="header">Daily report</p></header>
		<?php
		echo'<div class="end">'.$username.'さんがログインしています。</div>';
		?>
			<div id="aaa">
					<div id="sub-body">
						<div id="topic">
							<p>担当ユーザーの日報一覧</p>
						</div>
				<div id="sub_">
					<table border="1">
						<tr>
							<th>ID</th><th>投稿時間</th><th>名前</th><th>本日の活動</th><th>自己評価</th><th>担当者からのコメント</th><th id="final">コメントの追加</th>
						</tr>
						<?php
						echo'<form action="" method="post">';
						while ($data = mysqli_fetch_assoc($result)) {//絞り込み文
							echo'<tr>';
							echo'<td>'.$data["textid"].'</td>';
							echo'<td>'.$data["col_timestamp"].'</td>';
							echo'<td>'.$data["name"].'</td>';
							echo'<td>'.$data["review"].'</td>';
							echo'<td>'.$data["judge"].'</td>';
							echo'<td>'.$data["message"].'</td>';
							echo '<td><a href="message.php? textid='.$data["textid"].'&id='.$id.' & email='.$email.' & password='.$password.' &sflug='.$sflug.' &username='.$username.'">コメントはコチラから</a></td>';
							echo'</tr>';
						}
						'?>';
						echo'</table>';
						?>
						
						<?php
						$id = $_GET["id"];//test
						$db = mysqli_connect("localhost","root", "","user");
						$sql = "select*from userdata where id=".$id;
						$result = mysqli_query($db, $sql);
						mysqli_close($db);
						?>
						<?php
						while ($data = mysqli_fetch_assoc($result)) {
							echo'<input type="hidden" name="id" value="'.$data["id"].'">';
							echo'<input type="hidden" name="name" value="'.$data["name"].'">';
							echo'<input type="hidden" name="email" value="'.$data["email"].'">';
							echo'<input type="hidden" name="password" value="'.$data["password"].'">';
							echo'<div><input type="submit" formaction="select-student.php" class="btn2 btn2-top btn2--radius" value="戻る"></div>';						}
						?>
				</div>
				</div>
				</div>
			</div>
		</table>
		<footer>
			<p id="footer">Daily report</p>
			<p id="footer2">お問い合わせ:00-0000-0000<br>受付時間:平日  10時～17時  ※祝日・年末年始除く</p>
		</footer>
	</body>
</html>
