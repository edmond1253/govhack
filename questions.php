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
		<section class="call-to-action">
			<div class="col-md-8 col-md-offset-2 text-center wow animated fadeInUp">
				<h1 class="heading white top-fit center">Questionnaire</h1>
			</div>
		</section>
		
		<?php

			try{
			
				$count = 0;
				/*
				echo "BMI Calculator: ";
				$height = $_POST["height"];
				$weight = $_POST["weight"];
				$bmi = 0;
				$bmi = $mass / ($height * $height);
				echo $bmi;
				if($bmi > 0 && $bmi < 18.5) {
					
					echo "Underweight<br>";
					
				}else if($bmi < 22.9) {
					
					echo "Normal<br>";
					
				}else if($bmi < 24.9) {
					
					echo "Overweight - Low Risk<br>";
					
				}else if($bmi < 29.9) {
					
					echo "Overweight - Moderate Risk<br>";
					
				}else if($bmi >= 30) {
					
					echo "Overweight - High Risk<br>";
					
				}
				*/
			
				//Risks
				if($_POST["drinkdrive"] == 'true') {
					
					$car = 'true';
					echo "Your recent behavior indicates that you may get into a car accident if you keep driving while under the influence of alcohol.<br>";
					++$count;
					
				}
				
				if(( ($_POST["stress"] == 'true' && $_POST["sociallife"] == 'false') || ($_POST["stress"] = 'true' && $_POST["depression"] == 'true') ||
				($_POST["sociallife"] == 'false' && $_POST["depression"] == 'true')) && $_POST["age"] < 50) {
					
					echo "Based on your answers to this questionnaire, it appears that you have had or are having issues with stress or social relationships.<br>";
					++$count;
					
					
				}
				
				if(($_POST["smoke"] == 'true' && $_POST["asthma"] == 'true')&& $_POST["age"] > 25) {
					
					echo "Your asthmatic condition combined to being a smoker could create a potential risk of <a href ='http://www.aihw.gov.au/copd/'>Chronic Obstructive Pulmonary Disease. </a><br>";
					++$count;
					
				}
				
				else if($_POST["smoke"] == 'true' && $_POST["asthma"] == 'false') {
					echo "Your smoking habits create a potential risk of <a href ='http://www.aihw.gov.au/copd/'>Chronic Obstructive Pulmonary Disease. </a><br>";
					
				}
				
				else if($_POST["smoke"] == 'false' && $_POST["asthma"] == 'true') {
					echo "Your asthmatic condition could create a potential risk of <a href ='http://www.aihw.gov.au/copd/'>Chronic Obstructive Pulmonary Disease. </a><br>";
				}
				
				if($_POST["diabetes"] == 'true' || $_POST["exercise"] == 'false' || $_POST["healthydiet"] == 'false' || $_POST["smoke"] == 'true' || 
				$_POST["alcohol"] == 'true' || $_POST["overweight"] == 'true' || $_POST["chronicdiseases"] == 'true') {
					
					echo "Either your condition or your behavioral habits put you at risk for circulatory dieases. Circulatory diseases represent the first cause of death in Australia. If you want more to get more information about circulatory diseases, you should visit the <a href=http://www.heartfoundation.org.au/>Heart Foundation website. </a> <br>";
					++$count;
				
					
				}
				
				if($_POST["smoke"] == 'true') {
					
					echo "Smoking increases significantly your risks of Lung Cancer. Studies show that 80% to 90% of lung cancers can be linked to smoking. You can find more information about lung cancer on the <a href =http://lungfoundation.com.au/> Lung Foundation. </a> <br>";
					++$count;
				
					
				}
				
				if($_POST["breastcancer"] == 'false' && $_POST["age"] > 25) {
					
					echo "You have risk of breast cancer. We advise you to check with your doctor if you are at risk or not.<br>";
					++$count;
					
					
				}
				
				if(($_POST["diabetes"] == 'true' || $_POST["exercise"] == 'false' || $_POST["healthydiet"] == 'false' || $_POST["smoke"] == 'true' || 
				$_POST["alcohol"] == 'true' || $_POST["overweight"] == 'true' || $_POST["chronicdiseases"] == 'true' || $_POST["cerebro"] == 'true')
				&& $_POST["age"] > 25) {
					
					echo "You have risk of cerebrovascular disease. This risk is influenced by cigarette, alcohol, unhealthy food, sedentarity or chronic disease.<br>";
					++$count;
					
				}
				
				
				if(($_POST["exercise"] == 'false' || $_POST["sociallife"] == 'false' || $_POST["healthydiet"] == 'false'
				|| $_POST["sleepingissues"] == 'true') && $_POST["age"] > 50) {
					
					echo "You have risk to develop mental diseases such as dementia and alzheimer in the future. These diseases mainly concern the elderly population, but the factors that lead to it can be a lack of exercise, a bad alimentation or too few social interactions.<br>";
					++$count;
					
				}
				
				//Recommendations
				if($_POST["exercise"] == 'false') {
					
					echo "The recommendation is to exercise for 30 minutes 3 times a week. If you don't have time or motivation to do exercise, you can improve your health with easy habits such as taking the stairs instead of the elevator or walk instead of taking car for short distances.<br>";
					++$count;
					
				}
				
				if( ($_POST["stress"] == 'true' && $_POST["sociallife"] == 'false') || ($_POST["stress"] = 'true' && $_POST["depression"] == 'true') ||
				($_POST["sociallife"] == 'false' && $_POST["depression"] == 'true') == 'true') {
					
					echo "If you want to talk to someone about any social relationships issues, you can find interesting numbers to dial on this <a href='http://www.safetyandquality.gov.au/wp-content/uploads/2012/05/Suicide_Prevention_Crisis_Contacts.pdf'>Safety Prevention Crisis Contact page</a><br>";
					++$count;
					
				}
				
				if($_POST["healthydiet"] == 'false') {
					
					echo "Make sure to eat 5 fruit and vegetable per day. If you want to get information on how to stick to this guideline in easy and cheap ways, check out this <a href='http://www.gofor2and5.com.au/'> website </a><br>";
					++$count;
					
				}
				
				if($_POST["smoke"] == 'true') {
					
					echo "Smoking is a very unhealthy habit. If you're trying to stop, this <a href='http://www.alcohol.gov.au/'>website </a> may help you. <br>";
					++$count;
					
				}

				if($_POST["alcohol"] == 'true') {
					
					echo "You should control the amount of alchohol you take. If you find out that it is complicated to live without alcohol or that you want to have information about it, go to this <a 'href=http://www.alcohol.gov.au/'> website. </a><br>";
					++$count;
					
				}
				
				if($_POST["drinkdrive"] == 'true') {
					
					echo "Drinking and driving is one of the major causes of death in car accident. Please keep you and your fellow citizens safe. If you want to know more about how to avoid this situation in the future, you can consult <a href=http://www.whatsyourplanb.net.au/>this webpage</a>.<br>";
					++$count;
					
				}
				
				
				//check if the user is healthy
				if($count == 0) {
					
					echo "<h2 class='heading wow animated fadeInUp'>You are perfectly healthy<br></h2>";
					$count = 0;
					
				}
				
				
				
			}catch(Exception $e) {
			
				echo 'Error';
			
			}
		
		?>

		<p id="answer"></p>	
	
	</body>

</html>
