<?php
require_once 'inc/database.php';
require_once 'inc/config.php';
require_once 'inc/functions.php';

$g_api_key = $config['g_api_key'];
$docsValidation['images'] = [
	'image/jpeg',//0
	'image/png',//1
	'image/gif',//2
];
$docsValidation['pdfs'] = [
	'application/pdfFile',//3
	'application/pdf',//4
];
if($_FILES) {
	if(!empty($_FILES['doc']['type'])) {
    	$doc = file_get_contents($_FILES['doc']['tmp_name']);
		
		$detectionType = 'DOCUMENT_TEXT_DETECTION';
		// $detectionType = 'TEXT_DETECTION';
		if (in_array($_FILES['doc']['type'], $docsValidation['pdfs'])) { // if application/pdfFile
			$urlBase = 'https://vision.googleapis.com/v1/files:asyncBatchAnnotate';
			$obj = ''; // needs to be changed
		} else if (in_array($_FILES['doc']['type'], $docsValidation['images'])) { // if images
			$urlBase = 'https://vision.googleapis.com/v1/images:annotate';
			$imageBase64 = base64_encode($doc);
			$obj = '"image": {
			    "content":"' . $imageBase64. '"
			},';
		}

		$jsonRequest ='{
		  	"requests": [
				{
					'.$obj.'
					"features": [
					    {
					      	"type": "' .$detectionType. '",
					      	"maxResults": 10,
					    }
					]
				}
			]
		}';

		$url = $urlBase."?key={$g_api_key}";

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonRequest);
		$jsonResponse = curl_exec($curl);
		$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		curl_close($curl);
		
		if ( $status != 200 ) {
			die("Something when wrong. Status code: $status" );
		}
		
		// switch ($_FILES['doc']['type']) {
		// 	case 'image/jpeg':
		// 		$im = imagecreatefromjpeg($_FILES['doc']['tmp_name']);
		// 		break;
		// 	case 'image/png':
		// 		$im = imagecreatefrompng($_FILES['doc']['tmp_name']);
		// 		break;
		// 	case 'image/gif':
		// 		$im = imagecreatefromgif($_FILES['doc']['tmp_name']);
		// 		break;
		// }

		$response = json_decode($jsonResponse, true);			
		
		$text = isset($response['responses'][0]['textAnnotations'][0]['description'])
					?$response['responses'][0]['textAnnotations'][0]['description']:'';

		// echo'<pre>';
		// print_r($response['responses'][0]['textAnnotations'][0]['description']);
		// echo'</pre>';
	
    } else{
    	echo "{$_FILES['doc']['type']} File type not allowed";
    }
}

if (!empty($text)) {
	// echo $text;
	$data=[];
	foreach ($config['forms']['pcaa'] as $key => $val) {
		// dd($val);
		$name = get_string_between($text, $val['sk'], $val['ek']);
		// if (!empty($name)) {
			$data[$key] = trim($name); 
		// }
	}
	
	dd($data);
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
		    <h1 id="title" class="text-center"><a href="index.php" class="link-style">Optical Character Recognization Form</a></h1>
		    <p id="description" class="description text-center">
		      Thank you for taking the time to improve the platform
		    </p>
		</header>
	  	<form action="message.php" class="form" id="ocr-detail-form" method="post" role="form">
		  	<?php
			  	foreach($data as $key => $value) {
			?>
		    <div class="form-group">
		      <label id="name-label" for="<?php echo $key; ?>">
		       <?php echo $key; ?></label>
		      <input
		             type="text"
		             name="<?php echo $key; ?>"
		             id="<?php echo $key; ?>"
		             class="form-control"
		             value="<?php echo $value; ?>"
		             />
		    </div>
		    <?php }; ?>
	    	<div class="form-group">
			     <button type="submit" id="ocr_added" class="submit-button">Submit</button>
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
