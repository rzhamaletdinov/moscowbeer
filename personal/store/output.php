<?
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Cache-Control: post-check=0,pre-check=0", false);
header("Cache-Control: max-age=0", false);
header("Pragma: no-cache");
//НЕ КЭШИРУЙ БЛЯ!
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Московская пивоваренная компания</title>

    <!-- Стили CSS -->
        <link rel="stylesheet" href="../../css/style.css">
        <link rel="stylesheet" href="../../css/maps.css">
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
                <br> <br>

<h2 style="text-align: center">Информация по наличию товаров в г. Москве</h2>


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


<?for($store_num = 0; $store_num < 6; $store_num++):?>

<div>
    <input id="ac-<?=$store_num + 1;?>" name="accordion-1" type="checkbox" />
        <h3>
                        <label for="ac-<?=$store_num + 1;?>">
                            <div class="ip"><?=$arResult['STORE'][$store_num]['NAME'];?></div>
                            <div class="person">Обновил <?=$arResult['STORE'][$store_num]['AGENT'];?> </div>
                            <div class="date"><!-- 01 ДЕК 2013 21:00 --></div>
                        </label>
                        </h3>
                    <article class="ac-good">
                       <div id="table">

                  <table class="bordered">
                        <thead>
                        <tr>
                            <th class="grey" colspan="5">Наше пиво</th>
                        </tr>
                        <tr>
                            <th class="lgrey" rowspan="2">Название</th>
                            <th class="lyellow" colspan="2">Бутылки</th>
                            <th class="ryellow" colspan="2">Банки</th>
                        </tr>
                        <tr>
                            <th class="lgreen">Ящики</th>
                            <th class="rgreen">Штуки</th>
                            <th class="lgreen">Ящики</th>
                            <th class="rgreen">Штуки</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?for($item_num = 0; $item_num < 5; $item_num++):?>
                        <tr>
                            <td><?=$arResult['STORE'][$store_num]['ITEMS'][$item_num]['NAME'];?></td>
                            <td><?=$arResult['STORE'][$store_num]['ITEMS'][$item_num]['BOTTLE']['BOX'];?></td>
                            <td><?=$arResult['STORE'][$store_num]['ITEMS'][$item_num]['BOTTLE']['UNIQ'];?></td>
                            <td><?=$arResult['STORE'][$store_num]['ITEMS'][$item_num]['TIN']['BOX'];?></td>
                            <td><?=$arResult['STORE'][$store_num]['ITEMS'][$item_num]['TIN']['UNIQ'];?></td>
                        </tr>
                        <? endfor; ?>
                    </tbody>

                    <thead>
                        <tr>
                            <th class="grey" colspan="5">Импортное пиво</th>
                        </tr>
                        <tr>
                            <th class="lgrey" rowspan="2">Название</th>
                            <th class="lyellow" colspan="2">Бутылки</th>
                            <th class="ryellow"colspan="2">Банки</th>
                        </tr>
                        <tr>
                            <th class="lgreen">Ящики</th>
                            <th class="rgreen">Штуки</th>
                            <th class="lgreen">Ящики</th>
                            <th class="rgreen">Штуки</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?for($item_num = 5; $item_num < 15; $item_num++):?>
                        <tr>
                            <td><?=$arResult['STORE'][$store_num]['ITEMS'][$item_num]['NAME'];?></td>
                            <td><?=$arResult['STORE'][$store_num]['ITEMS'][$item_num]['BOTTLE']['BOX'];?></td>
                            <td><?=$arResult['STORE'][$store_num]['ITEMS'][$item_num]['BOTTLE']['UNIQ'];?></td>
                            <td><?=$arResult['STORE'][$store_num]['ITEMS'][$item_num]['TIN']['BOX'];?></td>
                            <td><?=$arResult['STORE'][$store_num]['ITEMS'][$item_num]['TIN']['UNIQ'];?></td>
                        </tr>
                        <? endfor; ?>
                    </tbody>

                    <thead>
                        <tr class="blue">
                            <th colspan="4">Холодильные установки</th>
                            <th colspan="1"><?=$arResult['STORE'][$store_num]['FRIGE'];?> шт.</th>
                        </tr>
                    </thead>

                        </table>

                        </div>

                    </article>
</div>

<?endfor;?>
               <!--  <div>
                    <input id="ac-3" name="accordion-1" type="checkbox" />
                    <h3>
                        <label for="ac-3">
                            <div class="ip"> ИП Хуйнюшкин</div>
                            <div class="person">Обновил А. М. Козявкин </div>
                            <div class="date">20 ДЕК 2013 18:00</div>
                        </label>
                        </h3>
                    <article class="ac-good">
                        <div id="table">

                  <table class="bordered">
                        <thead>
                        <tr>
                            <th class="grey" colspan="5">Наше пиво</th>
                        </tr>
                        <tr>
                            <th class="lgrey" rowspan="2">Название</th>
                            <th class="lyellow" colspan="2">Бутылки</th>
                            <th class="ryellow" colspan="2">Банки</th>
                        </tr>
                        <tr>
                            <th class="lgreen">Ящики</th>
                            <th class="rgreen">Штуки</th>
                            <th class="lgreen">Ящики</th>
                            <th class="rgreen">Штуки</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>Пыво 1</td>
                            <td>5</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                        </tr>
                        <tr>
                            <td>Пыво 2</td>
                            <td>5</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                        </tr>
                        <tr>
                            <td>Пыво 3</td>
                            <td>5</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                        </tr>
                        <tr>
                            <td>Пыво 4</td>
                            <td>5</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                        </tr>
                        <tr>
                            <td>Пыво 5</td>
                            <td>5</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                        </tr>
                    </tbody>

                    <thead>
                        <tr>
                            <th class="grey" colspan="5">Импортное пиво</th>
                        </tr>
                        <tr>
                            <th class="lgrey" rowspan="2">Название</th>
                            <th class="lyellow" colspan="2">Бутылки</th>
                            <th class="ryellow"colspan="2">Банки</th>
                        </tr>
                        <tr>
                            <th class="lgreen">Ящики</th>
                            <th class="rgreen">Штуки</th>
                            <th class="lgreen">Ящики</th>
                            <th class="rgreen">Штуки</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Пыво 1</td>
                            <td>5</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                        </tr>
                        <tr>
                            <td>Пыво 2</td>
                            <td>5</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                        </tr>
                        <tr>
                            <td>Пыво 3</td>
                            <td>5</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                        </tr>
                        <tr>
                            <td>Пыво 4</td>
                            <td>5</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                        </tr>
                        <tr>
                            <td>Пыво 5</td>
                            <td>5</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                        </tr>
                        <tr>
                            <td>Пыво 6</td>
                            <td>5</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                        </tr>
                        <tr>
                            <td>Пыво 7</td>
                            <td>5</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                        </tr>
                        <tr>
                            <td>Пыво 8</td>
                            <td>5</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                        </tr>
                        <tr>
                            <td>Пыво 9</td>
                            <td>5</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                        </tr>
                        <tr>
                            <td>Пыво 10</td>
                            <td>5</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                        </tr>
                    </tbody>

                    <thead>
                        <tr class="blue">
                            <th colspan="4">Охлаждатор</th>
                            <th colspan="1">3 шт.</th>
                        </tr>
                    </thead>

                        </table>

                        </div>

                    </article>
                </div> -->
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
