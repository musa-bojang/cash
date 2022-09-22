<?php
	require_once 'connect.php';
	$q_edit_student = $conn->query("SELECT * FROM `cc_table_record` WHERE `cc_id` = '$_GET[page]'") or die(mysqli_error());
	$f_edit_student = $q_edit_student->fetch_array();
?>
<form method = "POST" action = "save_edit_record_query.php?record_id=<?php echo $f_edit_student['cc_id']?>" enctype = "multipart/form-data">
	<div class  = "modal-body">
		<div class = "form-group">
			<label>Transaction Type</label>
			<input type = "text" name = "transaction_type" value = "<?php echo $f_edit_student['transaction_type']?>" required = "required" class = "form-control" />
		</div>
		<div class = "form-group">
			<label>Amount:</label>
			<input type = "numbers" name = "amount" value = "<?php echo $f_edit_student['amount']?>" required = "required" class = "form-control" />
		</div>
		<div class = "form-group">
			<label>Branch:</label>
			<input type = "text" name = "branch" value = "<?php echo $f_edit_student['branch']?>" placeholder = "(Optional)" class = "form-control" />
		</div>
		
		
	</div>
	<div class = "modal-footer">
		<button  class = "btn btn-warning"  name = "edit_admin"><span class = "glyphicon glyphicon-edit"></span> Save Changes</button>
	</div>
</form>	