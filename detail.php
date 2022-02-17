<?php
$manager_flg = $_POST["manager_flg"];
$id = $_POST["id"];
$name= $_POST["name"];
$db = mysqli_connect("localhost","root","","user");
$sql = "select*from userdata where id='".$id."'";
$result = mysqli_query($db, $sql);
$data = mysqli_fetch_assoc($result);
mysqli_close($db);
?>

<!DOCTYPE html
<html>
<head>
	<meta charset="UTF-8">
	<link href="../css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<header><p id="header">Daily report</p></header>
	<div id="aaa">
			<?php
			echo'<div class="end">'.$name.'さんがログインしています。</div>';
			echo'<div id="sub-body">';
			$manager_flg = $_POST["manager_flg"];
			$student = "";
			$db = mysqli_connect("localhost","root","","user");
			$sql = "select*from userdata where manager_flg =0;";
			$result = mysqli_query($db, $sql);
			mysqli_close($db);
			?>
			
			<?php
			echo '<form action="" method="post">';
			echo'<h1 id="main-title">更新、または削除</h1>';
			echo'<div id="topic">';
				echo'<p>ユーザー機能の変更</p>';
			echo'</div>';
			echo'<div id="sub_">';
				if ($manager_flg ==1) {
					echo'<h5>担当者 → 一般ユーザーに切り替わります。</h5>';
					echo'<p>・担当しているユーザーは削除されます<br>・担当しているユーザーへのコメント機能ができなくなります</p>';
					echo'<input type="hidden" name="id" value="'.$id.'">';
					echo'<input type="hidden" name="name" value="'.$data["name"].'">';
					echo'<input type="hidden" name="email" value="'.$data["email"].'">';
					echo'<input type="hidden" name="password" value="'.$data["password"].'">';
					echo'<input type="hidden" name="manager_flg" value="'.$data["manager_flg"].'">';
					echo'<div><input type="submit" formaction="delete-manager.php" class="btn2 btn2-top btn2--radius" value="変更"><div>';
					} else {
					echo'';
					echo'<input type="hidden" name="student" value="'.$student.'">';
					echo'<input type="hidden" name="student" value="'.$student.'">';
					echo'<input type="hidden" name="manager_flg" required="required" value="0">';
					echo'<h5>一般ユーザー → 担当ユーザーに切り替わります。</h5>';
					echo'<p>・一般ユーザーを担当し、日報を確認したり、コメントできる機能が追加されます。</p>';
					echo'<input type="hidden" name="id" value="'.$id.'">';
					echo'<input type="hidden" name="name" value="'.$data["name"].'">';
					echo'<input type="hidden" name="email" value="'.$data["email"].'">';
					echo'<input type="hidden" name="password" value="'.$data["password"].'">';
					echo'<div><input type="submit" formaction="update-manager.php" class="btn2 btn2-top btn2--radius" value="変更"><div>';
					}
					echo'</form>';
				echo'</div>';
				echo'</div>';
				echo'</div>';
				?>
				
				<?php
				echo'<div id="topic">';
				echo'<p>登録情報の変更・削除</p>';
				echo'</div>';
				echo'<div id="sub_">';
				echo '<form action="" method="post">';
				echo'<input type="hidden" name="id" value="'.$id.'">';
				echo '<div><label for="Email" >Email</label></div>';
				echo '<div><input type="text" id="email" name="email" value="'.$data["email"].'"></div>';
				echo '<div><label for="password" >Password</label></div>';
				echo '<div><input type="text" id="password" name="password" value="'.$data["password"].'"></div>';
				echo '<div><label for="name" >名前</label><div>';
				echo '<div><input type="text" id="name" name="name" value="'.$data["name"].'"><div>';
				echo '<div><label for="gender">性別</label><div>';
				if ($data["gender"] ==0) {
					echo'<input type="radio" name="gender" value="0" checked=checked>男';
					echo'<input type="radio" name="gender" value="1">女';
				} else {
					echo'<input type="radio" name="gender" value="0">男';
					echo'<input type="radio" name="gender" value="1" checked=checked>女';
				}
					echo'<div><label for="blood">血液型</label></div>';
					$bloodList = array("A","B","O","AB");
					echo '<select name="blood">';
					for ($i=0; $i<count($bloodList); $i++) {
						if($data["blood"] == $bloodList[$i]) {
							echo '<option value="'.$bloodList[$i].'"selected>'.$bloodList[$i].'型</option>';
						} else {
							echo '<option value="'.$bloodList[$i].'">'.$bloodList[$i].'型</option>';
						}
					}
					echo'</select>';
					echo'<div><label for="old">年齢</label></div>';
					echo'<div><input type="text" id="old" name="old" value="'.$data["old"].'"></div>';
					echo'<div><label for="memo">備考(任意)</label></div>';
					echo'<textarea name="memo" rows="4" cols="20" maxlength="100" >'.$data["memo"].'</textarea>';
					?>
					
					<?php
					$manager_flg = $_POST["manager_flg"];
					$student = "";
					$db = mysqli_connect("localhost","root","","user");
					$sql = "select*from userdata where manager_flg =0 and manager is null";
					$result = mysqli_query($db, $sql);
					mysqli_close($db);
					?>
					
					<?php
					echo'<input type="hidden" name="id" value="'.$id.'">';
					echo'<input type="hidden" name="manager_flg" value="'.$manager_flg.'">';
					echo'<div><input type="submit" formaction="update.php" class="btn2 btn2-top btn2--radius" value="更新"><div>';
					echo'<input type="hidden" name="id" value="'.$id.'">';
					echo'<div><button formaction="delete.php" class="btn2 btn2-top btn2--radius">削除</button><div>';
					echo'</form>';
					echo'<input type="hidden" name="id" value="'.$id.'">';
					echo'<div><button formaction="uplode.php" class="btn2 btn2-top btn2--radius">戻る</button></div>';
					echo'</ul>';
					echo'</div>';
					echo'</div>';
					echo'</div>';
					echo'</div>';
					echo'</div>';
					echo'</div>';
					echo'</div>';
					echo'</div>';
					echo'</div>';
					echo'</div>';
					echo'</div>';
					echo'</div>';
					echo'</div>';
					echo'<footer>';
					echo'<p id="footer">Daily report</p>';
					echo'<p id="footer2">お問い合わせ:00-0000-0000<br>受付時間:平日  10時～17時  ※祝日・年末年始除く</p>';
					echo'</footer>';
					echo'</body>';
					echo'</html>';
					?>
			</body>
	</html>
