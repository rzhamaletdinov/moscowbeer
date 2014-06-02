<?
//Подключение к БД


$link = mysql_connect("localhost", /*login*/"kraktumz_mybeer", /*psw*/"mypassword") or die("Ошибочка вышла: " . mysql_error());

// Выбрать БД
  mysql_select_db("kraktumz_mybeer") or die(mysql_error());

$char = mysql_set_charset('utf8');
  // SQL-запрос






///
/*ЗАПРОС НАЗВАНИЙ ТОВАРОВ*/
///

$national_beer = 'Отечественное пиво';
$strSQL = "SELECT * FROM national_beer";
$rs = mysql_query($strSQL);


$i = 0;
while($row = mysql_fetch_array($rs))
{



    $arResult['ITEMS'][$i]['NAME'] = $row['NAME'];
    $arResult['ITEMS'][$i]['CATEGORY'] = $national_beer;
    $arResult['ITEMS'][$i]['BOTTLE_PRICE'] = $row['BOTTLE_PRICE'];
    $arResult['ITEMS'][$i]['TIN_PRICE'] = $row['TIN_PRICE'];
    $arResult['ITEMS'][$i]['BOTTLE_STOCK'] = $row['BOTTLE_STOCK'];
    $arResult['ITEMS'][$i]['TIN_STOCK'] = $row['TIN_STOCK'];


  $i++;
}


$import_beer = 'Импортное пиво';
$strSQL = "SELECT * FROM import_beer";
$rs = mysql_query($strSQL);


$i = 5;

while($row = mysql_fetch_array($rs))
{
    $arResult['ITEMS'][$i]['NAME'] = $row['NAME'];
    $arResult['ITEMS'][$i]['CATEGORY'] = $import_beer;
    $arResult['ITEMS'][$i]['BOTTLE_PRICE'] = $row['BOTTLE_PRICE'];
    $arResult['ITEMS'][$i]['TIN_PRICE'] = $row['TIN_PRICE'];
    $arResult['ITEMS'][$i]['BOTTLE_STOCK'] = $row['BOTTLE_STOCK'];
    $arResult['ITEMS'][$i]['TIN_STOCK'] = $row['TIN_STOCK'];
    $i++;
}
////ТОВАРЫ УЗНАЛИ


///
/*ЗАПРОС ЗАКАЗА*/
///
$strSQL = "SELECT *
           FROM orders, stock, agent
           WHERE (orders.IDMARKET = stock.ID AND orders.IDUSER = agent.ID)";
// Выполнить запрос (набор данных $rs содержит результат)
  $rs = mysql_query($strSQL);

//  Echo 'Таблица STOCK<br><br><br>';//ФОРМИРУЕМ СТРУТУРУ
  $i = 0;
  while($row = mysql_fetch_array($rs))
  {
     $arResult['ORDERS'][$i]['SUMM'] = 0;
     $arResult['ORDERS'][$i]['MARKET_NAME'] = $row['IP_PERSON'];
     $arResult['ORDERS'][$i]['ORDER_DATE'] = $row['DATE'];
     $arResult['ORDERS'][$i]['ORDER_AGENT'] = $row['NAME'];

     for($items_id = 1; $items_id <= 16; $items_id++)
     {
        if ($row['BOTTLE'.$items_id])
        {
          $arResult['ORDERS'][$i]['ITEMS'][$items_id]['BOTTLE']['QUANT']['QUANT'] = $row['BOTTLE'.$items_id];
          $arResult['ORDERS'][$i]['ITEMS'][$items_id]['BOTTLE']['PRICE'] = $arResult['ITEMS'][$items_id-1]['BOTTLE_PRICE'];
          $arResult['ORDERS'][$i]['ITEMS'][$items_id]['BOTTLE']['STOCK'] = $arResult['ITEMS'][$items_id-1]['BOTTLE_STOCK'];
        }
        if ($row['TIN'.$items_id])
        {
          $arResult['ORDERS'][$i]['ITEMS'][$items_id]['TIN']['QUANT']['QUANT'] = $row['TIN'.$items_id];
          $arResult['ORDERS'][$i]['ITEMS'][$items_id]['TIN']['PRICE'] = $arResult['ITEMS'][$items_id-1]['TIN_PRICE'];
          $arResult['ORDERS'][$i]['ITEMS'][$items_id]['TIN']['STOCK'] = $arResult['ITEMS'][$items_id-1]['TIN_STOCK'];
        }
        if ($row['BOTTLE'.$items_id] || $row['TIN'.$items_id])
        {
          $arResult['ORDERS'][$i]['ITEMS'][$items_id]['NAME'] = $arResult['ITEMS'][$items_id-1]['NAME'];
          $arResult['ORDERS'][$i]['ITEMS'][$items_id]['CATEGORY'] = $arResult['ITEMS'][$items_id-1]['CATEGORY'];

          $arResult['ORDERS'][$i]['ITEMS'][$items_id]['ITEM_SUMM'] =
         ($arResult['ORDERS'][$i]['ITEMS'][$items_id]['BOTTLE']['QUANT']['QUANT'] *
          $arResult['ORDERS'][$i]['ITEMS'][$items_id]['BOTTLE']['PRICE']) +
         ($arResult['ORDERS'][$i]['ITEMS'][$items_id]['TIN']['QUANT']['QUANT'] *
          $arResult['ORDERS'][$i]['ITEMS'][$items_id]['TIN']['PRICE']);

          $arResult['ORDERS'][$i]['SUMM'] =
          $arResult['ORDERS'][$i]['SUMM'] +
          $arResult['ORDERS'][$i]['ITEMS'][$items_id]['ITEM_SUMM'];

          $arResult['ORDERS'][$i]['ITEMS'][$items_id]['BOTTLE']['QUANT']['BOX'] =
    (int)($arResult['ORDERS'][$i]['ITEMS'][$items_id]['BOTTLE']['QUANT']['QUANT'] / 20);///Один ящик - 20
          $arResult['ORDERS'][$i]['ITEMS'][$items_id]['BOTTLE']['QUANT']['UNIQ'] =
          $arResult['ORDERS'][$i]['ITEMS'][$items_id]['BOTTLE']['QUANT']['QUANT'] % 20;///Один ящик - 20

          $arResult['ORDERS'][$i]['ITEMS'][$items_id]['TIN']['QUANT']['BOX'] =
    (int)($arResult['ORDERS'][$i]['ITEMS'][$items_id]['TIN']['QUANT']['QUANT'] / 20);///Один ящик - 20
          $arResult['ORDERS'][$i]['ITEMS'][$items_id]['TIN']['QUANT']['UNIQ'] =
          $arResult['ORDERS'][$i]['ITEMS'][$items_id]['TIN']['QUANT']['QUANT'] % 20;///Один ящик - 20

        }
     }
    $i++;
    // echo "<pre>";
    // var_dump($row);
    // echo "</pre>";
  }
    unset($arResult['ITEMS']);

      // echo "<pre>";
      // var_dump($arResult);
      // echo "</pre>";



  mysql_close();
//require_once 'excel.php';
require_once 'output.php';
?>