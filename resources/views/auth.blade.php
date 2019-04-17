<!DOCTYPE html>
<html lang="ru">
<head>
    <link rel="shortcut icon" href="/files/fav_logo.ico"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="csrf-token" content="gwzH6PrylzvKG0t0iMHboOrOxnDkmsvST1ddNmQs">
    <title>Nvuti - Официальный сайт. Нвути сервис мгновенных игр.</title>
    <link rel="stylesheet" type="text/css" href="./files/css.css">
    <link rel="stylesheet" type="text/css" href="./files/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./files/style.minn.css">
    <link rel="stylesheet" type="text/css" href="./files/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./files/flag-icon.min.css">
    <link rel="stylesheet" type="text/css" href="./files/morris.css">
    <link rel="stylesheet" type="text/css" href="./files/climacons.min.css">
    <link rel="stylesheet" type="text/css" href="./files/loader-gg.css">
    <link rel="stylesheet" type="text/css" href="./files/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="./files/app.min.css">
    <link rel="stylesheet" type="text/css" href="./files/colors.min.css">
    <link rel="stylesheet" type="text/css" href="./files/horizontal-menu.min.css">
    <link rel="stylesheet" type="text/css" href="./files/vertical-overlay-menu.min.css">
    <link rel="stylesheet" type="text/css" href="./files/style.css">
    <style>
        .tag-default:hover {
            background-color: #626f7f !important;
        }
    </style>
    <style>
        .btnSuccess {
            box-shadow: 3px 11px 23px -11px rgba(37, 219, 115, 0.97) !important;
        }

        .btnError {
            box-shadow: 3px 11px 23px -11px rgb(234, 96, 75);
        }

        .btnEnter {
            box-shadow: rgba(0, 174, 213, 0.63) 7px 10px 23px -11px !important;
        }
    </style>
    <style type="text/css">
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            /* display: none; <- Crashes Chrome on hover */
            -webkit-appearance: none;
            margin: 0;
            /* <-- Apparently some margin are still there even though it's hidden */
        }

        .jqstooltip {
            position: absolute;
            left: 0px;
            top: 0px;
            visibility: hidden;
            background: rgb(0, 0, 0) transparent;
            background-color: rgba(0, 0, 0, 0.6);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);
            -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";
            color: white;
            font: 10px arial, san serif;
            text-align: left;
            white-space: nowrap;
            padding: 5px;
            border: 1px solid white;
            z-index: 10000;
        }

        .jqsfield {
            color: white;
            font: 10px arial, san serif;
            text-align: left;
        }

        .circle-online {
            width: 8px;
            height: 8px;
            background: linear-gradient(to right, #0ACB90, #2BDE6D);
            border-radius: 100%;
        }

        .pulse-online {
            animation: pulse 11s infinite;
            animation-duration: 4s;
        }

        @-webkit-keyframes pulse {
            0% {
                -webkit-box-shadow: 0 0 0 0 rgba(10, 203, 144, 0.6);
            }
            70% {
                -webkit-box-shadow: 0 0 0 10px rgba(10, 203, 144, 0);
            }
            100% {
                -webkit-box-shadow: 0 0 0 0 rgba(10, 203, 144, 0);
            }
        }

        @keyframes pulse {
            0% {
                -moz-box-shadow: 0 0 0 0 rgba(10, 203, 144, 0.6);
                box-shadow: 0 0 0 0 rgba(10, 203, 144, 0.5);
            }
            70% {
                transform: rotateY(0deg);
                -moz-box-shadow: 0 0 0 9px rgba(10, 203, 144, 0);
                box-shadow: 0 0 0 9px rgba(10, 203, 144, 0);
            }
            100% {
                -moz-box-shadow: 0 0 0 0 rgba(10, 203, 144, 0);
                box-shadow: 0 0 0 0 rgba(10, 203, 144, 0);
            }
        }
    </style>
    <script src="./files/js.cookie.js" type="text/javascript"></script>
    <script src="./files/jquery-latest.min.js"></script>
    <script src="./files/socket.io-1.4.5.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(() => {
            window.history.replaceState(null, null, window.location.pathname);
            $('#MinRange').html(Math.floor(($('#BetPercent').val() / 100) * 999999));
            $('#MaxRange').html(999999 - Math.floor(($('#BetPercent').val() / 100) * 999999));
            $('#BetProfit').html(((100 / $('#BetPercent').val()) * $('#BetSize').val()).toFixed(2));
        });
    </script>
    <script>
        const register_show = () => {
            $('#login').hide();
            $('#reset').hide();
            $("#register").fadeIn("slow", function () {
            });
        };

        const login_show = () => {
            $('#register').hide();
            $('#reset').hide();
            $("#login").fadeIn("slow", function () {
            });
        };
    </script>
    <script src="https://www.google.com/recaptcha/api.js?onload=renderRecaptchas&render=explicit" async defer></script>
    <script>
        window.renderRecaptchas = function () {
            var recaptchas = document.querySelectorAll('.g-recaptcha');
            for (var i = 0; i < recaptchas.length; i++) {
                grecaptcha.render(recaptchas[i], {
                    sitekey: recaptchas[i].getAttribute('data-sitekey')
                });
            }
        }
    </script>
</head>
<body class="horizontal-layout horizontal-menu 2-columns    menu-expanded ">
<nav class="header-navbar navbar navbar-with-menu navbar-static-top navbar-light navbar-border navbar-brand-center"
     data-nav="brand-center">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav">
                <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a href=""
                                                                               class="nav-link nav-menu-main menu-toggle hidden-xs">
                        <i class="ft-menu font-large-1"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="navbar-brand">
                        </center>
                        <h2 class=""><b>NVUTI</b></h2>
                    </a>
                    </center>
                </li>
            </ul>
        </div>
    </div>
</nav>
<style>
    .h66 {
        height: 66px;
    }

    .mt52 {
        margin-top: 52px;
    }

    @media (max-width: 767px) {
        .cssload-loader {
            margin-top: 18.1px;
        }

        .h66 {
            height: 0px;
        }

        .mt52 {
            margin-top: 0px;
        }

        .logo_button {
            float: left !important;
            margin-left: 16px;
        }
    }
