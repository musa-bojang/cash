    <?php
	require_once 'connect.php';
	if(ISSET($_POST['wc_save'])){
        $branch_name = $_POST['branch_name'];
		$amount = $_POST['wc_amount'];
        $added_by = 'Musa';
        // $transc_query_insert = "INSERT INTO `cc_working_capital` (branch, amount, added_by)
        //  VALUES ('$branch_name', $amount, '$added_by')";
        $transc_query_insert = "UPDATE `cc_working_capital` SET branch ='$branch_name', amount = '$amount', added_by = '$added_by'
        WHERE branch = '$branch_name' ";
		$conn->query($transc_query_insert) or die(mysqli_error());
			echo '
				<script type = "text/javascript">
					alert("Saved Record");
					window.location = "dashboard.php";
				</script>
			';
	}	