<?php
	session_start();
	session_unset('admin_id');
	session_destroy();
	header('location:index.php');