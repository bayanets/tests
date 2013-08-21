<?php
// 0 -> 01 -> 0110 -> 01101001 ->...

ini_set('display_errors',1);


$n = 30;


$out = '0';
while(strlen($out) < $n){
	$push = '';
 	for ($i = 0; $i < strlen($out); $i++){
 		if ($out[$i] == '0' ) { $push .= '1'; }
 		else { $push .= '0'; }
 	}
 	$out .= $push;
}

for ($i = 0; $i < $n; $i++){
	echo $out[$i];
}