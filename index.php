<?php

require_once 'config.php';

// Goal: Get input from the user about their system with scraped options 
// from basic system info and generate a executable .sh file to be run 
// on the system to install the OS with the selected options and input.


// Remove the session variables that were set in a previous step 
// just in case the user has come back to this step to change their input.
session_start();
session_unset();
session_destroy();

// Start session where the user's input will be stored
session_start();


print_r($_SESSION);

?>

<!doctype html>
<html lang="en">

<head>
	<title><?php echo $config['global_title']; ?></title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap CSS v5.0.2 -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="main.css">
	<!-- FontAwesome 5.15.3 CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
	<script src="https://unpkg.com/typeit@8.2.0/dist/index.umd.js"></script>
	<script src="main.js"></script>
</head>

<body id="body" onload="fade_in()">

	<div class="text-center v-center">
		<h1 class="fw-bold">Welcome to the Arch System Installer</h1>
		<h2 class="font-weight-normal">
			Click <button class="btn btn-primary fs-monospace" onclick="fade_out(0)">Next <i class="fa fa-arrow-right"
					aria-hidden="true"></i>
			</button> to get started!
		</h2>
	</div>
	<footer class="text-center">
		<div class="footer-copyright py-3">
			<p class="font-major-mono-display">
				&copy
				<?php echo $config['global_title']; ?>
				<?php echo $config['version']; ?>
				<br>
				<?php echo $config['global_author']; ?>
				<br>
				<a href="<?php echo $config['global_project_website']; ?>">
					<?php echo $config['global_project_website']; ?>
				</a>
			</p>
		</div>
	</footer>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
		integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
		integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
	</script>
</body>

</html>