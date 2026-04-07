# Итоговое домашнее задание: Страница «Отзывы»

## Цель работы

Создать раздел сайта «Отзывы» с использованием компонентов 1С-Битрикс: страницу со **списком отзывов** и **детальную страницу** каждого отзыва. Работа выполняется на базе учебного сайта «Мебельная компания» с шаблоном `delement`.

---

## Что вы должны сделать

### Часть 1. Создание инфоблока (через админку Битрикс)

1. Перейдите в **Администрирование → Контент → Инфоблоки → Типы инфоблоков**
2. Создайте **новый тип инфоблока**:
   - Идентификатор: `reviews`
   - Название: `Отзывы`
3. Создайте **новый инфоблок** внутри этого типа:
   - Название: `Отзывы клиентов`
   - Символьный код: `reviews`
   - Сайт: `s1`
4. В настройках инфоблока перейдите на вкладку **«Свойства»** и добавьте два свойства:

| Название    | Символьный код | Тип   |
|-------------|----------------|-------|
| Должность   | POSITION       | Строка |
| Компания    | COMPANY        | Строка |

5. Создайте **3–5 тестовых элементов** (отзывов) в инфоблоке. Для каждого элемента заполните:
   - **Название** — имя автора отзыва (например, «Сергей Родионов»)
   - **Дата активности** — дата отзыва
   - **Картинка для анонса** — фото автора (можно использовать любую картинку)
   - **Описание для анонса** — краткий текст отзыва (1–2 предложения)
   - **Детальное описание** — полный текст отзыва
   - **Свойство «Должность»** — должность автора (например, «Генеральный директор»)
   - **Свойство «Компания»** — компания автора (например, «CTC-Медиа»)

> **Запомните ID вашего инфоблока** — он потребуется на следующих шагах. Его можно увидеть в списке инфоблоков в колонке «ID».

---

### Часть 2. Создание публичной страницы раздела

1. В корне сайта создайте папку `reviews`
2. Внутри создайте файл `reviews/index.php` со следующим содержимым:

```php
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Отзывы");
?>
<?$APPLICATION->IncludeComponent("bitrix:news", "reviews", array(
    "IBLOCK_TYPE" => "reviews",
    "IBLOCK_ID" => "УКАЖИТЕ_ВАШ_ID",
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
    "CACHE_TYPE" => "A",
    "CACHE_TIME" => "36000000",
    "CACHE_GROUPS" => "Y",
    "DISPLAY_PANEL" => "N",
    "SET_TITLE" => "Y",
    "SET_STATUS_404" => "Y",
    "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
    "ADD_SECTIONS_CHAIN" => "Y",
    "LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
    "LIST_FIELD_CODE" => array(
        0 => "",
        1 => "",
    ),
    "LIST_PROPERTY_CODE" => array(
        0 => "POSITION",
        1 => "COMPANY",
    ),
    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
    "DISPLAY_DATE" => "Y",
    "DISPLAY_NAME" => "Y",
    "DISPLAY_PICTURE" => "Y",
    "DISPLAY_PREVIEW_TEXT" => "Y",
    "DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
    "DETAIL_FIELD_CODE" => array(
        0 => "",
        1 => "",
    ),
    "DETAIL_PROPERTY_CODE" => array(
        0 => "POSITION",
        1 => "COMPANY",
    ),
    "SET_LAST_MODIFIED" => "N",
    "SEF_URL_TEMPLATES" => array(
        "news" => "",
        "detail" => "#ELEMENT_ID#/",
    )
    ),
    false
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
```

> **Важно!** Замените `УКАЖИТЕ_ВАШ_ID` на реальный ID инфоблока, который вы создали в Части 1.

---

### Часть 3. Добавление пункта меню

Откройте файл `.top.menu.php` в корне сайта и добавьте пункт «Отзывы» **перед** пунктом «Контакты»:

```php
Array(
    "Отзывы", 
    "reviews/", 
    Array(), 
    Array(), 
    "" 
),
```

---

### Часть 4. Настройка URL (urlrewrite)

Откройте файл `urlrewrite.php` в корне сайта и добавьте правило для раздела отзывов:

```php
array (
    'CONDITION' => '#^/reviews/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/reviews/index.php',
    'SORT' => 100,
),
```

> Добавьте этот блок внутрь массива `$arUrlRewrite`, не забудьте указать корректный числовой ключ.

---

### Часть 5. Создание шаблона комплексного компонента `bitrix:news`

Комплексный компонент `bitrix:news` управляет маршрутизацией между списком и детальной страницей. Вам нужно создать для него шаблон `reviews`.

