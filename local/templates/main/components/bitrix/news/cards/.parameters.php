<?php
$arTemplateParameters["SEF_MODE"] = [
    "news" => [
        "NAME" => GetMessage("T_IBLOCK_SEF_PAGE_NEWS"),
        "DEFAULT" => "",
        "VARIABLES" => [],
    ],
    "section" => [
        "NAME" => GetMessage("T_IBLOCK_SEF_PAGE_NEWS_SECTION"),
        "DEFAULT" => "",
        "VARIABLES" => ["SECTION_ID"],
    ],
    "detail" => [
        "NAME" => GetMessage("T_IBLOCK_SEF_PAGE_NEWS_DETAIL"),
        "DEFAULT" => "#ELEMENT_ID#/",
        "VARIABLES" => ["ELEMENT_ID", "SECTION_ID"],
    ],
    "client_category_detail" => [
        "NAME" => GetMessage("T_IBLOCK_SEF_PAGE_CLIENT_CATEGORY_DETAIL"),
        "DEFAULT" => "",
        "VARIABLES" => ["CLIENT_CATEGORY_CODE"],
    ]
];