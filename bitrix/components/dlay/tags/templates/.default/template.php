<?php
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();

GLOBAL $USER;
if($USER->getId() == 2):?>


<? if (!empty($arResult)): ?>
    <div class="col-md-12 tags-list">
        <? foreach ($arResult as $item): ?>
            <a href="<?=$item["link"]?>/"><?=$item["name"]?></a>
        <? endforeach; ?>
    </div>
<? endif; ?>



<? endif; ?>