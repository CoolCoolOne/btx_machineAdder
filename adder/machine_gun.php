<?


require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

if (CUser::IsAuthorized()) {



	$newsIDs = array(
		"pb2" => "634",
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
		// "name" => "id",
		// "name" => "id",
		// "name" => "id",
		// "name" => "id",
		// "name" => "id",
		// "name" => "id",
		// "name" => "id",
		// "name" => "id",
		// "name" => "id",
		// "name" => "id",
		// "name" => "id",
		// "name" => "id",
	);

	$newName = "Название";
	// используй новый уникальный codeUNIC
	$codeUNIC = "test_by_robot13";
	$newAnounce = "Анонс";
	$newPic = $_SERVER["DOCUMENT_ROOT"] . "/adder/test.jpg";
	// используй \ для экранирования кавычек
	$newDetail = "
<div class=\"galery-wrapper\">
              <a href=\"/upload/iblock/070/070fe18913ac2c6f1a2d4cfc4de783ac.jpg\" data-fancybox=\"group\" data-action=\"fancybox\">
            <img src=\"/upload/iblock/070/070fe18913ac2c6f1a2d4cfc4de783ac.jpg\">
          </a>
              <a href=\"/upload/iblock/d23/d2369f0d282e6aa376524f55d0e1d7c1.jpg\" data-fancybox=\"group\" data-action=\"fancybox\">
            <img src=\"/upload/iblock/d23/d2369f0d282e6aa376524f55d0e1d7c1.jpg\">
          </a>
</div>
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