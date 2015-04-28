<?php
/* -- server side validation ----
$arrErorrMsg = array();
function validateAddress($strFieldName)
{
	$errorMsg = '';
	$fieldValue = trim($_POST[$strFieldName]);
	if (empty($fieldValue)) {
		$errorMsg = ucwords($strFieldName). " is required";
	} else {
		if(strlen($fieldValue) >= 150) {
			$errorMsg = ucwords($strFieldName). " should be 150 characters";
		} elseif (strlen($fieldValue) <= 5) {
			$errorMsg = ucwords($strFieldName). " should be 5 characters";
		} else { 
			if(!preg_match("/^[a-zA-Z0-9\-\\,. ]*$/", $fieldValue)) {
				$errorMsg = "Only letters, number and '-\,.'";
			}
		}
	}
	return $errorMsg;
}

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
	// Address validation
	$arrErorrMsg['origin'] = validateAddress("origin");
	$arrErorrMsg['destination'] = validateAddress("destination");
	$arrErorrMsg = array_filter($arrErorrMsg);
}
*/

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
	strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest' &&
	$_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
	
	$distance = "";
	$from = urlencode(trim($_POST['origin']));
	$to = urlencode(trim($_POST['destination']));

	$data = file_get_contents("http://maps.googleapis.com/maps/api/distancematrix/json?origins=$from&destinations=$to&language=en-EN&sensor=false");
	$data = json_decode($data);
	foreach($data->rows[0]->elements as $road) {
		$distance = $road->distance->text;
	}
	echo json_encode(array('result' => $distance));
} else {
	header( "refresh:0;url=/" );
}
?>