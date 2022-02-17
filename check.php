<!DOCTYPE htmel>
<html>
	<head>
		<meta charset="utf-8">
		<link href="../css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<?php
		$name=$_POST['name']; //前の画面から入力値を受け取りtaff_nameに格納
		$judge=$_POST['judge']; //前の画面から入力値を受け取り、$staff_passに格納
		$review=$_POST['review']; //前の画面から入力値を受け取り、$staff_pass2に格納
		$email=$_POST['email']; //前の画面から入力値を受け取り、$staff_pass2に格納
		$password = $_POST["password"];
		$manager = $_POST['manager'];
		echo'<header><p id="header">daily report</p></header>
		<div class="end">'.$name.'さんがログインしています。</div>
		<div id="sub-body">';//背景
		echo'<div id="aaa">';
		echo'<div id="topic">';
		echo'<p>登録内容の確認</p>';
		echo'</div>';
		echo'<div id="sub_">';
		echo 'スタッフ名：';
		echo $name;
		echo '<br />';
		echo '本日の活動：';
		echo $review;
		echo '<br />';
		echo '自己評価：';
		echo $judge;
		echo '<form method="post" action="input.php">';
		echo '<input type="hidden" name="email" value="'.$email.'">';
		echo '<input type="hidden" name="password" value="'.$password.'">';
		echo '<input type="hidden" name="name" value="'.$name.'">'; //'<input type="hidden" name="name" value="'と$staff_nameをドットで連結
		echo '<input type="hidden" name="review" value="'.$review.'">'; //hiddenにすることで画面に表示することなく次の画面に値を引き渡せる
		echo '<input type="hidden" name="judge" value="'.$judge.'">'; 
		echo '<input type="hidden" name="email" value="'.$email.'">'; //hiddenにすることで画面に表示することなく次の画面に値を引き渡せる
		echo '<input type="hidden" name="password" value="'.$password.'">'; 
		echo '<input type="hidden" name="manager" value="'.$manager.'">'; 
		echo '<br/>';
		echo'<div><input type="submit" formaction="input.php" class="btn2 btn2-top btn2--radius" value="OK"></div>';
		echo '</form>';
		echo '<form method="post" action="register.php">';
		echo '<input type="hidden" name="name" value="'.$name.'">'; 
		echo '<input type="hidden" name="email" value="'.$email.'">';
		echo '<input type="hidden" name="password" value="'.$password.'">';
		echo '<input type="hidden" name="manager" value="'.$manager.'">';
		echo'<div><input type="submit" formaction="register.php" class="btn2 btn2-top btn2--radius" value="戻る"></div>';
		echo'</div>';
		echo'</div>';
		echo'</div>';
		echo'<footer>';
		echo'<p id="footer">daily report</p>';
		echo'<p id="footer2">お問い合わせ:00-0000-0000<br>受付時間:平日  10時～17時  ※祝日・年末年始除く</p>';
		echo'</footer>';
		echo'</body>';
		echo'</html>';
		?>
	</body>
</html>
