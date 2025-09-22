<?


require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

if (CUser::IsAuthorized()) {



	$newsIDs = array(
		"pb2" => "634",
		// "dconst_crb" => "414",
	);

	$newName = "Тест";
	$codeUNIC = "test_by_robot12";
	$newAnounce = "Анонс";
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
	$newPic = $_SERVER["DOCUMENT_ROOT"]."/images/ds2.jpg";



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
				"PREVIEW_PICTURE"   => CFile::MakeFileArray($newPic),
			);

			echo "<br>";
			if ($PRODUCT_ID = $el->Add($arLoadProductArray)) {
				echo "УСПЕШНО New ID: " . $PRODUCT_ID;
			} else {
				echo "Error: " . $el->LAST_ERROR;
				echo "ОШИБКА";
				echo "<hr>";
			}
			echo "<br>";


		endif;

	}

} else {
	die('залогинься или уйди!');
}
;
?>