<?php
	function get_string_between($string, $start, $end) {
	    $string = ' ' . $string;
	    $ini = strpos($string, $start);
	    if ($ini == 0) return '';
	    $ini += strlen($start);
	    $len = strpos($string, $end, $ini) - $ini;
	    return substr($string, $ini, $len);
	}

	function dd($data,$exit=true,$text='') {
		if (is_array($data)) {
			echo "<pre>";
			print_r($data);
			$msg = !empty($text)?$text:'';
			ee($msg,$exit);
			echo "</pre>";
		}else{
			echo "not type of an array";
			var_dump($data);
			exit;
		}
	}


	function ee($string,$exit=true) {
		echo $string;
		if ($exit) {
			exit;
		}
	}
