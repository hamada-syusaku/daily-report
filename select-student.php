<?php
$id = $_POST["id"];
$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$sql = "select*from userdata where manager='".$name."' ";
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
		echo'<div class="end">'.$name.'さんがログインしています。</div>';
		?>
			<div id="aaa">
			<div id="sub-body">
					<div id="topic">
						<p>管理ユーザーの投稿一覧</p>
					</div>
					
				<div id="sub_">
					<table border="1">
						<tr>
						<th>ID</th><th>email</th><th>名前</th><th>性別</th><th>年齢</th><th>メモ</th><th id="final">一覧へ</th>
						</tr>
						<?php
						echo'<form action="" method="post">';
						while ($data = mysqli_fetch_assoc($result)) {//絞り込み文
							echo'<tr>';
							echo'<td>'.$data["id"].'</td>';
							echo'<td>'.$data["email"].'</td>';
							echo'<td>'.$data["name"].'</td>';
							if ($data["gender"]==0) {
								echo'<td>男</td>';
							}else{
								echo'<td>女</td>';
							}'</td>';
							echo'<td>'.$data["old"].'</td>';
							echo'<td>'.$data["memo"].'</td>';
							echo '<td><a href="pickup.php? name='.$data["name"].'&id='.$id.' &username='.$name.'">ユーザーの投稿を一覧表示する</a></td>';
							echo'</tr>';
						}
						'?>';
						echo'</table>';
						?>
						
						<?php
						$id = $_POST["id"];//test
						$db = mysqli_connect("localhost","root", "","user");
						$sql = "select*from userdata where id=".$id;
						$result = mysqli_query($db, $sql);
						mysqli_close($db);
						?>
						<?php
						while ($data = mysqli_fetch_assoc($result)) {
							echo'<input type="hidden" name="name" value="'.$data["name"].'">';
							echo'<input type="hidden" name="email" value="'.$data["email"].'">';
							echo'<input type="hidden" name="password" value="'.$data["password"].'">';
							echo'<div><input type="submit" formaction="uplode.php" class="btn2 btn2-top btn2--radius" value="戻る"></div>';
						}
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
