<?php
    $localhost = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'cash';
	$conn = new mysqli($localhost, $username, $password, $dbname) or die(mysqli_error());
	// live server db = saldkndw_db_sars
    // $localhost = 'localhost';
    // $username = 'root';
    // $password = '';
    // $dbname = 'cash';
	// local db = db_sars