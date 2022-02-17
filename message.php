<?php
$email = $_GET["email"];
$password = $_GET["password"];
$sflug= $_GET["sflug"];//$sflug
$id = $_GET["id"];
$textid = $_GET["textid"];
$username = $_GET["username"];
//$name = $_GET["name"];
$db = mysqli_connect("localhost","root", "","user");
$sql = "select*from contents where textid=".$textid;
$result = mysqli_query($db, $sql);
//$name = $data["name"];
mysqli_close($db);
//var_dump($sql);
//var_dump($id);
?>

<!DOCTYPE html>
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
				echo'<div class="end">'.$username.'さんがログインしています。</div>';
				echo'<div id="sub-body">';
				echo'<form action="addition.php" method="post">';//追加ー変更する
				echo'<h1 id="main-title">コメントを追加</h1>';
				echo'<div id="topic">';
				echo'<p>日報</p>';
				echo'</div>';
				echo'<div id="sub_">';
					echo'<div><label for="name">名前</label></div>';
					echo '<div><input type="text" disabled id="name" name="name" value="'.$data["name"].'" readonly></div>';//既存データの出力 readonly
					echo'<div><label for="review">本日の活動（よかったところ・改善点）</label>';
					echo'<div><textarea disabled name="review" rows="10" cols="50" maxlength="100" readonly>'.$data ["review"].' </textarea></div>';
					echo'</div>';
				echo'<div><label for="judge">自己評価</label></div>';
					$judgeList = array("1","2","3","4","5");
					echo '<select disabled name="judge">';//
					for ($i=0; $i<count($judgeList); $i++) {
						if($data["judge"] == $judgeList[$i]) {
							echo '<option value="'.$judgeList[$i].'"selected>'.$judgeList[$i].'点</option>';
						} else {
							echo '<option value="'.$judgeList[$i].'">'.$judgeList[$i].'点</option>';
						}
					}
					echo'<input type="hidden" name="id" value="'.$textid.'">';
					echo'</div>';
					echo'<div id="topic">';
					echo'<p>コメントを追加</p>';
					echo'</div>';
				echo'<div id="sub_">';
				echo'<div><textarea name="message" rows="10" cols="50" maxlength="100">'.$data["message"].'</textarea></div>';
				echo'<div><input type="hidden" name="textid" value="'.$textid.'"></div>';
				echo'<div><input type="hidden" name="id" value="'.$id.'"></div>';//!　追加
				echo'<div><input type="hidden" name="username" value='.$username.'></div>';//!　追加
				echo'<div><button formaction="addition-student.php" class="btn2 btn2-top btn2--radius">追加</button></div>';
				echo'</form>';
				if($sflug == 0) {
					echo '<a href="pickup.php? id='.$id.'& name='.$data["name"].' & username='.$username.'">戻る</a>';//ここから！
				}else{
					echo'<input type="hidden" name="email" value="'.$email.'">';
					echo'<input type="hidden" name="password" value="'.$password.'">';
					echo'<div><button formaction="uplode.php" class="btn2 btn2-top btn2--radius">戻る</button></div>';
					echo'</div>';
					echo'</div>';
				}
				}
				?>
			</ul>
		</div>
	</div>
	</table>
<footer>
	<p id="footer">daily report</p>
	<p id="footer2">お問い合わせ:00-0000-0000<br>受付時間:平日  10時～17時  ※祝日・年末年始除く</p>
</footer>
	</body>
</html>
