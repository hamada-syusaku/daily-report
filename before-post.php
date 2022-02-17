<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="../css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<?php
		$id = $_POST["id"];//追加
		$name = $_POST["name"];
		$review = $_POST["review"];//test
		$message = $_POST["message"];
		$judge = $_POST["judge"];
		$email = $_POST["email"];
		$password = $_POST["password"];//
		$manager_flg = $_POST["manager_flg"];
		$manager = $_POST["manager"];
		
		if (isset($_POST["checkbox"])) {
			
			$sql = "select*from contents where judge =  '".$judge."' and review like '%".$review."%' and message like '%".$message."%' and name='".$name."'";
			
			//var_dump ($sql);
		}else{
			$sql = "select*from contents where review like '%".$review."%' or message like '%".$message."%' or judge =  '".$judge."'";//担当者ver★
			}
		$db =mysqli_connect("localhost" ,"root","","user");
		$result =mysqli_query($db, $sql);
		?>
		<!DOCTYPE html>
		<html>
			<head>
				<meta charset="UTF-8">
			</head>
			<body>
				<?php
				echo'<header><p id="header">daily report</p></header>';
				echo'<div id="main-body">';
				echo'<form action="" method="post">';
				echo'<div class="end">'.$name.'さんがログインしています。</div>';
				echo'<style>';
				echo'</style>';
				echo '<div><input hidden="text" id="id" name="id" value="'.$id.'"></div>';
				echo'<ul class="f-container">';
				echo'<li><div><button formaction="detail.php" class="btn btn--orange-top btn--radius">会員登録の削除・更新</button></div></li>';
				if ($manager_flg ==0) {
					echo'';
					echo'<input type="hidden" name="manager_flg" required="required" value="0">';
					echo '<input hidden="text" id="manager" name="manager" value="'.$manager.'">';
					echo'<li><div><button formaction="register.php" class="btn btn--orange-top btn--radius">日報を登録</button></div></li>';
				} else {
					echo '<input hidden="text" id="id" name="id" value="'.$id.'">';
					echo'<li><div><button formaction="select-student.php" class="btn btn--orange-top btn--radius">管理ユーザーの登録情報</button></div></li>';
					echo '<input hidden="text" id="id" name="id" value="'.$id.'">';
					echo '<input hidden="text" id="email" name="email" value="'.$email.'">';
					echo '<input hidden="text" id="password" name="password" value="'.$password.'">';
					echo '<input type="hidden" name="manager" value="'.$manager.'">';
				}
				echo'<li><div class="f-container"><button formaction="index.php" class="btn btn--orange-top btn--radius">ログアウト</button></div></li>';
				echo'</ul>';
				echo '<div><input hidden="text" id="id" name="id" value="'.$id.'"></div>';
				echo'<form action="before-post.php" method="post">';
				echo '<div><input hidden="text" id="id" name="id" value="'.$id.'"></div>';
				echo'<form action="before-post.php" method="post">';
				echo'</ul>';
				echo'<div id="aaa">';
				echo'<div id="topic1">';
				echo'<p><label for="review">絞り込み検索</label></p>';
				echo'</div>';
				echo'<div id="main">';//青囲い
				echo'<p>日報から探す</p>';
				echo'<div><input type="text" id="review" name="review"></div>';
				echo'<p>担当者のコメントから探す</p>';
				echo'<div><input type="text" id="message" name="message"></div>';
				if ($manager_flg ==0) {
					$judgeList=array("1","2","3","4","5");
					echo'<select name="judge">';
					for($i="0"; $i<count($judgeList);$i++){
						if($data["judge"] == $judgeList[$i]) {
							echo'<option value="'.$judgeList[$i].'"selected>自己評価'.$judgeList[$i].'</option>';
						}else{
							echo'<option value="'.$judgeList[$i].'">自己評価'.$judgeList[$i].'</option>';
						}
					}
					echo'</select>';
				} else {
					$judgeList=array("1","2","3","4","5");
					echo'<select name="judge">';
					echo '<div><option value=""selected>選択する</option></div>';
					for($i="0"; $i<count($judgeList);$i++){
						if($data["judge"] == $judgeList[$i]) {
							echo'<option value="'.$judgeList[$i].'"selected>自己評価'.$judgeList[$i].'</option>';
						}else{
							echo'<option value="'.$judgeList[$i].'">自己評価'.$judgeList[$i].'</option>';
						}
					}
					echo'</select>';
				}
				if ($manager_flg ==0) {
					echo'<div><input type="checkbox" name="checkbox" value="1" checked=checked>自分の投稿を検索</div>';
					echo '<input hidden="text" id="email" name="email" value="'.$email.'">';
					echo '<input hidden="text" id="password" name="password" value="'.$password.'">';
				} else {
					echo'';
				}
				echo '<input hidden="text" id="manager_flg" name="manager_flg" value="'.$manager_flg.'">';
				echo'<div><button formaction="before-post.php">検索</button></div>';
				echo'</form>';
				echo '<div><input type="hidden" id="name" name="name" value="'.$name.'"></div>';
				echo '<div><input hidden="text" id="id" name="id" value="'.$id.'"></div>';
				echo'</div>';
				echo'</div>';
				echo'</div>';
				echo'</div>';
				echo'</div>';
				echo'</div>';
				echo'</div>';
				echo'</div>';
				echo'</div>';
				echo'<div id="sub-body">';
				echo'<div id="aaa">';
				echo'<div id="topic">
				<p>過去の投稿を絞りこんで表示</p>
	</div>';
				echo'<div id="sub_">';//囲い
				echo'<table border="1">
					<tr>
						<th>id</th><th>投稿時間</th><th>名前</th><th>本日の活動</th><th>自己評価</th><th>担当者からのコメント</th><th id="final">詳細</th>
					</tr>';
				while ($data = mysqli_fetch_assoc($result)) {
					echo'<tr>';
					echo'<td>'.$data["textid"].'</td>';
					echo'<td>'.$data["col_timestamp"].';</td>';
					echo'<td>'.$data["name"].'</td>';
					echo'<td>'.$data["review"].'</td>';
					if($data["judge"] == 0) {
							echo'<td>0</td>';
						} else {
							if($data["judge"] == 1) {
								echo'<td>1</td>';
							} else {
								if($data["judge"] == 2) {
									echo'<td>2</td>';
								} else {
									if($data["judge"] == 3) {
										echo'<td>3</td>';
									} else {
										if($data["judge"] == 4) {
											echo'<td>4</td>';
										} else {
											if($data["judge"] == 5) {
												echo'<td>5</td>';
					}}}}}}
					echo'<td>'.$data["message"].'</td>';
					echo '<input hidden="text" id="name" name="email" value="'.$email.'">';
					echo '<input hidden="text" id="name" name="password" value="'.$password.'">';
					echo '<td><a href="action.php? textid='.$data["textid"].'&id='.$id.'&name='.$name.'">詳細はこちら</a></td>';
					echo'</tr>';
				}
				echo'</table>';
				echo'</div>';
				echo'</div>';
				echo'</div>';
				echo'<footer>';
				echo'<p id="footer">Daily report</p>';
				echo'<p id="footer2">お問い合わせ:00-0000-0000<br>受付時間:平日  10時～17時  ※祝日・年末年始除く</p>';
				echo'</footer>';
					?>
				</table>
			</ul>
		</div>
	</div>
</body>
</html>
