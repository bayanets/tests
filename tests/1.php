<?php
ini_set('display_errors',1);

$arr = array( 'abba', 'bbb', 'ab', 'ba', 'ba', 'ab', 'abba');
// $arr = array( 'aaa', 'ab','bc','cd','da');


function f1 ($arr, $cur, $arr_len, $num){
	$num++;
	$res = array();
	if (empty($cur))
	{
		$cur=array( array_shift($arr) );
		$res = f1($arr, $cur, $arr_len, $num);
	} 
	if (!empty($cur))
	{
		foreach ($arr as $k => $v)
		{
			if ( substr($v,0,1) == substr(end($cur), -1))
			{
				array_push($cur, $v);
				unset($arr[$k]);
				break;
			}
		}
		if (count($cur) == $arr_len) { return $cur;	} 
		else  { 
			if ($num < $arr_len){ $res = f1($arr, $cur, $arr_len, $num); }
			else { return false; }  
		}
	}
	return $res;
}

function variations($arr)
{
	$arr = array_values($arr);
	$result = array();

	$new_arr = $arr;
	$last = count($arr)-1;

	foreach ($arr as $key=>$val){
		do {
			$result[] = $new_arr;

			$prev_val = $new_arr[$key];
			$prev_key = $key;
				
			if ($key != $last) { $key++; } else { $key = 0; }
				
			$new_arr[$prev_key] = $new_arr[$key];
			$new_arr[$key] = $prev_val;
		} while($arr != $new_arr);
	}
	$result=array_unique($result, SORT_REGULAR);
	return $result;
}

$result = array();
$arr_len = count($arr);
$num = 0;
$arr = variations($arr);
foreach ($arr as $v) {
	$ans=f1($v, null, $arr_len, $num);
	if($ans !== false) {
		if (!in_array($ans, $result)) {
			$result[] = $ans;
			echo implode ($ans, "->") . "<br />";
		}
	}
}

// print_r (f1 ($arr, null, $arr_len, 0));

