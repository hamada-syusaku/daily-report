<?php
$id = ["id"];
$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$manager = $_POST["manager"];
$db = mysqli_connect("localhost","root", "","user");
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
			echo'<div id="sub-body">';
				echo'<div id="aaa">';
				echo'<form action="" method="post">';
		echo'<div id="topic">';
			echo'<p>日報を追加しましょう！</p>';
		echo '</div>';
		echo'<div id="sub_">';
					echo '<form action="check.php" method="post">';
					echo '<div><input type="hidden" name="manager" value="'.$manager.'"></div>';
					echo '<div><label for="name" >名前</label></div>';
					echo '<div><input type="text" disabled id="name" name="name" value="'.$name.'" readonly></div>';
					echo'<div><label for="review">本日の活動（よかったところ・改善点）</label></div>';
					echo'<div><textarea name="review" rows="10" cols="50" maxlength="100"></textarea></div>';
					echo'<div><label for="judge">自己評価(1~5)</label></div>';
					echo'<div><select name="judge"></div>';
					echo'<div><option value="1">1</option></div>';
					echo'<div><option value="2">2</option></div>';
					echo'<div><option value="3">3</option></div>';
					echo'<div><option value="4">4</option></div>';
					echo'<div><option value="5">5</option></div>';
					echo'</select>';
					echo'<div><label for="message">担当者からのコメント</label></div>';//ここ
					echo'<div><textarea disabled name="message" rows="10" cols="50" maxlength="100" readonly></textarea></div>';
					//echo'<div><button formaction="check.php">日報を登録する</button></div>';
		//echo'<div id="aaa">';//senter
		echo'<div><input type="submit" formaction="check.php" class="btn2 btn2-top btn2--radius" value="登録"></div>';
					//元　
					//echo'<form action="index.php" method="post">';
					//元　echo'<input type="submit" value="戻る">';
					echo'<input type="hidden" name="name" value="'.$name.'">';
					echo'<input type="hidden" name="email" value="'.$email.'">';
					echo'<input type="hidden" name="password" value="'.$password.'">';
					//echo'<div><button formaction="uplode.php">戻る</button></div>';
		echo'<div><input type="submit" formaction="uplode.php" class="btn2 btn2-top btn2--radius" value="戻る"></div>';
					//var_dump ($email);
					//var_dump ($password);
					echo'</ul>';
		//echo'</div>';
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
