<?php
####################################################///sql
error_reporting(0);
function runSQL($rsql) {
    $hostname = "localhost";
    $username = "root";
    $password = "root";
    $dbname   = "bee";
    $connect = mysql_connect($hostname,$username,$password) or die ("Error: could not connect to database");
    $db = mysql_select_db($dbname);
    mysql_query("set character set utf8");     
    $result = mysql_query($rsql) or die ('Error: could not query data' . $rsql); 
    return $result;
    mysql_close($connect);
}
function countRec($fname,$tname,$where) {
    $sql = "SELECT count($fname) FROM $tname $where";
    $result = runSQL($sql);
    while ($row = mysql_fetch_array($result)) {
        return $row[0];
    }
}
$query = "select * from room1";
$data = mysql_query($query); //query ข้อมูล
while($show = mysql_fetch_array($data)){
	echo $show[0]." ".$show[1]." ".$show[2]."
######################################################///line///
$access_token = 'MheeIpqJUmhyvXW91x/oygbvPBHtBChGseqGlYYcF5Z43ndEYW8QqfaDYGfY2wVPxTN3CQHv1Rf+lVvJ71FlK9kWOnvJ+xgjkyo5R9DdH0K2mnF/rTtiNLk3vniRE62CiGay5kofMlzpqY0oRAfMMgdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input'); 
echo $source;
// Parse JSON
$events = json_decode($content, true);
  
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => 'ได้ๆๆๆๆ'
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";

