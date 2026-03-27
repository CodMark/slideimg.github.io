<?php

header("Access-Control-Allow-Origin: *");

if(!isset($_GET['url'])){
    die("No URL");
}

$url = $_GET['url'];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0");

$data = curl_exec($ch);
$info = curl_getinfo($ch);
curl_close($ch);

$contentType = $info['content_type'];

if(strpos($contentType, "mpegurl") !== false || strpos($url, ".m3u8") !== false){

    header("Content-Type: application/vnd.apple.mpegurl");

    $lines = explode("\n", $data);
    $output = "";

    foreach($lines as $line){

        $line = trim($line);

        if($line == "" || strpos($line, "#") === 0){
            $output .= $line."\n";
            continue;
        }

        if(!preg_match("/^http/", $line)){
            $base = dirname($url);
            $line = $base."/".$line;
        }

        $proxy = "m3u8_proxy.php?url=".urlencode($line);

        $output .= $proxy."\n";
    }

    echo $output;

}else{

    header("Content-Type: video/mp2t");
    echo $data;

}
?>