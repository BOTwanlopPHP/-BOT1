<?php
$access_token = 'MheeIpqJUmhyvXW91x/oygbvPBHtBChGseqGlYYcF5Z43ndEYW8QqfaDYGfY2wVPxTN3CQHv1Rf+lVvJ71FlK9kWOnvJ+xgjkyo5R9DdH0K2mnF/rTtiNLk3vniRE62CiGay5kofMlzpqY0oRAfMMgdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		$ch = curl_init();
curl_setopt($ch,"http://192.168.1.99 ");

		if ($T4 >=26){
		else{
		
		"message": {
          
             "type": "text",
             "text": "Hello, world"
          }
		
		}}
	

