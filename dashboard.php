<!DOCTYPE html>
<?php
	 require_once 'validator.php';
	 require_once 'account.php'; 
	if($current_user_role == 'admin'){
		header('location: authorized/index.php');
		
	}
?>
<html lang = "eng">
	<head>
		<title>Sal Digital Cash Control System</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link rel = "stylesheet" href = "css/bootstrap.css" />
		<link rel = "stylesheet" href = "css/jquery.dataTables.css" />
	</head>
	<body>
	<nav class = "navbar navbar-fixed-top" style="background:white">
			<div class = "container-fluid">
				<div class = "navbar-header">
					<img src = "images/alogosal.jpeg" width = "200px" height = "70px"/>
				</div>
				<ul class = "nav navbar-nav navbar-right">
					<li class = "dropdown">
						<a href = "#" class = "dropdown-toggle" data-toggle = "dropdown"><i class = "glyphicon glyphicon-user"></i> 
                        <?php echo htmlentities($admin_name)?> <b class = "caret"></b></a>
						<ul class = "dropdown-menu">
							<li><a href = "logout.php"><i class = "glyphicon glyphicon-off"></i> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
		<div class = "container-fluid" style = "margin-top:70px;">
        <ul class = "nav nav-pills">
				<li class = "active"><a href = "dashboard.php"><span class = "glyphicon glyphicon-home"></span> Dashboard</a></li>
				
				<li ><a href = "list_transaction.php"><span class = "glyphicon glyphicon-book"></span> All Transactions</a></li>
			</ul>
			<br />
			<?php 
                	$wc_fetch = $conn->query("SELECT amount FROM `cc_working_capital` WHERE branch = '$current_branch' ") or die(mysqli_error());
					$wc_result = $wc_fetch->fetch_row();
			?>
			<div class = "alert alert-info"> 
		  <?php 
		  if($current_user_role == 'user') {
			?>
			Current Balance for <?php echo $current_branch; ?>: <?php echo $wc_result[0]; ?>
			<?php
		  }		
		  ?>
		</div>
			<div class = "modal fade" id = "add_student" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
				<div class = "modal-dialog" role = "document">
					<div class = "modal-content panel-primary">
						<div class = "modal-header panel-heading">
							<button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close"><span aria-hidden = "true">&times;</span></button>
							<h4 class = "modal-title" id = "myModallabel">New Record Entry</h4>
						</div>
						
						<form method = "POST" action = "save_record_query.php" enctype = "multipart/form-data">
							<div class  = "modal-body">
								<div class = "form-group">
									<label>Transaction Type</label>
                                    <select name="transaction_type" required = "required" class = "form-control">
                                    <option value="MoneyGram">MoneyGram</option>
                                    <option value="RIA">RIA</option>
                                    <option value="Western Union">Western Union</option>
                                    <option value="Ecobank Deposit">Ecobank Deposit</option>
                                    <option value="Ecobank Withdrawal">Ecobank Withdrawal</option>
                                    <option value="Internal Transfer Received">Internal Transfer Received</option>
                                    <option value="Internal Transfer Paid Out">Internal Transfer Paid Out</option>
                                   
                                    <option value="Waves">Waves</option>
                                    <option value="FX selling">FX selling</option>
                                    <option value="FX Purchase">FX Purchase</option>
                                    <option value="Cash Power">Cash Power</option>
                                    <option value="Pay Bills"> Pay Bills</option>
                                    <option value="Receiving">Receiving</option>
                                    <option value="Sending">Sending</option>
                                    <option value="Airtime">Airtime</option>
                                    <option value="Expenses">Expenses</option>
                                    </select>
								</div>
								<div class = "form-group">
									<label>Amount</label>
									<input type = "number" name = "amount" required = "required" class = "form-control" />
								</div>
								
							</div>
							<div class = "modal-footer">
								<button  class = "btn btn-primary" name = "save"><span class = "glyphicon glyphicon-save"></span> Save</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class = "modal fade" id = "add_working_capital" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
				<div class = "modal-dialog" role = "document">
					<div class = "modal-content panel-primary">
						<div class = "modal-header panel-heading">
							<button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close"><span aria-hidden = "true">&times;</span></button>
							<h4 class = "modal-title" id = "myModallabel">Update Working Capital</h4>
						</div>
						
						<form method = "POST" action = "save_wc_query.php" enctype = "multipart/form-data">
							<div class  = "modal-body">
								<div class = "form-group">
									<label>Select Branch</label>
                                    <select name="branch_name" required = "required" class = "form-control">
                                    <option value="Tranquil">Tranquil</option>
                                    <option value="Sukuta">Sukuta</option>
                                    <option value="Brikama">Brikama</option>
                                    <option value="Sanyang">Sanyang</option>
                                    
                                    </select>
								</div>
								<div class = "form-group">
									<label>Amount</label>
									<input type = "number" name = "wc_amount" required = "required" class = "form-control" />
								</div>
								
							</div>
							<div class = "modal-footer">
								<button  class = "btn btn-primary" name = "wc_save"><span class = "glyphicon glyphicon-save"></span> Save</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class = "modal fade" id = "delete" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
				<div class = "modal-dialog" role = "document">
					<div class = "modal-content ">
						<div class = "modal-body">
							<center><label class = "text-danger">Are you sure you want to delete this record?</label></center>
							<br />
							<center><a class = "btn btn-danger remove_id" ><span class = "glyphicon glyphicon-trash"></span> Yes</a> <button type = "button" class = "btn btn-warning" data-dismiss = "modal" aria-label = "No"><span class = "glyphicon glyphicon-remove"></span> No</button></center>
						</div>
					</div>
				</div>
			</div>
			<div class = "modal fade" id = "edit_record" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
				<div class = "modal-dialog" role = "document">
					<div class = "modal-content panel-warning">
						<div class = "modal-header panel-heading">
							<button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close"><span aria-hidden = "true">&times;</span></button>
							<h4 class = "modal-title" id = "myModallabel">Edit Record</h4>
						</div>
						<div id = "edit_query"></div>
					</div>
				</div>
			</div>
			<div class = "well col-lg-12">
				<button class = "btn btn-success" type = "button" href = "#" data-toggle = "modal" data-target = "#add_student">
					<span class = "glyphicon glyphicon-plus"></span> Add new </button>
					<?php 
					if($current_user_role == 'user') {
						?>
						<button class = "btn btn-success" type = "button" href = "#" data-toggle = "modal" data-target = "#add_working_capital">
						<span class = "glyphicon glyphicon-plus"></span> Update WC </button>
						<?php
					}
					?>
					
				<br />
				<br />
				<!-- display table for branches -->
				<?php
                  if($current_user_role == 'user'){
					?>
				<table id = "table" class = "table table-bordered">
					<thead class = "alert-info">
						<tr>
							<th>Transaction_type</th>
							<th>Amount</th>
							<th>Branch</th>
							<th>Date</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$q_records = $conn->query("SELECT * FROM `cc_table_record` WHERE branch = '$current_branch' ORDER BY date DESC LIMIT 5") or die(mysqli_error());
							while($f_record = $q_records->fetch_array()){
						?>
						<tr>
							<td><?php echo $f_record['transaction_type']?></td>
							<td><?php echo $f_record['amount']?></td>
							<td><?php echo $f_record['branch']?></td>
							<td><?php echo $f_record['date']?></td>
							<td><a class = "btn btn-danger remove_record_id" 
                            name = "<?php echo $f_record['cc_id']?>" href = "delete_record.php?page1=<?php echo $f_record['cc_id']?>" 
                            data-toggle = "modal" data-target = "">
                            <span class = "glyphicon glyphicon-remove"></span>
                        </a> <a class = "btn btn-warning  edi_record_id" 
                        name = "<?php echo $f_record['cc_id']?>" href = "load_record_edit.php?page=<?php echo $f_record['cc_id']?>" data-toggle = "modal" data-target = "#edit_record">
                        <span class = "glyphicon glyphicon-edit"></span></a></td>
						</tr>
						<?php
							}
						?>
					</tbody>
				</table>
					<?php
				  }
				?>

				
			</div>
			<br />
			<br />	
			<br />	
		</div>
		<br>
		<div class = "navbar  ">
			<div class = "container-fluid">
				<label class = "pull-left">&copy; Sal Digital Attendance Record System 2022</label>
				<label class = "pull-right">Developed By IT department</a></label>
			</div>	
		</div>	
	</body>
	<script src = "js/jquery.js"></script>
	<script src = "js/bootstrap.js"></script>
	<script src = "js/jquery.dataTables.js"></script>
	
	<script type = "text/javascript">
		$(document).ready(function(){
			$('#table').DataTable();
		});
	</script>
	<script type = "text/javascript">
		$(document).ready(function(){
			
			$('.remove_record_id').click(function(){
				$cc_id = $(this).attr('name');
				$('.remove_id').click(function(){
					window.location = 'delete_record.php?cc_id=' + $cc_id;
				});
			});
			$('.edi_record_id').click(function(){
				$cc_id = $(this).attr('name');
				$('#edit_query').load('load_record_edit.php?cc_id=' + $cc_id);
			});
		});
	</script>
</html>