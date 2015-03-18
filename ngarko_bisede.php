<?php
     session_start();
	 if(isset($_SESSION["chat_perd"])){
	 	 $perd=$_SESSION["chat_perd"];
		 try{
		 $lidhja = new PDO("mysql:host=localhost;dbname=jeta.al", "root", "");

         if(!isset($_GET["bis"])){
         $res = $lidhja->prepare("SELECT `".$perd[0]["id"]."mesazhe`.id,emri,mbiemri,upa,biseda,f_profili FROM `".$perd[0]["id"]."mesazhe` join perdorues on perdorues.id=perd2");
	     $res->execute();
	     $biseda=$res->FetchAll();
		 
		 if(!empty($biseda))echo json_encode($biseda);
	     else echo json_encode(array(-11));
		 }else{
		 $res = $lidhja->prepare("select biseda from `".$perd[0]["id"]."mesazhe` where id=".$_GET["bis"]);
	     $res->execute();
	     $biseda=$res->FetchAll();
		 if(!empty($biseda)){
		       $res = $lidhja->prepare("select emri,mbiemri,f_profili,data,derguesi,msg from `{$biseda[0]["biseda"]}` join perdorues on perdorues.id=derguesi order by `{$biseda[0]["biseda"]}`.id desc ");
	           $res->execute();
	           $mesazhe=$res->FetchAll();
			   if(!empty($mesazhe))echo json_encode($mesazhe);
	           else echo json_encode(array(-1,"bosh"));		
		 }
	     else echo json_encode(array("boshbiseda","select biseda from ".$perd[0]["id"]."mesazhe where id=".$_GET["bis"]));	
		}
		}catch(exception $ex){
			echo "gabim ne lidhje ".$ex;
		}
	}
	 else echo json_encode(array(-1));
 ?>