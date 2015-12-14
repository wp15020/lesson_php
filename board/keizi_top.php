<?php
	require_once('data/db_info.php');
	$db = mysqli_connect(DB_HOST , DB_USER , DB_PASSWORD , DB_NAME);
	if( !$db ) {
		die('<p>なにかのエラーです・・・</p>');
	}
	$db->set_charset('utf8');

//フォームからデータを取得していたらSQLの処理を行います
if (isset($_POST['thread_name'])){
	$insert_sql = 'insert into tbj0 (sure , niti , aipi) 
			values("'.$_POST['thread_name'].'" ,  
					now() , 
					"'.$_SERVER['REMOTE_ADDR'].'"
					);';
	$insert_query = mysqli_query(
								$db , //mysqli_connect()実行時の返り値
								$insert_sql //SQL文を書いてください！
								);
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>掲示板</title>
	<style>
	div{
		font-size:150%;
	}
	</style>

</head>

<body>

<?php
$select_sql = 'select guru , sure , niti from tbj0';
$select_query = mysqli_query($db , $select_sql);
	if(mysqli_num_rows($select_query)){
		echo '<div>';
			while($threads = mysqli_fetch_assoc($select_query)){
				echo '<p>';
				echo '<a href="keizi.php?guru='.$threads['guru'].'">'.$threads['guru'].'.&nbsp;'.$threads['sure'] . '</a><br>';
				echo $threads['niti'];
				echo '</p>';
			}
		echo '</div>';
	} else {
		echo '<p>スレッドがないです・・・。</p>';
	}
	//mysqlとの接続を解除
	mysqli_close($db);
?>
	
	<form action="keizi_top.php" method="post">
		<input type="text" name="thread_name" value="">
		<input type="submit" name="作成する">
	</form>
</body>

</html>