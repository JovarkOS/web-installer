<?php

require_once '../config.php';
require_once '../functions.php';

// Goal: Get input from the user about their system with scraped options from basic system info and generate a executable .sh file to be run on the system to install the system.

session_start();

$_SESSION['efi_mount_point'] = "";
$_SESSION['efi_drive_path'] = "";
$_SESSION['efi_drive_size'] = "";
$_SESSION['root_mount_point'] = "";
$_SESSION['root_drive_path'] = "";
$_SESSION['root_partition_size'] = "";
$_SESSION['root_partition_type'] = "";

if(isset($_POST['efi_mount_point'])){
	$_SESSION['efi_mount_point'] = $_POST['efi_mount_point'];
}

if(isset($_POST['efi_drive_path'])){
	$_SESSION['efi_drive_path'] = $_POST['efi_drive_path'];
}

if(isset($_POST['efi_partition_size'])){
	$_SESSION['efi_partition_size'] = $_POST['efi_partition_size'];
}

if(isset($_POST['root_mount_point'])){
	$_SESSION['root_mount_point'] = $_POST['root_mount_point'];
}

if(isset($_POST['root_drive_path'])){
	$_SESSION['root_drive_path'] = $_POST['root_drive_path'];
}

if(isset($_POST['root_partition_size']) && $_POST['root_partition_size'] != ""){
	$_SESSION['root_partition_size'] = $_POST['root_partition_size'];
} else {
	$disk = $_SESSION['efi_drive_path'];
	$disk_used = shell_exec("lsblk -b -o SIZE,PATH,FSAVAIL | grep -v 'loop' | grep " . $disk . " | awk '{ print $1 }' | head -n 1");
	$disk_available = shell_exec("lsblk -b -o SIZE,PATH,FSAVAIL | grep -v 'loop' | grep " . $disk . " | awk '{ print $1 }' | tail -n 1");
	$_SESSION['root_partition_size'] = $disk_used - $disk_available;
}

