<?
//Подключение к БД


$link = mysql_connect("localhost", /*login*/"kraktumz_mybeer", /*psw*/"mypassword") or die("Ошибочка вышла: " . mysql_error());

// Выбрать БД
  mysql_select_db("kraktumz_mybeer") or die(mysql_error());

$char = mysql_set_charset('utf8');
  // SQL-запрос
///
/*ЗАПРОС ИМЕНИ АГЕНТА*/
///

$strSQL = "SELECT * FROM agent";


// Выполнить запрос (набор данных $rs содержит результат)
  $rs = mysql_query($strSQL);

  $i = 0;
  while($row = mysql_fetch_array($rs))
  {
     // Записать значение столбца FirstName (который является теперь массивом $row)

    $arResult['AGENT'][$i]['NAME'] = $row['NAME'];
    $arResult['AGENT'][$i]['ID'] = $row['ID'];
    $i++;
  }

define('QUANTITY_AGENT', $i);
  /// Кол-во агентов
///
/*
КОНЕЦ
ЗАПРОС ИМЕНИ АГЕНТА*/
///






function show_name_by_id($id)
{

  for($i = 1; $i < 7; $i++)///6 station
  {
    if ($id == $i)
      return $GLOBALS['arResult']['STOCK'][$i]['NAME'];
  }
}



/// Названия ИП

$strSQL = "SELECT * FROM stock";


// Выполнить запрос (набор данных $rs содержит результат)
  $rs = mysql_query($strSQL);

  $i = 1;
  while($row = mysql_fetch_array($rs))
  {
     // Записать значение столбца FirstName (который является теперь массивом $row)

    $arResult['STOCK'][$i]['NAME'] = $row['IP_PERSON'];
    $i++;
  }
//Конец названий ИП







///
/*ЗАПРОС ПОСЕЩЕНИЙ АГЕНТА ЗА ДЕНЬ*/
///

for($count = 0; $count < QUANTITY_AGENT; $count++)
{

$strSQL = "SELECT
         * FROM agent_".$arResult['AGENT'][$count]['ID']."
           WHERE DATE(DATE) = DATE(NOW())
           ORDER BY DATE DESC";
// Выполнить запрос (набор данных $rs содержит результат)
$rs = mysql_query($strSQL);

$i = 0;

while($row = mysql_fetch_array($rs))
  {

    // Записать значение столбца FirstName (который является теперь массивом $row)
    $arResult['AGENT'][$count]['TODAY'][$i]['DATE'] = $row['DATE'];
    $arResult['AGENT'][$count]['TODAY'][$i]['ID'] = $row['STATIONID'];
    $arResult['AGENT'][$count]['TODAY'][$i]['NAME'] = show_name_by_id($row['STATIONID']);
    $i++;
  }
}

/*
КОНЕЦ
ЗАПРОС ПОСЕЩЕНИЙ АГЕНТА ЗА ДЕНЬ*/
///



///
/*ЗАПРОС ПОСЕЩЕНИЙ АГЕНТА ЗА НЕДЕЛЮ*/
///

for($count = 0; $count < QUANTITY_AGENT; $count++)
{

$strSQL = "SELECT * FROM agent_".$arResult['AGENT'][$count]['ID']."
           WHERE DATE(DATE) BETWEEN DATE_SUB(DATE(NOW()), INTERVAL 7 DAY) AND DATE(NOW())
           ORDER BY DATE DESC";
// Выполнить запрос (набор данных $rs содержит результат)
$rs = mysql_query($strSQL);

$i = 0;

while($row = mysql_fetch_array($rs))
  {

    // Записать значение столбца FirstName (который является теперь массивом $row)
    $arResult['AGENT'][$count]['LASTWEEK'][$i]['DATE'] = $row['DATE'];
    $arResult['AGENT'][$count]['LASTWEEK'][$i]['ID'] = $row['STATIONID'];
    $arResult['AGENT'][$count]['LASTWEEK'][$i]['NAME'] = show_name_by_id($row['STATIONID']);
    $i++;
  }
}

/*
КОНЕЦ
ЗАПРОС ПОСЕЩЕНИЙ АГЕНТА ЗА НЕДЕЛЮ*/
///






///
/*ЗАПРОС ПОСЕЩЕНИЙ АГЕНТА ЗА МЕСЯЦ*/
///

for($count = 0; $count < QUANTITY_AGENT; $count++)
{

$strSQL = "SELECT * FROM agent_".$arResult['AGENT'][$count]['ID']."
           WHERE DATE(DATE) BETWEEN DATE_SUB(DATE(NOW()), INTERVAL 30 DAY) AND DATE(NOW())
           ORDER BY DATE DESC";
// Выполнить запрос (набор данных $rs содержит результат)
$rs = mysql_query($strSQL);

$i = 0;

while($row = mysql_fetch_array($rs))
  {

    // Записать значение столбца FirstName (который является теперь массивом $row)
    $arResult['AGENT'][$count]['LASTMONTH'][$i]['DATE'] = $row['DATE'];
    $arResult['AGENT'][$count]['LASTMONTH'][$i]['ID'] = $row['STATIONID'];
    $arResult['AGENT'][$count]['LASTMONTH'][$i]['NAME'] = show_name_by_id($row['STATIONID']);
    $i++;
  }
}


unset($arResult['STOCK']);
/*
КОНЕЦ
ЗАПРОС ПОСЕЩЕНИЙ АГЕНТА ЗА МЕСЯЦ*/
///
mysql_close();


require_once 'output.php';
?>