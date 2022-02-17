<?php
$id = $_GET["id"];
$db = mysqli_connect("localhost","root", "","user");
$sql = "select*from userdata where id=".$id;
$result = mysqli_query($db, $sql);
mysqli_close($db);
?>

<?php
while ($data = mysqli_fetch_assoc($result)) {
	$id = $data["id"];
	$email = $data["email"];
	$name = $data["name"];
	$password = $data["password"];
	$student = $data["student"];
	$student2 = $data["student2"];
	$student3 = $data["student3"];
	$student4 = $data["student4"];
	$student5 = $data["student5"];
	$manager_flg = $data["manager_flg"];
	$sql = "select*from userdata where manager_flg =0 and manager is null";//プルダウンに表記するsql文
	$db = mysqli_connect("localhost", "root", "", "user");
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
	<div id="main">
		<div id="aaa">
			<ul id="nav">
					<?php
					echo'<form action="addition-more.php" method="POST">';
					echo'<div><label for="students">あなたが担当するユーザーを<br>選択してください</label></div>';
					echo'<select name="students">';
					echo '<option value=""selected>選択してください</option>';
					foreach ($result as $value) { ?>
						<option value="<?php echo htmlspecialchars($value["name"], ENT_QUOTES, "UTF-8"); ?>">
						<?php echo htmlspecialchars($value["name"], ENT_QUOTES, "UTF-8"); ?>
						</option>
						<?php 
					}
					echo'</select>';
					echo'<input type="hidden" name="id" value="'.$id.'">';
					echo'<input type="hidden" name="id" value="'.$id.'">';
					echo'<input type="hidden" name="email" value="'.$email.'">';
					echo'<input type="hidden" name="password" value="'.$password.'">';
					echo'<input type="hidden" name="name" value="'.$name.'">';
					echo'<input type="hidden" name="manager_flg" value="'.$manager_flg.'">';
					echo'<div><input type="submit" value="登録"></div>';
					echo'<input type="hidden" name="student" value="'.$student.'">';
					echo'<input type="hidden" name="student2" value="'.$student2.'">';
					echo'<input type="hidden" name="student3" value="'.$student3.'">';
					echo'<input type="hidden" name="student4" value="'.$student4.'">';
					echo'<input type="hidden" name="student5" value="'.$student5.'">';
					echo'<input type="hidden" name="j_flg" value="1">';
					echo'<div><button formaction="judge-student.php">戻る</button><div>';
					echo'</form>';
					}
					?>
				</ul>
			</div>
		</div>
	</table>
</body>
</html>
