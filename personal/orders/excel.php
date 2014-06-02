<?// Подключаем класс для работы с excel
require_once $_SERVER['DOCUMENT_ROOT'].'/lib/phpexcel/classes/PHPExcel.php';
// Подключаем класс для вывода данных в формате excel
require_once $_SERVER['DOCUMENT_ROOT'].'/lib/phpexcel/classes/PHPExcel/Writer/Excel5.php';



/*
библа PHPExcel
плохо хавает большие объемы данных!!!
тестим по частям
ебанутая обработка ошибок

!!при успешном выполнении после ошибки
!!текст ошибки в браузере не исчезает
*/



?>
<?for($order_num = 0; $order_num < count($arResult['ORDERS']); $order_num++):?>
<?

// Создаем объект класса PHPExcel
$xls = new PHPExcel();

// Устанавливаем индекс активного листа
$xls->setActiveSheetIndex(0);
// Получаем активный лист
$sheet = $xls->getActiveSheet();
// Подписываем лист
$sheet->setTitle('Заказ');


/*Делаем стиль*/


//Ширинки))

$sheet->getColumnDimension('A')->setWidth(20);
$sheet->getColumnDimension('B')->setWidth(15);
$sheet->getColumnDimension('C')->setWidth(15);
$sheet->getColumnDimension('D')->setWidth(15);
$sheet->getColumnDimension('E')->setWidth(15);
$sheet->getColumnDimension('F')->setWidth(15);
$sheet->getColumnDimension('G')->setWidth(15);
$sheet->getColumnDimension('H')->setWidth(15);
$sheet->getColumnDimension('I')->setWidth(15);
$sheet->getColumnDimension('J')->setWidth(20);



//массив стилей
$style_wrap = array(
    //рамки
    'borders'=>array(
        //внутренняя
        'allborders'=>array(
            'style'=>PHPExcel_Style_Border::BORDER_THIN,
            'color' => array(
                'rgb'=>'000000'
            )
        )
    )
);

//J7 - нижняя правая нужная ячейка
$sheet->getStyle('A1:J7')->applyFromArray($style_wrap);

/*Кончаем стиль*/

/*Делаем шапку*/


// Вставляем текст в ячейку A1

$sheet->setCellValue("A1", $arResult['ORDERS'][$order_num]['MARKET_NAME']);
$sheet->getStyle('A1')->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('A1')->getFill()->getStartColor()->setRGB('FF0000');
$sheet->getStyle('A1')->getFont()->getColor()->applyFromArray(array('rgb' => 'FFFFFF'));
// Объединяем ячейки
$sheet->mergeCells('A1:C1');

// Выравнивание текста
$sheet->getStyle('A1')->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);



$sheet->setCellValue("D1", 'Заказ оформил '.$arResult['ORDERS'][$order_num]['ORDER_AGENT']);
$sheet->getStyle('D1')->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('D1')->getFill()->getStartColor()->setRGB('FF0000');
$sheet->getStyle('D1')->getFont()->getColor()->applyFromArray(array('rgb' => 'FFFFFF'));
$sheet->mergeCells('D1:G1');
$sheet->getStyle('D1')->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


$sheet->setCellValue("H1", $arResult['ORDERS'][$order_num]['ORDER_DATE']);
$sheet->getStyle('H1')->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('H1')->getFill()->getStartColor()->setRGB('FF0000');
$sheet->getStyle('H1')->getFont()->getColor()->applyFromArray(array('rgb' => 'FFFFFF'));
$sheet->mergeCells('H1:J1');
$sheet->getStyle('H1')->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);



$sheet->setCellValue("A2", '');
$sheet->getStyle('A2')->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('A2')->getFill()->getStartColor()->setRGB('FFFFFF');
$sheet->getStyle('A2')->getFont()->getColor()->applyFromArray(array('rgb' => 'FFFFFF'));
$sheet->mergeCells('A2:J2');
$sheet->getStyle('A2')->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


