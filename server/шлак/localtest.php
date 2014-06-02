<?php

function takeanum($someval)
{

	return($someval % 10);
}

	$idmar=null;
	$iduse=null;
	$sovber=null;
	$impber=null;
	$fridge=null;
	if(isset($_GET[imar]) && isset($_GET[ius])&&isset($_GET[sober])&&isset($_GET[imber])&&isset($_GET[fri]))
	{
		$idmar=$_GET[imar];
		$iduse=$_GET[ius];
		$sovber=$_GET[sober];
		$impber=$_GET[imber];
		$fridge=$_GET[fri];
		echo "$idmar - idmar $iduse - iduse $sovber - sovber $impber - impbeer $fridge = fridge<br>";
	}
	else
	{
		echo "not today";
	}
	for($i=5;$i>0;$i--)
	{
		$msovb[$i]=takeanum($sovber);
		$sovber=$sovber/10;
	}
	for($i=1;$i<=5;$i++){
	echo "$msovb[$i]<br>";}
	for($q=10;$q>0;$q--)
	{
		$mimpb[$q]=takeanum($impber);
		$impber=$impber/10;
	}
	for($q=1;$q<=10;$q++)
	{
		echo "imp = $mimpb[$q]<br>";
	}
	$link = mysql_connect("localhost", /*login*/"kraktumz_mybeer", /*psw*/"mypassword") or die("Ошибочка вышла: " . mysql_error());

// Выбрать БД
  mysql_select_db("kraktumz_mybeer") or die(mysql_error());
	$char=mysql_set_charset("utf8");
	$strSQL="UPDATE stock SET FRIGE = $fridge WHERE (ID=$idmar)";
	$qest = mysql_query($strSQL);
	$name="station$idmar";
	echo $name;
	for($q=1;$q<=10;$q++)
	{
		$slq=$q+5;
		if($mimpb[$q]==1)
		{
			$strSQL="UPDATE $name SET AVAILABLE=0 WHERE ID=$slq";
			$qest=mysql_query($strSQL);
			echo $qest;
		}
		else
		{
			$strSQL="UPDATE $name SET AVAILABLE=1 WHERE ID=$slq";
			echo $strSQL;
			$qest=mysql_query($strSQL);
			echo $qest;
		}
	}
	for($q=1;$q<=5;$q++)
	{
		if($msovb[$q]==1)
		{
			$strSQL="UPDATE $name SET AVAILABLE=0 WHERE ID=$q";
			echo "<br>".$strSQL;
			$qest=mysql_query($strSQL);
			echo $qest;
		}
		else
		{
			$strSQL="UPDATE $name SET AVAILABLE=1 WHERE ID=$q";
			$qest=mysql_query($strSQL);
			echo $qest;
		}
	}

	if($iduse==170791)
	{
		$strSQL="UPDATE stock SET AGENT = 'Александров Д. А.' WHERE ID=$idmar";
		$qest = mysql_query($strSQL);
	}
	if($iduse==179119)
	{
		$strSQL="UPDATE stock SET AGENT = 'Анисимов Д. А.' WHERE ID=$idmar";
		$qest = mysql_query($strSQL);
	}
	if($iduse==154770)
	{
		$strSQL="UPDATE stock SET AGENT = 'Медведев А. Р.' WHERE ID=$idmar";
		$qest = mysql_query($strSQL);
	}
	if($iduse==154353)
	{
		$strSQL="UPDATE stock SET AGENT = 'Воронин В. В.' WHERE ID=$idmar";
		$qest = mysql_query($strSQL);
	}
	if($iduse==111095)
	{
		echo "<br>I`m HERE";
		$strSQL="UPDATE stock SET AGENT ='Чуприн А. П.' WHERE ID=$idmar";
		$qest = mysql_query($strSQL);
	}
	if($iduse==111101)
	{
		$strSQL="UPDATE stock SET AGENT = 'Менделеев М. С.' WHERE ID=$idmar";
		$qest = mysql_query($strSQL);
	}
	mysql_close($link);


?>