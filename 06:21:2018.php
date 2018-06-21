<?php

$ads = [
     "900,google.com",
     "60,mail.yahoo.com",
     "10,mobile.sports.yahoo.com",
     "40,sports.yahoo.com",
     "300,yahoo.com",
     "10,stackoverflow.com",
     "2,en.wikipedia.org",
     "1,es.wikipedia.org" ];

$user0 = [ "/nine.html", "/four.html", "/six.html", "/seven.html", "/one.html" ]
  
$user1 = [ "/one.html", "/two.html", "/three.html", "/four.html", "/six.html" ]
  
$user2 = [ "/nine.html", "/two.html", "/three.html", "/four.html", "/six.html", "/seven.html" ]
  
$user3 = [ "/three.html", "/eight.html" ]

/*
(user0, user2):
   /four.html
   /six.html
   /seven.html

(user1, user2):
   /two.html
   /three.html
   /four.html
   /six.html

(user0, user3):
   None

(user1, user3):
   /three.html

*/
  
maxSequence($user0, $user2);

function maxSequence($u1, $u2){
  
  $max = 0;
  for($i=0; $i<$count1; $i++){
    for($j=0; $j<$count2; $j++){
      if ($u1[$i] == $u2[$j){
        $max++;
        break;
      }
    }
    if ($max){
      for($k=$i; $k<$count1; $k++){
        if ($u1[$k] == $u2[$j])
      }
    }
  }
}


function countAds($ads){
  $temp = array();
  
  foreach($ads as $ad){
    $parts = explode(',', $ad);
    $count = $parts[0];
    $domain = $parts[1];
    
    $domainParts = explode('.', $domain);
    $countDomains = count($domainParts);
    $subDomainArr = array();
      
      $i = $countDomains-1;
      for($j=0; $j<=$i; $j++){
        
        $subDomainArr[] = $domainParts[$i-$j];
       
        $tempArr = array_reverse($subDomainArr);
        $subDomain = implode('.', $tempArr);
         print_r($subDomainArr);
        $temp[$subDomain] = isset($temp[$subDomain]) ? $temp[$subDomain] + $count : $count;
        
      }
     print_r($temp);
  }
}

countAds($ads);

?>
