<?php
	require_once 'connect.php';
	session_start();
	require_once 'account.php'; 
	if(ISSET($_POST['save'])){
        $transcation_tye = $_POST['transaction_type'];
		$amount = $_POST['amount'];
        $branch = $current_branch;
		$wc_fetch = $conn->query("SELECT amount FROM `cc_working_capital` WHERE branch = '$current_branch' ") or die(mysqli_error());
		$wc_result = $wc_fetch->fetch_row();
		
   if($amount <= $wc_result[0]){
	$wc_number_value = intval($wc_result[0]);
	$wc_balance = $wc_number_value - $amount;
    $added_by = $admin_name;
	$wc_query_update = "UPDATE `cc_working_capital` SET branch ='$current_branch', amount = '$wc_balance', added_by = '$added_by'
        WHERE branch = '$current_branch' ";
		$conn->query($wc_query_update) or die(mysqli_error());

	$transc_query_insert = "INSERT INTO `cc_table_record` (transaction_type, amount, branch) VALUES ('$transcation_tye', $amount, '$branch')";
	$conn->query($transc_query_insert) or die(mysqli_error());
		echo '
			<script type = "text/javascript">
				alert("Saved Record");
				window.location = "dashboard.php";
			</script>
		';
   }else {
	echo '
	<script type = "text/javascript">
		alert("You cannot perform this transaction. Contact Lamin");
		window.location = "dashboard.php";
	</script>';
   }
       
	}	
	