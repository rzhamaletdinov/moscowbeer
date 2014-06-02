<?php
/*$id_market;
$id_user;
$rb_bottle;
$rb_iron;
$bbbfirst;
$bbifirst;
$bbisecond;
$bbbsecond;*/
if(isset($_GET[imar])&&isset($_GET[ius])&&isset($_GET[rb])&&isset($_GET[rf])&&isset($_GET[ib])&&isset($_GET[ii])&&isset($_GET[imb])&&isset($_GET[imf])&&isset($_GET[froz]))
	{
		$id_market=$_GET[imar];
		$id_user=$_GET[ius];
		$rb_bottle=$_GET[rb];
		$rb_iron=$_GET[rf];
		$bbbfirst=$_GET[ib];
		$bbifirst=$_GET[ii];
		$bbbsecond=$_GET[imb];
		$bbisecond=$_GET[imf];
		$froz=$_GET[froz];
	}
else 
	{
		echo "Not today";
	}
	echo "$rb_bottle   $bbbfirst  $bbbsecond";
$link=mysql_connect("localhost","kraktumz_mybeer","mypassword");
mysql_select_db("kraktumz_mybeer") or die(mysql_error());
$char=mysql_set_charset("utf8");
for($q=1;$q<16;$q++)
	{
		if($q<6)
		{
			$bottle[$q]=$rb_bottle%100;
			$rb_bottle=$rb_bottle/100;
			$mess="UPDATE station$id_market SET BOTTLE = $bottle[$q] WHERE ID= $q";
			$qest=mysql_query($mess);
			echo $mess;
		}
		else if($q<11)
		{
			$bottle[$q]=$bbbfirst%100;
			$bbbfirst=$bbbfirst/100;
			$mess="UPDATE station$id_market SET BOTTLE = $bottle[$q] WHERE ID= $q";
			$qest=mysql_query($mess);
			echo $mess;
		}
		else if($q>10)
		{
			$bottle[$q]=$bbbsecond%100;
			$bbbsecond=$bbbsecond/100;
			$mess="UPDATE station$id_market SET BOTTLE = $bottle[$q] WHERE ID= $q";
			$qest=mysql_query($mess);
			echo $mess;
		}
	}
	for($q=1;$q<16;$q++)
	{
		if($q<6)
		{
			$iron[$q]=$rb_iron%100;
			$rb_iron=$rb_iron/100;
			$mess="UPDATE station$id_market SET TIN = $iron[$q] WHERE ID= $q";
			$qest=mysql_query($mess);
			echo $mess;
		}
		else if($q<11)
		{
			$iron[$q]=$bbifirst%100;
			$bbifirst=$bbifirst/100;
			$mess="UPDATE station$id_market SET TIN = $iron[$q] WHERE ID= $q";
			$qest=mysql_query($mess);
			echo $mess;
		}
		else if($q>10)
		{
			$iron[$q]=$bbisecond%100;
			$bbisecond=$bbisecond/100;
			$mess="UPDATE station$id_market SET TIN = $iron[$q] WHERE ID= $q";
			$qest=mysql_query($mess);
			echo $mess;
		}
	}
$mess="UPDATE stock SET FRIGE = $froz WHERE ID=$id_market";
$qest=mysql_query($mess);
if($id_user==170791)
	{
		$strSQL="UPDATE stock SET AGENT = 'Александров Д.А.' WHERE ID=$id_market";
		$qest = mysql_query($strSQL);
	}
	if($id_user==179119)
	{
		$strSQL="UPDATE stock SET AGENT = 'Анисимов Д.А.' WHERE ID=$id_market";
		$qest = mysql_query($strSQL);
	}
	if($id_user==154770)
	{
		$strSQL="UPDATE stock SET AGENT = 'Фурса В.Я.' WHERE ID=$id_market";
		$qest = mysql_query($strSQL);
	}
	if($id_user==154353)
	{
		$strSQL="UPDATE stock SET AGENT = 'Николаева Л.Г.' WHERE ID=$id_market";
		$qest = mysql_query($strSQL);
	}
	if($id_user==111095)
	{
		echo "<br>I`m HERE";
		$strSQL="UPDATE stock SET AGENT ='Тарзан' WHERE ID=$id_market";
		$qest = mysql_query($strSQL);
	}
	if($id_user==111101)
	{
		$strSQL="UPDATE stock SET AGENT = 'Парень со двора' WHERE ID=$id_market";
		$qest = mysql_query($strSQL);
	}
	$date=date("Y-m-d");
	echo $date;
	$mess="INSERT INTO `$id_user`(`STATIONID`, `DATE`) VALUES ($id_market,'$date')";
	echo $mess;
	$qest=mysql_query($mess) or die(mysql_error());
	mysql_close($link);
?>