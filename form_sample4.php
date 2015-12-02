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
			$form_errors = validate_form();
			if ( $form_errors ) {
				show_form($form_errors);
			} else {
				process_form();
			}
			//追記
			
		} else {
			show_form();
		}

function process_form() {
	print '<p>Hello, '.$_POST['my_name'].'</p>';
	print '<p>Hello, '.strip_tags($_POST['my_name']).'</p>';
	print '<p>Hello, '.htmlentities($_POST['my_name'] , ENT_QUOTES , 'utf-8').'</p>';
}

function show_form($errors = '') {
	if( $errors ) {
		print 'Please connect these errors : <ul><li>';
		print implode('</li><li>' , $errors);
		print '</li></ul>';
	}
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
	$errors = array();
	if(strlen($_POST['my_name']) < 3) {
		$errors[] = 'Your name must be at least 3 letters long';
	}
	return $errors;
}
?>
	</body>
</html>