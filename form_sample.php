<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<title>フォームサンプル</title>
	</head>
	<body>
<?php
		if( array_key_exists('my_name' , $_GET) ) {
			print 'Hello, '.$_GET['my_name'];
		} else {
?>
<form method="get" 
		action="<?php print $_SERVER['SCRIPT_NAME']; ?>">
your name: <input type="text" name="my_name">
<br>
<input type="submit" value="Say Hello">
</form>
<?php
		}
?>




	</body>
</html>