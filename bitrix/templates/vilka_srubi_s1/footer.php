<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
?>
<?if($curPage != SITE_DIR.'index.php'){?></div>
        </div>
    </div>
</div><?
}?>

<div class="foot">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="foot_tel">
                    <?$APPLICATION->IncludeFile(
                        SITE_DIR."include/top_tel.php",
                        Array(),
                        Array("MODE"=>"html")
                    );?>
                    </div>
                <a href="#" class="btn zz_btn_head back_call_bt"><?=GetMessage('VR_ZZ')?></a>

                <br><br><br>
                <?$APPLICATION->IncludeFile(
                    SITE_DIR."include/copy.php",
                    Array(),
                    Array("MODE"=>"html")
                );?>
            </div>
            <div class="col-sm-3">
                <?$APPLICATION->IncludeFile(
                    SITE_DIR."include/foot_cont.php",
                    Array(),
                    Array("MODE"=>"html","TEMPLATE"  => "section_include_template.php")
                );?><br><br>
<?$APPLICATION->IncludeFile(
                    SITE_DIR."include/social.php",
                    Array(),
                    Array("MODE"=>"html")
                );?>
            </div>

                <?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"foot_menu", 
	array(
		"ROOT_MENU_TYPE" => "top",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MAX_LEVEL" => "2",
		"CHILD_MENU_TYPE" => "left",
		"USE_EXT" => "Y",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N",
		"COMPONENT_TEMPLATE" => "foot_menu",
		"VR_DNT_SHOW" => "3,4,5,6,7"
	),
	false
);?>

        </div>
    </div>
</div>
<div class="popforms">
    <div class="back_call ">
        <div class="popformzag"><?=GetMessage('FORM_ZZ')?></div>
        <?$APPLICATION->IncludeComponent(
        "vilka:feedback",
        "bootstrap",
        array(
            "COMPONENT_TEMPLATE" => ".default",
            "IBLOCK_TYPE" => "vilka_feedback",
            "IBLOCK_ID" => VH::IBID("form_backcall"),
            "USE_CAPTCHA" => "Y",
            "OK_TEXT" => GetMessage('FORM_SPASIBO'),
            "MAIL_TITLE" => GetMessage('FORM_ZZ').' '.$_SERVER['HTTP_HOST'],
            "EMAIL_TO" => COption::GetOptionString('main','email_from'),
            "FORM_ID" => "5621009edf431",
            "USER_NAME" => "NAME",
            "USER_MAIL" => "-",
            "USER_PHONE" => "PHONE",
            "AJAX_MODE" => "Y",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "Y",
            "AJAX_OPTION_HISTORY" => "N",
            "AJAX_OPTION_ADDITIONAL" => ""
        ),
        false
        );?>
    </div>
    <div class="calc_project">
        <div class="popformzag"><?=GetMessage('FORM_RASCH')?></div>
        <?$APPLICATION->IncludeComponent(
	"vilka:feedback",
	"bootstrap",
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"IBLOCK_TYPE" => "vilka_feedback",
		"IBLOCK_ID" => VH::IBID("form_raschet"),
		"USE_CAPTCHA" => "Y",
		"OK_TEXT" => GetMessage('FORM_SPASIBO'),
		"MAIL_TITLE" =>  GetMessage('FORM_RASCH').' '.$_SERVER['HTTP_HOST'],
		"EMAIL_TO" => COption::GetOptionString('main','email_from'),
		"FORM_ID" => "1621009edf431",
		"USER_NAME" => "FORM_NAME",
		"USER_MAIL" => "FORM_MAIL",
		"USER_PHONE" => "FORM_PHONE",
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);?>
    </div>
</div>
</body></html>