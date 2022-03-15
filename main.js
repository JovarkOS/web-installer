function fade_in() {
	var body = document.getElementById("body");
	body.classList.add("in_animation");
}

function fade_out(current_step) {
	var body = document.getElementById("body");
	body.classList.remove("in_animation");
	body.classList.add("out_animation");
	next(current_step);
	console.log(current_step);
}

function next(current_step) {
	// get the GET parameters passed in fromt he URL and add them to the next page
	// These options can then be passed to be processed with the $_GET array in PHP
	var url = window.location.href;
	options = url.substring(url.indexOf("?") + 1);
	switch (current_step) {
		case 0:
			// nothing to do for this step
			location_next = "/steps/1_disks.php";
			break;
		case 1:
			// first step with options to pass onto the next pages
			location_next = "/steps/2_packages.php" + "?" + options;
			break;
		case 2:
			location_next = "/steps/3_configure_system.php" + "?" + options;
			break;
		case 3:
			location_next = "/steps/4_configure_users.php" + "?" + options;
			break;
		case 4:
			location_next = "/steps/5_summary.php" + "?" + options;
			break;
		case 5:
			location_next = "/steps/6_install.php" + "?" + options;
			break;
		default:
			location_next = "/steps/0_error.php" + "?" + options;
	}

	setTimeout(function () {
		window.location.href = location_next;
	}, 400);
}