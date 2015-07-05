<?php

require_once('config/database.php');

?>
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
		<h1>Questionnaire</h1>
		
		<?php

			try{
			
				$count = 0;
				$car = 'false';
				$suicide = 'false';
				$respiratory = 'false';
				$circ = 'false';
				$lung = 'false';
				$breastcanc = 'false';
				$cere = 'false';
				$copd = 'false';
				$demen = 'false';
				//echo "hello";
				//$details = displayData();
				//echo '<tr><td>', $details['a0to4'], '</td></tr>';	
				/*
				if($_POST["age"] < 25) {
					
					echo "Less than 25";
					
				}else if($_POST["age"] >= 25 && $_POST["age"] < 50) {
					
					echo "greater than 25";
					
				}
*/
				//Risks
				if($_POST["drinkdrive"] == 'true') {
					
					$car = 'true';
					echo "You have risk of car accident<br>";
					++$count;
					
				}
				
				if(($_POST["stress"] == 'true' || $_POST["sociallife"] == 'false' || $_POST["depression"] == 'true') && $_POST["age"] < 50) {
					
					echo "You have risk of depression<br>";
					++$count;
					getPercentages($_POST["age"], 3);
					
				}
				
				if($_POST["smoke"] == 'true' || $_POST["asthma"] == 'true') {
					
					echo "You have risk of respiratory problems<br>";
					++$count;
					getPercentages($_POST["age"], 51);
					
				}
				
				if($_POST["diabetes"] == 'true' || $_POST["exercise"] == 'false' || $_POST["healthydiet"] == 'false' || $_POST["smoke"] == 'true' || 
				$_POST["alcohol"] == 'true' || $_POST["overweight"] == 'true' || $_POST["chronicdiseases"] == 'true') {
					
					echo "You have risk of circulatory disease<br>";
					++$count;
					getPercentages($_POST["age"], 50);
					
				}
				
				if($_POST["smoke"] == 'true') {
					
					echo "You have risk of lung cancer<br>";
					++$count;
					getPercentages($_POST["age"], 53);
					
				}
				
				if($_POST["breastcancer"] == 'false' && $_POST["age"] > 25) {
					
					echo "You have risk of breast cancer<br>";
					++$count;
					getPercentages($_POST["age"], 92);
					
				}
				
				if(($_POST["diabetes"] == 'true' || $_POST["exercise"] == 'false' || $_POST["healthydiet"] == 'false' || $_POST["smoke"] == 'true' || 
				$_POST["alcohol"] == 'true' || $_POST["overweight"] == 'true' || $_POST["chronicdiseases"] == 'true' || $_POST["cerebro"] == 'true')
				&& $_POST["age"] > 25) {
					
					echo "You have risk of cerebrovascular disease<br>";
					++$count;
					
				}
				
				if($_POST["smoke"] == 'true' && $_POST["age"] > 25) {
					
					echo "You have risk of COPD<br>";
					++$count;
					
				}
				
				if(($_POST["exercise"] == 'false' || $_POST["sociallife"] == 'false' || $_POST["healthydiet"] == 'false'
				|| $_POST["sleepingissues"] == 'true') && $_POST["age"] > 50) {
					
					echo "You have risk of dementia & alzheimer<br>";
					++$count;
					
				}
				
				//Recommendations
				if($_POST["exercise"] == 'false') {
					
					echo "You need to exercise more.<br>";
					++$count;
					
				}
				
				if($_POST["stress"] == 'true') {
					
					echo "You should research about emotional intelligence, how to control your emotions. There are breathing techniques.<br>";
					++$count;
					
				}
				
				if($_POST["sociallife"] == 'false') {
					
					echo "It is a good idea to attend more events to meet new people who share your interests. Try to talk to 2 new people you've never met everyday.<br>";
					++$count;
					
				}
				
				if($_POST["healthydiet"] == 'false') {
					
					echo "Make sure to eat 3 meals a day.<br>";
					++$count;
					
				}
				
				if($_POST["smoke"] == 'true') {
					
					echo "Smoking is not a healthy habit. Try to smoke less everyday, if you smoke 20 cigarettes a day then try to reduce that to 19 the next week and so on.<br>";
					++$count;
					
				}

				if($_POST["alcohol"] == 'true') {
					
					echo "You should control the amount of alchohol you take.<br>";
					++$count;
					
				}
				
				if($_POST["overweight"] == 'true') {
					
					echo "<br>";
					++$count;
					
				}
				
				if($_POST["drinkdrive"] == 'true') {
					
					echo "Don't drink and drive.<br>";
					++$count;
					
				}
				
				if($_POST["depression"] == 'true') {
					
					echo "Try to see a psychologist if you find your days get really tough.<br>";
					++$count;
					
				}
				
				//check if the user is healthy
				if($count == 0) {
					
					echo "You are perfectly healthy<br>";
					$count = 0;
					
				}
				
				
				
			}catch(Exception $e) {
			
				echo 'Error';
			
			}
		
		?>

		<p id="answer"></p>	
	
	</body>

</html>
