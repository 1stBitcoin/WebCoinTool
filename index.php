<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("easybitcoin.php");
require_once("cfg/call.php");
require_once("functions.php");


echo "<h1>Web Coin Tool</h1>";

$peer_info = $bitcoin->getpeerinfo();
$hipools=count(array_keys($peer_info));

echo "Conected to " . $hipools . " nodes.<br>";
echo build_table($peer_info);
echo "<br>";


for ($i=0;$i<$hipools;$i++) {
	$name1= array_keys($peer_info)[$i];
	$address = explode(":", $peer_info[$name1]['addr']);

echo "addnode=" . $address[0] . "<br>";

}








die();

?>
