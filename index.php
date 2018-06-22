<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?IncludeTemplateLangFile(__FILE__);?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <!-- Twitter Card data -->
    <meta name="twitter:site" content="">
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="">

    <!-- Open Graph data -->
    <meta property="og:title" content="">
    <meta property="og:type" content="article">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <meta property="og:description" content="">
    <meta property="og:site_name" content="">
    <title>kovka5</title>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <?$APPLICATION->ShowHead()?>
    <?$APPLICATION->SetAdditionalCSS("/bitrix/templates/".SITE_TEMPLATE_ID."/css/kovka5.css");?>
</head>
<body>
<?$APPLICATION->ShowPanel();?>
<div class="wrp">
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"><img class="header__logo" src="<?=SITE_TEMPLATE_PATH?>/img/logo.svg" alt=""></div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="header__location">
                        <img src="<?=SITE_TEMPLATE_PATH?>/img/location.svg" alt="">Астана, ул. Жанажол, 4
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <a class="header__phone" href="tel:+77476760549"><img src="<?=SITE_TEMPLATE_PATH?>/img/phone.svg" alt="">+7 747 676 05 49</a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <button class="header__btn popap_box" data-toggle="modal" data-target="#exampleModal">ЗАКАЗАТЬ ЗВОНОК</button>
                </div>
            </div>
        </div>
    </header>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="modal__header">ЗАказать обратный звонок</div>
                    </div>
                    <div class="row">
                        <div class="modal__item col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <input type="text" placeholder="Ваше имя">
                        </div>
                        <div class="modal__item col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <input type="text" placeholder="Контактный телефон">
                        </div>
                    </div>
                    <div class="row">
                        <div class="modal__item col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <input type="text" placeholder="Электроннная почта">
                        </div>
                        <div class="modal__item col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <input type="submit">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?$APPLICATION->IncludeComponent("bitrix:menu", "nav", Array(
        "COMPONENT_TEMPLATE" => ".default",
        "ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
        "MENU_CACHE_TYPE" => "N",	// Тип кеширования
        "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
        "MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
        "MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
        "MAX_LEVEL" => "1",	// Уровень вложенности меню
        "CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
        "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
        "DELAY" => "N",	// Откладывать выполнение шаблона меню
        "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
    ),
        false
    );?>
    <?$APPLICATION->IncludeComponent(
        "bitrix:main.include",
        "",
        Array(
            "AREA_FILE_SHOW" => "page",
            "AREA_FILE_SUFFIX" => "slider",
            "EDIT_TEMPLATE" => ""
        )
    );?>

    <main class="main">
        <div class="container">
            <div class="row">
                <h1 class="main__header">О КУЗНИЦЕ</h1>
                #WORK_AREA#
            </div>
        </div>

        <?$APPLICATION->IncludeComponent(
            "bitrix:main.include",
            "",
            Array(
                "AREA_FILE_SHOW" => "page",
                "AREA_FILE_SUFFIX" => "main-catalog",
                "EDIT_TEMPLATE" => ""
            )
        );?>

        <?$APPLICATION->IncludeComponent(
            "bitrix:main.include",
            "",
            Array(
                "AREA_FILE_SHOW" => "page",
                "AREA_FILE_SUFFIX" => "now",
                "EDIT_TEMPLATE" => ""
            )
        );?>


        <div class="feedback">
            <div class="container">
                <div class="row">
                    <div class="feedback__inner">
                        <h2>СВЯЗАТЬСЯ С МЕНЕЖЕРОМ</h2>
                        <h5>оставьте свои контактные данные и мы вам обязательно перезвоним</h5>
                        <form action="" class="feedback__form">
                            <div class="col-lg-3 col-lg-offset-1 col-md-4 col-sm-4 col-xs-12">
                                <input type="text" placeholder="Ваше имя">
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                                <input type="text" placeholder="Контактный телефон">
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                                <input type="submit" value="ЗАКАЗАТЬ ЗВОНОК">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?$APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "partners",
            array(
                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                "ADD_SECTIONS_CHAIN" => "N",
                "AJAX_MODE" => "N",
                "AJAX_OPTION_ADDITIONAL" => "",
                "AJAX_OPTION_HISTORY" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "N",
                "CACHE_FILTER" => "N",
                "CACHE_GROUPS" => "Y",
                "CACHE_TIME" => "36000000",
                "CACHE_TYPE" => "A",
                "CHECK_DATES" => "Y",
                "DETAIL_URL" => "",
                "DISPLAY_BOTTOM_PAGER" => "N",
                "DISPLAY_DATE" => "N",
                "DISPLAY_NAME" => "N",
                "DISPLAY_PICTURE" => "Y",
                "DISPLAY_PREVIEW_TEXT" => "N",
                "DISPLAY_TOP_PAGER" => "N",
                "FIELD_CODE" => array(
                    0 => "",
                    1 => "",
                ),
                "FILTER_NAME" => "",
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                "IBLOCK_ID" => "10",
                "IBLOCK_TYPE" => "kovka5",
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                "INCLUDE_SUBSECTIONS" => "Y",
                "MESSAGE_404" => "",
                "NEWS_COUNT" => "10",
                "PAGER_BASE_LINK_ENABLE" => "N",
                "PAGER_DESC_NUMBERING" => "N",
                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                "PAGER_SHOW_ALL" => "N",
                "PAGER_SHOW_ALWAYS" => "N",
                "PAGER_TEMPLATE" => ".default",
                "PAGER_TITLE" => "Слайдер зала",
                "PARENT_SECTION" => "",
                "PARENT_SECTION_CODE" => "",
                "PREVIEW_TRUNCATE_LEN" => "",
                "PROPERTY_CODE" => array(
                    0 => "",
                    1 => "",
                ),
                "SET_BROWSER_TITLE" => "N",
                "SET_LAST_MODIFIED" => "N",
                "SET_META_DESCRIPTION" => "N",
                "SET_META_KEYWORDS" => "N",
                "SET_STATUS_404" => "N",
                "SET_TITLE" => "N",
                "SHOW_404" => "N",
                "SORT_BY1" => "ACTIVE_FROM",
                "SORT_BY2" => "SORT",
                "SORT_ORDER1" => "DESC",
                "SORT_ORDER2" => "ASC",
                "STRICT_SECTION_CHECK" => "N",
                "COMPONENT_TEMPLATE" => "partners"
            ),
            false
        );?>
    </main>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => "/bitrix/templates/".SITE_TEMPLATE_ID."/include/footer__copyright.php"
                        )
                    );?>
                </div>
                <div class="col-lg-3 col-lg-offset-1 col-md-offset-0 col-md-4 col-sm-4 col-xs-12">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => "/bitrix/templates/".SITE_TEMPLATE_ID."/include/footer__contacts.php"
                        )
                    );?>
                </div>
                <div class="col-lg-4 col-lg-offset-1 col-md-offset-0 col-md-4 col-sm-4 col-xs-12">
                    <h4>МЫ В СОЦИАЛЬНЫХ СЕТЯХ</h4>
                    <a class="footer__social" href="#"><img src="<?=SITE_TEMPLATE_PATH?>/img/fb.svg" alt=""></a>
                    <a class="footer__social" href="#"><img src="<?=SITE_TEMPLATE_PATH?>/img/inst.svg" alt=""></a>
                    <a class="footer__social" href="#"><img src="<?=SITE_TEMPLATE_PATH?>/img/vk.svg" alt=""></a>
                    <a class="footer__social" href="#"><img src="<?=SITE_TEMPLATE_PATH?>/img/youtube.svg" alt=""></a>
                </div>
            </div>
        </div>
    </footer>
</div>
<?$APPLICATION->AddHeadScript("/bitrix/templates/".SITE_TEMPLATE_ID."/js/kovka5.js");?>
</body>
</html>
