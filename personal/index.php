<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Московская пивоваренная компания</title>

	<!-- Стили CSS -->
            <link rel="stylesheet" href="../css/style.css">
		<link rel="stylesheet" type="text/css" href="../css/navigation.css"/>
      <link rel="stylesheet" type="text/css" href="../css/templatestyles.css"/>
    <link rel="stylesheet" type="text/css" href="../css/styles.css"/>
	    <link rel="stylesheet" type="text/css" href="../css/stylemain.css">
      <link rel="stylesheet" type="text/css" href="../css/personal.css">
        <link href='http://fonts.googleapis.com/css?family=Sintony:400,700' rel='stylesheet' type='text/css'>






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
                <a  href="../../../"><div id="exit">
                    <h3>
                    Выйти из системы
                    </h3>
                </div></a>

                 <div style="text-align: center">
                    <img src="../images/logo.jpg" width="1003" height="323" alt="Фотография">
                </div>

           <div style="text-align:center">

            <h2>Здравствуйте, Тестовый Директор!</h2>
            <br>
            <br>
            <h2>
             В демо-версии программы доступны следующие разделы:</h2>
            <br>
            <br>


            <ul class="navigation">


			<a href="store">
			<li>
				<h2>Магазины</h2>

				<p> &nbsp;Информация о наличии товаров в торговых точках</p>
			</li>
			</a>

      <a href="orders">
			<li>
				<h2>Заказы</h2>
				<p>Все поступившие заказы от торговых представителей</p>
			</li>
      </a>

      <a href="reports">
			<li>
				<h2>Отчеты</h2>
				<p>Статистика работы торговых агентов за день, неделю и месяц</p>
			</li>
      </a>

      <a href="../present/mpk.pptx">
			<li>
				<h2>О программе</h2>
				<p>Как работает данное ПО. Презентация продукта</p>
			</li>
      </a>

			</ul>



               <p id="back-top">
                      <a href="#top"><span></span><!-- Вверх --></a>
                    </p>

          </div>
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
