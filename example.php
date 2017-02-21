<?php
include('./CheckerURL.php');
$url="";
	if(isset($_GET["url"])){
		
		$url=trim($_GET["url"]);
		
		}else{
		
		exit();
	}	
$urllink=new CheckerURL();
$urllink->SetUrl($url);
echo $urllink->urlchecker();
?>
