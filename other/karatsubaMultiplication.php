<?php
$x = array(1,2,3,4);
$y = array(5,6,7,8);
 
function karatsuba($x, $y) 
{
	$len_x = count($x);
	$len_y = count($y);
 
	// bottom of the recursion
	if ($len_x == 1 && $len_y == 1) {
		return $x[0] * $y[0];
	} 
	if ($len_x == 1 || $len_y == 1) {
		$t1 = implode('', $x);
		$t2 = implode('', $y);
		return (int)$t1 * $t2;
	}
 
	$a = array_chunk($x, ceil($len_x/2));
	$b = array_chunk($y, ceil($len_y/2));
 
	$deg = floor($len_x/2);
 
	$x1 = $a[0];	// 1
	$x2 = $a[1];	// 2
	$y1 = $b[0];	// 1
	$y2 = $b[1];	// 2
 
	return  ($a = karatsuba($x1, $y1)) * pow(10, 2 * $deg)
			+ ($c = karatsuba($x2, $y2))
			+ (karatsuba(sum($x1, $x2), sum($y1, $y2)) - $a - $c) * pow(10, $deg);
}
 
// 7 006 652
echo karatsuba($x, $y);
 ?>
