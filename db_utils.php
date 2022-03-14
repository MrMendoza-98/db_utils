<?php
#Include the database connection
require_once("config_connection.php";

function query_select($sql, $data){
    global $pdo;
	$stmt = null;
	// Make the query
	try {
		// Prepare the SQL statement
		$stmt = $pdo->prepare($sql);
	}
	// Catch any exceptions/errors
	catch (Exception $e) {
		return false;
	}
	// Execute the statement
	try {
		if ($stmt->execute($data)) {
			// Return the selected data as an assoc array
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		else {
			return false;
		}
	}
	catch (Exception $e) {
		return false;
	}
}

function query_insert($sql, $data){
    global $pdo;
	$stmt = null;
	// Make the query
	try {
		// Prepare the SQL statement
		$stmt = $pdo->prepare($sql);
	}
	// Catch any exceptions/errors
	catch (Exception $e) {
		return false;
	}
	// Execute the statement
	try {
		if ($stmt->execute($data)) {
			// Return the number of rows affected
			return $stmt->rowCount();
		}
		else {
			return false;
		}
	}
	catch (Exception $e) {
		return false;
	}
}

function query_update(){
    return db_insert($sql, $data);
}

function query_delete(){
    return db_insert($sql, $data);
}

function db_last_insert_id() {
	global $pdo;
	return $pdo->lastInsertId();
}
?>