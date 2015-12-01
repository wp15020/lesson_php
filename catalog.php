<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<title>かたろぐ</title>
	</head>
	<body>
		<p>product_id : <?php print $_POST['product_id']; ?></p>
		<p>category : <?php print $_POST['category']; ?></p>

		<pre>
<?php var_dump($_POST); ?>
		</pre>
	</body>
</html>
