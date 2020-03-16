<?php
	//LOCALHOST DB
	$dbhost = "localhost";
	$dbname = "gmadb";
	$dbuser = "root";
	$dbpass = '';
	try{
		$db = new PDO("mysql:dbhost=$dbhost;dbname=$dbname", "$dbuser", "$dbpass");
	}catch(PDOException $e){
		echo $e->getMessage();
	}

	//SERVER DB
	/*
		$dbhost = "sql301.epizy.com";
		$dbname = "epiz_25226961_GMADB";
		$dbuser = "epiz_25226961";
		$dbpass = "eU0gkLTYkHiyU1N";
		try{
			$db = new PDO("mysql:host=$dbhost;port=3306;dbname=$dbname", "$dbuser", "$dbpass");
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	*/
?>
