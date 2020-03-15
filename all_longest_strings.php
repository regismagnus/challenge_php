<?php
/**
 * Given an array of strings, return another array containing all of its longest strings.

Example
For inputArray = ["aba", "aa", "ad", "vcd", "aba"], the output should be
allLongestStrings(inputArray) = ["aba", "vcd", "aba"].
 * @param $inputArray
 * @return array
 */
function allLongestStrings($inputArray) {
    $l=array();
    $m=0;
    for($i=0;$i<count($inputArray);$i++) {
        $c=strlen($inputArray[$i]);
        if($c>=$m) {
            if($c>$m) {
                $m=$c;
                $l=array();
            }
            $l[]=$inputArray[$i];
        }
    }

    return $l;
}

print_r(allLongestStrings(array("aba", "aa", "ad", "vcd", "aba")));