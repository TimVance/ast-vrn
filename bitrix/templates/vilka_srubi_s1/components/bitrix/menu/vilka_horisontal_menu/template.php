<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>



<?
$this->setFrameMode(true);
$templateData = array(
    'TEMPLATE_FOLDER' => $this->GetFolder()
);


if (!empty($arResult)):?>

<!-- Static navbar -->
<div class="navbar navbar-default vilka_top_menu" role="navigation">
    <div class="container">
        <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <?/*<a class="navbar-brand" href="#"><?=SITE_NAME?></a>*/?>
                </div>
                <div class="navbar-collapse collapse">
                    <!-- Left nav -->
                    <ul class="nav navbar-nav">
                        <?
                        $previousLevel = 0;
                        foreach($arResult as $arItem):?>

                        <?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
                            <?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
                        <?endif?>

                        <?if ($arItem["IS_PARENT"]):?>

                        <?if ($arItem["DEPTH_LEVEL"] == 1):?>
                        <li><a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>lvl_1 selected<?else:?>lvl_1<?endif?>"><?=$arItem["TEXT"]?></a>
                            <ul class="dropdown-menu">
                                <?else:?>
                                <li<?if ($arItem["SELECTED"]):?> class="item-selected"<?endif?>><a href="<?=$arItem["LINK"]?>" class="parent"><?=$arItem["TEXT"]?></a>

                                    <ul class="dropdown-menu">
                                        <?endif?>

                                        <?else:?>

                                            <?if ($arItem["PERMISSION"] > "D"):?>

                                                <?if ($arItem["DEPTH_LEVEL"] == 1):?>
                                                    <li><a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>lvl_1 selected<?else:?>lvl_1<?endif?>"><?=$arItem["TEXT"]?></a></li>
                                                <?else:?>
                                                    <li<?if ($arItem["SELECTED"]):?> class="selected"<?endif?>><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
                                                <?endif?>

                                            <?else:?>

                                                <?if ($arItem["DEPTH_LEVEL"] == 1):?>
                                                    <li><a href="" class="<?if ($arItem["SELECTED"]):?>lvl_1 selected<?else:?>lvl_1<?endif?>" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
                                                <?else:?>
                                                    <li><a href="" class="denied" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
                                                <?endif?>

                                            <?endif?>

                                        <?endif?>

                                        <?$previousLevel = $arItem["DEPTH_LEVEL"];?>

                                        <?endforeach?>

                                        <?if ($previousLevel > 1)://close last item tags?>
                                            <?=str_repeat("</ul></li>", ($previousLevel-1) );?>
                                        <?endif?>
                                    </ul>
                                    <form class="navbar-form navbar-right" action="<?=SITE_DIR?>search/" role="search">
                                        <div class="search_block">
                                            <div class="form-group">
                                                <input name="q" type="text" class="form-control" placeholder="<?//GetMessage("VR_SEARCH")?>">
                                            </div>
                                            <button type="submit" class="btn btn-default" title="<?=GetMessage("VR_SEARCH_BTN")?>"><i class="fa fa-search"></i></button>
                                        </div>
                                    </form>
                </div><!--/.nav-collapse -->
            </div>
    </div>
</div>


<?endif?>