//Конец общей шапки

                        $a = isset($arResult['ORDERS'][$order_num]['ITEMS'][0]);
                        $b = isset($arResult['ORDERS'][$order_num]['ITEMS'][1]);
                        $c = isset($arResult['ORDERS'][$order_num]['ITEMS'][2]);
                        $d = isset($arResult['ORDERS'][$order_num]['ITEMS'][3]);
                        $e = isset($arResult['ORDERS'][$order_num]['ITEMS'][4]);

                        if($a || $b || $c || $d || $e):?>
                        <?
//Начало раздела
$sheet->setCellValue("A3", 'Отечественное пиво');
$sheet->getStyle('A3')->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('A3')->getFill()->getStartColor()->setRGB('808080');
$sheet->getStyle('A3')->getFont()->getColor()->applyFromArray(array('rgb' => 'FFFFFF'));
$sheet->mergeCells('A3:J3');
$sheet->getStyle('A3')->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);




$sheet->setCellValue("A4", 'Наименование');
$sheet->getStyle('A4')->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('A4')->getFill()->getStartColor()->setRGB('F0F0F0');
$sheet->getStyle('A4')->getFont()->getColor()->applyFromArray(array('rgb' => '0000000'));
$sheet->mergeCells('A4:A5');
//Эта хуита заработала с 100го раза. Глючная библиотека вообще. Давать значения сначала А4 B5
//Ну херова она мержит столбики. Сходу хавает только ряды
$sheet->getStyle('A4')->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);



$sheet->setCellValue("B4", 'Бутылки');
$sheet->getStyle('B4')->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('B4')->getFill()->getStartColor()->setRGB('88DBFF');
$sheet->getStyle('B4')->getFont()->getColor()->applyFromArray(array('rgb' => '0000000'));
$sheet->mergeCells('B4:E4');
$sheet->getStyle('B4')->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);



$sheet->setCellValue("F4", 'Банки');
$sheet->getStyle('F4')->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('F4')->getFill()->getStartColor()->setRGB('3196FF');
$sheet->getStyle('F4')->getFont()->getColor()->applyFromArray(array('rgb' => '0000000'));
$sheet->mergeCells('F4:I4');
$sheet->getStyle('F4')->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);



$sheet->setCellValue("J4", 'Сумма по позиции');
$sheet->getStyle('J4')->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('J4')->getFill()->getStartColor()->setRGB('FFFF06');
$sheet->getStyle('J4')->getFont()->getColor()->applyFromArray(array('rgb' => '0000000'));
$sheet->mergeCells('J4:J5');
$sheet->getStyle('J4')->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


$sheet->setCellValue("B5", 'Ящики');
$sheet->getStyle('B5')->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('B5')->getFill()->getStartColor()->setRGB('9BCC01');
$sheet->getStyle('B5')->getFont()->getColor()->applyFromArray(array('rgb' => '0000000'));
$sheet->getStyle('B5')->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


$sheet->setCellValue("C5", 'Штуки');
$sheet->getStyle('C5')->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('C5')->getFill()->getStartColor()->setRGB('369900');
$sheet->getStyle('C5')->getFont()->getColor()->applyFromArray(array('rgb' => '0000000'));
$sheet->getStyle('C5')->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);



$sheet->setCellValue("D5", 'Цена');
$sheet->getStyle('D5')->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('D5')->getFill()->getStartColor()->setRGB('FFFF06');
$sheet->getStyle('D5')->getFont()->getColor()->applyFromArray(array('rgb' => '0000000'));
$sheet->getStyle('D5')->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);



$sheet->setCellValue("E5", 'Остаток');
$sheet->getStyle('E5')->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('E5')->getFill()->getStartColor()->setRGB('F279A0');
$sheet->getStyle('E5')->getFont()->getColor()->applyFromArray(array('rgb' => '0000000'));
$sheet->getStyle('E5')->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);



