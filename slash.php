<?php
	
	// Authorized team tokens that you would need to get when creating a slash command. Same script can serve multiple teams, just keep adding tokens to the array below.
	$tokens = array(
		"SLACK TOKEN"
	);
	
	// check auth
	if (!in_array($_REQUEST['token'], $tokens)) {
		bot_respond("*Unauthorized token!*");
		die();
	}
	
	// Basic use of post data slack sends
	$user = "you";
	if(isset($_POST['user_name']))
		$user = $_POST['user_name'];


	// List of commands
	switch ($_REQUEST['text']) {
		case 'help':
			bot_respond("foo bar");
			break;
		case 'foo':
			bot_respond($user . " asked me to do `foo`");
			break;
		case 'time':
			bot_respond($user . " asked me what time it is on the server, " . 
				date('Y-m-d H:i:s', time()));
			break;
		default:
			bot_respond("this is a default response");
			break;
	}
	
	// This can used for debugging
	dumper($_REQUEST);
	
	
	/*
		Helper Functions
	*/
	
	// Send information back to slack
	function bot_respond($output){
		echo json_encode($output);
	}
	
	function dumper($request){
        echo "<pre>" . print_r($request, 1) . "</pre>";
    }
	
?>