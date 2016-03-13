<?php

header('Content-Type:application/json');

try {

	// include database setup
	include('db_init.php');

	// enter the submitted data into the database
	$sql = "UPDATE `movies` SET `watched` = :watched , `rating` = :rating, `recommended` = :recommended WHERE `name` = :name;";
	// bind the params
	$statement = $db->prepare( $sql );
	$statement->bindParam( ':name', $_POST['name'] );
	$statement->bindParam( ':watched', $_POST['watched'] );
	$statement->bindParam( ':recommended', $_POST['recommended'] );
	$statement->bindParam( ':rating', $_POST['rating'] );
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