$sheet->setCellValue("F5", 'Ящики');
$sheet->getStyle('F5')->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('F5')->getFill()->getStartColor()->setRGB('9BCC01');
$sheet->getStyle('F5')->getFont()->getColor()->applyFromArray(array('rgb' => '0000000'));
$sheet->getStyle('F5')->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


$sheet->setCellValue("G5", 'Штуки');
$sheet->getStyle('G5')->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('G5')->getFill()->getStartColor()->setRGB('369900');
$sheet->getStyle('G5')->getFont()->getColor()->applyFromArray(array('rgb' => '0000000'));
$sheet->getStyle('G5')->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);



$sheet->setCellValue("H5", 'Цена');
$sheet->getStyle('H5')->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('H5')->getFill()->getStartColor()->setRGB('FFFF06');
$sheet->getStyle('H5')->getFont()->getColor()->applyFromArray(array('rgb' => '0000000'));
$sheet->getStyle('H5')->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);



$sheet->setCellValue("I5", 'Остаток');
$sheet->getStyle('I5')->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('I5')->getFill()->getStartColor()->setRGB('F279A0');
$sheet->getStyle('I5')->getFont()->getColor()->applyFromArray(array('rgb' => '0000000'));
$sheet->getStyle('I5')->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

?>

                    <?endif;?>

                        <?for($item_num = 0; $item_num < 6; $item_num++):?>

                            <?if(!isset($arResult['ORDERS'][$order_num]['ITEMS'][$item_num]))
                                continue;
                            ?>
<?
$sheet->setCellValue("A".($item_num + 6) , $arResult['ORDERS'][$order_num]['ITEMS'][$item_num]['NAME']);
$sheet->getStyle('A'.($item_num + 6))->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('A'.($item_num + 6))->getFont()->getColor()->applyFromArray(array('rgb' => '0000000'));
$sheet->getStyle('A'.($item_num + 6))->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$sheet->setCellValue("B".($item_num + 6), $arResult['ORDERS'][$order_num]['ITEMS'][$item_num]['BOTTLE']['QUANT']['BOX']);
$sheet->getStyle('B'.($item_num + 6))->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('B'.($item_num + 6))->getFont()->getColor()->applyFromArray(array('rgb' => '0000000'));
$sheet->getStyle('B'.($item_num + 6))->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$sheet->setCellValue("C".($item_num + 6), $arResult['ORDERS'][$order_num]['ITEMS'][$item_num]['BOTTLE']['QUANT']['UNIQ']);
$sheet->getStyle('C'.($item_num + 6))->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('C'.($item_num + 6))->getFont()->getColor()->applyFromArray(array('rgb' => '0000000'));
$sheet->getStyle('C'.($item_num + 6))->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$sheet->setCellValue("D".($item_num + 6), $arResult['ORDERS'][$order_num]['ITEMS'][$item_num]['BOTTLE']['PRICE'].' руб.');
$sheet->getStyle('D'.($item_num + 6))->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('D'.($item_num + 6))->getFont()->getColor()->applyFromArray(array('rgb' => '0000000'));
$sheet->getStyle('D'.($item_num + 6))->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$sheet->setCellValue("E".($item_num + 6), $arResult['ORDERS'][$order_num]['ITEMS'][$item_num]['BOTTLE']['STOCK'].' шт.');
$sheet->getStyle('E'.($item_num + 6))->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('E'.($item_num + 6))->getFont()->getColor()->applyFromArray(array('rgb' => '0000000'));
$sheet->getStyle('E'.($item_num + 6))->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$sheet->setCellValue("F".($item_num + 6), $arResult['ORDERS'][$order_num]['ITEMS'][$item_num]['TIN']['QUANT']['BOX']);
$sheet->getStyle('F'.($item_num + 6))->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('F'.($item_num + 6))->getFont()->getColor()->applyFromArray(array('rgb' => '0000000'));
$sheet->getStyle('F'.($item_num + 6))->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$sheet->setCellValue("G".($item_num + 6), $arResult['ORDERS'][$order_num]['ITEMS'][$item_num]['TIN']['QUANT']['UNIQ']);
$sheet->getStyle('G'.($item_num + 6))->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('G'.($item_num + 6))->getFont()->getColor()->applyFromArray(array('rgb' => '0000000'));
$sheet->getStyle('G'.($item_num + 6))->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$sheet->setCellValue("H".($item_num + 6), $arResult['ORDERS'][$order_num]['ITEMS'][$item_num]['TIN']['PRICE'].' руб.');
$sheet->getStyle('H'.($item_num + 6))->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('H'.($item_num + 6))->getFont()->getColor()->applyFromArray(array('rgb' => '0000000'));
$sheet->getStyle('H'.($item_num + 6))->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$sheet->setCellValue("I".($item_num + 6), $arResult['ORDERS'][$order_num]['ITEMS'][$item_num]['TIN']['STOCK'].' шт.');
$sheet->getStyle('I'.($item_num + 6))->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('I'.($item_num + 6))->getFont()->getColor()->applyFromArray(array('rgb' => '0000000'));
$sheet->getStyle('I'.($item_num + 6))->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$sheet->setCellValue("J".($item_num + 6), $arResult['ORDERS'][$order_num]['ITEMS'][$item_num]['ITEM_SUMM'].' руб.');
$sheet->getStyle('J'.($item_num + 6))->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('J'.($item_num + 6))->getFont()->getColor()->applyFromArray(array('rgb' => '0000000'));
$sheet->getStyle('J'.($item_num + 6))->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

