<?php 
	try {
		@$db= new PDO("mysql:host=localhost; dbname=otobus_rezervasyon;charset=utf8","root","");
		
	} catch (PDOException $e) {
		echo $e -> getMessage();
	}
 ?>
