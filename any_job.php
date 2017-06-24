
<?php
	require_once("db.php");
	function any_job(){
		$sql = "select task_id,job_id from tasks where task_id=(select Min(task_id) from tasks where status = 0 )";
		$ready_jobs = query($sql);
		if(count($ready_jobs)!=0)
		{
			return $ready_jobs;	
		}
		else
		{
			return null;
		}
	}
?>