/*Конец товаров*/
?>


                        <?endfor;?>


                    <?
                        $a = isset($arResult['ORDERS'][$order_num]['ITEMS'][5]);
                        $b = isset($arResult['ORDERS'][$order_num]['ITEMS'][6]);
                        $c = isset($arResult['ORDERS'][$order_num]['ITEMS'][7]);
                        $d = isset($arResult['ORDERS'][$order_num]['ITEMS'][8]);
                        $e = isset($arResult['ORDERS'][$order_num]['ITEMS'][9]);
                        $f = isset($arResult['ORDERS'][$order_num]['ITEMS'][10]);
                        $g = isset($arResult['ORDERS'][$order_num]['ITEMS'][11]);
                        $h = isset($arResult['ORDERS'][$order_num]['ITEMS'][12]);
                        $i = isset($arResult['ORDERS'][$order_num]['ITEMS'][13]);
                        $j = isset($arResult['ORDERS'][$order_num]['ITEMS'][14]);


                        if($a || $b || $c || $d || $e || $f || $g || $h || $i || $j):

                           ?>

<?
//Начало раздела
$sheet->setCellValue("A".($item_num + 7), 'Импортное пиво');
$sheet->getStyle('A'.($item_num + 7))->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('A'.($item_num + 7))->getFill()->getStartColor()->setRGB('808080');
$sheet->getStyle('A'.($item_num + 7))->getFont()->getColor()->applyFromArray(array('rgb' => 'FFFFFF'));
$sheet->mergeCells('A'.($item_num + 7).':J'.($item_num + 7));
$sheet->getStyle('A'.($item_num + 7))->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);




$sheet->setCellValue("A".($item_num + 8), 'Наименование');
$sheet->getStyle('A'.($item_num + 8))->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('A'.($item_num + 8))->getFill()->getStartColor()->setRGB('F0F0F0');
$sheet->getStyle('A'.($item_num + 8))->getFont()->getColor()->applyFromArray(array('rgb' => '0000000'));
$sheet->mergeCells('A'.($item_num + 8).':A'.($item_num + 9));
//Эта хуита заработала с 100го раза. Глючная библиотека вообще. Давать значения сначала А4 B5
//Ну херова она мержит столбики. Сходу хавает только ряды
$sheet->getStyle('A'.($item_num + 8))->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);



