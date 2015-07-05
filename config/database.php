<?php

/**
 * Connect to database
 */
function connect($file = 'config.ini') {
	// read database seetings from config file
    if ( !$settings = parse_ini_file($file, Yes) )
        throw new exception('Unable to open ' . $file);

    // parse contents of config.ini
    $dns = $settings['database']['driver'] . ':' .
            'host=' . $settings['database']['host'] .
            ((!empty($settings['database']['port'])) ? (';port=' . $settings['database']['port']) : '') .
            ';dbname=' . $settings['database']['schema'];
    $user= $settings['db_user']['username'];
    $pw  = $settings['db_user']['password'];

	// create new database connection
    try {
        $dbh=new PDO($dns, $user, $pw);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        print "Error Connecting to Database: " . $e->getMessage() . "<br/>";
        die();
    }
    return $dbh; 	
}

/** Returns the query */
function display($ident) {

	$db = connect();
	
	try {
	
		$stmt = $db->prepare('SELECT * FROM mytable WHERE id=:ident');
		$stmt->bindValue(':ident', $ident, PDO::PARAM_INT);
		$stmt->execute();
		$results = $stmt->fetch();
		$stmt->closeCursor();
	
	}catch(PDOException $e) {
	
		print "Error";
		die();
	
	}

	return $results;
	
}

/** return the % for the disease */
function getPercentages($age, $ident) {
    
    $details = display($ident);
	echo "Percentages at your age: <br>";
	if($age <= 4) {
						
		echo '0-4 ',$details['a0to4'], '<br>';	
						
	}else if($age <= 9) {
						
		echo '5-9 ', $details['a5to9'], '<br>';
						
	}else if($age <= 14) {
						
		echo '10-14 ', $details['a10to14'], '<br>';
						
	}else if($age <= 19) {
						
		echo '15-19 ', $details['a15to19'], '<br>'; 
						
	}else if($age <= 24) {
						
		echo '20-24 ', $details['a20to24'], '<br>';
						
	}else if($age <= 29) {
						
		echo '25-29 ', $details['a25to29'], '<br>';
						
	}else if($age <= 34) {
						
		echo '30-34 ', $details['a30to34'], '<br>';
						
	}else if($age <= 39) {
						
		echo '35-39 ', $details['a35to39'], '<br>';
						
	}else if($age <= 44) {
						
		echo '40-44 ', $details['a40to44'], '<br>';
						
	}else if($age <= 49) {
						
		echo '45-49 ', $details['a45to49'], '<br>';
						
	}else if($age <= 54) {
						
		echo '50-54 ', $details['a50to54'], '<br>';
						
	}else if($age <= 59) {
						
		echo '55-59 ', $details['a55to59'], '<br>';
						
	}else if($age <= 64) {
						
		echo '60-64 ', $details['a60to64'], '<br>';
						
	}else if($age <= 69) {
						
		echo '65-69 ', $details['a65to69'], '<br>';
						
	}else if($age <= 74) {
						
		echo '70-74 ', $details['a70to74'], '<br>';
						
	}else if($age <= 79) {
						
		echo '75-79 ', $details['a75to79'], '<br>';
						
	}else if($age <= 84) {
						
		echo '80-84 ', $details['a80to84'], '<br>';
						
	}else if($age >= 85) {
						
		echo '85+ ', $details['a85+'], '<br>';
						
	}
    
}

?>