<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<title>フォームサンプル3</title>
	</head>
	<body>
	<form method="post" action="var_dump.php">
		<select name="lunch[]" multiple>
			<option value="pork">BBQ Pork Bun</option>
			<option value="chicken">Chicken Bun</option>
			<option value="lotus">Lotus Seed Bun</option>
			<option value="bean">Bean Paste Bun</option>
			<option value="nest">Bird-Nest Bun</option>
		</select>
		<input type="submit" name="submit">
	</form>
	</body>
</html>