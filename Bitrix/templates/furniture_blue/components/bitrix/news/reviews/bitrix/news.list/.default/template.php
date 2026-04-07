<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div style="max-width: 900px; margin: 0 auto;">

<?foreach($arResult["ITEMS"] as $arItem):?>

    <?
    $img = !empty($arItem["PREVIEW_PICTURE"]["SRC"]) ? $arItem["PREVIEW_PICTURE"]["SRC"] : "";

    $position = !empty($arItem["DISPLAY_PROPERTIES"]["POSITION"]["VALUE"])
        ? $arItem["DISPLAY_PROPERTIES"]["POSITION"]["VALUE"]
        : "";

    $company = !empty($arItem["DISPLAY_PROPERTIES"]["COMPANY"]["VALUE"])
        ? $arItem["DISPLAY_PROPERTIES"]["COMPANY"]["VALUE"]
        : "";

    $previewText = !empty($arItem["PREVIEW_TEXT"]) ? $arItem["PREVIEW_TEXT"] : "";
    ?>

    <div style="
        display: flex;
        gap: 20px;
        align-items: flex-start;
        background: #ffffff;
        border: 1px solid #e5e5e5;
        border-radius: 16px;
        padding: 20px;
        margin-bottom: 22px;
        box-shadow: 0 6px 18px rgba(0,0,0,0.06);
    ">

        <div style="flex: 0 0 140px;">
            <?if($img):?>
                <img
                    src="<?=$img?>"
                    alt="<?=$arItem["NAME"]?>"
                    style="
                        width: 140px;
                        height: 140px;
                        object-fit: cover;
                        border-radius: 12px;
                        display: block;
                    "
                >
            <?else:?>
                <div style="
                    width: 140px;
                    height: 140px;
                    background: #f2f2f2;
                    border-radius: 12px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    color: #999;
                    font-size: 14px;
                    text-align: center;
                    padding: 10px;
                    box-sizing: border-box;
                ">
                    Нет фото
                </div>
            <?endif;?>
        </div>

        <div style="flex: 1;">
            <div style="margin-bottom: 10px;">
                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" style="
                    font-size: 32px;
                    line-height: 1.2;
                    font-weight: bold;
                    color: #222;
                    text-decoration: none;
                ">
                    <?=$arItem["NAME"]?>
                </a>
            </div>

            <div style="
                color: #777;
                font-size: 16px;
                line-height: 1.6;
                margin-bottom: 14px;
            ">
                <?if(!empty($arItem["DISPLAY_ACTIVE_FROM"])):?>
                    <span><?=$arItem["DISPLAY_ACTIVE_FROM"]?></span>
                <?endif;?>

                <?if($position):?>
                    <span> • <?=$position?></span>
                <?endif;?>

                <?if($company):?>
                    <span> (<?=$company?>)</span>
                <?endif;?>
            </div>

            <div style="
                color: #333;
                font-size: 18px;
                line-height: 1.7;
                margin-bottom: 16px;
            ">
                <?=$previewText?>
            </div>

            <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" style="
                display: inline-block;
                padding: 10px 18px;
                background: #2d7ef7;
                color: #fff;
                text-decoration: none;
                border-radius: 10px;
                font-size: 15px;
                font-weight: 600;
            ">
                Подробнее
            </a>
        </div>
    </div>

<?endforeach;?>

</div>