$sheet->setCellValue("B".($item_num + 8), 'Бутылки');
$sheet->getStyle('B'.($item_num + 8))->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('B'.($item_num + 8))->getFill()->getStartColor()->setRGB('88DBFF');
$sheet->getStyle('B'.($item_num + 8))->getFont()->getColor()->applyFromArray(array('rgb' => '0000000'));
$sheet->mergeCells('B'.($item_num + 8).':E'.($item_num + 8));
$sheet->getStyle('B'.($item_num + 8))->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);



$sheet->setCellValue("F".($item_num + 8), 'Банки');
$sheet->getStyle('F'.($item_num + 8))->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('F'.($item_num + 8))->getFill()->getStartColor()->setRGB('3196FF');
$sheet->getStyle('F'.($item_num + 8))->getFont()->getColor()->applyFromArray(array('rgb' => '0000000'));
$sheet->mergeCells('F'.(($item_num + 8)).':I'.$item_num + 8);
$sheet->getStyle('F'.($item_num + 8))->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);



$sheet->setCellValue("J".($item_num + 8), 'Сумма по позиции');
$sheet->getStyle('J'.($item_num + 8))->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('J'.($item_num + 8))->getFill()->getStartColor()->setRGB('FFFF06');
$sheet->getStyle('J'.($item_num + 8))->getFont()->getColor()->applyFromArray(array('rgb' => '0000000'));
$sheet->mergeCells('J'.(($item_num + 8)).':J'.($item_num + 9));
$sheet->getStyle('J'.($item_num + 8))->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


$sheet->setCellValue("B".($item_num + 9), 'Ящики');
$sheet->getStyle('B'.($item_num + 9))->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('B'.($item_num + 9))->getFill()->getStartColor()->setRGB('9BCC01');
$sheet->getStyle('B'.($item_num + 9))->getFont()->getColor()->applyFromArray(array('rgb' => '0000000'));
$sheet->getStyle('B'.($item_num + 9))->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


$sheet->setCellValue("C".($item_num + 9), 'Штуки');
$sheet->getStyle('C'.($item_num + 9))->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('C'.($item_num + 9))->getFill()->getStartColor()->setRGB('369900');
$sheet->getStyle('C'.($item_num + 9))->getFont()->getColor()->applyFromArray(array('rgb' => '0000000'));
$sheet->getStyle('C'.($item_num + 9))->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);



$sheet->setCellValue("D".($item_num + 9), 'Цена');
$sheet->getStyle('D'.($item_num + 9))->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('D'.($item_num + 9))->getFill()->getStartColor()->setRGB('FFFF06');
$sheet->getStyle('D'.($item_num + 9))->getFont()->getColor()->applyFromArray(array('rgb' => '0000000'));
$sheet->getStyle('D'.($item_num + 9))->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);



$sheet->setCellValue("E".($item_num + 9), 'Остаток');
$sheet->getStyle('E'.($item_num + 9))->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('E'.($item_num + 9))->getFill()->getStartColor()->setRGB('F279A0');
$sheet->getStyle('E'.($item_num + 9))->getFont()->getColor()->applyFromArray(array('rgb' => '0000000'));
$sheet->getStyle('E'.($item_num + 9))->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);



$sheet->setCellValue("F".($item_num + 9), 'Ящики');
$sheet->getStyle('F'.($item_num + 9))->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('F'.($item_num + 9))->getFill()->getStartColor()->setRGB('9BCC01');
$sheet->getStyle('F'.($item_num + 9))->getFont()->getColor()->applyFromArray(array('rgb' => '0000000'));
$sheet->getStyle('F'.($item_num + 9))->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


