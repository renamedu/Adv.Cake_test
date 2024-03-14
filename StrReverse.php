<?php
function strReverse($string) {
	$str_spl = str_split($string);
	
	for ($i = 0; $i < count($str_spl); $i++) {
		if (IntlChar::isalpha($str_spl[$i])) {
			if (IntlChar::isUUppercase($str_spl[$i])) {
				$format_array[] = 1;
			} else {
				$format_array[] = 0;
			}
		} else {
			$format_array[] = $str_spl[$i];
		}
	}

    $pure_string = preg_split("/[\s,.`!?\'-]+/", $string, -1, PREG_SPLIT_OFFSET_CAPTURE);
	
	for ($i = 0; $i < count($pure_string); $i++) {
		$pure_string[$i][0] = strrev(strtolower($pure_string[$i][0]));
	}

    $output_str = '';
    $currentPosition = 0;

    foreach ($pure_string as $word_info) {
        $word = $word_info[0];
        $position = $word_info[1];

        $gap = $position - $currentPosition;
        if ($gap > 0) {
            $output_str .= str_repeat(' ', $gap);
        }

        $output_str .= $word;
        $currentPosition = $position + strlen($word);
    }

    $output_str .= str_repeat(' ', $currentPosition - strlen($output_str));
    $string = str_split($output_str);
	
	for ($i = 0; $i < count($string); $i++) {
		if ($format_array[$i] === 1 ) {
			$string[$i] = strtoupper($string[$i]);
		} elseif ($format_array[$i] === "." ) {
			$string[$i] = ".";
		} elseif ($format_array[$i] === "," ) {
			$string[$i] = ",";
		} elseif ($format_array[$i] === "-" ) {
			$string[$i] = "-";
		} elseif ($format_array[$i] === "`" ) {
			$string[$i] = "`";
		} elseif ($format_array[$i] === "'" ) {
			$string[$i] = "'";
		} elseif ($format_array[$i] === "?" ) {
			$string[$i] = "?";
		} elseif ($format_array[$i] === "!" ) {
			$string[$i] = "!";
		}
	}
    $string = implode($string);

    return $string;
};