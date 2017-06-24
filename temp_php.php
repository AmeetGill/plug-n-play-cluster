<?php
	include("db.php");
	print_r(query("select task_id,job_id from tasks"));
?>