$sheet->setCellValue("G".($item_num + 9), 'Штуки');
$sheet->getStyle('G'.($item_num + 9))->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('G'.($item_num + 9))->getFill()->getStartColor()->setRGB('369900');
$sheet->getStyle('G'.($item_num + 9))->getFont()->getColor()->applyFromArray(array('rgb' => '0000000'));
$sheet->getStyle('G'.($item_num + 9))->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);



$sheet->setCellValue("H".($item_num + 9), 'Цена');
$sheet->getStyle('H'.($item_num + 9))->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('H'.($item_num + 9))->getFill()->getStartColor()->setRGB('FFFF06');
$sheet->getStyle('H'.($item_num + 9))->getFont()->getColor()->applyFromArray(array('rgb' => '0000000'));
$sheet->getStyle('H'.($item_num + 9))->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);



$sheet->setCellValue("I".($item_num + 9), 'Остаток');
$sheet->getStyle('I'.($item_num + 9))->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('I'.($item_num + 9))->getFill()->getStartColor()->setRGB('F279A0');
$sheet->getStyle('I'.($item_num + 9))->getFont()->getColor()->applyFromArray(array('rgb' => '0000000'));
$sheet->getStyle('I'.($item_num + 9))->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

?>

                    <?endif;?>

                        <?for($item_num = 6; $item_num < 15; $item_num++):?>

                            <?if(!isset($arResult['ORDERS'][$order_num]['ITEMS'][$item_num]))
                                continue;
                            ?>

<?



?>

<?
$sheet->setCellValue("A".($item_num + 10) , $arResult['ORDERS'][$order_num]['ITEMS'][$item_num]['NAME']);
$sheet->getStyle('A'.($item_num + 10))->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('A'.($item_num + 10))->getFont()->getColor()->applyFromArray(array('rgb' => '0000000'));
$sheet->getStyle('A'.($item_num + 10))->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$sheet->setCellValue("B".($item_num + 10), $arResult['ORDERS'][$order_num]['ITEMS'][$item_num]['BOTTLE']['QUANT']['BOX']);
$sheet->getStyle('B'.($item_num + 10))->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('B'.($item_num + 10))->getFont()->getColor()->applyFromArray(array('rgb' => '0000000'));
$sheet->getStyle('B'.($item_num + 10))->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$sheet->setCellValue("C".$item_num + 10, $arResult['ORDERS'][$order_num]['ITEMS'][$item_num]['BOTTLE']['QUANT']['UNIQ']);
$sheet->getStyle('C'.($item_num + 10))->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('C'.($item_num + 10))->getFont()->getColor()->applyFromArray(array('rgb' => '0000000'));
$sheet->getStyle('C'.($item_num + 10))->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$sheet->setCellValue("D".$item_num + 10, $arResult['ORDERS'][$order_num]['ITEMS'][$item_num]['BOTTLE']['PRICE'].' руб.');
$sheet->getStyle('D'.($item_num + 10))->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('D'.($item_num + 10))->getFont()->getColor()->applyFromArray(array('rgb' => '0000000'));
$sheet->getStyle('D'.($item_num + 10))->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$sheet->setCellValue("E".($item_num + 10), $arResult['ORDERS'][$order_num]['ITEMS'][$item_num]['BOTTLE']['STOCK'].' шт.');
$sheet->getStyle('E'.($item_num + 10))->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('E'.($item_num + 10))->getFont()->getColor()->applyFromArray(array('rgb' => '0000000'));
$sheet->getStyle('E'.($item_num + 10))->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$sheet->setCellValue("F".($item_num + 10), $arResult['ORDERS'][$order_num]['ITEMS'][$item_num]['TIN']['QUANT']['BOX']);
$sheet->getStyle('F'.($item_num + 10))->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('F'.($item_num + 10))->getFont()->getColor()->applyFromArray(array('rgb' => '0000000'));
$sheet->getStyle('F'.($item_num + 10))->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$sheet->setCellValue("G".($item_num + 10), $arResult['ORDERS'][$order_num]['ITEMS'][$item_num]['TIN']['QUANT']['UNIQ']);
$sheet->getStyle('G'.($item_num + 10))->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('G'.($item_num + 10))->getFont()->getColor()->applyFromArray(array('rgb' => '0000000'));
$sheet->getStyle('G'.($item_num + 10))->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$sheet->setCellValue("H".($item_num + 10), $arResult['ORDERS'][$order_num]['ITEMS'][$item_num]['TIN']['PRICE'].' руб.');
$sheet->getStyle('H'.($item_num + 10))->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('H'.($item_num + 10))->getFont()->getColor()->applyFromArray(array('rgb' => '0000000'));
$sheet->getStyle('H'.($item_num + 10))->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$sheet->setCellValue("I".($item_num + 10), $arResult['ORDERS'][$order_num]['ITEMS'][$item_num]['TIN']['STOCK'].' шт.');
$sheet->getStyle('I'.($item_num + 10))->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('I'.($item_num + 10))->getFont()->getColor()->applyFromArray(array('rgb' => '0000000'));
$sheet->getStyle('I'.($item_num + 10))->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$sheet->setCellValue("J".($item_num + 10), $arResult['ORDERS'][$order_num]['ITEMS'][$item_num]['ITEM_SUMM'].' руб.');
$sheet->getStyle('J'.($item_num + 10))->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('J'.($item_num + 10))->getFont()->getColor()->applyFromArray(array('rgb' => '0000000'));
$sheet->getStyle('J'.($item_num + 10))->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
?>

