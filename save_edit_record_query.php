<?php
	require_once 'connect.php';
    $transaction_type = $_POST['transaction_type'];
    $amount = $_POST['amount'];
    $branch = 'Brikama';
		$conn->query("UPDATE `cc_table_record` SET `transaction_type` = '$transaction_type', `amount` = '$amount', `branch` = '$branch' WHERE `cc_id` = '$_REQUEST[record_id]'") or die(mysqli_error());
		echo '
			<script type = "text/javascript">
				alert("Successfully Edited");
				window.location = "dashboard.php";
			</script>
		';	