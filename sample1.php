<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<title>配列</title>
	</head>
	<body>
		
<?php
$meals = array('breakfast' => array('Walnut Bun' , 'Coffee') ,
				'lunch' => array('Chicken with Cashew Nuts' , 'White Mashrooms') ,
				'snack' => array('Dried Mulberris' , 'Salted Sesame Crab')
			);
$lunches = array(array('Chicken' , 'Eggplant' , 'Rice'),
				array('Beef' , 'Scallions' , 'Noodles'),
				array('Eggplant' , 'Tofu')
				);

$flavors = array('Japanese' => array('hot' => 'wasabi' ,
									'salty' => 'soy sauce'),
				'Chinese' => array('hot' => 'mustard',
								'pepper-salty' => 'prickly ash')
				);
?>
	<ul>
	<?php 
		foreach($flavors as $key => $val)array(
			foreach($val as $key2 => $val2)array(
				print '<li>'.$val2 .'</li>';
			)
		)
	?>
	</ul>




	</body>
</html>