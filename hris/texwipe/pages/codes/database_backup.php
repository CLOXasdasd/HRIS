<?php
	date_default_timezone_set('Asia/Manila');
	
	$databases = ['purchase'];
	$user = "root";
	$pass = "";
	$host = "192.168.11.177";

	$path = "";
	
	if(!file_exists("C:/xampp/htdocs/injection/pages/codes/database")){
		mkdir("C:/xampp/htdocs/injection/pages/codes/database");
	}

	foreach($databases as $database){
		if(!file_exists("C:/xampp/htdocs/injection/pages/codes/database/$database")){
			mkdir("C:/xampp/htdocs/injection/pages/codes/database/$database");
		}

		try{
			$filename = $database."_".date("F_d_Y")."@".date("g_ia").uniqid("_",false);
			$folder ="C:/xampp/htdocs/injection/pages/codes/database/$database/" . $filename . ".sql";
			exec("C:/xampp/mysql/bin/mysqldump --user={$user} --password={$pass} --host={$host} {$database} --result-file={$folder}", $ouput);
		} catch(Exception $e) {
			print_r($e);
		}
	}

	print_r($ouput);
?>