<?php 
	page_header('gray' , 'p'); 
?>

<p>関数</p>

<p>
<?php 
	print "abc\n";
	print "def\n";
	print "ghi";
?>
</p>

<?php 
	page_footer(); 
?>

<?php

	function page_header($tag , $title = '関数' , $color = 'pink'){
		print '<!DOCTYPE html>';
		print '<html>';
			print '<head>';
				print '<meta charset="utf-8">';
				print '<title>関数</title>';
				print '<style>';
					print $tag.'{background:'.$color.'}';
				print '</style>';
			print '</head>';
		print '<body>';
	}
?>

<?php
	function page_footer(){
		print '</body>';
		print '</html>';
	}
?>
<hr>
<?php
/*
	function countdown($counter) {
		while ($counter > 0){
			print $counter.'...';
			$counter--;
		}
		print 'boom!<br>';
	}
	$counter = 5;
	countdown($counter);
	//print '<p>Now , counter is '.$counter.'<p>';
	
?>
<hr>
<?php
	$number_to_display = number_format(1000000000000);
?>
<p><?php //print $number_to_display; ?></p>
<hr>
<?php
	function restaurant_check($meal , $tax , $tip) {
		$tax_amount = $meal * ($tax / 100);
		$tip_amount = $meal * ($tip / 100);
		$total_notip = $meal + $tax_amount;
		$total_tip = $total_notip + $tip_amount;
			/*return array('notip' => $total_notip , 
						'tip' => $total_tip);
			return $total_tip;
	}
	//$check = restaurant_check(500 , 8 , 5);
	//print '<p>税込みの金額は'.$check['notip'].'円です。</p>';
	//print '<p>税込み・チップ込みの金額は'.$check['tip'].'円です。</p>';
	if(restaurant_check(500,8,5) > 5000){
		//print '<h1>高すぎる！</h1>';
	} else {
		//print '<h1>ごちそうさまでした</h1>';
	}
?>
<hr>

<?php
	
/*
	function vegetarian_dinner(){
		print 'Dinner is '.$dinner.', or ';
		$dinner = 'Sauteed Pea Shoots';
		print $dinner.'<br>';
	}
	function kosher_dinner(){
		print 'Dinner is '.$dinner.', or ';
		$dinner = 'Kung Pao Chicken';
		print $dinner.'<br>';
	}
	print 'Vegetarian ';
	print vegetarian_dinner();
	print 'Kosher ';
	print kosher_dinner();
	print 'Regular dinner is '.$dinner;

	function macrobiotic_dinner() {
		$dinner = 'some Vegetables';
		print 'Dinner is '.$dinner;

		print ' but I\'d rather have ';
		print $GLOBALS['dinner'].'<br>';
	}

	macrobiotic_dinner();
	print 'Regular dinner is : '.$dinner;

	function hungry_dinner() {
		$GLOBALS['dinner'] .= ' and Deep-Fried Taro';
	}

	print 'Regular dinner is '.$dinner.'<br>';
	hungry_dinner();
	print 'Hungry dinner is '.$dinner;
	
	$dinner = 'Curry Cuttlefish';
	function vegetarian_dinner2() {
		global $dinner;
		print 'Dinner was '.$dinner.' , but now it\'s ';
		$dinner = 'Sauteed pea shoots';
		print $dinner .'<br>';
	}

	print 'Regular Dinner is' . $dinner. '<br>';
	vegetarian_dinner2();
	print 'Regular dinner is '. $dinner;
	*/
?>
