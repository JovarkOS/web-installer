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
	switch (current_step) {
		case 0:
			location_next = "/steps/1_disks.php";
			break;
		case 1:
			location_next = "/steps/2_packages.php";
			break;
		case 2:
			location_next = "/steps/3_configure_system.php";
			break;
		case 3:
			location_next = "/steps/4_configure_users.php";
			break;
		case 4:
			location_next = "/steps/5_summary.php";
			break;
		case 5:
			location_next = "/steps/6_install.php";
			break;
		default:
			location_next = "/steps/0_error.php";
	}

	setTimeout(function () {
		window.location.href = location_next;
	}, 400);
}