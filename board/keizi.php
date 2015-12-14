<?php	
	//エラーメッセージの定義
	//エラーがあればなんらかの文字列が入ります
	$error_message = '';

	//スレッドのタイトル
	//とりあえずデフォルトはエラーページのタイトル
	$thread_title = 'そんなページないです・・・。';

	require_once('data/db_info.php');
	$db = mysqli_connect(DB_HOST , DB_USER , DB_PASSWORD , DB_NAME);

	//DBに接続できなかったら・・・
	if( !$db ){
		//エラーメッセージを出力してスクリプト終了
		$error_message = 'なにかのエラーです・・・';
	} else {
		//文字コードセット
		$db->set_charset('utf8');
		
		//$_GET['guru']があるかどうか
		if(array_key_exists('guru', $_GET)){
			//$_GET['guru']番号のスレッドの存在するかどうか
			$guru_select_sql = 'select * from tbj0 where guru = "'.$_GET['guru'].'";';
			$guru_query = mysqli_query($db , $guru_select_sql);
			
			if(mysqli_num_rows($guru_query)){
				//もし$_POST['mess'],$_POST['nama']があればinsert文をSQLに投げる
				if(array_key_exists('mess' , $_POST) && array_key_exists('nama', $_POST)){
						if(empty($_POST['nama'])){
							$_POST['nama'] ='名無しさん';
						}
					
						$insert_sql = 'insert into tbj1 (nama , mess , niti ,  guru , aipi) values("'
						.htmlentities($_POST['nama']).'" , "'
						.htmlentities($_POST['mess']).'" , '
						.' now() , '
						. $_GET['guru'] .' , "'
						. $_SERVER['REMOTE_ADDR'].'"'
						.');';
						$insert_query = mysqli_query($db , $insert_sql);
					}
				//スレッドのデータを取得
				//titleタグにスレッド名をセットする
				$thread = mysqli_fetch_assoc($guru_query);
				$thread_title = $thread['sure'];

				} else {
					//$_GET['guru']番号のスレッドの存在しない場合
					$error_message = 'そんなスレッドないです・・・。';
				}

		} else {
			//$_GET['guru']がない場合
			$error_message = 'URLがヘンです・・・。';
		}
			
	}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php print $thread_title; ?></title>
	<style>
	body {
		
	}
	p {
		border-bottom :solid #666666 1px;
		font-size:150%;
	}
	</style>
</head>
<body>
<a href="keizi_top.php">スレッド一覧にもどる</a>
<?php
	if($error_message){
		die('<p>'.$error_message.'</p>');
	} else {
		//tbj1からスレッドに紐づいたレスを全部引っ張り出す
		$tbj1_select_sql = 'select tbj1.bang , tbj1.nama , tbj1.niti , tbj1.mess from tbj1 where guru = '.$_GET['guru'];

		$tbj1_select_query = mysqli_query($db , $tbj1_select_sql);
		
		if(mysqli_num_rows($tbj1_select_query)){
			echo '<h1>'.$thread_title.'</h1>';
			echo '<div>';
				while($kakikomi = mysqli_fetch_assoc($tbj1_select_query)){
					echo '<p>';
					echo $kakikomi['bang'] .' : '. $kakikomi['nama'] . '<br>';
					echo $kakikomi['niti'] . '<br>';
					echo nl2br($kakikomi['mess']);
					echo '</p>';
				}
			echo '</div>';
		}
		//mysqlとの接続を解除
		mysqli_close($db);
?>
<div>
<form method="post" action="keizi.php<?php print '?guru='.$_GET['guru']; ?>">
	<div>
		<label for="nama">おなまえ</label><br>
		<input id="nama" type="text" name="nama" value="">
	</div>
	<div>
		<label for="mess">コメント</label><br>
		<textarea name="mess" value="" id="mess"></textarea>
	</div>
	<div>
		<input type="submit" name="書き込む！">
	</div>
</form>
<?php
	}
?>
</div>
</body>
</html>