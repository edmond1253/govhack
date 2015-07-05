<!DOCTYPE html>

<html>

	<head>
		<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
		<meta content="utf-8" http-equiv="encoding">
		<title>Questionnaire</title>
		<link rel="stylesheet" type="text/css" href="design_template/Bukku/css/normalize.css">
		<link rel="stylesheet" type="text/css" href="design_template/Bukku/css/bootstrap.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="design_template/Bukku/css/owl.css">
		<link rel="stylesheet" type="text/css" href="design_template/Bukku/css/animate.css">
		<link href="design_template/Bukku/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="design_template/Bukku/css/et-icons.css">
		<link rel="stylesheet" type="text/css" href="design_template/Bukku/css/tooltip.css">
		<link rel="stylesheet" type="text/css" href="design_template/Bukku/css/lightbox.css">
		<link id="main" rel="stylesheet" type="text/css" href="design_template/Bukku/css/publisher.css">
	</head>
	<body>

		<script language="javascript" type="text/javascript">
			function myFunction() {
				
				//document.getElementById("questions").submit();
				var curAge = document.getElementById('age1').value; 
				console.log(curAge);
				//document.getElementById("answer").innerHTML = "hello";
				//window.alert(curAge);
				//document.getElementById("answer").innerHTML = curAge; 
				window.alert(curAge);
				
			}
		</script>

		<h1>Questionnaire</h1>
		<form id="questions" action="" onSubmit="">
			<fieldset>
				<ol id="">
					<li>
						Test:
						<input type="text" name="fname" value="Test"> 
					</li>
					<li>
						Age (greater than 1):
						<input type="number" name="age" min="1" id="age1">
					</li>
					<li>
						State:
						<select name="location" id="state">
							<option value="nsw">NSW</option>
							<option value="queensland">Queensland</option>
							<option value="southaustralia">South Australia</option>
						</select>
					</li>
					<li>
						<input type="submit" onclick="myFunction()" value="Submit">
						<input type="reset" onclick="myFunction()" value="Reset">
						<button onclick="myFunction()">Get Result</button>	
					</li>
				</ol>
			</fieldset>
		</form>
		
		<?php
		
			echo "HELLO";
		
			try{
			
				echo "hello";
				$details = displayData();
				echo $details;
			
			}catch(Exception $e) {
			
				echo 'Error';
			
			}
		
		?>

		<p id="answer"></p>	
	
	</body>

</html>