**Структура файлов**, которую нужно создать:

```
local/templates/delement/components/bitrix/news/reviews/
├── news.php          ← страница списка (вызывает news.list)
├── detail.php        ← детальная страница (вызывает news.detail)
└── bitrix/
    ├── news.list/
    │   └── .default/
    │       └── template.php    ← ШАБЛОН СПИСКА ОТЗЫВОВ
    └── news.detail/
        └── .default/
            └── template.php    ← ШАБЛОН ДЕТАЛЬНОЙ СТРАНИЦЫ
```

#### 5.1. Файл `news.php`

Этот файл отвечает за вызов компонента `bitrix:news.list`. Создайте файл:

`local/templates/delement/components/bitrix/news/reviews/news.php`

```php
<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<?$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "",
    Array(
        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "NEWS_COUNT" => $arParams["NEWS_COUNT"],
        "SORT_BY1" => $arParams["SORT_BY1"],
        "SORT_ORDER1" => $arParams["SORT_ORDER1"],
        "SORT_BY2" => $arParams["SORT_BY2"],
        "SORT_ORDER2" => $arParams["SORT_ORDER2"],
        "FIELD_CODE" => $arParams["LIST_FIELD_CODE"],
        "PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
        "DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
        "DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
        "SET_TITLE" => $arParams["SET_TITLE"],
        "SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
        "SET_STATUS_404" => $arParams["SET_STATUS_404"],
        "INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
        "CACHE_TYPE" => $arParams["CACHE_TYPE"],
        "CACHE_TIME" => $arParams["CACHE_TIME"],
        "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
        "DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
        "DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
        "ACTIVE_DATE_FORMAT" => $arParams["LIST_ACTIVE_DATE_FORMAT"],
        "HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
        "CHECK_DATES" => $arParams["CHECK_DATES"],
    ),
    $component
);?>
```

> **Подсказка:** Этот файл не отвечает за визуальное оформление — он только передаёт параметры от комплексного компонента в простой компонент `news.list`. Обратите внимание, что шаблон для `news.list` указан как `""` (пустая строка) — это значит, что Битрикс будет искать шаблон в подпапке `bitrix/news.list/.default/` текущего шаблона.

#### 5.2. Файл `detail.php`

Аналогично создайте файл для детальной страницы:

`local/templates/delement/components/bitrix/news/reviews/detail.php`

```php
<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$APPLICATION->IncludeComponent(
    "bitrix:news.detail",
    "",
    Array(
        "DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
        "DISPLAY_NAME" => $arParams["DISPLAY_NAME"],
        "DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
        "DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "FIELD_CODE" => $arParams["DETAIL_FIELD_CODE"],
        "PROPERTY_CODE" => $arParams["DETAIL_PROPERTY_CODE"],
        "BROWSER_TITLE" => $arParams["BROWSER_TITLE"],
        "SET_TITLE" => $arParams["SET_TITLE"],
        "SET_STATUS_404" => $arParams["SET_STATUS_404"],
        "INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
        "ADD_SECTIONS_CHAIN" => $arParams["ADD_SECTIONS_CHAIN"],
        "ACTIVE_DATE_FORMAT" => $arParams["DETAIL_ACTIVE_DATE_FORMAT"],
        "CACHE_TYPE" => $arParams["CACHE_TYPE"],
        "CACHE_TIME" => $arParams["CACHE_TIME"],
        "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
        "ELEMENT_ID" => $arResult["VARIABLES"]["ELEMENT_ID"],
        "ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],
        "IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
    ),
    $component
);?>
<p><a href="<?=$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"]?>">&larr; Вернуться к списку отзывов</a></p>
```

---

### Часть 6. Создание шаблона `news.list` (список отзывов) ★

Это **основная часть задания** — здесь вы создаёте визуальное отображение списка отзывов.

Файлы с макетами списка отзывов:
reviews_mockup_a.html - список и деталка
reviews_mockup_list_a.html - список



Создайте файл:

`local/templates/delement/components/bitrix/news/reviews/bitrix/news.list/.default/template.php`

В этом файле вы работаете с массивом `$arResult["ITEMS"]`. Каждый элемент массива — это один отзыв. У каждого отзыва доступны следующие данные:

| Данные | Как получить |
|--------|-------------|
| Имя автора | `$arItem["NAME"]` |
| Дата | `$arItem["DISPLAY_ACTIVE_FROM"]` |
| Фото (анонс) | `$arItem["PREVIEW_PICTURE"]["SRC"]` |
| Текст анонса | `$arItem["PREVIEW_TEXT"]` |
| Ссылка на детальную | `$arItem["DETAIL_PAGE_URL"]` |
| Должность | `$arItem["DISPLAY_PROPERTIES"]["POSITION"]["VALUE"]` |
| Компания | `$arItem["DISPLAY_PROPERTIES"]["COMPANY"]["VALUE"]` |