</style>
<div id="sticky-wrapper" class="sticky-wrapper h66">
    <div role="navigation" data-menu="menu-wrapper"
         class="header-navbar navbar navbar-horizontal navbar-fixed navbar-light navbar-without-dd-arrow navbar-shadow menu-border navbar-brand-center"
         data-nav="brand-center">
        <div data-menu="menu-container" class="navbar-container main-menu-content container center-layout">
            <ul id="main-menu-navigation" data-menu="menu-navigation" class="nav navbar-nav">
                <li class="dropdown nav-item active"
                    onclick="$('.dsec').hide();$('#lastBets').show();$(document.body).removeClass('menu-open');">
                    <a class="dropdown-toggle nav-link"><span>Главная</span></a>
                </li>
                <li class="dropdown nav-item " id="gg"
                    onclick="$('.dsec').hide();$('#realGame').show();$(document.body).removeClass('menu-open');">
                    <a class="dropdown-toggle nav-link"><span>Честная игра</span></a>
                </li>
                <li class="dropdown nav-item "
                    onclick="$('.dsec').hide();$('#rules').show();$(document.body).removeClass('menu-open');">
                    <a class="dropdown-toggle nav-link"><span>Как играть</span></a>
                </li>
                <li class="dropdown nav-item "
                    onclick="$('.dsec').hide();$('#contacts').show();$(document.body).removeClass('menu-open');">
                    <a class="dropdown-toggle nav-link"><span>Контакты</span></a>
                </li>
                <li class="dropdown nav-item "
                    onclick="$('.dsec').hide();$('#lastWithdraw').show();$(document.body).removeClass('menu-open');">
                    <a class="dropdown-toggle nav-link"><span>Выплаты</span></a>
                </li>
                <script>
                    $(function () {
                        $("#main-menu-navigation  li").click(function () {

                            if ($(this).attr('id') !== 'setPop' && $(this).attr('id') !== 'exit') {
                                $("#main-menu-navigation  li").removeClass("active");
                                $(this).toggleClass("active");
                            }

                        })
                    });
                </script>
                <button style="margin-top:12px;float:right;" class="flat_button logo_button  color3_bg"
                        onclick="window.open(&quot;https://vk.com/nvutinet&quot;);">Вконтакте
                </button>
            </ul>
        </div>
    </div>
