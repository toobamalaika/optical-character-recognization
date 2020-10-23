<?php
require_once 'inc/database.php';
require_once 'inc/config.php';
require_once 'inc/functions.php';



// Insert form data
if($_SERVER['REQUEST_METHOD'] == 'POST'){
 	// Set variables
    $name = $_POST['name'];
    $flight_no = $_POST['flight_no'];
    $dated = $_POST['dated'];
    $seat_no = $_POST['seat_no'];
    $passport_no = $_POST['passport_no'];
    $cnic_poc = $_POST['cnic_poc'];
    $pk_addr = $_POST['pk_addr'];
    $mobile = $_POST['mobile'];
    $other_med_cond = $_POST['other_med_cond'];
    $date_signed = $_POST['date_signed'];

    // Attempt insert query execution
	$sql = "INSERT INTO ocr_files (name, flight_no, dated, seat_no, passport_no, cnic_poc, pk_addr, mobile, other_med_cond, date_signed) VALUES ('$name', '$flight_no', '$dated', '$seat_no', '$passport_no', '$cnic_poc', '$pk_addr', '$mobile', '$other_med_cond', '$date_signed')";
	if(mysqli_query($con, $sql)){
	    // echo "Records added successfully.";
	    $messagePrint = "Records added successfully.";
	} else{
	    // echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
	    $messagePrint = "ERROR: Could not able to execute $sql. " . mysqli_error($con);
	}
	 
	// Close connection
	mysqli_close($con);

	}

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
		<form class="form" >
			<h2 class="text-center"> <?php echo $messagePrint; ?> </h2>
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
