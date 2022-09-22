<!DOCTYPE html>
<?php
	require_once 'validator.php';
    require_once 'account.php'; 
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
				<li><a href = "dashboard.php"><span class = "glyphicon glyphicon-home"></span> Dashboard</a></li>
				
				<li class = "active"><a href = "list_transaction.php"><span class = "glyphicon glyphicon-book"></span> All Transactions</a></li>
			</ul>
			<br />
			
			<div class = "well col-lg-12">
				<table id = "table" class = "table table-bordered">
					<thead class = "alert-info">
						<tr>
							<th>Transaction Type</th>
							<th>Amount</th>
							<th>Branch</th>
							<th>Date</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$q_time = $conn->query("SELECT * FROM `cc_table_record`") or die(mysqli_error());
						while($f_time = $q_time->fetch_array()){
							
					?>	
						<tr>
							<td><?php echo $f_time['transaction_type']?></td>
                            <td><?php echo $f_time['amount']?></td>
                            <td><?php echo $f_time['branch']?></td>
                            <td><?php echo $f_time['date']?></td>
							
						</tr>
					<?php
						}
					?>	
					</tbody>
				</table>
			<br />
			<br />	
			<br />	
			</div>
		</div>
		<div class = "navbar navbar-fixed-bottom ">
		<div class = "container-fluid">
				<label class = "pull-left">&copy; Sal Digital Attendance Record System 2022</label>
				<label class = "pull-right">Developed By Sal Digital IT Department</a></label>
			</div>	
		</div>	
	</body>
	<script src = "js/jquery.js"></script>
	<script src = "js/bootstrap.js"></script>
	<script src = "js/jquery.dataTables.js"></script>
	<script type = "text/javascript">
		$(document).ready(function(){
			$('#table').DataTable(
        
			);
			
		});
		
	</script>
	<script type = "text/javascript">
		$(document).ready(function(){
			$('.rtime_id').click(function(){
				$time_id = $(this).attr('name');
				$('.remove_id').click(function(){
					window.location = 'delete_time.php?time_id=' + $time_id;
				});
			});
		});
	</script>
</html>