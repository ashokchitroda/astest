<!DOCTYPE html>
	<html>
		<head>
			<title>Get distance between 2 location</title>
			<link rel="stylesheet" type="text/css" href="design.css">
			<script type="text/javascript" src="jquery.js"></script>
			<script type="text/javascript" src="validation.js"></script>
			<script type="text/javascript">
				$(document).ready(function(){
					$(".resultLayout").hide();
					$.validator.addMethod("address", 
                    function(value, element) {
                         return /^[a-zA-Z0-9\-\\,. ]*$/.test(value);
                        }
					);
				
					$("#calc_dis").validate({
						rules: {
							origin: { 
								required: true,
								minlength: 5,
								maxlength: 150,
								address: true
							},
							destination: { 
								required: true,
								minlength: 5,
								maxlength: 150,
								address: true
							}
						},
						messages: {
							origin: {
								required: "Origin is required",
								maxlength: jQuery.validator.format("Origin should be {0} characters."),
								minlength: jQuery.validator.format("Origin should be {0} characters."),
								address: "Only letters, number and '-\,.'"
							},	
							destination: {
									required: "Destination is required",
									maxlength: jQuery.validator.format("Destination should be {0} characters."),
									minlength: jQuery.validator.format("Destination should be {0} characters."),
									address: "Only letters, number and '-\,.'"
							}
						},
						submitHandler: function() {
							$.post('calc_dis.php', 
							$('form#calc_dis').serialize() , 
							function(data){
								$("#result").html(data.result);
								$(".resultLayout").show();
							}, "json");
						}
					});
				});
			</script>
		</head>
		<body>
		<form method="post" name="calc_dis" id="calc_dis" class="form">
			<h3>Get distance between 2 location</h3>
			<div>
				<label for="origin"><span class="fieldMandatory">*&nbsp;</span><span class="fieldLabel" >Origin :</span></label>
				<input type="text" name="origin" id="origin" value="<?php echo(isset($_POST['origin']))? $_POST['origin'] : '';?>" size="45">
				<label class="error" generated="true" for="origin">
					<?php
					// without ajax request submit form server side error message display
					// echo(isset($arrErorrMsg['origin']))? $arrErorrMsg['origin'] : ''; 
					?>				
				</label>
			</div>
			<div>
				<label for="destination"><span class="fieldMandatory">*&nbsp;</span><span class="fieldLabel" >Destination :</span></label>
				<input type="text" name="destination" id="destination" value="<?php echo(isset($_POST['destination']))? $_POST['destination'] : '';?>" size="45">
				<label class="error" generated="true" for="destination">
					<?php
						// without ajax request submit form server side error message display
						// echo(isset($arrErorrMsg['destination']))? $arrErorrMsg['destination'] : '';
					?>									
				</label>
			</div>
			<div>
				<span><input type="submit" name="submit" class="submit" value="Calculate"></span>
			</div>
		</form>
		<div class="resultLayout">
			<h3>Result</h3>
			<label>Distance between locations is : <span id="result"></span></label>
		</div>
		</body>
	</html>