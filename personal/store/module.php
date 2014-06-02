<?
//Подключение к БД


$link = mysql_connect("localhost", /*login*/"kraktumz_mybeer", /*psw*/"mypassword") or die("Ошибочка вышла: " . mysql_error());

// Выбрать БД
  mysql_select_db("kraktumz_mybeer") or die(mysql_error());

$char = mysql_set_charset('utf8');
  // SQL-запрос




///
/*ЗАПРОС ИМЕНИ, ХОЛОДИЛЬНИКА ТОЧЕК, АГЕНТА*/
///

$strSQL = "SELECT * FROM stock";


// Выполнить запрос (набор данных $rs содержит результат)
  $rs = mysql_query($strSQL);

//  Echo 'Таблица STOCK<br><br><br>';
  $i = 0;;
  while($row = mysql_fetch_array($rs))
  {
     // Записать значение столбца FirstName (который является теперь массивом $row)

    $arResult['STORE'][$i]['NUM']  = 'station'.$row['ID'];
    $arResult['STORE'][$i]['NAME'] = $row['IP_PERSON'];
    $arResult['STORE'][$i]['FRIGE'] = $row['FRIGE'];
    $arResult['STORE'][$i]['AGENT'] = $row['AGENT'];
    $i++;
    }

///
/*
КОНЕЦ
ЗАПРОС ИМЕНИ, ХОЛОДИЛЬНИКА ТОЧЕК, АГЕНТА*/
///


///
/*ЗАПРОС НАЛИЧИЯ  ТОВАРОВ ТОЧКE*/
///

for($STORE_NUM = 0; $STORE_NUM < 6; $STORE_NUM++)
{
  $strSQL = "SELECT * FROM station".($STORE_NUM+1)."
            ORDER BY ID ASC";

  $rs = mysql_query($strSQL);

  $i = 0;

  while($row = mysql_fetch_array($rs))
  {

      $arResult['STORE'][$STORE_NUM]['ITEMS'][$i]['ID_NAME'] = $i;

      $arResult['STORE'][$STORE_NUM]['ITEMS'][$i]['BOTTLE']['QUANT'] = $row['BOTTLE'];

      $arResult['STORE'][$STORE_NUM]['ITEMS'][$i]['BOTTLE']['BOX'] =
 (int)($arResult['STORE'][$STORE_NUM]['ITEMS'][$i]['BOTTLE']['QUANT']/20);

      $arResult['STORE'][$STORE_NUM]['ITEMS'][$i]['BOTTLE']['UNIQ'] =
      $arResult['STORE'][$STORE_NUM]['ITEMS'][$i]['BOTTLE']['QUANT']%20;


      $arResult['STORE'][$STORE_NUM]['ITEMS'][$i]['TIN']['QUANT'] = $row['TIN'];
      $arResult['STORE'][$STORE_NUM]['ITEMS'][$i]['TIN']['BOX'] =
 (int)($arResult['STORE'][$STORE_NUM]['ITEMS'][$i]['TIN']['QUANT']/20);

      $arResult['STORE'][$STORE_NUM]['ITEMS'][$i]['TIN']['UNIQ'] =
      $arResult['STORE'][$STORE_NUM]['ITEMS'][$i]['TIN']['QUANT']%20;


  $i++;
  }
}


///
/*
КОНЕЦ
НАЛИЧИЯ  ТОВАРОВ ТОЧКE*/
///

///
/*ЗАПРОС НАЗВАНИЙ ТОВАРОВ*/
///

$national_beer = 'Отечественное пиво';
$strSQL = "SELECT * FROM national_beer";
$rs = mysql_query($strSQL);


$i = 0;
while($row = mysql_fetch_array($rs))
{


  for($STORE_NUM = 0; $STORE_NUM < 6; $STORE_NUM++)
  {
    $arResult['STORE'][$STORE_NUM]['ITEMS'][$i]['NAME'] = $row['NAME'];
    $arResult['STORE'][$STORE_NUM]['ITEMS'][$i]['CATEGORY'] = $national_beer;

  }
  $i++;
}


$import_beer = 'Импортное пиво';
$strSQL = "SELECT * FROM import_beer";
$rs = mysql_query($strSQL);


$i = 5;
while($row = mysql_fetch_array($rs))
{


  for($STORE_NUM = 0; $STORE_NUM < 6; $STORE_NUM++)
  {
    $arResult['STORE'][$STORE_NUM]['ITEMS'][$i]['NAME'] = $row['NAME'];
    $arResult['STORE'][$STORE_NUM]['ITEMS'][$i]['CATEGORY'] = $import_beer;

  }
  $i++;
}

// echo "<pre>";
// var_dump($arResult);
// echo "</pre>";

mysql_close();
require_once 'output.php';
?>