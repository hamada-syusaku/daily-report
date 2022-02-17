<?php
$textid = $_GET["textid"];
$db = mysqli_connect("localhost","root", "","user");
$sql = "select*from contents where textid=".$textid;
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
	<header><p id="header">daily report</p></header>
	<div id="aaa">
		<?php
		while ($data = mysqli_fetch_assoc($result)) {
			echo'<div class="end">'.$data["name"].'さんがログインしています。</div>';
			echo'<div id="sub-body">';//背景
			echo'<div id="topic">';
			echo'<p>内容の確認、変更</p>';
			echo'</div>';
			echo'<div id="sub_">';
			echo'<form action="" method="post">';
			echo'<p>名前</p>';
			echo '<div><input type="text" disabled id="name" name="name" value="'.$data["name"].'"readonly></div>';//⭐️
			echo'<div><label for="review">本日の活動（よかったところ・改善点)</label>';
			echo'<div><textarea name="review" rows="10" cols="50" maxlength="100">'.$data["review"].'</textarea></div>';
			echo'<div><label for="judge">自己評価</label></div>';
			$judgeList = array("1","2","3","4","5");
			echo '<select name="judge">';
			for ($i=0; $i<count($judgeList); $i++) {
				if($data["judge"] == $judgeList[$i]) {
					echo '<option value="'.$judgeList[$i].'"selected>'.$judgeList[$i].'点</option>';
				} else {
					echo '<option value="'.$judgeList[$i].'">'.$judgeList[$i].'点</option>';
				}
			}
			echo'</select>';
			echo'<div><input type="submit" formaction="addition.php" class="btn2 btn2-top btn2--radius" value="変更"></div>';
			echo'<input type="hidden" name="textid" value="'.$textid.'">';
			echo'<div><input type="submit" formaction="delete-text.php" class="btn2 btn2-top btn2--radius" value="削除"></div>';
			echo'<div><input type="submit" formaction="uplode.php" class="btn2 btn2-top btn2--radius" value="戻る"></div>';
			echo'</div>';
			echo'</div>';
			echo'<div id="topic">';
			echo'<p>担当ユーザーからのコメント</p>';
			echo'</div>';
			echo'<div id="sub_">';
			echo'<div><textarea disabled name="message" rows="10" cols="50" maxlength="100" readonly>'.$data["message"].'</textarea></div>';
			echo'</div>';
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
				echo'<input type="hidden" name="textid" value="'.$textid.'">';//追加
				echo'<input type="hidden" name="name" value="'.$data["name"].'">';
				echo'<input type="hidden" name="email" value="'.$data["email"].'">';
				echo'<input type="hidden" name="password" value="'.$data["password"].'">';
			}
		}
		echo'</ul>';
		echo'</table>';
		echo'</div>';
		echo'</div>';
		echo'</div>';
		echo'</div>';
		echo'</div>';
		echo'</div>';
		echo'</div>';
		echo'</div>';
		echo'<footer><p id="footer">daily report</p></footer>';
		echo'</body>
	</html>';
?>
