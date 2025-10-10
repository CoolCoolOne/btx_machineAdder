<?


require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

if (CUser::IsAuthorized()) {



	$newsIDs = array(
		// "pb2" => "634",
		// "dconst_crb" => "414",
		// "pav_crb" => "874",
		// "gp31" => "349",
		// "serg-crb" => "115",
		// "https://kantub.mznn.ru/" => "762",
		// "dgp1" => "746",
		// "dib8" => "682",
		// "crbbog" => "538",
		// "crb-sosn" => "1022",
		// "vetluga-crb" => "401",
		// "https://dgp18.mznn.ru/" => "375",
		// "https://cozsir.mznn.ru/" => "1039",
		// "https://gorodec-crb.mznn.ru/" => "890",
		// "https://cmp.mznn.ru/" => "698",
		// "https://dgb25.mznn.ru/" => "714",
		// "https://gp21.mznn.ru/" => "271",
		// "https://gp7.mznn.ru/" => "1146",
		// "https://pilna-crb.mznn.ru/" => "479",
		// "https://rod-dom4.mznn.ru/" => "730",
		// "https://gb37.mznn.ru/" => "323",
		// "https://gkb34.mznn.ru/" => "602",
		// "https://dzer-pnd.mznn.ru/" => "297",
		// "https://dgp48.mznn.ru/" => "310",
		// "https://semashko.nnov.ru/" => "199",
		// "ardatov" => "970",
		// "https://bboldino-crb.mznn.ru/" => "586",
		// "https://gb24.mznn.ru/" => "336",
		// "https://dgp22.mznn.ru/" => "906",
		// "roddom1" => "30",
		// "https://kiseliha-gvv.mznn.ru/" => "522",
		// "https://nokptd.mznn.ru/" => "810",
		// "https://sud-med.mznn.ru/" => "666",
		// "https://lukoyanov-crb.mznn.ru/" => "466",
		// "http://kpb.nnov.ru/" => "650",
		// "gkb7 berezow" => "1164",
		// "https://gp4.mznn.ru/" => "255",
		// "https://gkb10.mznn.ru/" => "440",
	);

	$newName = "Онлайн-опрос граждан в целях оценки уровня «Бытовой» коррупции";
	// используй новый уникальный codeUNIC
	$codeUNIC = "corrupt081025_1";
	$newAnounce = "Помоги измерить уровень коррупции";
	$newPic = $_SERVER["DOCUMENT_ROOT"] . "/adder/01.png";
	// используй \ для экранирования кавычек
	$newDetail = "
<p align=\"center\" style=\"color: #3b434e; background: white;\">
	 Уважаемые&nbsp;жители Нижегородской области!&nbsp;
</p>
<p style=\"color: #3b434e; background: white;\">
 <span style=\"color: #101010;\">С 1 октября по 31 октября 2024 г. проводится онлайн-опрос граждан в целях оценки уровня «Бытовой» коррупции!</span>
</p>
<p style=\"color: #3b434e; background: white;\">
 <span style=\"color: #101010;\">Бытовая коррупция - это постоянное и регулярное подношение разнообразных подарков и денежных сумм в повседневной жизни человека</span>.
</p>
<p style=\"color: #3b434e; background: white;\">
 <b><span style=\"color: #101010;\">Гарантируется</span></b><span style=\"color: #101010;\">&nbsp;анонимность и конфиденциальность. Вся полученная информация используется только в обобщенном виде.</span>
</p>
<p style=\"color: #3b434e; background: white;\">
 <span style=\"color: #101010;\">В ваших интересах пройти опрос по следующим причинам:</span>
</p>
<p style=\"color: #3b434e; background: white;\">
 <span style=\"color: #101010;\">-&nbsp;</span><span style=\"color: #101010;\">Участвуя в соцопросе, Вы поможете органам власти объективно оценить уровень «бытовой» коррупции в Нижегородской области.</span>
</p>
<p style=\"color: #3b434e; background: white;\">
 <span style=\"color: #101010;\">-&nbsp;</span><span style=\"color: #101010;\">Итоги соцопроса позволят выработать решения по минимизации «бытовой» коррупции.</span>
</p>
<p style=\"color: #3b434e; background: white;\">
 <span style=\"color: #101010;\">-&nbsp;</span><span style=\"color: #101010;\">Результаты соцопроса будут доведены до руководства области для принятия решений по вопросам борьбы с коррупцией и повышения эффективности применения антикоррупционных мер.</span>
</p>
<p style=\"color: #3b434e; background: white;\">
	 Для начала анкетирования&nbsp;<b>ПЕРЕЙДИТЕ</b>&nbsp;по ссылке:&nbsp;<b><a href=\"https://anticor.nobl.ru/vote/618/\">https://anticor.nobl.ru/vote/618/</a></b>
</p>
<p style=\"color: #3b434e; background: white;\">
 <br>
</p>
<p style=\"color: #3b434e; background: white; text-align: center;\">
 <b>НАМ ВАЖНО ВАШЕ МНЕНИЕ!</b>
</p>
	";

echo "Id новых элементов и ошибки будут залогированы в /adder/log.txt <br><hr>";
$filename = $_SERVER["DOCUMENT_ROOT"] . '/adder/log.txt';
file_put_contents($filename, PHP_EOL . ConvertTimeStamp(time()), FILE_APPEND);

	foreach ($newsIDs as $mo_name => $id) {
		echo "МО: $mo_name => ID инфоблока: $id\n";

		if (CModule::IncludeModule("iblock")):
			$el = new CIBlockElement;
			$PROP = array();
			$PROP['SHOW_IN_SLIDER'] = true;
			$arLoadProductArray = array(
				"MODIFIED_BY" => $USER->GetID(),
				"CODE" => $codeUNIC,
				"DATE_ACTIVE_FROM" => ConvertTimeStamp(time(), "SHORT"),
				"IBLOCK_SECTION_ID" => false,          // элемент лежит в корне раздела
				"IBLOCK_ID" => $id,
				"PROPERTY_VALUES" => $PROP,
				"NAME" => $newName,
				"ACTIVE" => "Y",            // активен
				"PREVIEW_TEXT" => $newAnounce,
				"DETAIL_TEXT" => $newDetail,
				"DETAIL_TEXT_TYPE" => "html",
				"PREVIEW_PICTURE" => CFile::MakeFileArray($newPic),
			);

			echo "<br>";
			if ($PRODUCT_ID = $el->Add($arLoadProductArray)) {
				echo "УСПЕШНО New ID: " . $PRODUCT_ID;

				$new_str = $mo_name .'->'. $PRODUCT_ID;
				file_put_contents($filename, PHP_EOL . $new_str, FILE_APPEND);

			} else {
				echo "Error: " . $el->LAST_ERROR;
				echo "ОШИБКА";
				echo "<hr>";
				$new_str = $mo_name .'->'. $el->LAST_ERROR;
				file_put_contents($filename, PHP_EOL . $new_str, FILE_APPEND);
			}
			echo "<br>";



		endif;

	}

} else {
	die('залогинься или уйди!');
}
;
?>