if(isset($_POST['root_partition_type'])){
	$_SESSION['root_partition_type'] = $_POST['root_partition_type'];
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
		<h1 class="font-weight-normal">Step 2: Packages to install</h1>
		<p>
			Please choose the packages you would like to install on your system.
		</p>
	</div>
	<div class="container-fluid">
		<form action="/steps/3_configure_system.php" method="post">
			<div class="row">
				<div class="col-lg-2 col-md-1 col-sm-1"></div>
				<div class="col-lg-8 col-md-10 col-sm-10">
					<div class="form-check">
						<div class="accordion-flush" id="packages">
							<div class="accordion-item bg-dark border border-secondary">
								<h2 class="accordion-header bg-dark" id="required_packages_heading">
									<button class="accordion-button bg-dark text-white" type="button"
										data-bs-toggle="collapse" data-bs-target="#required_packages"
										aria-expanded="true" aria-controls="required_packages">
										Required Packages
									</button>
								</h2>
								<div id="required_packages" class="accordion-collapse collapse"
									aria-labelledby="required_packages_heading" data-bs-parent="#required_packages">
									<div class="accordion-body">
										<input class="form-check-input" type="checkbox" value="base" id="base"
											name="base" checked disabled required>
										<label class="form-check-label" for="base">
											<span class="text-monospace">base</span>
										</label>
									</div>
								</div>
							</div>

							<div class="accordion-item bg-dark border border-secondary">
								<h2 class="accordion-header bg-dark" id="additional_packages_heading">
									<button class="accordion-button bg-dark text-white" type="button"
										data-bs-toggle="collapse" data-bs-target="#additional_packages"
										aria-expanded="true" aria-controls="additional_packages">
										Kernels (choose 1 or more):
									</button>
								</h2>
								<div id="additional_packages" class="accordion-collapse collapse"
									aria-labelledby="additional_packages_heading" data-bs-parent="#additional_packages">
									<div class="ml-6 accordion-body">
										<div class="">
											<?php
											$query = shell_exec("pacman -Ss kernel | grep 'core/\|extra/\|community/' | grep '/linux-'");
											
											$kernels = preg_split("#[\r\n]+#", $query);
											array_pop($kernels);
											foreach ($kernels as $kernel) {
												$kernel_packages = substr($kernel, 0, strpos($kernel, " "));
												$kernel_packages = substr($kernel_packages, ($pos = strpos($kernel_packages, '/')) !== false ? $pos + 1 : 0);
												echo '<input class="form-check-input" type="checkbox" value="'. $kernel_packages . '" id="'. $kernel_packages . '" name="kernel_packages[]">';
												echo '<label class="form-check-label" for="'. $kernel_packages . '">';
												echo '<span class="text-monospace">'. $kernel . '</span>';
												echo '</label>';
												echo '<br>';
											}
										?>
										</div>
									</div>
								</div>
							</div>
							<div class="accordion-item bg-dark border border-secondary">
								<h2 class="accordion-header bg-dark" id="additional_packages_heading">
									<button class="accordion-button bg-dark text-white" type="button"
										data-bs-toggle="collapse" data-bs-target="#additional_packages"
										aria-expanded="true" aria-controls="additional_packages">
										Additional Packages:
									</button>
								</h2>
								<div id="additional_packages" class="accordion-collapse collapse"
									aria-labelledby="additional_packages_heading" data-bs-parent="#additional_packages">
									<div class="ml-6 accordion-body">
										<div class="">
											<?php
											$query = shell_exec("pacman -Ss kernel | grep 'core/\|extra/\|community/' | grep '/linux-'");
											
											$additional_packages = preg_split("#[\r\n]+#", $query);
											array_pop($additional_packages);
											foreach ($additional_packages as $additional_packages) {
												$additional_packages_name = substr($additional_packages, 0, strpos($additional_packages, " "));
												$additional_packages_name = substr($additional_packages_name, ($pos = strpos($additional_packages_name, '/')) !== false ? $pos + 1 : 0);
												echo '<input class="form-check-input" type="checkbox" value="'. $additional_packages_name . '" id="'. $additional_packages_name . '" name="additional_packages[]">';
												echo '<label class="form-check-label" for="'. $additional_packages_name . '">';
												echo '<span class="text-monospace">'. $additional_packages . '</span>';
												echo '</label>';
												echo '<br>';
											}
										?>
										</div>
									</div>
								</div>
							</div>

							<div class="accordion-item bg-dark border border-secondary">
								<h2 class="accordion-header bg-dark" id="text_editors_packages_heading">
									<button class="accordion-button bg-dark text-white" type="button"
										data-bs-toggle="collapse" data-bs-target="#text_editor_packages"
										aria-expanded="true" aria-controls="text_editor_packages">
										Text editors:
									</button>
								</h2>
								<div id="text_editor_packages" class="accordion-collapse collapse"
									aria-labelledby="text_editors_packages_heading"
									data-bs-parent="#text_editor_packages">
									<div class="accordion-body">
										<?php
											$query = shell_exec("pacman -Ss 'text editor' | grep 'core/\|extra/\|community/'");
											
											$text_editors = preg_split("#[\r\n]+#", $query);
											array_pop($text_editors);
											foreach ($text_editors as $text_editor) {
												// https://stackoverflow.com/questions/2588666/
												$text_editor_package_name = substr($text_editor, 0, strpos($text_editor, " "));
												// https://stackoverflow.com/questions/5329866/
												$text_editor_package_name = substr($text_editor_package_name, ($pos = strpos($text_editor_package_name, '/')) !== false ? $pos + 1 : 0);
												echo '<input class="form-check-input" type="checkbox" value="'. $text_editor_package_name . '" id="'. $text_editor_package_name . '" name="text_editor[]">';
												echo '<label class="form-check-label" for="'. $text_editor_package_name . '">';
													echo '<span class="text-monospace">'. $text_editor . '</span>';
												echo '</label>';
												echo '<br>';
											}
										?>
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
						onclick="fade_out(2);">System Configuration
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