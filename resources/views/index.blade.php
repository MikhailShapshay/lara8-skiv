<!doctype html>
<html lang="ru">
<head>
    <link rel="icon" href="./favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel=stylesheet href="./css/styles.css" type="text/css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Skiv Weber</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!-- MENU -->
    <link href="./menu/menu.css" rel="stylesheet" type="text/css" />
    <!-- /MENU -->
    <script src="./js/jquery.autocomplete.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#poisk').autocomplete({
                serviceUrl:'modules/small_search/auto.php',//скрипт выдающий список подсказок для автозаполнения
                minChars:2, //количество символов введённых пользователем при которых начинается автозаполнение
                width: 250, //ширина поля для вивода предлагаемых результатов автозаполнения
                highlight: false, //запретить подсветку букв совпадающих с введёнными
                onSelect: function(value, data){ document.forms['frmSearch'].submit(); } //функция выполняющаяся при выборе пользователем одного из предложеных вариантов
            });
        });
    </script>
</head>
<body>
<div class="site">
    <header>
        <div class="logo_enter">
            <div class="logo" style="margin-top: 100px; margin-left: 5px;">
                <a href="#"><img src="./images/logo.jpg" border="0" /></a>
                <div class="slogan">Программизмы и методы их решения</div>
            </div>
            <div class="enter" style="display: none;">
                <form method="post">
                    <input type="text" id="login" name="login" placeholder="Логин" /><br />
                    <input type="text" id="password" name="password" placeholder="Пароль" /><br />
                    <button type="submit" class="entButton">ВХОД</button>
                    <p><a href="#">Регистрация</a></p>
                </form>
            </div>
        </div>
        <div class="show_frame">
            <iframe id="show_iframe" name="show_iframe" src="css_show/3d_divs/index.html" scrolling="no" frameborder="0"></iframe>
        </div>
        <div class="clear"></div>
    </header>
    <!-- MENU -->
    <nav>
        <div class="container">
            <ul id="nav"><li><a href="/">Главная</a></li><li><a class="hsubs" href="/stati">Статьи</a>
                    <ul class="subs"><li><a href="/stati/android">Android</a></li><li><a href="/stati/c">C#</a></li><li><a href="/stati/unity_3d">UNITY 3D</a></li><li><a href="/stati/2d_dizajn">2D Дизайн</a></li><li><a href="/stati/php_css_jquery">PHP, CSS. JQUERY</a></li><li><a href="/stati/3d_dizajn">3D Дизайн</a></li><li><a href="/stati/administrirovanie">Администрирование</a></li></ul>
                </li><li><a href="/portfolio">Портфолио</a></li><li><a href="/programmnye_razrabotki">Программные разработки</a></li><li><a href="/poleznye_linki">Полезные линки</a></li><li><a href="/galereya">Галерея</a></li><li><a href="/voprosotvet">Вопрос-ответ</a></li><li><a href="/svyazatsya_so_mnoj">Связаться со мной</a></li><div id="lavalamp"></div></ul>
        </div>
    </nav>
    <!-- /MENU -->
    <main>
        <!-- SEARCH -->
        <div align="right">
            <div class="search" >
                <form method="post" action="/rezultaty_poiska" name="frmSearch"  id="frmSearch" autocomplete="off">
                    <input type="search" id="poisk" name="keywords" class="search_inp">
                    <input type="submit" value="" class="search_btn">
                </form>
            </div>
        </div>
        <!-- /SEARCH -->
        <!-- WELCOME -->
        <div class="welcome">
            <h1>Добро пожаловать в мою записную книжку</h1>
            <div class="welcome_icon"><img src="images/symbol.png" /></div>
            <div class="welcome_anons">
                <p><em>Данный сайт является сборником рецептов найденных мной в интернете, либо созданных самостоятельно. Он является шпаргалкой для меня самого и служит для того чтобы неискать повторно инфу в интернете перелопачивая кучи мусора. Поэтому тут могут находится, как мои собственные статьи, так и статьи других авторов (с моими пояснениями и доработками). Авторов статей постараюсь указывать, но к сожалению не всегда можно вспомнить, где и что находил. Если Вы являетесь автором какой-либо статьи сообщите мне об этом и я укажу источник. Если комуто кроме меня будет полезен данный сайт буду очень рад. Так же на сайте будут размещатся мои идеи и наработки по текущим проектам с разбором, как и что я делал чтоб решить различные “программизмы” встретившиеся на пути.</em></p>
                <p><em>Прошу сильно не пинать, а лучше подсказать советом, если нашли ошибки.</em></p>
                <p align="right"><em><strong>С уважением,<br />
                            Михаил Шапшай A.k.a Skiv Weber</strong></em></p>
            </div>
            <div class="clear"></div>
        </div>
        <!-- /WELCOME -->
        <!-- ARTICLES -->
        <!-- ARTICLE -->
        <div class="art_anons">
            <div class="art_anons_vnut">
                <div class="ch_title">PHP, CSS. JQUERY</div>
                <div class="art_icon">
                    <img src="/uploads/images/ikon/PHP.jpg" />
                </div>
                <div class="art_anons_text">
                    <h2>Как настроить выгрузку по FTP в PHPStorm <div class="art_date">07.04.2017</div></h2>
                    <p><p>Предположим&nbsp;что&nbsp;вы работаете над сайтом и у вас есть две версии: на локальном компьютере и на удалённом сервере. Часто возникает необходимость соединяться с удалённым сервером по FTP и выгружать новые файлы сайта с локального компьютера. Сейчас я расскажу как упростить эту процедуру и сэкономить кучу времени.</p>
                    </p>
                    <div class="more"><a href="/php_css_jquery/kak_nastroit_vygruzku_po_ftp_v_phpstorm">Читать подробнее >>></a></div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <!-- /ARTICLE --><!-- ARTICLE -->
        <div class="art_anons">
            <div class="art_anons_vnut">
                <div class="ch_title">Администрирование</div>
                <div class="art_icon">
                    <img src="/uploads/images/ikon/linux.jpg" />
                </div>
                <div class="art_anons_text">
                    <h2>Полезные команды Линукс <div class="art_date">07.04.2017</div></h2>
                    <p><p>Несколько полезных команд для работающих в терминале Linux</p>
                    </p>
                    <div class="more"><a href="/administrirovanie/poleznye_komandy_linuks">Читать подробнее >>></a></div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <!-- /ARTICLE --><!-- ARTICLE -->
        <div class="art_anons">
            <div class="art_anons_vnut">
                <div class="ch_title">3D Дизайн</div>
                <div class="art_icon">
                    <img src="/uploads/images/ikon/blender.jpg" />
                </div>
                <div class="art_anons_text">
                    <h2>Ткань (Cloth). Моделирование Ткани <div class="art_date">07.04.2017</div></h2>
                    <p><p>Моделирование Ткани - один из труднейших аспектов компьютерной графики, поскольку это обманчиво простой момент реального мира, который считается само собой разумеющимся, действительно имеет очень сложное внутреннее и внешнее взаимодействие с окружающей средой. После нескольких лет разработки, Блендер имеет очень достоверный симулятор ткани, который используется, чтобы делать одежду, флаги, знамена и так далее. Ткань взаимодействует и получает воздействие от других перемещаемых объектов, ветра и других сил, а также общей аэродинамической модели, всё это под вашим управлением.&nbsp;</p>
                    </p>
                    <div class="more"><a href="/3d_dizajn/tkan_cloth_modelirovanie_tkani">Читать подробнее >>></a></div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <!-- /ARTICLE --><!-- ARTICLE -->
        <div class="art_anons">
            <div class="art_anons_vnut">
                <div class="ch_title">2D Дизайн</div>
                <div class="art_icon">
                    <img src="/uploads/images/ikon/PS.jpg" />
                </div>
                <div class="art_anons_text">
                    <h2>Урок по рисованию мордашек <div class="art_date">07.04.2017</div></h2>
                    <p><p><img alt="" src="/uploads/images/staty/2D/morda/25.jpg" style="height:150px; width:150px" /></p>
                    </p>
                    <div class="more"><a href="/2d_dizajn/urok_po_risovaniyu_mordashek">Читать подробнее >>></a></div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <!-- /ARTICLE --><!-- ARTICLE -->
        <div class="art_anons">
            <div class="art_anons_vnut">
                <div class="ch_title">2D Дизайн</div>
                <div class="art_icon">
                    <img src="/uploads/images/ikon/PS.jpg" />
                </div>
                <div class="art_anons_text">
                    <h2>В этом Фотошоп уроке Вы научитесь делать забавного пушистика! <div class="art_date">07.04.2017</div></h2>
                    <p><p><img alt="" src="/uploads/images/staty/2D/pushistik/15.jpg" style="height:150px; width:150px" /></p>
                    </p>
                    <div class="more"><a href="/2d_dizajn/v_etom_fotoshop_uroke_vy_nauchites_delat_zabavnogo_pushistika">Читать подробнее >>></a></div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <!-- /ARTICLE --><!-- ARTICLE -->
        <div class="art_anons">
            <div class="art_anons_vnut">
                <div class="ch_title">C#</div>
                <div class="art_icon">
                    <img src="/uploads/images/ikon/c_sharp.jpg" />
                </div>
                <div class="art_anons_text">
                    <h2>Mahou — волшебный переключатель раскладок <div class="art_date">07.04.2017</div></h2>
                    <p><p>Все началось с того что я захотел программировать на C# (до создания этой программы у меня было почти что никаких знаний о C#), и была одна программа которая не работала так как я хотел (Punto Switcher) долго-долго я искал к ней альтернативы и ненадолго остановился на dotSwitcher нравилась она мне&hellip; Но через некоторое время я решил что ей не хватает функционала и решил посмотреть исходный код, кое-где кое-как я разобрался как все работает, но больше всего не понимал одну вещь &mdash; WinAPI, и начал я искать информацию по функциям используемых в dotSwitcher и понемногу я начинал запоминать и понимать смысл всего этого волшебства (так мне тогда казалось).</p>
                    </p>
                    <div class="more"><a href="/c/mahou_volshebnyj_pereklyuchatel_raskladok">Читать подробнее >>></a></div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <!-- /ARTICLE --><!-- ARTICLE -->
        <div class="art_anons">
            <div class="art_anons_vnut">
                <div class="ch_title">Android</div>
                <div class="art_icon">
                    <img src="/uploads/images/ikon/android.jpg" />
                </div>
                <div class="art_anons_text">
                    <h2>10 инструментов для продуктивности Android-разработчика <div class="art_date">07.04.2017</div></h2>
                    <p><p>Цель этой статьи &ndash; описать те инструменты, которые могут увеличить вашу продуктивность, эффективность работы и улучшить взаимодействие с вашими менеджерами.</p>
                    </p>
                    <div class="more"><a href="/android/10_instrumentov_dlya_produktivnosti_androidrazrabotchika">Читать подробнее >>></a></div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <!-- /ARTICLE --><!-- ARTICLE -->
        <div class="art_anons">
            <div class="art_anons_vnut">
                <div class="ch_title">UNITY 3D</div>
                <div class="art_icon">
                    <img src="/uploads/images/ikon/unity3d.jpg" />
                </div>
                <div class="art_anons_text">
                    <h2>IAP в Unity3D <div class="art_date">07.04.2017</div></h2>
                    <p><p>Когда-то давно, во времена Unity 4 добавление внутриигровых покупок вызывало некоторые трудности. Можно было идти двумя путями: использовать какой-либо плагин из уже существующих или реализовывать свою обертку над нативными функциями для каждой платформы. В первом случае было несколько решений: Soomla, OpenIAB, Prime и много-много других. Некоторые из них были платными и стояли довольно дорого: цена Prime составляла около 70$. Некоторые были бесплатными и отказывались работать в iOS: OpenIAB.&nbsp;</p>
                    </p>
                    <div class="more"><a href="/unity_3d/iap_v_unity3d">Читать подробнее >>></a></div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <!-- /ARTICLE -->
        <!-- /ARTICLES -->
    </main>
    <footer>Skiv Weber 2016</footer>
</div>
<script>
    $(function() {
        var banner = $('#show_iframe'), iframes = [], rand;

        iframes[0] = '3d_divs';
        iframes[1] = 'toddler';
        iframes[2] = 'cube';
        iframes[3] = 'galaktika';
        iframes[4] = 'galaxy';
        iframes[5] = 'most_beautiful';
        iframes[6] = 'radar';
        iframes[7] = 'splash_cube';
        iframes[8] = 'squares';

        // iframes[9] = 'bubbles';

        rand = Math.floor(Math.random() * iframes.length);

        banner.attr( "src" , './css_show/' + iframes[rand] + '/index.html');
    });
</script>
<div id="app">

</div>
<script src="./js/app.js"></script>
</body>
</html>
