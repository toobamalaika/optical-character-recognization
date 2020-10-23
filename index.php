<?php
require_once 'inc/database.php';
require_once 'inc/config.php';
require_once 'inc/functions.php';
// require_once 'documentLoad.php';



?>


<!DOCTYPE html>
<html>
<head>
	<title>OCR in PHP</title>
	<!-- Boostrap -->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-grid.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-reboot.min.css">
	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>

	<div class="container">
		<header class="header">
		    <h1 id="title" class="text-center">Optical Character Recognization Form</h1>
		    <p id="description" class="description text-center">
		      Thank you for taking the time to improve the platform
		    </p>
		</header>
		<!-- Document post form -->
		<form class="mt-10" enctype="multipart/form-data" action="documentLoad.php" method="POST">
			<div class="form-group">
				<label id="name-label" for="et_pb_contact_brand_file_request_0" class="et_pb_contact_form_label">Enter</label>
				<input name="doc" type="file" id="et_pb_contact_brand_file_request_0" class="file-upload">
			</div>
		</form>

	</div>



	<!-- Boostrap N JS Plugin -->
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.bundle.js"></script>
	<script type="text/javascript" src="assets/js/jquery-3.5.1.slim.js"></script>
	<script type="text/javascript" src="assets/js/button.js"></script>
	<script type="text/javascript" src="assets/js/carousel.js"></script>
	<script type="text/javascript" src="assets/js/collapse.js"></script>
	<script type="text/javascript" src="assets/js/dropdown.js"></script>
	<script type="text/javascript" src="assets/js/index.js"></script>
	<script type="text/javascript" src="assets/js/modal.js"></script>
	<script type="text/javascript" src="assets/js/popover.js"></script>
	<script type="text/javascript" src="assets/js/scrollspy.js"></script>
	<script type="text/javascript" src="assets/js/tab.js"></script>
	<script type="text/javascript" src="assets/js/toast.js"></script>
	<script type="text/javascript" src="assets/js/tooltip.js"></script>
	<script type="text/javascript" src="assets/js/util.js"></script>
	<!-- Custom Javascript -->
	<script type="text/javascript" src="assets/js/script.js"></script>
</body>
</html>
