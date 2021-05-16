<?php
if(count($argv) == 2){
$ch = curl_init();
curl_setopt_array($ch,array(
CURLOPT_URL => "https://mirror-h.org/archive/page/".$argv[1],
CURLOPT_RETURNTRANSFER => 1,
CURLOPT_FOLLOWLOCATION => 1,
CURLOPT_SSL_VERIFYPEER => 0,
CURLOPT_COOKIEJAR => "mh.txt",
CURLOPT_COOKIEFILE => "mh.txt"
));
$resp = curl_exec($ch);
$resp = str_replace("\n","",$resp);
curl_close($ch);

preg_match_all("/<tr>(.*?)<\/tr/",$resp,$tr);
for($i=0;$i<count($tr[1]);$i++){
  preg_match_all("/<a(.*?)>(.*?)<\/a>/",$tr[1][$i],$a);
  if(isset($a[2][1])){
   echo (preg_match("/[^(https|http)\:\/\/$](.*?).[\/]/",$a[2][1],$site)) ? str_replace("/","",$site[0])."\n" : ""; 
 }
}
}

else {
echo '@JawaraHacking.com

##\
  )
  /   Mirror-H.org Grabber
  /     by AryaKun
  /
  )
##\

USAGE:
	php mhgrab.php [HALAMAN]
EXAMPLE:
	php mhgrab.php 7

';
}

?>
