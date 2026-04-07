<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Отзывы");
?>

<?$APPLICATION->IncludeComponent(
    "bitrix:news",
    "reviews",
    array(
        "IBLOCK_TYPE" => "reviews",
        "IBLOCK_ID" => "2",
        "NEWS_COUNT" => "10",
        "USE_SEARCH" => "N",
        "USE_RSS" => "N",
        "USE_RATING" => "N",
        "USE_CATEGORIES" => "N",
        "USE_FILTER" => "N",
        "USE_REVIEW" => "N",
        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_ORDER1" => "DESC",
        "SORT_BY2" => "SORT",
        "SORT_ORDER2" => "ASC",
        "CHECK_DATES" => "Y",
        "SEF_MODE" => "Y",
        "SEF_FOLDER" => "/reviews/",
        "CACHE_TYPE" => "N",
        "CACHE_TIME" => "36000000",
        "CACHE_GROUPS" => "Y",
        "DISPLAY_PANEL" => "N",
        "SET_TITLE" => "N",
        "SET_STATUS_404" => "Y",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
        "ADD_SECTIONS_CHAIN" => "Y",
        "LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
        "LIST_FIELD_CODE" => array(),
        "LIST_PROPERTY_CODE" => array("POSITION", "COMPANY"),
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "DISPLAY_DATE" => "Y",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
        "DETAIL_FIELD_CODE" => array(),
        "DETAIL_PROPERTY_CODE" => array("POSITION", "COMPANY"),
        "SET_LAST_MODIFIED" => "N",
        "SEF_URL_TEMPLATES" => array(
            "news" => "",
            "detail" => "#ELEMENT_ID#/",
        )
    ),
    false
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>