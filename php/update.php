<?php

header('Content-Type:application/json');

try {

	// include database setup
	include('db_init.php');

	// enter the submitted data into the database
	$sql = "UPDATE `my_awesome_todo_list` SET `todo` = :todo WHERE `iid` = :id";
	// bind the params
	$statement = $db->prepare( $sql );
	$statement->bindParam( ':id', $_POST['id'] );
	$statement->bindParam( ':todo', $_POST['text'] );
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


