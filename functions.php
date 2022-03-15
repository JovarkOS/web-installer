<?php 

function error($message) {
	$output = "Error: " . $message;
	die($output);
}

function consoleLog($message, $title=null) {
	echo "<script>
	console.log('" . $title . $message . "');
	</script>";
}