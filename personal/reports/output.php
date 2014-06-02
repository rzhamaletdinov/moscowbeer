<?
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Cache-Control: post-check=0,pre-check=0", false);
header("Cache-Control: max-age=0", false);
header("Pragma: no-cache");
//НЕ КЭШИРУЙ БЛЯ!



function namecolor($id)
{
    if ($id == 1)
      echo 'class="lblue"';
    if ($id == 2)
      echo 'class="red"';
    if ($id == 3)
      echo 'class="lyellow"';
    if ($id == 4)
      echo 'class="ryellow"';
    if ($id == 5)
      echo 'class="upgreen"';
    if ($id == 6)//6 station
      echo 'class="ulgreen"';
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
                <h2 style="text-align: center">Отчет по работе торговых агентов в г. Москве</h2>
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
// var_dump($arResult['AGENT'][0]);
?>
<? for($agent_num = 0; $agent_num < 3; $agent_num++):   //3 агентов?>
                <div>
                    <input id="ac-<? echo ($agent_num + 1);?>" name="accordion-1" type="checkbox" />
                        <h3>
                        <label for="ac-<? echo ($agent_num + 1);?>">
                           <div class="ip"><?=$arResult['AGENT'][$agent_num]['NAME']?></div>
                            <div class="person">тел.
                            <?//Костыль)))
                            if($agent_num == 0)
                                echo'8-919-100-12-21';
                            if($agent_num == 1)
                                echo'8-926-956-81-70';
                            if($agent_num == 2)
                                echo'8-903-355-37-04';
                            ?> </div>
                        </label>
                        </h3>
                    <article class="ac-good">

                        <div id="table">

                  <table class="bordered">
                    <thead>

                        <tr>
                            <th class="lgrey" rowspan="2">Дата посещения</th>
                            <th class="lgrey" rowspan="2">Название<br>торговой точки</th>

                            <th class="lgrey" colspan="3">Кол-во посещений для КАЖДОЙ торговой точки</th>
                            <th class="lgrey" colspan="3">ОБЩЕЕ кол-во визитов</th>

                        </tr>
                        <tr>
                            <th class="ulgreen">За сегодня</th>
                            <th class="lgreen">За последние 7 дней</th>
                            <th class="rgreen">За месяц</th>
                            <th class="ulgreen">За сегодня</th>
                            <th class="lgreen">За последние 7 дней</th>
                            <th class="rgreen">За месяц</th>

                        </tr>
                    </thead>

                    <tbody>
                        <?for($visit_num = 0; $visit_num < count($arResult['AGENT'][$agent_num]['LASTMONTH']); $visit_num++):?>
                        <tr>
                            <td><?=$arResult['AGENT'][$agent_num]['LASTMONTH'][$visit_num]['DATE']?></td>
                            <!-- Имя -->
                            <td <?namecolor($arResult['AGENT'][$agent_num]['LASTMONTH'][$visit_num]['ID']);?>>
                            <?=$arResult['AGENT'][$agent_num]['LASTMONTH'][$visit_num]['NAME']?></td>
                            <!-- Уник ИД за день -->
                            <td>
                             <?
                               $visit = 0;

                                for($fuck_agent = 0; $fuck_agent < count($arResult['AGENT'][$agent_num]['TODAY']); $fuck_agent++)
                                {
                                    if(
                                        ($arResult['AGENT'][$agent_num]['TODAY'][$fuck_agent]['DATE'] <=
                                        $arResult['AGENT'][$agent_num]['LASTMONTH'][$visit_num]['DATE'])
                                        &&
                                        ($arResult['AGENT'][$agent_num]['TODAY'][$fuck_agent]['ID'] ==
                                        $arResult['AGENT'][$agent_num]['LASTMONTH'][$visit_num]['ID'])
                                      )
                                        $visit++;
                                }
                                echo $visit;
                            ?>
                            </td>
                            <!-- Уник за неделю -->
                            <td>
                            <?
                                $visit = 0;

                                for($fuck_agent = 0; $fuck_agent < count($arResult['AGENT'][$agent_num]['LASTWEEK']); $fuck_agent++)
                                {
                                    if(
                                        ($arResult['AGENT'][$agent_num]['LASTWEEK'][$fuck_agent]['DATE'] <=
                                        $arResult['AGENT'][$agent_num]['LASTMONTH'][$visit_num]['DATE'])
                                        &&
                                        ($arResult['AGENT'][$agent_num]['LASTWEEK'][$fuck_agent]['ID'] ==
                                        $arResult['AGENT'][$agent_num]['LASTMONTH'][$visit_num]['ID'])
                                      )
                                        $visit++;
                                }
                                echo $visit;
                            ?>
                            </td>
                            <!-- Уник за месяц -->
                            <td>
                            <?
                                $visit = 0;

                                for($fuck_agent = 0; $fuck_agent < count($arResult['AGENT'][$agent_num]['LASTMONTH']); $fuck_agent++)
                                {
                                    if(
                                        ($arResult['AGENT'][$agent_num]['LASTMONTH'][$fuck_agent]['DATE'] <=
                                        $arResult['AGENT'][$agent_num]['LASTMONTH'][$visit_num]['DATE'])
                                        &&
                                        ($arResult['AGENT'][$agent_num]['LASTMONTH'][$fuck_agent]['ID'] ==
                                        $arResult['AGENT'][$agent_num]['LASTMONTH'][$visit_num]['ID'])
                                      )
                                        $visit++;
                                }
                                echo $visit;
                            ?>


                            </td>
<!-- Общее кол-во посещений -->
<!-- День -->
                            <td>

                            <?
                               $visit = 0;

                                for($fuck_agent = 0; $fuck_agent < count($arResult['AGENT'][$agent_num]['TODAY']); $fuck_agent++)
                                {
                                    if(
                                        ($arResult['AGENT'][$agent_num]['TODAY'][$fuck_agent]['DATE'] <=
                                        $arResult['AGENT'][$agent_num]['LASTMONTH'][$visit_num]['DATE'])
                                      )
                                        $visit++;
                                }
                                echo $visit;
                            ?>
                            </td>


                            <!-- Неделя -->
                            <td>

                             <?
                                $visit = 0;

                                for($fuck_agent = 0; $fuck_agent < count($arResult['AGENT'][$agent_num]['LASTWEEK']); $fuck_agent++)
                                {
                                    if(
                                        ($arResult['AGENT'][$agent_num]['LASTWEEK'][$fuck_agent]['DATE'] <=
                                        $arResult['AGENT'][$agent_num]['LASTMONTH'][$visit_num]['DATE'])

                                      )
                                        $visit++;
                                }
                                echo $visit;
                            ?>

                            </td>

                            <!-- Месяц -->
                            <td>

                                <?
                                $visit = 0;

                                for($fuck_agent = 0; $fuck_agent < count($arResult['AGENT'][$agent_num]['LASTMONTH']); $fuck_agent++)
                                {
                                    if(
                                        ($arResult['AGENT'][$agent_num]['LASTMONTH'][$fuck_agent]['DATE'] <=
                                        $arResult['AGENT'][$agent_num]['LASTMONTH'][$visit_num]['DATE'])

                                      )
                                        $visit++;
                                }
                                echo $visit;
                            ?>

                            </td>
                        </tr>
                        <? endfor; ?>

                    </tbody>



                    <!-- <thead>
                        <tr class="red">
                            <th colspan="1">Последнее обновление:</th>
                            <th colspan="2">5 ДЕК 2013 в 15:00</th>
                            <th colspan="1">выполнил</th>
                            <th colspan="3">Пупкин И. А.</th>
                        </tr>
                    </thead> -->

                        </table>

                        </div>


                    </article>
                </div>
            <? endfor;?>

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

