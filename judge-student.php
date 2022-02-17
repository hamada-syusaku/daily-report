<!DOCTYPE html
<html>
<head>
	<meta charset="UTF-8">
	<link href="../css/style.css" rel="stylesheet" type="text/css">
</head>
				<?php
				$j_flg = $_POST["j_flg"];
				echo'<form action="" method="post">';
				$id = $_POST["id"];
				$name = $_POST["name"];
				$email = $_POST["email"];
				$password = $_POST["password"];
				$manager_flg = $_POST["manager_flg"];
				$f_flg = $_POST["f_flg"];
				echo'<header><p id="header">Daily report</p></header>
				<div class="end">'.$name.'さんがログインしています。</div>';
				echo'<div id="sub-body">';
				echo'<div id="aaa">';
				if ($j_flg ==0) {
				$sql = "select*from userdata where manager='".$name."' ORDER BY id DESC";
				$db =mysqli_connect("localhost" ,"root","","user");
				$result =mysqli_query($db, $sql);
				mysqli_close($db);
				var_dump ($f_flg);
				?>
	
				<?php
				echo'<div id="topic">
				<p>管理ユーザの削除</p>
				</div>';
				echo'<div id="sub_">';//囲い
				echo'<table border="1">
				<tr>
				<th>id</th><th>email</th><th>名前</th><th>性別</th><th>血液型</th><th>年齢</th><th>メモ</th><th id="final">ユーザーを削除</th>
				</tr>';
				while ($data = mysqli_fetch_assoc($result)) {
					echo'<tr>';
					echo'<td>'.$data["id"].'</td>';
					echo'<td>'.$data["email"].'</td>';
					echo'<td>'.$data["name"].'</td>';
				if ($data["gender"]==0) {
							echo'<td>男</td>';
						}else{
							echo'<td>女</td>';
						}
					'</td>';
					echo'<td>'.$data["blood"].'</td>';
					echo'<td>'.$data["old"].'</td>';
					echo'<td>'.$data["memo"].'</td>';
					echo '<td><a href="select-delete.php? name='.$data["name"].' & id='.$id.' & email='.$email.' & password='.$password.' & manager_flg='.$manager_flg.'">『'.$data["name"].'さん』を削除する</a></td>';
					}
					echo'</table>';
					}else{
					$sql = "select*from userdata where manager_flg =0 and manager is null";//プルダウンに表記するsql文
					$db = mysqli_connect("localhost", "root", "", "user");
					$result = mysqli_query($db, $sql);
					while ($data = mysqli_fetch_assoc($result)) {
					} 
					mysqli_close($db);
					?>
					
					<?php
					$db = mysqli_connect("localhost","root", "","user");
					$sql = "select*from userdata where manager_flg =0 and manager is null";//プルダウンに表記するsql文
					$result = mysqli_query($db, $sql);
					mysqli_close($db);
					?>
										
					<?php
					echo'<div id="topic">
					<p>管理ユーザの追加</p>
					</div>';
					echo'<div id="sub_">';//囲い
					echo'<table border="1">
						<tr>
							<th>id</th><th>email</th><th>名前</th><th>性別</th><th>血液型</th><th>年齢</th><th>メモ</th><th id="final">ユーザーを追加</th>
						</tr>';
					echo'<form action="" method="get">';
					while ($data = mysqli_fetch_assoc($result)) {
					echo'<tr>';
					echo'<td>'.$data["id"].'</td>';
					echo'<td>'.$data["email"].'</td>';
					echo'<td>'.$data["name"].'</td>';
					if ($data["gender"]==0) {
					echo'<td>男</td>';
				}else{
			echo'<td>女</td>';
			}'</td>';
		echo'<td>'.$data["blood"].'</td>';
		echo'<td>'.$data["old"].'</td>';
		echo'<td>'.$data["memo"].'</td>';
		echo '<td><a href="addition-more.php? studentname='.$data["name"].' & id='.$id.' & email='.$email.' & password='.$password.' & manager_flg='.$manager_flg.' & f_flg='.$f_flg.'&name='.$name.' ">『'.$data["name"].'さん』を追加する</a></td>';//log inユーザー＝managerの名前も送りたい
										}
									}
		echo'</table>';
?>

<?php
$id = $_POST["id"];
$db = mysqli_connect("localhost","root", "","user");
$sql = "select*from userdata where id=".$id;
$result = mysqli_query($db, $sql);
$data = mysqli_fetch_assoc($result);//追加
mysqli_close($db);
?>

<?php
	echo'<input type="hidden" name="id" value="'.$data["id"].'">';
	echo'<input type="hidden" name="name" value="'.$data["name"].'">';
	echo'<input type="hidden" name="email" value="'.$data["email"].'">';
	echo'<input type="hidden" name="password" value="'.$data["password"].'">';
	echo'<input type="hidden" name="manager_flg" value="'.$data["manager_flg"].'">';
	echo'<input type="hidden" name="f_flg" value="'.$f_flg.'">';//会員登録ー1
	if ($f_flg ==1) {
			echo'<div><button formaction="index.php" class="btn2 btn2--orange btn2--radius">戻る</button><div>';
		}else{
		echo'<div><button formaction="register-or-delete.php" class="btn2 btn2--orange btn2--radius">戻る</button><div>';
	}
echo'</div>';
echo'</div>';
echo'</div>';
echo'</div>';
echo'</div>';
	echo'<footer>
		<p id="footer">Daily report</p>
		<p id="footer2">お問い合わせ:00-0000-0000<br>受付時間:平日  10時～17時  ※祝日・年末年始除く</p>
		</footer>';
?>

</div>
</table>
</body>
</html>
</table>
</div>
</div>
</body>
</html>
