<?php

/**
 * Connect to database
 */
function connect($file = 'config.ini') {
	// read database seetings from config file
    if ( !$settings = parse_ini_file($file, TRUE) )
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

function displayData() {

	$db = connect();
	
	try {
	
		$stmt = $db->prepare('SELECT * FROM mytable');
	
		$stmt->execute();
		$results = $stmt->fetch();
		$stmt->closeCursor();
	
	}catch(PDOException $e) {
	
		print "Error";
		die();
	
	}

	return $results;
	
}

?>