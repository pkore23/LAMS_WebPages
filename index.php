<?php
$server="localhost";
$user="root";
$passwd="";
$db="lams";
try{
	$conn= new PDO("mysql:host=$server;dbname=$db",$user,$passwd);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "Connection successfull</br>";
	$stmt = $conn->prepare("insert into user(userid,username,passwd) values (:uid,:uname,:passw)");
	$stmt->bindParam(':uid',$usrid);
	$stmt->bindParam(':uname',$usrnm);
	$stmt->bindParam(':passw',$pswd);
	
	$usrid="pkore23";
	$usrnm="Pradnesh";
	$pswd="1234";
	$stmt->execute();
	
	$usrid="sklkr";
	$usrnm="Shubham";
	$pswd="1234";
	$stmt->execute();
	
	$usrid="gkharay";
	$usrnm="Gaurav";
	$pswd="1234";
	$stmt->execute();
	
}
catch(PDOException $e){
	echo "Error: ".$e->getMessage();
}
?>