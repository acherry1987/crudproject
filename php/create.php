<?php

header('Content-Type:application/json');

try {

	// include database setup
	include('db_init.php');

	// create a new table
	$sql = "CREATE TABLE IF NOT EXISTS `my_awesome_todo_list` (
		`iid` INT NOT NULL AUTO_INCREMENT,
		`todo` VARCHAR(255) NOT NULL,
		PRIMARY KEY (`iid`)
	) ENGINE = InnoDB;";
	// execute the create statement
	$result = $db->exec( $sql );

	// enter the submitted data into the database
	$sql = "INSERT INTO `my_awesome_todo_list`
		(`todo`) VALUES ( :todo );";
	// bind the params
	$statement = $db->prepare( $sql );
	$statement->bindParam( ':todo', $_POST['todo'] );
	// execute that statement
	$statement->execute();


	// as long as evertying is okay...
	// output
	$retval['message'] = 'success';

} catch( PDOException $err ) {
	$retval['message'] = 'error';
	$retval['data'] = $err->getMessage();
}

echo json_encode( $retval );


