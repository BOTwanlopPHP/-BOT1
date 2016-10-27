<?php
$access_token = 'MheeIpqJUmhyvXW91x/oygbvPBHtBChGseqGlYYcF5Z43ndEYW8QqfaDYGfY2wVPxTN3CQHv1Rf+lVvJ71FlK9kWOnvJ+xgjkyo5R9DdH0K2mnF/rTtiNLk3vniRE62CiGay5kofMlzpqY0oRAfMMgdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['192.168.1.99'])) {
	// Loop through each event
	foreach ($events['192.168.1.99'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
			];

		}
	}
}

