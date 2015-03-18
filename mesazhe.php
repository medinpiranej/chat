<?php
     session_start();
     if(!isset($_SESSION["chat_perd"]))header("location: hyr.php");
?>
<!DOCTYPE html>
<head>
	<title>chat</title>
	<link rel="stylesheet" href="css/css.css" type="text/css" media="all" />
    <script type="text/javascript" src="chat.js"></script>
</head>
<body align="middle"><h1><?php echo $_SESSION["chat_perd"][0]["emri"]." ".$_SESSION["chat_perd"][0]["mbiemri"]." ";  ?><a href="dil.php">Dilni !</a></h1>
	<div class="trupi">
		<div id="p_m"  class="chat">
			Po ngarkon ...
		<script type="text/javascript">intervali_aktiv=false;merr_bisedat();</script>
		</div>
		<div id="p_mes" align="left" class="chat">
			zgjidhni nje bisede
		</div>
	</div>
</body>