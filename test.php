<?php
header("Content-Type: text/html; charset=utf-8");
assert(reversePunctuations("Привет! Как дела ?") == "Привет? Как дела !");

function reversePunctuations($str) 
{
    $pattern = '/[.!?\-,;:]/i';
    $matches = [];
    for ($i=0; $i < strlen($str) ; $i++) {
        if (preg_match($pattern, $str[$i])) $matches[] = $i;
    }
    $strWas = $str;
    $k = 0;
    for ($j=strlen($str); $j > 0 ; $j--) {
        if (in_array($j, $matches)) {
            $str[$j] = $strWas[$matches[$k]];
            $k++;
        }
    }
    return $str;
}
