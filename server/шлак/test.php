<?php
$link=mysql_connect("localhost","kraktumz_mybeer","mypassword");
mysql_select_db("kraktumz_mybeer") or die(mysql_error());
$char=mysql_set_charset("utf8");
$mess="SELECT IDORDER FROM ORDERS";
$qest=mysql_query($mess);
while($read=mysql_fetch_array($qest))
{
	echo <br>;
	echo $read;
}
mysql_close($link);
?>