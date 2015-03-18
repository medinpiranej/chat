<?php
     session_start();
	 if(isset($_SESSION["chat_perd"])){
	 	 $perd=$_SESSION["chat_perd"];
		 try{
		 $lidhja = new PDO("mysql:host=localhost;dbname=jeta.al", "root", "");

         if((isset($_GET["bis"]))&&(isset($_GET["msg"]))){
         $res = $lidhja->prepare("select biseda from `".$perd[0]["id"]."mesazhe` where id=".$_GET["bis"]);
	     $res->execute();
	     $biseda=$res->FetchAll();
		 if(!empty($biseda)){
		       $res = $lidhja->prepare("insert into `{$biseda[0]["biseda"]}` (derguesi,data,msg) values ({$perd[0]["id"]},CURRENT_TIME,'{$_GET["msg"]}') ");
	           $res->execute();
	           $mesazhe=$res->FetchAll();
			   if(!empty($mesazhe))echo json_encode($mesazhe);
	           else echo json_encode(array(-1,"bosh"));		
		 }
		 
		 
		 }else echo json_encode(array(-1));
		}catch(exception $ex){
			echo "gabim ne lidhje ".$ex;
		}
	}
	 else echo json_encode(array(-1));
 ?>