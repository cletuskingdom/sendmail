<?php

	$to = "cletuskingdom@gmail.com";
	$subject = "Testing mail!!!";
	$message = "Here is the message.";
	$headers = "From: Cletus Kingdom";

	if( mail($to,$subject,$message,$headers) ){
		echo 'Mail sent.';
	}else {
		echo "The mail wasn't sent."
	}