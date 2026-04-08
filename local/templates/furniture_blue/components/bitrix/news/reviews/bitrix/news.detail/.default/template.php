<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
$img = "";

if (!empty($arResult["DETAIL_PICTURE"]["SRC"]))
{
    $img = $arResult["DETAIL_PICTURE"]["SRC"];
}
elseif (!empty($arResult["PREVIEW_PICTURE"]["SRC"]))
{
    $img = $arResult["PREVIEW_PICTURE"]["SRC"];
}

$position = !empty($arResult["DISPLAY_PROPERTIES"]["POSITION"]["VALUE"])
    ? $arResult["DISPLAY_PROPERTIES"]["POSITION"]["VALUE"]
    : "";

$company = !empty($arResult["DISPLAY_PROPERTIES"]["COMPANY"]["VALUE"])
    ? $arResult["DISPLAY_PROPERTIES"]["COMPANY"]["VALUE"]
    : "";

$text = !empty($arResult["DETAIL_TEXT"])
    ? $arResult["DETAIL_TEXT"]
    : $arResult["PREVIEW_TEXT"];
?>

<div style="
    max-width: 900px;
    margin: 0 auto;
    background: #ffffff;
    border: 1px solid #e5e5e5;
    border-radius: 16px;
    padding: 30px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.08);
">

    <div style="
        display: flex;
        gap: 25px;
        align-items: flex-start;
        flex-wrap: wrap;
    ">
        <?if($img):?>
            <div style="flex: 0 0 220px;">
                <img 
                    src="<?=$img?>" 
                    alt="<?=$arResult["NAME"]?>" 
                    style="
                        width: 220px;
                        height: 220px;
                        object-fit: cover;
                        border-radius: 14px;
                        display: block;
                        box-shadow: 0 4px 12px rgba(0,0,0,0.12);
                    "
                >
            </div>
        <?endif;?>

        <div style="flex: 1; min-width: 260px;">
            <h1 style="
                margin: 0 0 12px 0;
                font-size: 38px;
                line-height: 1.2;
                color: #222;
            ">
                <?=$arResult["NAME"]?>
            </h1>

            <div style="
                color: #777;
                font-size: 16px;
                line-height: 1.6;
                margin-bottom: 20px;
            ">
                <?if(!empty($arResult["DISPLAY_ACTIVE_FROM"])):?>
                    <span><?=$arResult["DISPLAY_ACTIVE_FROM"]?></span>
                <?endif;?>

                <?if($position):?>
                    <span> • <?=$position?></span>
                <?endif;?>

                <?if($company):?>
                    <span> (<?=$company?>)</span>
                <?endif;?>
            </div>

            <div style="
                background: #f8f9fb;
                border-left: 4px solid #2d7ef7;
                padding: 18px 20px;
                border-radius: 10px;
                color: #333;
                font-size: 19px;
                line-height: 1.8;
            ">
                <?=$text?>
            </div>
        </div>
    </div>

    <div style="margin-top: 30px;">
        <a href="/reviews/" style="
            display: inline-block;
            padding: 12px 20px;
            background: #2d7ef7;
            color: #fff;
            text-decoration: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
        ">
            ← Назад к отзывам
        </a>
    </div>
</div>