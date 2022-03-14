<?php

require_once '../config.php';

// Goal: Get input from the user about their system with scraped options from basic system info and generate a executable .sh file to be run on the system to install the system.

// Welcome page by LPB on Mon Mar 14 02:02:27 PM EDT 2022

// $str = shell_exec("sudo parted -l");

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
	<!-- FontAwesome 5.15.3 CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
	<script src="../main.js"></script>
	<link rel="stylesheet" href="../main.css">
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.27.0/components/prism-shell-session.min.js"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.27.0/prism.min.js"></script>

</head>

<body id="body" onload="fade_in()">
	<div class="text-center mt-5">
		<h1 class="font-weight-normal">Step 1: Disk Partitioning</h1>
		<p>
			Your current disk layout is:
		</p>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-2 col-md-1 col-sm-1">
			</div>
			<div class="col-lg-8 col-md-8 col-sm-10">
				<pre class="bg-dark p-4"><?php echo shell_exec("sudo df -h | grep -v 'tmpfs\|loop'"); ?></pre>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-1">
			</div>
		</div>
		<div class="row">
			<div class="col-5"></div>
			<div class="col-2">
				<button class="btn btn-primary font-major-mono-display w-100" onclick="fade_out(1);">Packages
					<i class="fa fa-arrow-right" aria-hidden="true"></i>
				</button>
			</div>
			<div class="col-5"></div>
		</div>
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
	<!-- Bootstrap JavaScript Libraries -->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
		integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
		integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
	</script>

</body>

</html>