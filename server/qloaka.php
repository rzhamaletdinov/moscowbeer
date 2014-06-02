<?php

echo 'Сам клоака!';
echo "<br>";

var_dump($_GET[idor]);
echo "<br>";
var_dump($_GET[idber]);
echo "<br>";
var_dump($_GET[bot]);
echo "<br>";
var_dump($_GET[tin]);
echo "<br>";

if(isset($_GET[idor])&&isset($_GET[idber])&&isset($_GET[bot])&&isset($_GET[tin]))
{
	$beer=$_GET[idber];
	$bottle=$_GET[bot];
	$tins=$_GET[tin];
	$idord=$_GET[idor];
}
else
{
echo "Not today";
	exit;
}
$link=mysql_connect("localhost","kraktumz_mybeer","mypassword");
mysql_select_db("kraktumz_mybeer") or die(mysql_error());
$char=mysql_set_charset("utf8");
	echo "<br>";
	$mess="UPDATE orders SET BOTTLE$beer=$bottle, TIN$beer=$tins WHERE IDORDER=$idord";
	echo $mess;
	$qest=mysql_query($mess);

	//Остаток делаем здесь
	if ($beer < 6)//Наше пиво
	{
			$mess = 'UPDATE national_beer SET BOTTLE_STOCK = BOTTLE_STOCK - '.$bottle.' WHERE ID = '.$beer;
			$qest=mysql_query($mess);

			$mess = 'UPDATE national_beer SET TIN_STOCK = TIN_STOCK - '.$tins.' WHERE ID = '.$beer;
			$qest=mysql_query($mess);
	}
	else //Басурманское пиво
	{
			$mess = 'UPDATE import_beer SET BOTTLE_STOCK = BOTTLE_STOCK - '.$bottle.' WHERE ID = '.$beer;
			$qest=mysql_query($mess);

			$mess = 'UPDATE import_beer SET TIN_STOCK = TIN_STOCK - '.$tins.' WHERE ID = '.$beer;
			$qest=mysql_query($mess);
	}



mysql_close($link);
?>