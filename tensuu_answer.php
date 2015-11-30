<?php
$students = array(
				array("name"=>"穂波たまえ","id"=>"1"),
				array("name"=>"花輪和彦","id"=>"2"),
				array("name"=>"丸尾末男","id"=>"3"),
				array("name"=>"野口笑子","id"=>"4"),
				array("name"=>"土橋とし子","id"=>"5"),
				array("name"=>"浜崎のりたか","id"=>"6"),
				array("name"=>"富田太郎","id"=>"7"),
				array("name"=>"永沢君男","id"=>"8"),
				array("name"=>"藤木茂","id"=>"9"),
				array("name"=>"富田太郎","id"=>"10"),
				array("name"=>"山根つよし","id"=>"11"),
				array("name"=>"小杉太","id"=>"12"),
				array("name"=>"山田笑太","id"=>"13"),
				array("name"=>"城ケ崎姫子","id"=>"14"),
				array("name"=>"笹山かず子","id"=>"15"),		
				array("name"=>"みぎわ花子","id"=>"16"),
				array("name"=>"さくらももこ","id"=>"17")
			);

$scores = array( "1" => array("kokugo"=> 72 , "rika"=> 70 , "sansu"=> 87 , "shakai"=> 93),
			"2" => array("kokugo"=> 79 ,"rika"=> 82 ,"sansu"=> 87 ,"shakai"=> 69),
			"3" => array("kokugo"=> 81 , "rika"=> 94 , "sansu"=> 96 ,"shakai"=> 95),
			"4" => array("kokugo"=> 73 , "rika"=> 90 , "sansu"=> 89 , "shakai"=> 72),
			"5" => array("kokugo"=> 75 , "rika"=> 62 , "sansu"=> 79 ,"shakai"=> 68),
			"6" => array("kokugo"=> 31 , "rika"=> 55 , "sansu"=> 3 , "shakai"=> 83),
			"7" => array("kokugo"=> 36 , "rika"=> 59 , "sansu"=> 92 , "shakai"=> 64),
			"8" => array("kokugo"=> 77 , "rika"=> 68 , "sansu"=> 29 , "shakai"=> 66),
			"9" => array("kokugo"=> 95 , "rika"=> 14 , "sansu"=> 6 , "shakai"=> 70),
			"10" => array("kokugo"=> 80 , "rika"=> 77 , "sansu"=> 7 , "shakai"=> 67),
			"11" => array("kokugo"=> 57 , "rika"=> 82 , "sansu"=> 96 , "shakai"=> 62),
			"12" => array("kokugo"=> 8 , "rika"=> 64 , "sansu"=> 46 , "shakai"=> 46),
			"13" => array("kokugo"=> 17 , "rika"=> 27 , "sansu"=> 50 , "shakai"=> 43),
			"14" => array("kokugo"=> 66 , "rika"=> 58 , "sansu"=> 48 , "shakai"=> 86),
			"15" => array("kokugo"=> 52 , "rika"=> 86 , "sansu"=> 93 , "shakai"=> 71),
			"16" => array("kokugo"=> 0 , "rika"=> 74 , "sansu"=> 17 , "shakai"=> 53),
			"17" => array("kokugo"=> 44 , "rika"=> 36 , "sansu"=> 64 ,"shakai"=> 2)
			);
?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<title>3年4組のテストの結果</title>
		<style>
			table{
				width:80%;
				margin:10px auto;
				border-top:solid #efefef 1px;
				border-bottom:solid #efefef 1px;
			}
			h1{
				text-align:center;
				font-size:1em;
				color:#444444;
			}
			th , td{
				vertical-align:middle;
				color:#555555;
				padding:3px 0;
				text-align:center;
			}
			th{
				background-color:#ffffc6;
			}
			tr:nth-child(even){
				background:#eff7ff;
				border-bottom:solid #dddddd 5px;
			}

		</style>
	</head>
	<body>
		
		<h1>3年4組のテスト結果</h1>
		<table cellspacing="0">
			<tr>
				<th>出席番号</th>
				<th>氏名</th>
				<th>国語</th>
				<th>算数</th>
				<th>理科</th>
				<th>社会</th>
				<th>合計</th>
				<th>平均点</th>
			</tr>
<?php
	foreach($students as $s_value){
		/*
			$kokugo = $scores[$s_value['id']]['kokugo'];
			$sansu = $scores[$s_value['id']]['sansu'];
			$rika = $scores[$s_value['id']]['rika'];
			$shakai = $scores[$s_value['id']]['shakai'];
			$goukei = $kokugo + $sansu + $rika + $shakai;
		*/
			$goukei = '';
			foreach($scores[$s_value['id']] as $tensu){
				$goukei += $tensu;
			}
		
			
			print '<tr>';
				print '<td>'.$s_value['id'].'</td>';
				print '<td>'.$s_value['name'].'</td>';
				print '<td>'.$scores[$s_value['id']]['kokugo'];.'</td>';
				print '<td>'.$scores[$s_value['id']]['sansu'];.'</td>';
				print '<td>'.$scores[$s_value['id']]['rika'];.'</td>';
				print '<td>'.$scores[$s_value['id']]['shakai'];.'</td>';
				print '<td>'.$goukei.'</td>';
				print '<td>'.($goukei/4).'</td>';
			print '</tr>';
	}
			?>
		</table>
	</body>
</html>