<?php
$url = $_GET['url'];
header("Content-Type: application/vnd.apple.mpegurl");
header("Access-Control-Allow-Origin: *");
readfile($url);
?>