**Требования к шаблону:**

1. Файл должен начинаться с проверки:
   ```php
   <?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
   ```

2. Перебрать массив `$arResult["ITEMS"]` в цикле `foreach`

3. Для каждого отзыва вывести:
   - Фото автора (картинку для анонса) — если она есть
   - Имя автора в виде ссылки на детальную страницу
   - Дату, должность и компанию
   - Текст анонса отзыва
   - Ссылку «Подробнее»


> **Подсказка:** За образец можно взять стандартный шаблон `news.list`, который находится по пути:  
> `local/templates/delement/components/bitrix/news/.default/bitrix/news.list/.default/template.php`  
> Изучите его структуру — ваш шаблон будет похож, но с другим HTML-оформлением.

---

### Часть 7. Создание шаблона `news.detail` (детальная страница) ★

Файлы с макетами деталки отзыва:
reviews_mockup_a.html - список и деталка
reviews_mockup_detail_a.html - деталка

Создайте файл:

`local/templates/delement/components/bitrix/news/reviews/bitrix/news.detail/.default/template.php`

Здесь вы работаете с массивом `$arResult` напрямую (без цикла — это один элемент). Доступны:

| Данные | Как получить |
|--------|-------------|
| Имя автора | `$arResult["NAME"]` |
| Дата | `$arResult["DISPLAY_ACTIVE_FROM"]` |
| Фото (детальное) | `$arResult["DETAIL_PICTURE"]["SRC"]` |
| Фото (анонс, запасное) | `$arResult["PREVIEW_PICTURE"]["SRC"]` |
| Полный текст | `$arResult["DETAIL_TEXT"]` |
| Текст анонса (запасной) | `$arResult["PREVIEW_TEXT"]` |
| Должность | `$arResult["DISPLAY_PROPERTIES"]["POSITION"]["VALUE"]` |
| Компания | `$arResult["DISPLAY_PROPERTIES"]["COMPANY"]["VALUE"]` |

**Требования:**

1. Стандартная проверка `B_PROLOG_INCLUDED` в начале файла
2. Вывести фото автора (сначала проверить `DETAIL_PICTURE`, если нет — использовать `PREVIEW_PICTURE`)
3. Вывести дату, должность и компанию
4. Вывести полный текст отзыва (если есть `DETAIL_TEXT`, иначе — `PREVIEW_TEXT`)

> **Подсказка:** Аналогично изучите стандартный шаблон `news.detail`:  
> `local/templates/delement/components/bitrix/news/.default/bitrix/news.detail/.default/template.php`

---

## Формат сдачи

Сдайте архив вашего проекта **без папок** `upload/` и `bitrix/`.

В архиве должны быть:
- Папка `reviews/` с файлом `index.php`
- Обновлённые файлы `.top.menu.php` и `urlrewrite.php`
- Папка `local/templates/delement/components/bitrix/news/reviews/` со всеми шаблонами

---

## Чек-лист для самопроверки

- [ ] Создан тип инфоблока `reviews` и инфоблок с отзывами
- [ ] Добавлены свойства `POSITION` и `COMPANY` в инфоблоке
- [ ] Создано 3–5 тестовых отзывов с заполненными полями
- [ ] В верхнем меню есть пункт «Отзывы»
- [ ] Страница `/reviews/` открывается и показывает список отзывов
- [ ] На странице списка видны: фото, имя (ссылкой), дата, должность, компания, текст
- [ ] Клик по имени или «Подробнее» ведёт на детальную страницу
- [ ] Детальная страница показывает полную информацию об отзыве
- [ ] На детальной странице есть ссылка «Вернуться к списку отзывов»
- [ ] Страница отзывов визуально вписывается в общий дизайн сайта

---

## Справочные материалы

- **Структура массива `$arResult`** в компоненте `news.list`:  
  Для отладки можно временно добавить в шаблон: `<pre><?print_r($arResult)?></pre>`  
  Это выведет всё содержимое массива на страницу. **Не забудьте убрать перед сдачей!**

- **Иерархия шаблонов Битрикс:**  
  `local/templates/{шаблон_сайта}/components/{пространство_имён}/{компонент}/{имя_шаблона}/`

Уроки битрикса по созданию сайта:
https://dev.1c-bitrix.ru/learning/course/index.php?COURSE_ID=43&CHAPTER_ID=02704&LESSON_PATH=3913.2704
 
