<?php
include("db.php");
include("any_process.php");

try {
	$sql = "update workers set last_ping = now() where worker_ip = '".$_SERVER['REMOTE_ADDR']."'";
	update($sql);

	$any_free_task = any_job();
	if($any_free_task != null)
	{
	    $dir = "jobs/".$any_free_task[0]["job_id"];
	    $worker_status_update = "update workers set status = 1 where worker_ip = '".$_SERVER['REMOTE_ADDR']."'";
            $task_status_update = "update tasks set status = 1 where task_id =".$any_free_task[0]["task_id"];
	    $js_file = query("select process_func_file from jobs where = ".$any_free_task[0]["job_id"])[0]["process_func_file"];
	    header($_SERVER["SERVER_PROTOCOL"] . " 200 OK");
            header("Cache-Control: public"); 
            header("Content-Type: application/zip");
            header("Content-Transfer-Encoding: Binary");
            header("Content-Length:".filesize($attachment_location));
            header("Content-Disposition: attachment; filename=file.zip");
	    readfile($dir.$any_free_task[0]["task_id"]);
	    readfile();
            readfile($dir.$any_free_task[0]["job_id"]);
            die();        
        } 
	else 
	{
            die("Error: File not found.");
        } 


            
} catch(Exception $e) {
	#echo "ERROR in updating last_ping time";
}
?>