<?



/*Конец товаров*/
?>
                        <?endfor;?>

<?
/*Делаем футер*/

$sheet->setCellValue("A7", '');//Последнее обновление: 18 ДЕК 2013 выполнил А. В. Гомодрилкин
$sheet->getStyle('A7')->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('A7')->getFill()->getStartColor()->setRGB('F0F0F0');//F279A0
$sheet->getStyle('A7')->getFont()->getColor()->applyFromArray(array('rgb' => '000000'));
$sheet->mergeCells('A7:H7');
$sheet->getStyle('A7')->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$sheet->setCellValue("I7", 'Итого:');
$sheet->getStyle('I7')->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('I7')->getFill()->getStartColor()->setRGB('FFFF06');
$sheet->getStyle('I7')->getFont()->getColor()->applyFromArray(array('rgb' => '000000'));
$sheet->getStyle('I7')->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


$sheet->setCellValue("J7", $arResult['ORDERS'][$order_num]['SUMM'].' руб.');
$sheet->getStyle('J7')->getFill()->setFillType(
    PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('J7')->getFill()->getStartColor()->setRGB('FFFF06');
$sheet->getStyle('J7')->getFont()->getColor()->applyFromArray(array('rgb' => '000000'));
$sheet->getStyle('J7')->getAlignment()->setHorizontal(
    PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


/*Конец футера, на локалке все заебись работает*/
?>



<?

/*Конец шапки раздела*/












// // Выводим HTTP-заголовки, если надо сходу выплюнуть файл
//  header ( "Expires: Mon, 1 Apr 1974 05:00:00 GMT" );
//  header ( "Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT" );
//  header ( "Cache-Control: no-cache, must-revalidate" );
//  header ( "Pragma: no-cache" );
//  header ( "Content-type: application/vnd.ms-excel" );
//  header ( "Content-Disposition: attachment; filename=order1.xls" );//Сюды имя файла

// Выводим содержимое файла
 $objWriter = new PHPExcel_Writer_Excel5($xls);


 $flink = $_SERVER['DOCUMENT_ROOT'].'/personal/orders/xls/order'.$order_num.'.xls';
 $objWriter->save($flink);
//echo "OK!";
?>
<?endfor;?>
<?
require_once 'output.php';
//include_once $_SERVER['DOCUMENT_ROOT'].'/personal/orders/sendmail.php';
?>