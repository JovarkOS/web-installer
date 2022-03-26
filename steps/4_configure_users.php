<?php

require_once '../config.php';
require_once '../functions.php';

session_start();

$_SESSION['hostname'] = "";


if(isset($_POST['hostname'])) {
	$_SESSION['hostname'] = $_POST['hostname'];
}


print_r($_SESSION);


?>

<!DOCTYPE html>
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
</head>

<body id="body" onload="fade_in()">
	<div class="text-center mt-5">
		<h1 class="font-weight-normal">Step 4: Configure Users</h1>
		<p>
			Only configuration for the root user is required.
		</p>
	</div>
	<div class="container-fluid">
		<form action="/steps/5_summary.php" method="post">
			<div class="row">
				<div class="col-lg-2 col-md-1 col-sm-1"></div>
				<div class="col-lg-8 col-md-10 col-sm-10">
					<div class="form-group">
						<div class="accordion-flush" id="packages">
							<div class="accordion-item bg-dark border border-secondary">
								<h2 class="accordion-header bg-dark" id="password_heading">
									<button class="accordion-button bg-dark text-white" type="button"
										data-bs-toggle="collapse" data-bs-target="#password" aria-expanded="true"
										aria-controls="password">
										Root User:
									</button>
								</h2>
								<div id="password" class="accordion-collapse collapse"
									aria-labelledby="password_heading" data-bs-parent="#password">
									<div class="accordion-body">
										<input class="form-text-input" type="password" id="password"
											name="root_password" placeholder="jovark-system" required>
										<label class="form-text-label" for="password">
											Password
										</label>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-2 col-md-1 col-sm-1"></div>
			</div>
			<div class="row">
				<div class="col-5"></div>
				<div class="col-2">
					<button class="btn btn-primary font-major-mono-display mt-3" type="submit"
						onclick="fade_out(4);">Summary
						<i class="fa fa-arrow-right" aria-hidden="true"></i>
					</button>
				</div>
				<div class="col-5"></div>
			</div>
		</form>
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