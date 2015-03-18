<?php
     session_start();
	 if(isset($_SESSION["chat_perd"]))header("location: mesazhe.php");
	 else header("location: hyr.php");

?>