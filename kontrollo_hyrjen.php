<?php
if(isset($_POST["login_email"])&&isset($_POST["login_pass"])){
$email=$_POST["login_email"];
$pass=$_POST["login_pass"];
if(($email!="")&&($pass!="")){
	
	try 
    {
    $lidhja = new PDO("mysql:host=$localhost;dbname=jeta.al", "root", "");

    $res = $lidhja->prepare("select * from perdorues where email='{$email}'");
	$res->execute();
	
    $perdorues=$res->FetchAll();
    if (empty($perdorues))header("Location: hyr.php?gab=true&paemail=1");
	    
		if($perdorues[0]["pas"]==$pass){
			session_start();
			$_SESSION["chat_perd"]=$perdorues;
			header("Location: mesazhe.php");
		}else header("Location: login.php?gab=true");


    $lidhjar = null;
}
catch(PDOException $e)
{
    echo $e->getMessage();
		header("Location: login.php?gab=true");
}
	   
	 
	

	
}else header("Location: login.php");
}else header("Location: login.php");

?>