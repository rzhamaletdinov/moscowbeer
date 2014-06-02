<?php
$marketid=NULL;
$user=NULL;
$beer=NULL;
$bottle=NULL;
$tins=NULL;
if(isset($_GET[frid])&&isset($_GET[idmar])&&isset($_GET[idus])&&isset($_GET[idber])&&isset($_GET[bot])&&isset($_GET[tin]))
{
	$marketid=$_GET[idmar];
	$user=$_GET[idus];
	$beer=$_GET[idber];
	$bottle=$_GET[bot];
	$tins=$_GET[tin];
	$froz=$_GET[frid];
}
else
{
	echo "Not today";
	exit(1);
}
$link=mysql_connect("localhost","kraktumz_mybeer","mypassword");
mysql_select_db("kraktumz_mybeer") or die(mysql_error());
$char=mysql_set_charset("utf8");
$mess = "UPDATE station$marketid SET BOTTLE=$bottle, TIN=$tins WHERE ID=$beer";
echo $mess;
$qest=mysql_query($mess);
if($beer==15)
{
	$mess="UPDATE stock SET FRIGE = $froz WHERE ID=$marketid";
	$qest=mysql_query($mess);
	if($user==170791)
	{
		$strSQL="UPDATE stock SET AGENT = 'Александров Д.А.' WHERE ID=$marketid";
		$qest = mysql_query($strSQL);
	}
	if($user==179119)
	{
		$strSQL="UPDATE stock SET AGENT = 'Анисимов Д.А.' WHERE ID=$marketid";
		$qest = mysql_query($strSQL);
	}
	if($user==154770)
	{
		$strSQL="UPDATE stock SET AGENT = 'Арсенин А. В.' WHERE ID=$marketid";
		$qest = mysql_query($strSQL);
	}
	// if($user==154353)
	// {
	// 	$strSQL="UPDATE stock SET AGENT = 'Николаева Л.Г.' WHERE ID=$marketid";
	// 	$qest = mysql_query($strSQL);
	// }
	// if($user==111095)
	// {
	// 	echo "<br>I`m HERE";
	// 	$strSQL="UPDATE stock SET AGENT ='Тарзан' WHERE ID=$marketid";
	// 	$qest = mysql_query($strSQL);
	// }
	// if($user==111101)
	// {
	// 	$strSQL="UPDATE stock SET AGENT = 'Парень со двора' WHERE ID=$marketid";
	// 	$qest = mysql_query($strSQL);
	// }
	echo $mess;
	$date=date("Y-m-d H:m");
	echo $date;
	$mess="INSERT INTO `agent_$user`(`STATIONID`, `DATE`) VALUES ($marketid,'$date')";
	$qest=mysql_query($mess);
}
mysql_close($link);
?>