<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

if (!$arResult["NavShowAlways"])
{
    if (0 == $arResult["NavRecordCount"] || (1 == $arResult["NavPageCount"] && false == $arResult["NavShowAll"]))
        return;
}
if ('' != $arResult["NavTitle"])
    $arResult["NavTitle"] .= ' ';

$strSelectPath = $arResult['sUrlPathParams'].($arResult["bSavePage"] ? '&PAGEN_'.$arResult["NavNum"].'='.(true !== $arResult["bDescPageNumbering"] ? 1 : '').'&' : '').'SHOWALL_'.$arResult["NavNum"].'=0&SIZEN_'.$arResult["NavNum"].'=';

?>
<div class="paginator">
    <?if ($arResult["NavShowAll"]){?>
        <a href="<?=$arResult['sUrlPathParams']; ?>SHOWALL_<?=$arResult["NavNum"]?>=0&SIZEN_<?=$arResult["NavNum"]?>=<?=$arResult['NavPageSize']; ?>"  class="paginator__nav-left"><?=GetMessage('nav_show_pages');?><</a>
    <?}else{?>
        <?if (true === $arResult["bDescPageNumbering"]){?>
            <?if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]){?>
                <a href="<?=$arResult['sUrlPathParams']; ?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>&SIZEN_<?=$arResult["NavNum"]?>=<?=$arResult['NavPageSize']; ?>" title="<? echo GetMessage('nav_prev_title'); ?>" rel="prev"></a>
            <?}else{?>
                <span class="paginator__nav-left"><</span>
            <?}?>
            <?$NavRecordGroup = $arResult["NavPageCount"];
            while ($NavRecordGroup >= 1){
                $NavRecordGroupPrint = $arResult["NavPageCount"] - $NavRecordGroup + 1;
                $strTitle = GetMessage(
                    'nav_page_num_title',
                    array('#NUM#' => $NavRecordGroupPrint)
                );?>
                <?if ($NavRecordGroup == $arResult["NavPageNomer"]){?>
                    <span class="paginator__nav-num act" title="<? echo GetMessage('nav_page_current_title'); ?>"><?=$NavRecordGroupPrint; ?></span>
                <?}elseif ($NavRecordGroup == $arResult["NavPageCount"] && $arResult["bSavePage"] == false){?>
                    <a href="<?=$arResult['sUrlPathParams']; ?>SIZEN_<?=$arResult["NavNum"]?>=<?=$arResult['NavPageSize']; ?>" title="<?=$strTitle; ?>" class="paginator__nav-num"><?=$NavRecordGroupPrint?></a>
                <?}else{?>
                    <a href="<?=$arResult['sUrlPathParams']; ?>PAGEN_<?=$arResult["NavNum"]?>=<?=$NavRecordGroup?>&SIZEN_<?=$arResult["NavNum"]?>=<?=$arResult['NavPageSize']; ?>" title="<?=$strTitle; ?>" class="paginator__nav-num"><?=$NavRecordGroupPrint?></a>
                <?}?>
                <?if (1 == ($arResult["NavPageCount"] - $NavRecordGroup) && 2 < ($arResult["NavPageCount"] - $arResult["nStartPage"])){
                    $middlePage = floor(($arResult["nStartPage"] + $NavRecordGroup)/2);
                    $NavRecordGroupPrint = $arResult["NavPageCount"] - $middlePage + 1;
                    $strTitle = GetMessage(
                        'nav_page_num_title',
                        array('#NUM#' => $NavRecordGroupPrint)
                    );?>
                    <a href="<?=$arResult['sUrlPathParams']; ?>PAGEN_<?=$arResult["NavNum"]?>=<?=$middlePage?>&SIZEN_<?=$arResult["NavNum"]?>=<?=$arResult['NavPageSize']; ?>" title="<?=$strTitle;?>" class="paginator__nav-num">...</a>
                    <?$NavRecordGroup = $arResult["nStartPage"];?>
                <?}elseif ($NavRecordGroup == $arResult["nEndPage"] && 3 < $arResult["nEndPage"]){
                    $middlePage = ceil(($arResult["nEndPage"] + 2)/2);
                    $NavRecordGroupPrint = $arResult["NavPageCount"] - $middlePage + 1;
                    $strTitle = GetMessage(
                        'nav_page_num_title',
                        array('#NUM#' => $NavRecordGroupPrint)
                    );?>
                    <a href="<?=$arResult['sUrlPathParams']; ?>PAGEN_<?=$arResult["NavNum"]?>=<?=$middlePage?>&SIZEN_<?=$arResult["NavNum"]?>=<?=$arResult['NavPageSize']; ?>" title="<?$strTitle;?>" >...</a>
                    <?$NavRecordGroup = 2;?>
                <?}else{?>
                    <?$NavRecordGroup--;?>
                <?}
            }?>

            <?if ($arResult["NavPageNomer"] > 1){?>
                <a href="<?=$arResult['sUrlPathParams']; ?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>&SIZEN_<?=$arResult["NavNum"]?>=<?=$arResult['NavPageSize']; ?>" title="<?=GetMessage('nav_next_title'); ?>" class="paginator__nav-right">></a>
            <?}else{?>
                <span class="paginator__nav-right">></span>
            <?}?>

        <?}else{?>

            <?if (1 < $arResult["NavPageNomer"]){?>
                <a href="<?=$arResult['sUrlPathParams']; ?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>&SIZEN_<?=$arResult["NavNum"]?>=<?=$arResult['NavPageSize']; ?>" title="<?=GetMessage('nav_prev_title'); ?>" class="paginator__nav-left"><</a>
            <?}else{?>
                <span class="paginator__nav-left"><</span>
            <?}?>

            <?$NavRecordGroup = 1;
            while($NavRecordGroup <= $arResult["NavPageCount"]){
                $strTitle = GetMessage(
                    'nav_page_num_title',
                    array('#NUM#' => $NavRecordGroup)
                );
                if ($NavRecordGroup == $arResult["NavPageNomer"]){?>
                    <span class="paginator__nav-num act" title="<? echo GetMessage('nav_page_current_title'); ?>">
							<?=$NavRecordGroup; ?>
						</span>
                <?}elseif ($NavRecordGroup == 1 && $arResult["bSavePage"] == false){?>
                    <a href="<?=$arResult['sUrlPathParams']; ?>SIZEN_<?=$arResult["NavNum"]?>=<?=$arResult['NavPageSize']; ?>" title="<?=$strTitle;?>" class="paginator__nav-num"><?=$NavRecordGroup?></a>
                <?}else{?>
                    <a href="<?=$arResult['sUrlPathParams']; ?>PAGEN_<?=$arResult["NavNum"]?>=<?=$NavRecordGroup?>&SIZEN_<?=$arResult["NavNum"]?>=<?=$arResult['NavPageSize']; ?>" title="<? echo $strTitle; ?>" class="paginator__nav-num"><?=$NavRecordGroup?></a>
                <?}

                if ($NavRecordGroup == 2 && $arResult["nStartPage"] > 3 && $arResult["nStartPage"] - $NavRecordGroup > 1){
                    $middlePage = ceil(($arResult["nStartPage"] + $NavRecordGroup)/2);
                    $strTitle = GetMessage('nav_page_num_title',array('#NUM#' => $middlePage));?>
                    <a href="<?=$arResult['sUrlPathParams']; ?>PAGEN_<?=$arResult["NavNum"]?>=<?=$middlePage?>&SIZEN_<?=$arResult["NavNum"]?>=<?=$arResult['NavPageSize']; ?>" title="<?=$strTitle;?>" class="paginator__nav-num">...</a>
                    <?$NavRecordGroup = $arResult["nStartPage"];
                }elseif ($NavRecordGroup == $arResult["nEndPage"] && $arResult["nEndPage"] < ($arResult["NavPageCount"] - 2)){
                    $middlePage = floor(($arResult["NavPageCount"] + $arResult["nEndPage"] - 1)/2);
                    $strTitle = GetMessage('nav_page_num_title',array('#NUM#' => $middlePage)
                    );?>
                    <a href="<?=$arResult['sUrlPathParams']; ?>PAGEN_<?=$arResult["NavNum"]?>=<?=$middlePage?>&SIZEN_<?=$arResult["NavNum"]?>=<?=$arResult['NavPageSize']; ?>" title="<? echo $strTitle; ?>" class="paginator__nav-num">...</a>
                    <?
                    $NavRecordGroup = $arResult["NavPageCount"]-1;
                }else{
                    $NavRecordGroup++;
                }
            }?>
            <?if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]){?>
                <a href="<?=$arResult['sUrlPathParams']; ?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>&SIZEN_<?=$arResult["NavNum"]?>=<?=$arResult['NavPageSize']; ?>" title="<?=GetMessage('nav_next_title'); ?>" class="paginator__nav-right">> </a>
            <?}else{?>
                <span  class="paginator__nav-right">> </span>
            <?}?>
            <?if ($arResult["bShowAll"]){?>
                <a href="<?=$arResult['sUrlPathParams']; ?>SHOWALL_<?=$arResult["NavNum"]?>=1&SIZEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageSize"]?>" class="paginator__nav-num"><?=GetMessage('nav_all'); ?></a>
            <?}
        }?>
    <?}?>
</div>