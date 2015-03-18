var intervali,biseda_int,intervali_aktiv;

function merr_bisedat(){
	var biseda,html,i;
	html="";
	i=0;
	 biseda=JSON.parse(httpGet("ngarko_bisede.php"));
	if(biseda[0][0]==undefined)html="nuk ka biseda ... dergo nje mesazh te ri....";
	 html+="<br><b>Biseda ...</b>";
	 while(biseda[i]!=undefined){
	 	html+="<div class='bisede' onclick='hap_bis("+biseda[i]["id"]+")' >"+biseda[i]["emri"]+" "+biseda[i]["mbiemri"]+"</div>";
	 	i++;
	 }
	 if(biseda[0][0]!=undefined)document.getElementById("p_m").innerHTML=html;
	
	console.log(biseda);
}
function hap_bis(bis){
	var biseda,html,i;
	biseda_int=bis;
	if(intervali_aktiv)clearInterval(intervali);
	intervali=setInterval(kontollo_per_mesazhe, 1500);
	intervali_aktiv=true;
	html="";
	i=0;
	 biseda=JSON.parse(httpGet("ngarko_bisede.php?bis="+bis));
	if(biseda[0][0]==undefined)html="nuk ka mesazhe ... dergo nje mesazh te ri....";
	html+="<div><textarea id='msg' onfocus='msg_aktive()' onblur='msg_joaktive()' placeholder='mesazh i iri ...'></textarea><input type='button' value='dergo !' onclick='(dergo_msg("+bis+"))'></div>";
	 while(biseda[i]!=undefined){
	 	html+="<div class='mesazh'><b>"+biseda[i]["emri"]+biseda[i]["mbiemri"]+"</b><br>"+biseda[i]["msg"]+"</div><br>";
	 	i++;
	 }
	 if(biseda[0][0]!=undefined)document.getElementById("p_mes").innerHTML=html;
	
	console.log(biseda);
}
function dergo_msg(bis){
	var pergjigje;
	
	pergjgje=JSON.parse(httpGet("dergo_msg.php?bis="+bis+"&msg="+document.getElementById("msg").value));
	
    
	console.log(pergjgje);
	
	hap_bis(bis);
}
function httpGet(Url){
    var xmlHttp = null;
    xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", Url, false );
    xmlHttp.send( null );
    return xmlHttp.responseText;
}
function kontollo_per_mesazhe(){
	hap_bis(biseda_int);
}
function msg_aktive(){
	if(intervali_aktiv)clearInterval(intervali);
	intervali_aktiv=false;
}
function msg_joaktive(){
	if(!intervali_aktiv)intervali=setInterval(kontollo_per_mesazhe, 1500);
	intervali_aktiv=true;
}
	