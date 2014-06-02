<?php
if(isset($_GET[idmar])&&isset($_GET[idus])&&isset($_GET[idber])&&isset($_GET[bot])&&isset($_GET[tin]))
{
	$marketid=$_GET[idmar];
	$user=$_GET[idus];
	$beer=$_GET[idber];
	$bottle=$_GET[bot];
	$tins=$_GET[tin];
}
else
{
	exit;
}
$link=mysql_connect("localhost","kraktumz_mybeer","mypassword");
mysql_select_db("kraktumz_mybeer") or die(mysql_error());
$char=mysql_set_charset("utf8");
if($beer==1)
{
	$date=date("Y-m-d H:m");
	$mess="INSERT INTO `orders`(`IDMARKET`, `IDUSER`, `DATE`, `IDORDER`, `BOTTLE1`, `BOTTLE2`, `BOTTLE3`, `BOTTLE4`, `BOTTLE5`, `BOTTLE6`, `BOTTLE7`, `BOTTLE8`, `BOTTLE9`, `BOTTLE10`, `BOTTLE11`, `BOTTLE12`, `BOTTLE13`, `BOTTLE14`, `BOTTLE15`, `TIN1`, `TIN2`, `TIN3`, `TIN4`, `TIN5`, `TIN6`, `TIN7`, `TIN8`, `TIN9`, `TIN10`, `TIN11`, `TIN12`, `TIN13`, `TIN14`, `TIN15`) VALUES ($marketid,$user,'$date',0,$bottle,0,0,0,0,0,0,0,0,0,0,0,0,0,0,$tins,0,0,0,0,0,0,0,0,0,0,0,0,0,0)";
	$qest=mysql_query($mess);
	$q=mysql_insert_id();
	echo $q;


	//тут мы апдейтим остаток
	$mess = 'UPDATE national_beer SET BOTTLE_STOCK = BOTTLE_STOCK - '.$bottle.' WHERE ID = 1';
	$qest=mysql_query($mess);



	$mess = 'UPDATE national_beer SET TIN_STOCK = TIN_STOCK - '.$tins.' WHERE ID = 1';
	$qest=mysql_query($mess);



}
mysql_close($link);
?>