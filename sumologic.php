<?php

/*Question: 
Given a string, find its longest substring without any duplicated characters. If there are several results, return the first longest substring.

Example:
Input: “aaaaaa”     ->        “a”
Input: “aaabbb”     ->        “ab”
Input: “aaaabcdaef” ->        “bcdaef”
Input: “aaabbbccc”  ->        “ab”
Input: “abcdcxyzab” ->        “dcxyzab” */


$str = 'aaabbb';
$len = strlen($str);
$strArr = str_split($str);
$minNumOfChar = count(array_unique($strArr));
$subArr = array();
$subStr = '';
for($i=0; $i<$len; $i++){
  $currentChar = $strArr[$i];
  if ($i==0){
    addChar($currentChar, $subStr, $subArr);
    continue;
  }
  
  //$matchChar = $strArr[$i+1];
  print_r($subArr);
  if (!in_array($currentChar, $subArr)) {
    addChar($currentChar, $subStr, $subArr);
  }
  else{
    $subStr = substr($subStr, strpos($subStr, $currentChar)+1);
    addChar($currentChar, $subStr, $subArr);
    
  }
}

var_dump($subStr);

function addChar($char, &$subStr, &$subArr){
  $subStr .= $char;
  $subArr[strlen($subStr)] = $subStr;
}
?>
