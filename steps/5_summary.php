<?php

require_once '../config.php';
require_once '../functions.php';

session_start();

$_SESSION['root_password'] = "";


if(isset($_POST['root_password'])) {
	$_SESSION['root_password'] = $_POST['root_password'];
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
		<h1 class="font-weight-normal">Step 5: Review Configuration Options</h1>
		<p>
			No permanent actions will be taken until you click the "Install" button.
		</p>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-2 col-md-1 col-sm-1"></div>
			<div class="col-lg-8 col-md-10 col-sm-10">
				<div class="d-flex align-items-start">
					<div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
						aria-orientation="vertical">
						<button class="nav-link active" id="v-pills-disks-tab" data-bs-toggle="pill"
							data-bs-target="#v-pills-disks" type="button" role="tab" aria-controls="v-pills-disks"
							aria-selected="true">Disks</button>
						<button class="nav-link" id="v-pills-packages-tab" data-bs-toggle="pill"
							data-bs-target="#v-pills-packages" type="button" role="tab" aria-controls="v-pills-packages"
							aria-selected="false">Packages</button>
						<button class="nav-link" id="v-pills-system-configuration-tab" data-bs-toggle="pill"
							data-bs-target="#v-pills-system-configuration" type="button" role="tab"
							aria-controls="v-pills-system-configuration" aria-selected="false">System
							Configuration</button>
						<button class="nav-link" id="v-pills-user-configuration-tab" data-bs-toggle="pill"
							data-bs-target="#v-pills-user-configuration" type="button" role="tab"
							aria-controls="v-pills-user-configuration" aria-selected="false">User Configuration</button>
					</div>
					<div class="tab-content" id="v-pills-tabContent">
						<div class="tab-pane fade show active" id="v-pills-disks" role="tabpanel"
							aria-labelledby="v-pills-disks-tab">
							<div class="container">
								<div class="row">
									<div class="col-6">
										<ul class="list-group">
											<li class="list-group-item bg-dark text-white"> EFI Mount Point:
												<?php echo $_SESSION['efi_mount_point']; ?>
											</li>
											<li class="list-group-item bg-dark text-white"> EFI Drive Path:
												<?php echo $_SESSION['efi_drive_path']; ?>
											</li>
											<li class="list-group-item bg-dark text-white"> EFI Partition Size (in MB):
												<?php echo $_SESSION['efi_partition_size']; ?>
											</li>
										</ul>
									</div>
									<div class="col-6">
										<ul class="list-group">
											<li class="list-group-item bg-dark text-white">
												Root Mount Point: <?php echo $_SESSION['root_mount_point']; ?>
											</li>
											<li class="list-group-item bg-dark text-white"> Root Drive Path:
												<?php echo $_SESSION['root_drive_path']; ?>
											</li>
											<li class="list-group-item bg-dark text-white"> Root Partition Size (in MB):
												<?php echo $_SESSION['root_drive_size']; ?>
											</li>
											<li class="list-group-item bg-dark text-white"> Root Partition Type:
												<?php echo $_SESSION['root_partition_type']; ?>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="v-pills-packages" role="tabpanel"
							aria-labelledby="v-pills-packages-tab">
							<div class="container">
								<div class="row">
									<div class="col-6">
										<p>
											Kernel Package(s) Selected:
										</p>
										<ul class="list-group">
											<?php
												foreach($_SESSION['kernel_packages'] as $package[]) {
													foreach($_POST['kernel_package'] as $option) {
														echo "<li class='list-group-item bg-dark text-white'>" . $option ."</li>";
													}
												}
											?>
										</ul>
									</div>
									<div class="col-6">
										<ul class="list-group">
											<li class="list-group-item bg-dark text-white">
												Root Mount Point: <?php echo $_SESSION['root_mount_point']; ?>
											</li>
											<li class="list-group-item bg-dark text-white"> Root Drive Path:
												<?php echo $_SESSION['root_drive_path']; ?>
											</li>
											<li class="list-group-item bg-dark text-white"> Root Partition Size (in MB):
												<?php echo $_SESSION['root_drive_size']; ?>
											</li>
											<li class="list-group-item bg-dark text-white"> Root Partition Type:
												<?php echo $_SESSION['root_partition_type']; ?>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="v-pills-system-configuration" role="tabpanel"
							aria-labelledby="v-pills-system-configuration-tab">... system-configuration </div>
						<div class="tab-pane fade" id="v-pills-user-configuration" role="tabpanel"
							aria-labelledby="v-pills-user-configuration-tab">... user-configuration</div>
					</div>
				</div>
			</div>
			<div class="col-lg-2 col-md-1 col-sm-1"></div>
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
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
	</script>

</body>

</html>