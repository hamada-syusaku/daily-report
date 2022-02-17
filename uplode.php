<?php
$sflug ="1";
$id = ["id"];
$textid = ["textid"]; 
$email = $_POST["email"];
$password = $_POST["password"];
$db = mysqli_connect("localhost","root", "","user");
$sql = "select*from userdata where email='".$email."' and password='".$password."'";
$result = mysqli_query($db, $sql);
$loginflag= false;
$name = "";
$judge = "";
$review = "";
while ($data = mysqli_fetch_assoc($result)) {
	$id = $data['id'];
	$name = $data['name'];
	$manager_flg = $data["manager_flg"];
	$manager_flg = $data["manager_flg"];
	$manager = $data['manager'];
	$loginflag=true;
} 
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
		echo'<header><p id="header">Daily report</p></header>';
		if($loginflag) {
			echo'<div class="end">'.$name.'さんがログインしています。</div>';
			echo'<div id="main-body">';
			echo'<form action="" method="post">';
			echo'<style>';
			echo'</style>';
			echo '<div><input hidden="text" id="id" name="id" value="'.$id.'"></div>';
			echo '<div><input type="hidden" id="name" name="name" value="'.$name.'"></div>';
			echo '<div><input hidden="text" id="id" name="manager_flg" value="'.$manager_flg.'"></div>';
			echo'<ul class="f-container">';
			echo'<li><div><button formaction="detail.php" class="btn btn-top btn--radius">登録情報の削除・更新</button></div></li>';
			echo '<input hidden="text" id="name" name="email" value="'.$email.'">';
			echo '<input hidden="text" id="name" name="password" value="'.$password.'">';
			if ($manager_flg ==0) {
				echo'';
				echo '<input hidden="text" id="manager" name="manager" value="'.$manager.'">';
				echo '<input type="hidden" manager="'.$manager.'" name="manager" value="'.$manager.'">';
				echo '<input type="hidden" name="manager" value="'.$manager.'">';
				echo'<input type="hidden" name="manager_flg" required="required" value="0">';//0=一般ユーザー
				echo'<li><div><button formaction="register.php" class="btn btn--orange-top btn--radius">日報を登録</button></div></li>';
			} else {
				echo'<input type="hidden" name="id" value="'.$id.'">';
				echo'<input type="hidden" name="f_flg" value="1">';
				echo'<li><div class="f-container"><input type="submit" formaction="register-or-delete.php" class="btn btn-top btn--radius" value="管理ユーザーの追加・削除"></div></li>';
				echo '<input hidden="text" id="id" name="id" value="'.$id.'">';
				echo'<li><div class="f-container"><button formaction="select-student.php" class="btn btn-top btn--radius">管理ユーザーの登録情報</button></div></li>';
				echo '<input hidden="text" id="id" name="id" value="'.$id.'">';
				echo '<input hidden="text" id="email" name="email" value="'.$email.'">';
				echo '<input hidden="text" id="password" name="password" value="'.$password.'">';
			}
			echo'<li><div class="f-container"><button formaction="index.php" class="btn btn-top btn--radius">ログアウト</button></div></li>';
			echo'</ul>';
			echo'<div id="aaa">';
			echo'<div id="topic1">';
			echo'<p>絞り込み検索</p>';
			echo'</div>';
			echo'<div id="aaa">';
			echo'<div id="main">';
			echo '<div><input hidden="text" id="id" name="id" value="'.$id.'"></div>';
			echo'<form action="before-post.php" method="post">';
			echo '<input type="hidden" name="manager" value="'.$manager.'">';
			echo'<p>日報から探す</p>';
			echo'<div><input type="text" id="review" name="review"></div>';
			echo'<p>担当者のコメントから探す</p>';
			echo'<div><input type="text" id="message" name="message"></div>';
			echo'<select name="judge" >';
			if ($manager_flg ==0) {
				echo'<option value= "1">自己評価 1</option>';
				echo'<option value= "2">自己評価 2</option>';
				echo'<option value= "3">自己評価 3</option>';
				echo'<option value= "4">自己評価 4</option>';
				echo'<option value= "5">自己評価 5</option>';
				echo'</select>';
				echo '<div><input type="hidden" id="name" name="name" value="'.$name.'"></div>';
				echo '<div><input hidden="text" id="id" name="id" value="'.$id.'"></div>';
				
			} else {
			echo '<option value=""selected>選択する</option>';
			echo'<option value= "1">自己評価 1</option>';
			echo'<option value= "2">自己評価 2</option>';
			echo'<option value= "3">自己評価 3</option>';
			echo'<option value= "4">自己評価 4</option>';
			echo'<option value= "5">自己評価 5</option>';
			echo'</select>';
			echo '<div><input type="hidden" id="name" name="name" value="'.$name.'"></div>';
			echo '<div><input hidden="text" id="id" name="id" value="'.$id.'"></div>';
			}
			if ($manager_flg ==0) {
				echo'<div><input type="checkbox" name="checkbox" value="1" checked=checked>自分の投稿を検索</div>';
				echo '<input hidden="text" id="email" name="email" value="'.$email.'">';
				echo '<input hidden="text" id="password" name="password" value="'.$password.'">';
			} else {
				echo'';
			}
			echo'<div><button formaction="before-post.php">検索</button></div>';
			echo'</form>';
			echo'</div>';
			echo'</div>';
			echo'</div>';
			echo'</div>';
			echo'</div>';
			echo'</div>';
			echo'</div>';
			echo'<div id="sub-body">';
			echo'<div id="aaa">';
			if ($manager_flg ==0) {
				echo'<div id="topic">
				<p>過去の投稿一覧</h2></p>
				</div>';
				echo'<div id="sub_">';
				$db = mysqli_connect("localhost","root", "","user");
				$sql = "select*from contents where name='".$name."' ORDER BY textid DESC";
				$result = mysqli_query($db, $sql);
				mysqli_close($db);
			} else {
				echo'<div id="topic">
				<p>管理ユーザーの投稿一覧</p>
				</div>';
				echo'<div id="sub_">';
				$db = mysqli_connect("localhost","root", "","user");
				$sql = "select*from contents where manager='".$name."'";
				$result = mysqli_query($db, $sql);
				mysqli_close($db);
			}
			?>
			
			<?php
			echo'<table border="1">';
			echo'<tr>';
			echo'<th>id</th><th>投稿時間</th><th>名前</th><th>本日の活動</th><th>自己評価</th><th>担当者からのコメント</th>';
			if ($manager_flg ==0) {
				echo'<th id="final">詳細</th>';
			}else{
				echo'<th id="final">コメントする</th>';
			}
			echo'</tr>';
			echo'<form action="" method="get">';
			echo '<input hidden="text" id="name" name="name" value="'.$name.'">';
			echo '<input type="hidden" name="email" value="'.$email.'">';//table userdata
			echo '<input type="hidden" name="password" value="'.$password.'">';//table userdata
			while ($data = mysqli_fetch_assoc($result)) {
				echo'<tr>';
				echo'<td>'.$data["textid"].'</td>';
				echo'<td>'.$data["col_timestamp"].';</td>';
				echo'<td>'.$data["name"].'</td>';
				echo'<td>'.$data["review"].'</td>';
				echo'<td>'.$data["judge"].'</td>';
				echo'<td>'.$data["message"].'</td>';
				if ($manager_flg ==0) {
					echo '<td><a href="action.php? textid='.$data["textid"].'&id='.$id.'&name='.$name.' &email='.$email.' &password='.$password.' &sflug='.$sflug.'">詳細はこちら</a></td>';
						} else {
					echo '<td><a href="message.php? textid='.$data["textid"].'&id='.$id.'&username='.$name.' &email='.$email.' &password='.$password.' &sflug='.$sflug.'">コメントはこちら</a></td>';
				}
				}
			echo'</table>';
			echo'</div>';
			echo'</div>';
			echo'</div>';
				}else {
			echo'<h1>Email、またはpasswordに誤りがあります。</h1>';
			echo'<form action="index.php" method="post">';
			echo'<p><input type="submit" value="戻る"></p>';
			echo'</form>';
			}
			echo'<footer>';
			echo'<p id="footer">Daily report</p>';
			echo'<p id="footer2">お問い合わせ:00-0000-0000<br>受付時間:平日  10時～17時  ※祝日・年末年始除く</p>';
			echo'</footer>';
			?>
		</ul>
	</div>
	</div>
</body>
</html>
