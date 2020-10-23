
$(document).ready(function() {
$('input[type="file"]').on('click', function() {
    $(".file_names").html("");
  })
if ($('input[type="file"]')[0]) {
	var fileInput = document.querySelector('label[for="et_pb_contact_brand_file_request_0"]');
	fileInput.ondragover = function() {
		this.className = "et_pb_contact_form_label changed";
		return false;
	}
	fileInput.ondragleave = function() {
		this.className = "et_pb_contact_form_label";
		return false;
	}
	fileInput.ondrop = function(e) {
		e.preventDefault();
		var fileNames = e.dataTransfer.files;
		for (var x = 0; x < fileNames.length; x++) {
			console.log(fileNames[x].name);
			$=jQuery.noConflict();
			$('label[for="et_pb_contact_brand_file_request_0"]').append("<div class='file_names'>"+ fileNames[x].name +"</div>");
		}
	}
	$('#et_pb_contact_brand_file_request_0').change(function() {
		var fileNames = $('#et_pb_contact_brand_file_request_0')[0].files[0].name;
		$('label[for="et_pb_contact_brand_file_request_0"]').append("<div class='file_names'>"+ fileNames +"</div>");
		$('label[for="et_pb_contact_brand_file_request_0"]').append("<input type='submit' class='btn btn-primary mt-10 w-100' value='Read Document'/>");
		$('label[for="et_pb_contact_brand_file_request_0"]').css('background-color', '##eee9ff');
	});
	}
});

