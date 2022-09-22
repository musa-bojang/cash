<?php
	require_once 'connect.php';
	session_start();
	require_once 'account.php'; 
	$branch = $current_branch;

		$select_amount = $conn->query("SELECT amount FROM `cc_table_record` WHERE `cc_id` = '$_GET[page1]' ") or die(mysqli_error());
		$selected_amount = $select_amount->fetch_row();

		$wc_fetch = $conn->query("SELECT amount FROM `cc_working_capital` WHERE `branch` = '$current_branch' ") or die(mysqli_error());
		$wc_result = $wc_fetch->fetch_row();
           

		$added_amounted = $selected_amount [0] + $wc_result [0];
		$wc_query_update = "UPDATE `cc_working_capital` SET amount = '$added_amounted'
        WHERE branch = '$current_branch' ";
		$conn->query($wc_query_update) or die(mysqli_error());

	$conn->query("DELETE FROM `cc_table_record` WHERE `cc_id` = '$_GET[page1]'") or die(mysqli_error());
	header('location:dashboard.php');