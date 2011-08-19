<?php
// create a new cURL resource
$ch = curl_init();

// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, "http://php.weather.sina.com.cn/search.php?city=北京");
//curl_setopt($ch, CURLOPT_HEADER, true);
//curl_setopt($ch, CURLOPT_HTTPHEADER,"Content-type: text/html; charset=gb2312");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// grab URL and pass it to the browser
//$result=iconv( "GBK", "gb2312" , curl_exec($ch));
$result=curl_exec($ch);
// close cURL resource, and free up system resources
curl_close($ch);
if(false==$result)
{
	echo "服务暂停，请稍候再试...";//$doc->loadHTML($result);
}
else
{
	$doc=new DOMDocument();
	$doc->loadHTML($result);
	echo $doc->getElementById("tab_01_ctn1")->childNodes->item(1)->nodeValue;
	//preg_match_all("@<div class='day' style='position: relative;'>(.+?)</div>@s", $doc->getElementById("tab_01_ctn1"), $result);
	//$doc=new DOMDocument();
	//$doc->loadHTML($result);
	//preg_match_all("@<ul class='detail'>(.+?)</ul>@s", $doc, $result);
	//echo $result;
}

?>