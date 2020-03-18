<?php
/**
 * Write a function that reverses characters in (possibly nested) parentheses in the input string.

Input strings will always be well-formed with matching ()s.

Example

For inputString = "(bar)", the output should be
reverseInParentheses(inputString) = "rab";
For inputString = "foo(bar)baz", the output should be
reverseInParentheses(inputString) = "foorabbaz";
For inputString = "foo(bar)baz(blim)", the output should be
reverseInParentheses(inputString) = "foorabbazmilb";
For inputString = "foo(bar(baz))blim", the output should be
reverseInParentheses(inputString) = "foobazrabblim".
Because "foo(bar(baz))blim" becomes "foo(barzab)blim" and then "foobazrabblim".
 * @param $inputString
 * @return string
 */
function reverseInParentheses($inputString) {
    $p=strlen($inputString)-1;

    while($p>=0) {
        if($inputString[$p]==="(") {
            $q=$p;

            $l=false;
            while(!$l) {
                $q++;
                if($inputString[$q]===")") {
                    $l=true;
                }
            }

            $subs=substr($inputString, $p+1, $q-$p-1);
            for($i=0;$i<strlen($subs);$i++) {
                $aux=$inputString[$p+1+$i];
                $inputString[$p+1+$i] = $subs[strlen($subs)-$i-1];
                $subs[strlen($subs)-$i-1]=$aux;
            }

            $inputString = ($p>0 ? substr($inputString, 0, $p) :"")
                .substr($inputString, $p+1, $q-$p-1).substr($inputString, $q+1, strlen($inputString)-1);
        }

        $p--;
    }

    return $inputString;
}

//abcdefghijklmnopqrstuvwxyzabcd
echo reverseInParentheses("abc((ghi((mno((stu((xyz)wv))rqp))lkj))fed)((abcd))");
//echo reverseInParentheses("((xyz)wv)");