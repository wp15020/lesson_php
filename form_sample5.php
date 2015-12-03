<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<title>フォームサンプル5</title>
	</head>
	<body>
<?php
	//まずこのページに来た時にフォームボタンを押下してからきたのか
	//直接来たのかを判定する
	//$_POST['_submit_check']があれば（if文がtrueなら)
	//ボタンの押下があったということになる
	if ( array_key_exists('_submit_check' , $_POST) ){
		//ボタンの押下があれば、$_POSTで取得したデータを初期値$defaultsとして
		//各フォームに設定する
		$defaults = $_POST;
	} else {
		//ボタンの押下がなければ$_POSTの中身がないので、
		//初期値$defaultsを定義しておく
		$defaults = array(
			'my_name' => '' ,
			'comments' => '' ,
			'sweet' => 'cake' ,
			'main_dish' => array('taro' , 'tripe') ,
			'delivery' => 'yes' ,
			'size' => 'medium' ,
		);
	}
?>
<form method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
	<p>
		<input type="text" name="my_name" value="<?php echo htmlentities($defaults['my_name']); ?>">
	</p>
	<p>
		<textarea name="comments">
			<?php echo htmlentities($defaults['comments']); ?>
		</textarea>
	</p>
<?php
//select内要素option要素を定義するため配列を作っておく
$sweets = array('puff' => 'Sesame Seed Puff' ,
				'square' => 'coconut Milk Glatin Square' ,
				'cake' => 'Brown Sugar Cake' ,
				'ricemeat' => 'Sweet Rice and Meat');
?>
	<p>
		<select name="sweet">
<?php
//$valはoption値で$choiceが表示される
foreach($sweets as $option => $label) {
	//optionタグのバリュー要素が$sweets配列のキーになる
	echo '<option value="' .$option.'"';
	//キーの文字列が$defaults['sweet']と一致したら
	//selected属性を追記する
	if($option == $defaults['sweet']){
		echo ' selected="selected"';
	}
	//option開始タグを>で終了し配列の値を出力しoptionタグを閉じる
	echo "> $label</option>\n";
}
?>
		</select>
	</p>
<?php
//multiple(複数選択ができるselect要素)の場合も
//まずはselct要素内のoption要素の中身を配列で定義
$main_dishes = array('cuke' => 'Baised Sea Cucumber' ,
				'stomach' => 'Sauteed Pig\'s Stomach',
				'tripe' => 'Sauteed Tripe with Wine Sauce' ,
				'taro' => 'Stewed Pork with Taro' ,
				'giblets' =>'Baked Giblets with Salt',
				'abalone' => 'Abalone with Marrow and Duck Feet');
?>
	<p>
		<select name="main_dish[]" multiple="multiple">
<?php
//まずはフラグ用の配列を定義
$selected_option = array();
//$defaults['main_dish']の中身（2次元配列）をチェックし、
//初期値を$selected_optionのキーにしてtrueを代入しておく
foreach ($defaults['main_dish'] as $option){
	$selected_options[$option] = true;
}
//optionタグを出力
foreach($main_dishes as $option => $label) {
	//optionタグのvalue要素が$main_dishes配列のキーになる
	echo '<option value="' . htmlentities($option).'"';
	//もし$selected_options配列に$option（$main_dishes配列のキー)が存在したら
	//まずはselct要素内のoption要素の中身を配列で定義
	if(array_key_exists($option, $selected_options)) {
		echo ' selected="selected"';
	}
	//option開始タグを>で終了し配列の値を出力しoptionタグを閉じる
	echo '>' .htmlentities($label).'</option>';
	echo "\n";
}
?>
		</select>
	</p>

	<p>
<?php
echo '<input type="checkbox" name="delivery" value="yes"';
//もし$defaults['delivery']がそんざいしたらchecked属性を挿入
//（注）：チェックを外してサブミットしたら$_POSTに'delivery'配列は定義されない
if(array_key_exists('delivery', $defaults)) { 
	echo' checked="checked"';
}
echo '> Delivery?';
?>
	</p>
	<p>
<?php
//ラジオボタンはまとめてp要素でラップ

//$defaults['size']はsmallかmediumかlargeいずれかの値が代入されるから
//それに応じたラジオボタンを初期値とする
echo '<input type="radio" name="size" value="small"';
if($defaults['size'] == 'small') { echo ' checked="checked"';}
echo '> Small';

echo '<input type="radio" name="size" value="medium"';
if($defaults['size'] == 'medium') { echo ' checked="checked"';}
echo '> Medium';

echo '<input type="radio" name="size" value="large"';
if($defaults['size'] == 'large') { echo ' checked="checked"';}
echo '> Large';
?>
	</p>

	<p>
	<?php
		//hiddenのnameでサブミットボタンが押されたかどうかを判定できる
	?>
		<input type="hidden" name="_submit_check" value="1">
		<input type="submit" value="submit">
	</p>
	</form>
	</body>
</html>