<?php
/**
 * Two arrays are called similar if one can be obtained from another by swapping at most one pair of elements in one of the arrays.

Given two arrays a and b, check whether they are similar.

Example

For a = [1, 2, 3] and b = [1, 2, 3], the output should be
areSimilar(a, b) = true.

The arrays are equal, no need to swap any elements.

For a = [1, 2, 3] and b = [2, 1, 3], the output should be
areSimilar(a, b) = true.

We can obtain b from a by swapping 2 and 1 in b.

For a = [1, 2, 2] and b = [2, 1, 1], the output should be
areSimilar(a, b) = false.

Any swap of any two elements either in a or in b won't make a and b equal.
 * @param unknown $a
 * @param unknown $b
 * @return boolean
 */
function areSimilar($a, $b) {
    $change=false;
    for($i=0; $i < count($a); $i++) {
        if($a[$i]!==$b[$i]) {
            if($change)
                return false;
            
            $change=true;
            
            for($i2=$i+1; $i2 < count($b); $i2++) {
                if($a[$i]===$b[$i2] && $a[$i2]!==$b[$i2]) {
                    $aux=$b[$i];
                    $b[$i]=$b[$i2];
                    $b[$i2]=$aux;
                    
                    continue;
                } elseif($i2===count($b))
                    return false;
            }
        }
        
    }
    return true;
}

echo areSimilar([832, 998, 570, 148], 
    [832, 570, 998, 148]) ? "true" : "false";