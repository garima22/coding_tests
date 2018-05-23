<?php
/* 
Problem Statement

Run-length encoding is a very simplistic image compression technique used by fax
machines. If we represent a scanned image in binary where the white is encoded
by 0 and black by 1, there are probably a lot more zeros than ones for a typical
sheet of paper.

Basically, we compress runs (contiguous substrings of repeated characters), so
000110 would be represented as "3 zeros, followed by 2 ones, followed by 1
zero".

I want to encode strings containing lowercase ASCII letters and numbers in a
similar manner. Let's come up with a format for encoding those strings and write
a function to encode them. The only constraint is that the encoded string can
never be longer than the input string.
 */
 
 /*
 
 0000111110 => 0;4,1;5,0:1
 0000000aaabbbbbb => 0;7,a;3,b;6
 abcde
 */
 
 $f = fopen("php://stdin", 'r');
 fscanf($f, "%s", $input);
 
 function getEncodedStr($str){
     $length = strlen($str);
     $str_arr = str_split($str);
     $temp = array();
     $temp_str = '';
     
     
     for($i=0; $i<$length; $i++){
         $cur_str = $str_arr[$i];
         if ($i > 0){
             $prev_str = $str_arr[$i-1];
             if ($cur_str != $prev_str){
                 $temp_str .= $prev_str.';'.$temp[$prev_str].',';
                 $temp = array();
             }
         }
         if (isset($temp[$cur_str])){
                 $temp[$cur_str] = $temp[$cur_str]+1;
             }
         else
            $temp[$cur_str] = 1;
            
         if ($i == $length-1){
                $temp_str .= $cur_str.';'.$temp[$cur_str];
            }
     }
    if ($temp_str != '')
        return $temp_str; 
    return null;
 }
 
 $output = getEncodedStr($input); 
 print $output.PHP_EOL;