</div>
<div class="app-content container center-layout mt-2">
    <div class="content-wrapper">
        <div class="content-body">
            <div class="row">
                <div class="col-xs-12" style="
    border: 1px solid transparent;
    border-radius: .25rem;">
                    <div class="alert alert-dismissible" style="text-align: center; background: url(/files/banner.jpg) no-repeat; -moz-background-size: 100%; /* Firefox 3.6+ */
    -webkit-background-size: 100%; /* Safari 3.1+ и Chrome 4.0+ */
    -o-background-size: 100%; /* Opera 9.6+ */
    background-size: 100%;
	color: white;
	">

                        <center>Бесплатные 5 рублей каждый день!</center>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="card">
                        <div class="card-body"
                             style="box-shadow: rgba(210, 215, 222, 0.5) 7px 10px 23px -11px;border-radius: 6px!important;">

                            <div class="row">

                                <div class="col-lg-6  col-md-12 col-sm-12 ">
                                    <div id="what-is" class="card">
                                        <div class="card-header" style="border-radius: 4px!important;">
                                            <h2 class="card-title"><b>ЧТО ТАКОЕ NVUTI | НВУТИ?</b></h2>
                                        </div>
                                        <div class="card-body collapse in">
                                            <div class="card-block">
                                                <div class="card-text">
                                                    <p style="font-size:15.5px">Это новый сервис мгновенных игр, где
                                                        вероятность выигрыша указывает сам игрок.</p>
                                                    <ul>
                                                        <li>Бонус +5 рублей каждый день!</li>
                                                        <li>Моментальные выплаты!</li>
                                                        <li>Проверка каждой игры на честность!</li>
                                                        <li>Заработок онлайн на рефералах!</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6  col-md-12 col-sm-12 ">
                                    <div id="login">
                                        <div class="col-lg-10 offset-lg-1">
                                            <div class="card-header no-border pb-0">
                                                <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2">
                                                    <span style="font-size:17px"> Авторизация </span></h6>
                                            </div>
                                            <div class="card-body collapse in">
                                                <div class="card-block">
                                                    <form class="form-horizontal">
                                                        <div style="    margin-top: -22px;"
                                                             class="card-body pt-0 text-center">
                                                            <center><a style="color:#3B5998" href="/login"
                                                                       class="btn btn-social mb-1 mr-1 btn-outline-facebook"><span
                                                                            class="fa fa-vk"></span> <span class="px-1">Войти через ВК</span>
                                                                </a></center>
                                                        </div>
                                                        <fieldset class="form-group position-relative has-icon-left">
                                                            <input type="text"
                                                                   class="form-control form-control-md input-md"
                                                                   id="userLogin" placeholder="Логин">
                                                            <div class="form-control-position">
                                                                <i class="ft-user"></i>
                                                            </div>
                                                        </fieldset>
                                                        <fieldset class="form-group position-relative has-icon-left">
                                                            <input type="password"
                                                                   class="form-control form-control-md input-md"
                                                                   id="userPass" placeholder="Пароль">
                                                            <div class="form-control-position">
                                                                <i class="ft-lock"></i>
                                                            </div>
                                                        </fieldset>

                                                        <a id="error_enter" class="btn  btn-block btnError"
                                                           style="color:#fff;display:none"></a>
                                                        <a id="enter_but" onclick="login()"
                                                           class="btn   btn-block btnEnter"
                                                           style="color:#fff;margin-bottom:5px">
                                                            <center>
                                                                <span id="text_enter"> <i
                                                                            class="ft-unlock"></i> Войти</span>
                                                                <div id="loader" style="position:absolute">
                                                                    <div id='dot-container' style='display:none'>
                                                                        <div id="left-dot" class='white-dot'></div>
                                                                        <div id='middle-dot' class='white-dot'></div>
                                                                        <div id='right-dot' class='white-dot'></div>
                                                                    </div>
                                                                </div>
                                                            </center>
                                                        </a>
                                                    </form>
                                                    <script>
                                                        var input3 = document.getElementById('userLogin'),
                                                            value = input3.value;

                                                        input3.addEventListener('input', onInput);

                                                        function onInput(e) {
                                                            var newValue = e.target.value;
                                                            if (newValue.match(/[^a-zA-Z0-9]/g)) {
                                                                input3.value = value;
                                                                return;
                                                            }
                                                            value = newValue;
                                                        }

                                                        $('#userLogin').keydown(function (event) {
                                                            if (event.which === 13) {
                                                                login();

                                                            }
                                                        });
                                                        $('#userPass').keydown(function (event) {
                                                            if (event.which === 13) {
                                                                login();

                                                            }
                                                        });

                                                        function login() {
                                                            if ($('#userLogin').val().length < 4) {
                                                                $('#error_enter').css('display', 'block');
                                                                return $('#error_enter').html('Логин от 4 символов');
                                                            }
                                                            if ($('#userPass').val() == '') {
                                                                $('#error_enter').css('display', 'block');
                                                                return $('#error_enter').html('Введите пароль');
                                                            }

                                                            $.ajax({
                                                                type: 'POST',
                                                                url: '/action',
                                                                beforeSend: function () {
                                                                    $('#error_enter').css('display', 'none');
                                                                    $('#loader').css('position', '');
                                                                    $('#enter_but').css('pointer-events', 'none');
                                                                    $('#dot-container').css('display', '');
                                                                    $('#text_enter').css('display', 'none');
                                                                    $('#text_enter').css('display', 'none');
                                                                },
                                                                data: {
                                                                    type: "login",
                                                                    login: $('#userLogin').val(),
                                                                    rc: $('#g-recaptcha-response').val(),
                                                                    pass: $('#userPass').val(),
                                                                },
                                                                success: function (data) {

                                                                    var obj = jQuery.parseJSON(data);
                                                                    if ('success' in obj) {
                                                                        window.location.href = '';
                                                                        // return false;
                                                                    } else {
                                                                        $('#enter_but').css('pointer-events', '');
                                                                        $('#loader').css('position', 'absolute');
                                                                        $('#dot-container').css('display', 'none');
                                                                        $('#text_enter').css('display', 'block');
                                                                        $('#error_enter').html(obj.error);
                                                                        $('#error_enter').css('display', 'block');
                                                                    }


                                                                }
                                                            });
                                                        }
                                                    </script>
                                                </div>
                                            </div>
                                            <div class="card-footer no-border" style="margin-top:-12x">
                                                <p class="float-sm-center text-xs-center"><a onclick="register_show()"
                                                                                             class="card-link">Регистрация</a>
                                                </p>
                                                <!--<p class="float-sm-right text-xs-center"><a onclick="reset_show()" class="card-link">Забыли пароль? </a></p>-->
                                            </div>
                                        </div>
                                    </div>
                                    <div id="register" style="display:none">
                                        <div class="col-lg-10 offset-lg-1">
                                            <div class="card-header no-border pb-0">
                                                <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2">
                                                    <span style="font-size:17px">Регистрация </span></h6>
                                            </div>
                                            <div class="card-body collapse in">
                                                <div class="card-block">
                                                    <form class="form-horizontal">
                                                        <fieldset class="form-group position-relative has-icon-left">
                                                            <input type="text"
                                                                   class="form-control form-control-md input-md"
                                                                   id="userLoginRegister" placeholder="Логин">
                                                            <div class="form-control-position">
                                                                <i class="ft-user"></i>
                                                            </div>
                                                        </fieldset>
                                                        <fieldset class="form-group position-relative has-icon-left">
                                                            <input type="email"
                                                                   class="form-control form-control-md input-md"
                                                                   id="userEmailRegister" placeholder="E-mail">
                                                            <div class="form-control-position">
                                                                <i class="ft-mail"></i>
                                                            </div>
                                                        </fieldset>
                                                        <fieldset class="form-group position-relative has-icon-left">
                                                            <input type="password"
                                                                   class="form-control form-control-md input-md"
                                                                   id="userPassRegister" placeholder="Пароль">
                                                            <div class="form-control-position">
                                                                <i class="ft-lock"></i>
                                                            </div>
                                                        </fieldset>
                                                        <fieldset>
                                                            <div class="g-recaptcha-response-1"
                                                                 style="text-align: center;">
                                                                <div class="g-recaptcha" id="g-recaptcha-response-1"
                                                                     data-sitekey="6LeyK30UAAAAAMxL0JiQ4hTYX1RtANTok6ragpl8"></div>
                                                            </div>
                                                            <div class="form-control-position">
                                                                <i class="ft-lock"></i>
                                                            </div>
                                                        </fieldset>
                                                        <style>
                                                            .check1 {
                                                                width: 19px;
                                                                height: 19px;
                                                                margin: auto;
                                                            }

                                                            .check1 input {
                                                                display: none;
                                                            }

                                                            .check1 input:checked + .box1 {
                                                                background-color: #404e67e8;
                                                            }

                                                            .check1 input:checked + .box1:after {
                                                                top: 0;
                                                            }

                                                            .check1 .box1 {
                                                                border-radius: 4px;
                                                                width: 100%;
                                                                height: 100%;
                                                                transition: all 1.1s cubic-bezier(.19, 1, .22, 1);
                                                                border: 2px solid transparent;
                                                                background-color: #ebebeb;
                                                                position: relative;
                                                                overflow: hidden;
                                                                cursor: pointer;
                                                            }

                                                            .check1 .box1:after {
                                                                width: 65%;
                                                                height: 33%;
                                                                content: '';
                                                                position: absolute;
                                                                border-left: 1.5px solid;
                                                                border-bottom: 1.5px solid;
                                                                border-color: #fff;
                                                                transform: rotate(-45deg) translate3d(0, 0, 0);
                                                                transform-origin: center center;
                                                                transition: all 1.1s cubic-bezier(.19, 1, .22, 1);
                                                                left: 0;
                                                                right: 0;
                                                                top: 200%;
                                                                bottom: 5%;
                                                                margin: auto;
                                                            }
                                                        </style>
                                                        <fieldset style="padding-bottom: 7px;">
                                                            <label class="check1">
                                                                <input id="rulesagree" type="checkbox"/>
                                                                <div class="box1"></div>
                                                            </label>
                                                            <div style="display:inline-block;padding-left:10px;position:absolute">
                                                                Согласен c <u data-toggle="modal" data-target="#large"
                                                                              style="cursor:pointer">правилами</u></div>
                                                        </fieldset>

                                                        <a id="error_register" class="btn  btn-block btnError"
                                                           style="color:#fff;display:none"></a>
                                                        <a onclick="register1()" class="btn   btn-block btnEnter"
                                                           style="color:#fff;margin-bottom:5px">
                                                            <center>
                                                                <span id="text_register"><i class="ft-check"></i> Зарегистрироваться</span>
                                                                <div id="loader_register" style="position:absolute">
                                                                    <div id='dot-container_register'
                                                                         style='display:none'>
                                                                        <div id="left-dot_register"
                                                                             class='white-dot'></div>
                                                                        <div id='middle-dot_register'
                                                                             class='white-dot'></div>
                                                                        <div id='right-dot_register'
                                                                             class='white-dot'></div>
                                                                    </div>
                                                                </div>
                                                            </center>
                                                        </a>
                                                        <script>
                                                            $('#userLoginRegister').keydown(function (event) {
                                                                if (event.which === 13) {
                                                                    register1();

                                                                }
                                                            });
                                                            $('#userEmailRegister').keydown(function (event) {
                                                                if (event.which === 13) {
                                                                    register1();

                                                                }
                                                            });
                                                            $('#userPassRegister').keydown(function (event) {
                                                                if (event.which === 13) {
                                                                    register1();

                                                                }
                                                            });
                                                            var input = document.getElementById('userLoginRegister'),
                                                                value = input.value;

                                                            input.addEventListener('input', onInput);

                                                            function onInput(e) {
                                                                var newValue = e.target.value;
                                                                if (newValue.match(/[^a-zA-Z0-9]/g)) {
                                                                    input.value = value;
                                                                    return;
                                                                }
                                                                value = newValue;
                                                            }

                                                            var input2 = document.getElementById('userEmailRegister'),
                                                                value = input2.value;

                                                            input2.addEventListener('input', onInput1);

                                                            function onInput1(e) {
                                                                var newValue = e.target.value;
                                                                if (newValue.match(/[^a-zA-Z0-9@.-_-]/g)) {
                                                                    input2.value = value;
                                                                    return;
                                                                }
                                                                value = newValue;
                                                            }

                                                            function isValidEmailAddress(email) {
                                                                var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,5})(\]?)$/;
                                                                return expr.test(email);
                                                            };

                                                            function register1() {
                                                                if ($('#userLoginRegister').val().length < 4) {
                                                                    $('#error_register').css('display', 'block');
                                                                    return $('#error_register').html('Логин от 4 до 15 символов');
                                                                }
                                                                if ($('#userEmailRegister').val() == '') {
                                                                    $('#error_register').css('display', 'block');
                                                                    return $('#error_register').html('Введите email');
                                                                }
                                                                if (!isValidEmailAddress($('#userEmailRegister').val())) {
                                                                    $('#error_register').css('display', 'block');
                                                                    return $('#error_register').html('Введите корректный email');
                                                                }
                                                                if ($('#userPassRegister').val() == '') {
                                                                    $('#error_register').css('display', 'block');
                                                                    return $('#error_register').html('Введите пароль');
                                                                }
                                                                if ($('#g-recaptcha-response').val() == '') {
                                                                    $('#error_register').css('display', 'block');
                                                                    return $('#error_register').html('Введите капчу');
                                                                }
                                                                if ($('#userPassRegister').val().length < 5) {
                                                                    $('#error_register').css('display', 'block');
                                                                    return $('#error_register').html('Пароль от 5 символов');
                                                                }
                                                                if (!$("#rulesagree").prop('checked')) {
                                                                    $('#error_register').css('display', 'block');
                                                                    return $('#error_register').html('Согласитесь с правилами');
                                                                }

                                                                $.ajax({
                                                                    type: 'POST',
                                                                    url: '/action',
                                                                    beforeSend: function () {
                                                                        $('#error_register').css('display', 'none');
                                                                        $('#loader_register').css('position', '');
                                                                        $('#enter_but').css('pointer-events', 'none');
                                                                        $('#dot-container_register').css('display', '');
                                                                        $('#text_register').css('display', 'none');

                                                                    },
                                                                    data: {
                                                                        type: "register",
                                                                        login: $('#userLoginRegister').val(),
                                                                        rc: $('#g-recaptcha-response').val(),
                                                                        pass: $('#userPassRegister').val(),
                                                                        email: $('#userEmailRegister').val(),
                                                                        ref: Cookies.get('ref')
                                                                    },
                                                                    success: function (data) {
                                                                        $('#enter_but').css('pointer-events', '');


                                                                        var obj = jQuery.parseJSON(data);
                                                                        if ('success' in obj) {

                                                                            document.location.href = '';
                                                                            return false;
                                                                        } else {
                                                                            $('#error_register').html(obj.error);
                                                                            $('#error_register').css('display', 'block');
                                                                            $('#text_register').css('display', 'block');
                                                                            $('#loader_register').css('position', 'absolute');
                                                                            $('#dot-container_register').css('display', 'none');
                                                                        }


                                                                    }
                                                                });
                                                            }
                                                        </script>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="card-footer no-border" style="margin-top:-12px">
                                                <p class="float-sm-center text-xs-center"><a onclick="login_show()"
                                                                                             class="card-link">Есть
                                                        аккаунт</a></p>
                                                <!--<p class="float-sm-right text-xs-center"><a onclick="reset_show()" class="card-link">Забыли пароль? </a></p>-->
                                            </div>
                                        </div>
                                    </div>
                                    <div id="reset" style="display:none">
                                        <div class="col-lg-10 offset-lg-1">
                                            <div class="card-header no-border pb-0">
                                                <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2">
                                                    <span style="font-size:17px">Вспомнить пароль</span></h6>
                                            </div>
                                            <div class="card-body collapse in">
                                                <div class="card-block">
                                                    <fieldset class="form-group position-relative has-icon-left">
                                                        <input type="text" class="form-control form-control-md input-md"
                                                               id="loginemail" placeholder="Логин или E-mail">
                                                        <div class="form-control-position">
                                                            <i class="ft-search"></i>
                                                        </div>
                                                    </fieldset>

                                                    <a id="error_reset" class="btn  btn-block btnError"
                                                       style="color:#fff;display:none"></a>
                                                    <a id="reset_success" class="btn  btn-block btnSuccess"
                                                       style="color:#fff;display:none"></a>
                                                    <a id="reset_but" onclick="reset_password()"
                                                       class="btn   btn-block btnEnter"
                                                       style="color:#fff;margin-bottom:5px">
                                                        <center>
                                                            <span id="text_reset"><i
                                                                        class="ft-check"></i> Вспомнить</span>
                                                            <div id="loader_reset" style="position:absolute">
                                                                <div id='dot-container_reset' style='display:none'>
                                                                    <div id="left-dot_reset" class='white-dot'></div>
                                                                    <div id='middle-dot_reset' class='white-dot'></div>
                                                                    <div id='right-dot_reset' class='white-dot'></div>
                                                                </div>
                                                            </div>
                                                        </center>
                                                    </a>
                                                    <script>
                                                        var input22 = document.getElementById('loginemail'),
                                                            value = input22.value;

                                                        input22.addEventListener('input', onInput1);

                                                        function onInput1(e) {
                                                            var newValue = e.target.value;
                                                            if (newValue.match(/[^a-zA-Z0-9@.-_-]/g)) {
                                                                input22.value = value;
                                                                return;
                                                            }
                                                            value = newValue;
                                                        }

                                                        $('#loginemail').keydown(function (event) {
                                                            if (event.which === 13) {
                                                                reset_password();

                                                            }
                                                        });

                                                        function reset_password() {

                                                            if ($('#loginemail').val().length < 4) {
                                                                $('#error_reset').css('display', 'block');
                                                                return $('#error_reset').html('Введите корректные данные');
                                                            }


                                                            $.ajax({
                                                                type: 'POST',
                                                                url: 'action.php',
                                                                beforeSend: function () {
                                                                    $('#error_reset').css('display', 'none');
                                                                    $('#loader_reset').css('position', '');
                                                                    $('#reset_success').css('display', 'none');
                                                                    $('#reset_but').css('pointer-events', 'none');
                                                                    $('#dot-container_reset').css('display', '');
                                                                    $('#text_reset').css('display', 'none');

                                                                },
                                                                data: {
                                                                    type: "resetPass",
                                                                    rc: $('#g-recaptcha-response-2').val(),
                                                                    login: $('#loginemail').val()
                                                                },
                                                                success: function (data) {
                                                                    $('#reset_but').css('pointer-events', '');
                                                                    var obj = jQuery.parseJSON(data);
                                                                    if ('success' in obj) {
                                                                        $('#reset_success').css('display', '');
                                                                        $('#reset_success').html(obj.success.text);
                                                                        $('#reset_but').css('display', 'none');
                                                                        return false;
                                                                    } else {
                                                                        $('#loader_reset').css('position', 'absolute');
                                                                        $('#reset_but').css('display', '');
                                                                        $('#dot-container_reset').css('display', 'none');
                                                                        $('#text_reset').css('display', '');
                                                                        $('#error_reset').html(obj.error);
                                                                        $('#error_reset').css('display', 'block');

                                                                    }


                                                                }
                                                            });
                                                        }
                                                    </script>
                                                </div>
                                            </div>
                                            <div class="card-footer no-border" style="margin-top:-12px">
                                                <p class="float-sm-left text-xs-center"><a onclick="login_show()"
                                                                                           class="card-link">Есть
                                                        аккаунт</a></p>
                                                <p class="float-sm-right text-xs-center"><a onclick="register_show()"
                                                                                            class="card-link">Регистрация </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row dsec" id="lastBets" style="display:block">
                <div class="col-xs-12">
                    <div class="card">
                        <div class="card-header"
                             style="border-radius: 4px!important;-webkit-user-select: none;-moz-user-select: none;">
                            <h4 class="card-title" style=""><b>Последние игры</b></h4>
                            <div style="margin-top: -13px;margin-left: 177px;display: inline-block;position: absolute;"
                                 class="circle-online pulse-online"></div>
                            <span data-toggle="tooltip" data-placement="top" title="" data-original-title="Online "
                                  id="oe"
                                  style="margin-top: -19px;margin-left: 193px;display: inline-block;position: absolute;"></span>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body collapse in"
                             style="-webkit-user-select: none;-moz-user-select: none; box-shadow: rgb(210, 215, 222) 7px 10px 23px -11px;">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                    <tr style="cursor:default!important" class="polew">
                                        <th style="width:20%">Игрок</th>
                                        <th>Число</th>
                                        <th>Цель</th>
                                        <th style="width:14%">Сумма</th>
                                        <th>Шанс</th>
                                        <th>Выигрыш</th>
                                    </tr>
                                    </thead>
                                    <style>
                                        .polew:hover {
                                            cursor: default !important;
                                            background: #fff !important;
                                        }

                                        tr:hover {
                                            cursor: pointer;
                                            background: #fafcff;
                                        }
                                    </style>
                                    <tbody id="response">
                                    <tr>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                        <td class="text-xs-center font-small-2"><span><progress style="margin-top:8px;"
                                                                                                class="progress progress-sm mb-0"
                                                                                                value="0"
                                                                                                max="100"></progress></span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="mb-0 ed" style="display: none;">
                                    <h1>Нвути</h1>
                                    <p>Что такое сервис Нвути? Nvuti является игрой нового поколения или иначе как
                                        сервис мгновенных игр Нвути. У сайта Нвути есть такие аналоги - Рубликс, 1dice,
                                        Драгон мани.
                                        Но данные сайты являются нашей копией и не имеют ничего общего с официальным
                                        сайтом Нвути. Nvuti предлагает честную игру своим пользователям, работающая на
                                        алгоритме SHA.
                                        Каждый день нвути предлагает своим игрокам бесплатный бонус 5 рублей. Также у
                                        нас работает джекпот, который формируется из процента от выигрышей всех игроков
                                        сервиса Нвути.</p>
                                    <h2>Игра Нвути онлайн Nvuti</h2>
                                    <p>Если вы хотите провести время играя в увлекательную игру нвути, то данный сервис
                                        для вас. Здесь игроки получают реальные деньги от нвути, заработанные путем
                                        выбора числа и ставки, выбрав процент вероятности выигрыша Nvuti. Чтобы начать,
                                        вам необходимо:</p>
                                    <ul>
                                        <li>1. Зарегистрироваться на сайте Nvuti</li>
                                        <li>2. Получить бесплатный денежный бонус или пополнить баланс.</li>
                                        <li>3. Сделать честную ставку.</li>
                                    </ul>
                                    <p>Ежедневно сайт нвути посещают тысячи пользователей. Сервис мгновенных игр Nvuti
                                        является полностью оригинальным и не имеет достойных аналогов. Команда нвути
                                        каждый день работает над развитием проекта и только с помощью поддержки
                                        пользователей нвути мы занимаем лидирующие места в сегменте онлайн игр. Просим
                                        всех остерегаться наших клонов: Рубликс, 1dice, Драгон мани, Rublix, 1 дайс,
                                        Dragon Money и др.</p>
                                    <h2>Как играть в Нвути?</h2>
                                    <p>Чтобы начать играть в увлекательную игру нвути, вам необходимо найти сайт
                                        1nvuti.ru - это единственный официальный домент проекта нвути. Другие домены
                                        являются не официальными.
                                        Для этого введите в поисковике фразу «Нвути 1nvuti.ru», и вы непременно
                                        окажетесь на официальном сайте или сможете посетить зеркало nvuti.com.ru с тем
                                        же ассортиментом игр.
                                        Кроме того, зеркало Нвути придет вам на помощь в том случае, если вдруг у вас
                                        возникнут проблемы с доступом к полной версии сайта. На данный момент мы
                                        работаем над мобильным приложением Нвути мобайл. </p>
                                    <h2>Играть бесплатно нвути</h2>
                                    <p>Сервис игр - Нвути заботится о том, чтобы угодить геймерам с разными
                                        предпочтениями. Играть бесплатно вы можете, нажав на кнопку "Получить бонус".
                                        Затем выбрав ставку, нажать на играть. Заходите каждый день и получайте 5 рублей
                                        на игровой счёт. Демонстрационный режим имеет ряд преимуществ:</p>
                                    <ol>
                                        <li>для игры вам не требуется открывать персональный аккаунт, отправлять смс или
                                            пополнять депозит;
                                        </li>
                                        <li>бесплатный бонус вы получаете ежедневно;</li>
                                        <li>полное отсутствие риска, что сбережет ваши нервы;</li>
                                        <li>возможность играть столько бесплатно сколько захочется, а если вдруг
                                            виртуальные кредиты закончатся, вы всегда сможете обновить игру и продолжить
                                            наслаждаться партией.
                                        </li>
                                    </ol>
                                    <p>Если вы любите играть в оригинальный нвути и мечтаете о том, чтобы однажды
                                        сорвать джекпот, тогда вам на сайт 1nvuti.ru, однако для этого потребуется
                                        простая регистрация или авторизация через VK. </p>
                                    <p>Выбирайте только лучший сервис игр Нвути, а о вашем комфорте во время игры
                                        позаботимся мы. Все самое лучшее только на Нвути Nvuti, начни получать
                                        удовольствие от игры онлайн прямо сейчас!</p>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section id="realGame" class="card dsec" style="display:none">
                <div class="card-header" style="border-radius: 4px!important;">
                    <h4 class="card-title "><b>Абсолютно честно</b></h4>
                </div>
                <div class="card-body collapse in">
                    <div class="card-block">
                        <div class="card-text">
                            <p>Перед каждой игрой генерирутеся строка <a href="https://ru.wikipedia.org/wiki/SHA-2"
                                                                         target="_blank">алгоритмом SHA-512 </a> в
                                которой содержится <a
                                        href="https://ru.wikipedia.org/wiki/%D0%A1%D0%BE%D0%BB%D1%8C_(%D0%BA%D1%80%D0%B8%D0%BF%D1%82%D0%BE%D0%B3%D1%80%D0%B0%D1%84%D0%B8%D1%8F)"
                                        target="_blank">соль</a> и победное число (от 0 до 999999). Можно сказать, что
                                перед Вами зашифрованный исход данной игры. Метод гарантирует <b>100% честность</b>, так
                                как результат игры Вы видите заранее, а при изменении победного числа приведет к
                                изменению Hash.</p>
                            Проверяйте самостоятельно:
                            <ul>
                                <li>Скоприруйте Hash до начала игры</li>
                                <li>После окончания нажмите <code class="highlighter-rouge">"Проверить игру"</code></li>
                                <li>Откроется окно с результатом</li>
                                <li>Скопируйте вручную поля Salt1, Number (Победное число), Salt2 или нажмите кнопку
                                    <code class="highlighter-rouge">"Скопировать"</code></li>
                                <li>Вставьте в любой независимый SHA-512 генератор (Например: <a
                                            href="https://emn178.github.io/online-tools/sha512.html" target="_blank">Ссылка
                                        1</a> <a href="https://www.md5calc.com/sha512" target="_blank">Ссылка 2</a> <a
                                            href="https://passwordsgenerator.net/sha512-hash-generator/"
                                            target="_blank">Ссылка 3</a>)
                                </li>
                                <li>Hash должен совпадать c Hash до начала игры</li>
                            </ul>
                            Например:
                            <ul>
                                <li>Hash до начала игры:
                                    cdbe74ade59f5b8e3372c1e107ca8d343da9efa1a173ba6bc678daa28b586b25a7c2e39a71badf7f00e04b5c1dbc43532b92a1f2913b0540f490968d7ce883fe
                                </li>
                                <li>После окончания нажали на "Проверить игру", открылось <a href="game/?id=1"
                                                                                             target="_blank">окно</a>
                                </li>
                                <li>Копируем значения Salt1, Number (Победное число), Salt2</li>
                                <li>Получаем строку <code class="highlighter-rouge">8{93mW8huq|995544|a5cm28bjA0</code>
                                </li>
                                <li>Вставляем строку в <a href="https://emn178.github.io/online-tools/sha512.html"
                                                          target="_blank">генератор</a></li>
                                <li>Получили hash как и до начала игры</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <section id="rules" class="card dsec" style="display:none">
                <div class="card-header" style="border-radius: 4px!important;">
                    <h4 class="card-title "><b>Очень простая игра</b></h4>
                </div>
                <div class="card-body collapse in">
                    <div class="card-block">
                        <div class="card-text">
                            <ul>
                                <li>Укажите размер ставки и свой шанс выигрыша. Будет показан возможный (расчетный)
                                    выигрыш от вашей ставки.
                                </li>
                                <li>Выбираете промежуток больше или меньше.</li>
                                <li><a style="color: #00A5A8;"
                                       onclick="$('.dsec').hide();$('#realGame').show();$('#main-menu-navigation  li').removeClass('active');$('#gg').addClass('active');">Заранее
                                        генерируется число от 0 до 999 999</a>. Если число находится в пределах
                                    диапазона больше/меньше , который вы выбрали,вы выигрываете.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <div class="row dsec" id="lastWithdraw" style="display:none">
                <div class="col-xs-12">
                    <div class="card">
                        <div class="card-header" style="border-radius: 4px!important;">
                            <h4 class="card-title"><b>Последние выплаты</b></h4>
                        </div>
                        <div class="card-body collapse in">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                    <tr class="polew">
                                        <th>ID Игрока</th>
                                        <th>Сумма</th>
                                        <th>Система</th>
                                        <th>Кошелек</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr style="cursor:default!important">
                                        <td>139820</td>
                                        <td>1200 P</td>
                                        <td><img src="/files/qiwi.png"/></td>
                                        <td>+7904643****</td>
                                    </tr>

                                    <tr style="cursor:default!important">
                                        <td>139855</td>
                                        <td>1109 P</td>
                                        <td><img src="/files/payeer.png"/></td>
                                        <td>P1348****</td>
                                    </tr>

                                    <tr style="cursor:default!important">
                                        <td>142051</td>
                                        <td>1745 P</td>
                                        <td><img src="/files/payeer.png"/></td>
                                        <td>P8005****</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <noindex>
                <section id="contacts" class="card dsec" style="display:none">
                    <div class="card-header" style="border-radius: 4px!important;">
                        <h4 class="card-title "><b>Контакты</b></h4>
                    </div>
                    <div class="card-body collapse in">
                        <div class="card-block">
                            <div class="card-text">
                                <h6>Для связи с администрацией используйте <a href="/cdn-cgi/l/email-protection"
                                                                              class="__cf_email__"
                                                                              data-cfemail="7d0e080d0d120f093d4c130b080914530f08">[email&#160;protected]</a>
                                    или пишите в сообщество Вконтакте</h6>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="referals" class="dsec" style="display:none">
                    <div class="row ">
                        <div class="col-xs-12">
                            <div class="card">
                                <div class="card-header" style="border-radius: 4px!important;">
                                </div>
                                <div class="card-header">
                                    Выплаты производятся в <a href="https://vk.com/nvutiwork" target="blank">группе
                                        ВК</a>
                                </div>
                                <div class="card-body collapse in">
                                    <div class="card-block card-dashboard">
                                        Получайте 50% с каждого пополнения баланса реферала
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </noindex>
            <div style="display:none">
                <h2>Nvuti - Никаких комиссий и сборов, быстрые выводы, абсолютно честно и моментально. Получите бонус
                    при первой регистрации!</h2>
            </div>
        </div>
    </div>
    <noindex>
				<span style="cursor:default;float:left;margin-top:-15px;padding-bottom:14px;opacity:0.35">
				2018 © 1nvuti.ru
				</span>
        <span style="cursor:pointer;float:left;margin-top:-15px;padding-bottom:14px;padding-left:10px;opacity:0.35"
              data-toggle="modal" data-target="#large">
				Правила сервиса
				</span>
    </noindex>
</div>

<noindex>
    <div class="modal fade text-xs-left in" id="deposit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2"
         style="display: none; padding-left: 0px;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#F5F7FA;border-radius:6px">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="ft-x"></i></span>
                    </button>
                    <h4 class="modal-title" style="font-weight:600">Пополнение счета</h4>
                </div>
                <div class="modal-body">
                    <div class="row" style="padding-bottom:15px">
                        <input id="systemPay" style="display:none" value="1">
                    </div>
                    <div class="row">

                        <div class="col-lg-8 offset-lg-2">
                            <h5>Cумма: </h5><h5>
                                <input onkeyup="validateWithdrawSize(this)" id="depositSize" class="form-control "
                                       value="50">
                                <a id="error_deposit" class="btn  btn-block btnError"
                                   style="color:#fff;margin-top:15px;display:none"></a>
                            </h5></div>

                    </div>

                    <div class="row">
                        <div class="col-lg-4 offset-lg-4" style="margin-top:8px;margin-bottom:18px">
                            <a id="depositButton" class="btn  btn-block  "
                               style="color:#fff;background: #6c7a89!important;" onclick="deposit()">
                                <span> Пополнить</span>

                            </a>
                        </div>
                        <div class="col-lg-4 offset-lg-4">
                            <div class="text-xs-center">
                                <center>
                                    <div id="depositLoad" class="cssload-loader"
                                         style="background: none; display: none;">
                                        <div class="cssload-inner cssload-one"></div>
                                        <div class="cssload-inner cssload-two"></div>
                                        <div class="cssload-inner cssload-three"></div>
                                    </div>
                                    <br></center>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                            <tr style="cursor:default">
                                <th></th>
                                <th></th>
                                <th class="text-xs-center">Дата</th>
                                <th class="text-xs-center">Сумма</th>
                                <th></th>
                                <th></th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td id="emptyHistory" colspan="6" class="text-xs-center">История пуста</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <script>
                    function deposit() {
                        if ($('#systemPay').val() > 3 || !$.isNumeric($('#systemPay').val())) {
                            $('#error_deposit').show();
                            return $('#error_deposit').html('Укажите систему пополнения');
                        }
                        if ($('#depositSize').val() == '') {
                            $('#error_deposit').show();
                            return $('#error_deposit').html('Введите сумму');
                        }

                        if ($('#depositSize').val() < 20) {
                            $('#error_deposit').show();
                            return $('#error_deposit').html('Минимальная сумма депозита - 20N');
                        }

                        if (!$.isNumeric($('#depositSize').val())) {
                            $('#error_deposit').show();
                            return $('#error_deposit').html('Введите корректную сумму');
                        }
                        $.ajax({
                            type: 'POST',
                            url: '/action',
                            data: {
                                type: "deposit",
                                system: $('#systemPay').val(),
                                size: $('#depositSize').val()
                            },
                            beforeSend: function (data) {
                                $('#depositLoad').show();
                                $('#depositButton').addClass('disabled');
                            },
                            success: function (data) {
                                var obj = jQuery.parseJSON(data);
                                if ('success' in obj) {
                                    // $('#depositButton').removeClass('disabled');
                                    // $('#depositLoad').hide();
                                    window.location.href = obj.success.location;
                                }

                                if ('error' in obj) {
                                    $('#error_deposit').show();
                                    return $('#error_deposit').html(obj.error.text);
                                }

                            }
                        });

                    }
                </script>
            </div>
        </div>
    </div>
</noindex>
<noindex>

    <div class="modal fade text-xs-left in" id="large" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
         style="display: none; ">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#F5F7FA;border-radius:6px">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="ft-x"></i></span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel17">Правила</h4>
                </div>
                <div class="modal-body">
                    <h5>1. ОБЩИЕ ПОЛОЖЕНИЯ. ТЕРМИНЫ.</h5>
                    <p>1.1. Настоящее соглашение – официальный договор на пользование услугами сервиса 1nvuti.ru. Ниже
                        приведены основные условия пользования услугами сервиса. Пожалуйста, прежде чем принять участие
                        в проекте внимательно изучите правила.</p>
                    <p>1.2. Услугами сервиса могут пользоваться исключительно лица, достигшие совершеннолетия (18 лет) и
                        старше. </p>
                    <p>1.3. On-line проект под названием 1nvuti.ru представляет собой систему добровольных
                        пожертвований, принадлежит его организатору и находится в сети Интернет непосредственно по
                        адресу – 1nvuti.ru. </p>
                    <p>1.4. Участие пользователей в проекте является исключительно добровольным.</p>
                    <hr>
                    <h5>2. УЧЁТНАЯ ЗАПИСЬ УЧАСТНИКА ПРОЕКТА (ПОЛЬЗОВАТЕЛЯ СИСТЕМЫ).</h5>
                    <p>2.1. Способом непосредственной регистрации учетной записи является авторизация участников проекта
                        с помощью логина и пароля.</p>
                    <p>2.3. Кроме того, участник проекта несет непосредственную ответственность за любые предпринятые им
                        действия в рамках проекта. </p>
                    <p>2.4. Участник проекта обязуется своевременно сообщить о противозаконном доступе к его учетной
                        записи, противозаконном использовании его учетной записи, по средствам технической поддержки
                        сервиса. </p>
                    <p>2.5. Сервис, а также его правообладатель не несут ответственность за любые предпринятые действия
                        участником проекта касательно третьих лиц. </p>
                    <p>2.6. При использовании несколькими участниками проекта одно и тоже устройство или выход в
                        интернет для игры, необходимо согласование с администрацией. </p>
                    <hr>
                    <h5>3. КОНФИДЕНЦИАЛЬНОСТЬ</h5>
                    <p>3.1. В рамках проекта гарантируется абсолютная конфиденциальность информации, предоставленной
                        участником проекта сервису. </p>
                    <p>3.2. В рамках проекта гарантируется шифрование личных паролей участников. </p>
                    <p>3.3 Личные данные участника проекта могут быть представлены третьим лицам исключительно в случаях
                        непосредственного нарушения действующих законов РФ, в случаях оскорбительного поведения, клеветы
                        в отношении третьих лиц. </p>
                    <hr>
                    <h5>4. УЧАСТНИК ПРОЕКТА (ПОЛЬЗОВАТЕЛЬ СИСТЕМЫ).</h5>
                    <p>4.1. В случае непосредственного нарушения участником проекта изложенных условий и правил
                        настоящего соглашения, а также действующих законов РФ, учетная запись может быть
                        заблокирована. </p>
                    <p>4.2. Недопустимы попытки противозаконного доступа, нанесения вреда работе системы сервиса. </p>
                    <p>4.3. Недопустима любая агрессия, сообщения, запрограммированные на причинение ущерба сервису
                        (вирусы), информация, способная повлечь за собой несущественный, или существенный вред третьим
                        лицам.</p>
                    <hr>
                    <h5>5. КАТЕГОРИЧЕСКИ ЗАПРЕЩЕНО</h5>
                    <p>5.1. Размещение информации, содержащей поддельные (неправдивые) данные.
                    <p>5.2. Проводить попыток взлома сайта и использовать возможные ошибки в скриптах. Нарушители будут
                        немедленно забанены и удалены.
                    <p>5.3. Регистрация более чем одной учетной записи индивидуального участника проекта.
                    <p>5.4. Передача информации иным, третьим лицам, содержащей данные для доступа к личной учетной
                        записи участника проекта.
                    <p>5.5. Выплата на одинаковые реквизиты с разных аккаунтов.
                    <p>5.6. Махинации с реферальной системой.
                    <hr>
                    <h5>6. Выплаты.</h5>
                    <p>6.1 Выплаты производятся в ручном режиме.</p>
                    <p>6.2 Если сумма последних пополнений равна сумме вывода, комиссию оплачивает пользователь.</p>
                    <p>6.3 При выводе бонусных рублей может быть отказано без всяких причин.</p>
                    <p>6.4 Администрация сайта может потребовать скан или фото паспорта для верификации.</p>
                    <p>6.5 При выводе средств, необходимо сыграть хотя бы 15 игр на сумму более 5% последнего пополения
                        счета.</p>
                    <p>6.6 При отказе предоставить дополнительную информацию или верификации кошелька аккаунт может быть
                        заблокирован.</p>
                    <p>6.7 При нарушении правил баланс аккаунта может быть заморожен.</p>
                    <hr>
                    <h5>7. ПРИНЯТИЕ ПОЛЬЗОВАТЕЛЬСКОГО СОГЛАШЕНИЯ.</h5>
                    <p>7.1. Непосредственная регистрация в системе данного проекта предполагает полное принятие
                        участником проекта условий и правил настоящего пользовательского соглашения.</p>
                    <p>7.2. При нарушении правил учетная запись может быть заблокирована вместе с балансом.</p>
                </div>
            </div>
        </div>
    </div>
</noindex>

<div class="modal fade text-xs-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
     style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#F5F7FA;border-radius:6px">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="ft-x"></i></span>
                </button>
                <h4 class="modal-title" style="font-weight:600">Смена пароля</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2" style="margin-top:8px">
                        <h6>Новый пароль:</h6>
                        <input type="password" id="resetPass" class="form-control">
                    </div>
                    <div class="col-lg-8 offset-lg-2" style="margin-top:8px">
                        <h6>Повторите пароль:</h6>
                        <input type="password" id="resetPassRepeat" class="form-control">
                    </div>
                    <div class="col-lg-8 offset-lg-2">
                        <a id="error_resetPass" class="btn  btn-block btnError"
                           style="color:#fff;margin-top:15px;display:none"></a>
                        <a id="succes_resetPass" class="btn  btn-block btnSuccess"
                           style="color:#fff; cursor:default;  margin-top:15px;display:none;">Пароль изменен</a>
                    </div>
                    <div class="col-lg-4 offset-lg-4" style="margin-top:15px;margin-bottom:18px">
                        <a class="btn  btn-block  " style="color:#fff;background: #6c7a89!important;"
                           onclick="resetPass()">
                            <span> Изменить</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="./files/vendors.min.js" type="text/javascript"></script>
<script src="./files/popover.min.js" type="text/javascript"></script>
<script src="./files/raphael-min.js" type="text/javascript"></script>
<script src="./files/morris.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="./files/palette-climacon.css">
<link rel="stylesheet" type="text/css" href="./files/style.min(1).css">
<script src="./files/app-menu.min.js" type="text/javascript"></script>
<script src="./files/app.min.js" type="text/javascript"></script>
<script src="./files/odometer.js"></script>
</body>
</html>
