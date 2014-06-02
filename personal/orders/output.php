<?
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Cache-Control: post-check=0,pre-check=0", false);
header("Cache-Control: max-age=0", false);
header("Pragma: no-cache");
//НЕ КЭШИРУЙ БЛЯ!





function showstock($stockall)
{
    if ($stockall == NULL)
    {
        echo '-';
    }
    else
    {
        $box = (int)($stockall/20);//20 бутылок в ящике
        $uniq = $stockall%20;

        echo $box.' ящ. / '.$uniq.' шт. ';
    }
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Московская пивоваренная компания</title>

    <!-- Стили CSS -->
        <link rel="stylesheet" href="../../css/maps.css">
        <link rel="stylesheet" href="../../css/style.css">
        <link rel="stylesheet" type="text/css" href="../../css/navigation.css"/>
        <link rel="stylesheet" type="text/css" href="../../css/templatestyles.css"/>
        <link rel="stylesheet" type="text/css" href="../../css/styles.css"/>
          <link rel="stylesheet" type="text/css" href="../../css/stylemain.css">
        <link rel="stylesheet" type="text/css" href="../../css/personal.css">
        <link href='http://fonts.googleapis.com/css?family=Sintony:400,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../../css/table.css">
        <link rel="stylesheet" type="text/css" href="../../css/accordin.css" />
        <script type="text/javascript" src="../../js/modernizr.custom.29473.js"></script>





<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>

<script>
$(document).ready(function(){

  // hide #back-top first
  $("#back-top").hide();

  // fade in #back-top
  $(function () {
    $(window).scroll(function () {
      if ($(this).scrollTop() > 100) {
        $('#back-top').fadeIn();
      } else {
        $('#back-top').fadeOut();
      }
    });

    // scroll body to 0px on click
    $('#back-top a').click(function () {
      $('body,html').animate({
        scrollTop: 0
      }, 800);
      return false;
    });
  });

});
</script>






</head>
<body>
    <div id="workplace">
        <div id="main">
            <div id="upper">



                <!-- <div id="hellow">
                  <h5>Вы вошли под именем Тестовый Директор</h5>
                </div> -->

                <a  href="../"><div id="home">
                    <h3>
                    На главную
                    </h3>
                </div></a>


                <a  href="../../../"><div id="exit">
                    <h3>
                    Выйти из системы
                    </h3>
                </div></a>

                 <div style="text-align: center">
                    <img src="../../images/logo.jpg" width="1003" height="323" alt="Фотография">
                </div>
                <br>
                <br>
                <h2 style="text-align: center">Информация по заказам товаров в г. Москве</h2>
                <br>
                <br>
                <!-- Место для Яндекс карт -->
                <div id="main_group_info">
                    <div id="ymaps">
                        <script type="text/javascript" charset="utf-8" src="//api-maps.yandex.ru/services/constructor/1.0/js/?sid=K0ZesJVENTnXqgX3PoS_aoCdPzi2ZMN5&width=600&height=292"></script>
                    </div>
                    <div id="clear_map"></div>
                    <div id="add_info">
                    <br><h3>Дополнительная информация</h3>
                    <div id="add_text">
                    <br>
                    Город: Москва
                    <br><br>
                    Торговых агентов: 6 шт
                    <br><br>
                    Торговых точек: 6 шт
                    <br><br>
                    Категории товара: 2 шт
                    <br><br>
                    Наименований товара: 15 шт
                    <br><br>
                    Последнее резервное копирование: 7 дней назад
                    </div>
                    </div>
                </div>
                </div>

                <br>
                <section class="ac-container">

                 <?
                // echo "<pre>";

                // var_dump($arResult['ORDERS'][0]);
                ?>
<?for($order_num = 0; $order_num < count($arResult['ORDERS']); $order_num++):?>
                <div>
                    <input id="ac-<?=$order_num + 1;?>" name="accordion-1" type="checkbox" />
                        <h3>
                        <label for="ac-<?=$order_num + 1;?>">
                            <div class="ip"><?=$arResult['ORDERS'][$order_num]['MARKET_NAME']?></div>
                            <div class="person">Заказ оформил <?=$arResult['ORDERS'][$order_num]['ORDER_AGENT']?></div>
                            <div class="date"><?=$arResult['ORDERS'][$order_num]['ORDER_DATE']?></div>
                        </label>
                        </h3>
                    <article class="ac-good">

                        <div id="table">

                  <table class="bordered">

                    <?
                        $a = isset($arResult['ORDERS'][$order_num]['ITEMS'][1]);
                        $b = isset($arResult['ORDERS'][$order_num]['ITEMS'][2]);
                        $c = isset($arResult['ORDERS'][$order_num]['ITEMS'][3]);
                        $d = isset($arResult['ORDERS'][$order_num]['ITEMS'][4]);
                        $e = isset($arResult['ORDERS'][$order_num]['ITEMS'][5]);

                        if($a || $b || $c || $d || $e):
                           ?>

                        <thead>
                        <tr>
                            <th class="grey" colspan="10">Отечественное пиво</th>
                        </tr>
                        <tr>
                            <th class="lgrey" rowspan="2">Название</th>
                            <th class="lyellow" colspan="4">Бутылки</th>
                            <th class="ryellow" colspan="4">Банки</th>
                            <th class="lblue" rowspan="2">Сумма <br>по позиции</th>
                        </tr>
                        <tr>
                            <th class="lgreen">Ящики</th>
                            <th class="rgreen">Штуки</th>
                            <th class="lblue">Цена</th>
                            <th class="red">Остаток</th>
                            <th class="lgreen">Ящики</th>
                            <th class="rgreen">Штуки</th>
                            <th class="lblue">Цена</th>
                            <th class="red">Остаток</th>
                        </tr>
                    </thead>

                    <?endif;?>
                    <tbody>
                        <?for($item_num = 1; $item_num < 6; $item_num++):?>

                            <?if(!isset($arResult['ORDERS'][$order_num]['ITEMS'][$item_num]))
                                continue;
                            ?>
                        <tr>
                            <td><?=$arResult['ORDERS'][$order_num]['ITEMS'][$item_num]['NAME']?></td>
                            <td><?=$arResult['ORDERS'][$order_num]['ITEMS'][$item_num]['BOTTLE']['QUANT']['BOX']?></td>
                            <td><?=$arResult['ORDERS'][$order_num]['ITEMS'][$item_num]['BOTTLE']['QUANT']['UNIQ']?></td>
                            <td><?
                            if(isset($arResult['ORDERS'][$order_num]['ITEMS'][$item_num]['BOTTLE']['PRICE']))
                                echo $arResult['ORDERS'][$order_num]['ITEMS'][$item_num]['BOTTLE']['PRICE'];
                            else
                                echo '&nbsp; 0';
                                ?> руб.</td>
                            <td><? showstock($arResult['ORDERS'][$order_num]['ITEMS'][$item_num]['BOTTLE']['STOCK']);?></td>
                            <td><?=$arResult['ORDERS'][$order_num]['ITEMS'][$item_num]['TIN']['QUANT']['BOX']?></td>
                            <td><?=$arResult['ORDERS'][$order_num]['ITEMS'][$item_num]['TIN']['QUANT']['UNIQ']?></td>
                            <td><?
                            if(isset($arResult['ORDERS'][$order_num]['ITEMS'][$item_num]['TIN']['PRICE']))
                                echo $arResult['ORDERS'][$order_num]['ITEMS'][$item_num]['TIN']['PRICE'];
                            else
                                echo '&nbsp; 0';
                            ?> руб.</td>
                            <td><? showstock($arResult['ORDERS'][$order_num]['ITEMS'][$item_num]['TIN']['STOCK']);?></td>
                            <td><? echo number_format($arResult['ORDERS'][$order_num]['ITEMS'][$item_num]['ITEM_SUMM'], 0, ',', ' ');?> руб.</td>
                        </tr>
                        <?endfor;?>
                    </tbody>

                    <?
                        $a = isset($arResult['ORDERS'][$order_num]['ITEMS'][6]);
                        $b = isset($arResult['ORDERS'][$order_num]['ITEMS'][7]);
                        $c = isset($arResult['ORDERS'][$order_num]['ITEMS'][8]);
                        $d = isset($arResult['ORDERS'][$order_num]['ITEMS'][9]);
                        $e = isset($arResult['ORDERS'][$order_num]['ITEMS'][10]);
                        $f = isset($arResult['ORDERS'][$order_num]['ITEMS'][11]);
                        $g = isset($arResult['ORDERS'][$order_num]['ITEMS'][12]);
                        $h = isset($arResult['ORDERS'][$order_num]['ITEMS'][13]);
                        $i = isset($arResult['ORDERS'][$order_num]['ITEMS'][14]);
                        $j = isset($arResult['ORDERS'][$order_num]['ITEMS'][15]);


                        if($a || $b || $c || $d || $e || $f || $g || $h || $i || $j):

                           ?>

                        <thead>
                        <tr>
                            <th class="grey" colspan="10">Импортное пиво</th>
                        </tr>
                        <tr>
                            <th class="lgrey" rowspan="2">Название</th>
                            <th class="lyellow" colspan="4">Бутылки</th>
                            <th class="ryellow" colspan="4">Банки</th>
                            <th class="lblue" rowspan="2">Сумма <br>по позиции</th>
                        </tr>
                        <tr>
                            <th class="lgreen">Ящики</th>
                            <th class="rgreen">Штуки</th>
                            <th class="lblue">Цена</th>
                            <th class="red">Остаток</th>
                            <th class="lgreen">Ящики</th>
                            <th class="rgreen">Штуки</th>
                            <th class="lblue">Цена</th>
                            <th class="red">Остаток</th>
                        </tr>
                    </thead>

                    <?endif;?>
                    <tbody>
                        <?for($item_num = 6; $item_num < 16; $item_num++):?>

                            <?if(!isset($arResult['ORDERS'][$order_num]['ITEMS'][$item_num]))
                                continue;
                            ?>
                        <tr>
                            <td><?=$arResult['ORDERS'][$order_num]['ITEMS'][$item_num]['NAME']?></td>
                            <td><?=$arResult['ORDERS'][$order_num]['ITEMS'][$item_num]['BOTTLE']['QUANT']['BOX']?></td>
                            <td><?=$arResult['ORDERS'][$order_num]['ITEMS'][$item_num]['BOTTLE']['QUANT']['UNIQ']?></td>
                            <td><?

                            if(isset($arResult['ORDERS'][$order_num]['ITEMS'][$item_num]['BOTTLE']['PRICE']))
                                echo $arResult['ORDERS'][$order_num]['ITEMS'][$item_num]['BOTTLE']['PRICE'];
                            else
                                echo '&nbsp; 0';

                            ?> руб.</td>
                            <td><? showstock($arResult['ORDERS'][$order_num]['ITEMS'][$item_num]['BOTTLE']['STOCK']);?></td>
                            <td><?=$arResult['ORDERS'][$order_num]['ITEMS'][$item_num]['TIN']['QUANT']['BOX']?></td>
                            <td><?=$arResult['ORDERS'][$order_num]['ITEMS'][$item_num]['TIN']['QUANT']['UNIQ']?></td>
                            <td><?

                            if(isset($arResult['ORDERS'][$order_num]['ITEMS'][$item_num]['TIN']['PRICE']))
                                echo $arResult['ORDERS'][$order_num]['ITEMS'][$item_num]['TIN']['PRICE'];
                            else
                                echo '&nbsp; 0';
                            ?> руб.</td>
                            <td><? showstock($arResult['ORDERS'][$order_num]['ITEMS'][$item_num]['TIN']['STOCK']);?></td>
                            <td><? echo number_format($arResult['ORDERS'][$order_num]['ITEMS'][$item_num]['ITEM_SUMM'], 0, ',', ' ');?> руб.</td>
                        </tr>
                        <?endfor;?>
                    </tbody>

                    <thead>
                        <tr class="lgrey">
                            <th colspan="6"></th>
                            <!-- <th colspan="2">5 ДЕК 2013 в 15:00</th>
                            <th colspan="1">выполнил</th>
                            <th colspan="2">Пупкин И. А.</th> -->
                            <th class="lgrey" colspan="2"><a href="/personal/orders/xls/order.xls">Скачать</a></th>
                            <th class="lblue" colspan="1">ИТОГО:</th>
                            <th class="lblue" colspan="1"><? echo number_format($arResult['ORDERS'][$order_num]['SUMM'], 0, ',', ' ');?> руб.</th>
                        </tr>
                    </thead>

                        </table>

                        </div>


                    </article>
                </div>
<?endfor;?>

            </section>















               <p id="back-top">
                      <a href="#top"><span></span><!-- Вверх --></a>
                    </p>


          <br>
        </div>

        </div>
    </div>
    <div id="footer">

        <div id="backlink">

                    <a href="http://www.mosbrew.ru/"><h3>www.mosbrew.ru</h3></a>

        </div>


    </div>

</body>
</html>
<?
// echo "<pre>";
// var_dump($arResult);
?>