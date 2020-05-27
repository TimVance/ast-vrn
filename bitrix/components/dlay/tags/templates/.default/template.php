<?php
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();?>


<?

// Сколько элементов будем показывать
$show_elements = 10;

// Счетчик
$i = 1;

?>

<? if (!empty($arResult)): ?>
    <div class="col-md-12 tags-list">
        <? foreach ($arResult as $item): ?>
            <a <? if($i > $show_elements) echo 'style="display:none"'; ?> href="<?=$item["link"]?>"><?=$item["name"]?></a>
            <? $i++; ?>
        <? endforeach; ?>
        <?
        if (count($arResult) > $show_elements) echo '<span class="showmore">'.GetMessage("SHOW_MORE_LINK").'</span>';
        ?>
    </div>
<? endif; ?>