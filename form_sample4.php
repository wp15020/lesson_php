<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<title>フォームサンプル4</title>
	</head>
	<body>
<?php

		if ( array_key_exists('_submit_check' , $_POST) ) {

			//追記
			if ( validate_form() ) {
				process_form();
			} else {
				show_form();
			}
			//追記
			
		} else {
			show_form();
		}

function process_form() {
	print 'Hello, '.$_POST['my_name'];
}

function show_form() {
print <<<_HTML_
<form method="post" 
		action="{$_SERVER['SCRIPT_NAME']}">
your name: <input type="text" name="my_name">
<br>
<input type="submit" value="Say Hello">

<input type="hidden" name="_submit_check" value="1">

</form>
_HTML_;
}

function validate_form() {
	//my_nameの長さは3文字以上あるか
	if(mb_strlen($_POST['my_name']) < 3) {
		if(array_key_exists('_submit_check' , $_POST)){
			print '<p>3文字以上記入してください</p>';
		}
		return false;
	} else {
		return true;
	}
}
?>
	</body>
</html>