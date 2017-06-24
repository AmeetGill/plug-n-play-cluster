 
$job_id = $data["job_id"];
$task_id = $data["task_id"];

$sql = "update tasks set status =2 where job_id=".$job_id.", task_id=".$task_id;
update($sql);

$sql = "update workers set status =0 where worker_ip= '".$_SERVER['REMOTE_ADDR']."'";
update($sql);


