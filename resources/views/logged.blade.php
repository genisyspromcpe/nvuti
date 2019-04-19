<!DOCTYPE html>
<html lang="ru">
<head>
    <link rel="shortcut icon" href="/files/fav_logo.ico"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <script src="./files/vendors.min.js" type="text/javascript"></script>
    <script src="./files/clipboard.js" type="text/javascript"></script>
    <script src="./files/popover.min.js" type="text/javascript"></script>
    <script src="./files/raphael-min.js" type="text/javascript"></script>
    <script src="./files/morris.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="./files/palette-climacon.css">
    <link rel="stylesheet" type="text/css" href="./files/style.min(1).css">
    <script src="./files/app-menu.min.js" type="text/javascript"></script>
    <script src="./files/app.min.js" type="text/javascript"></script>
    <script src="./files/odometer.js"></script>
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
    <script src="https://www.google.com/recaptcha/api.js?onload=renderRecaptchas&render=explicit" async defer></script>

    <script>
        const socket = io.connect(':8443', {secure: true});

        socket.on('updateOnline', (online) => {
            $('#oe').text(online);
        });

        socket.on('new_game', (game) => {
            $("#response").prepend(game);
            $('#response').children().slice(20).remove();
        });
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
                <li id="setPop" data-toggle="modal" data-target="#default" class="dropdown nav-item "
                    style="float:right!impotant">
                    <a class="dropdown-toggle nav-link"><span>Настройки</span></a>
                </li>
                <li class="dropdown nav-item " style="float:right!impotant"
                    onclick="$('.dsec').hide();$('#referals').show();$(document.body).removeClass('menu-open');">
                    <a class="dropdown-toggle nav-link"><span>Мои рефералы</span></a>
                </li>
                <li class="dropdown nav-item "
                    onclick="$('.dsec').hide();$('#contacts').show();$(document.body).removeClass('menu-open');">
                    <a class="dropdown-toggle nav-link"><span>Контакты</span></a>
                </li>
                <li class="dropdown nav-item "
                    onclick="$('.dsec').hide();$('#lastWithdraw').show();$(document.body).removeClass('menu-open');">
                    <a class="dropdown-toggle nav-link"><span>Выплаты</span></a>
                </li>
                <li id="exit" class="dropdown nav-item " style="float:right!impotant"
                    onclick="location.href = '/logout';">
                    <a class="dropdown-toggle nav-link"><span>Выйти</span></a>
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
                <div class="col-xs-12" id="bonusRow">
                    <div class="card"
                         style="box-shadow: rgb(210, 215, 222) 7px 10px 23px -11px;border-radius: 6px!important;">
                        <div class="card-header" style="border-radius: 4px!important;">
                            <div class="heading-elements">
                                <ul class="list-inline mb-0 font-medium-2">
                                    <script>
                                        function hideBonus() {
                                            $.ajax({
                                                type: 'POST',
                                                url: '/action',
                                                data: {
                                                    type: "hideBonus",
                                                    sid: Cookies.get('sid'),
                                                },
                                                success: function (data) {
                                                    var obj = jQuery.parseJSON(data);
                                                    if ('success' in obj) {
                                                        $('#bonusRow').hide();
                                                    }
                                                }
                                            });
                                        }
                                    </script>
                                </ul>
                            </div>
                        </div>

                        <div class="card-body" style="margin-top:-35px">
                            <div class="row">
                                <div class="p-2 text-xs-center ">
                                    <h5>Бесплатный бонус каждый день!</h5>
                                    <center>
                                        <a id="error_bonus" class="btn  btn-block btnError"
                                           style="color: rgb(255, 255, 255); display: none;width:240px;margin-top:6px"></a>
                                        <a id="enter_but" onclick="getBonus()" class="btn   btn-block btnEnter"
                                           style="color:#fff;width:240px;margin-top:6px">
                                            Получить бонус</a>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <script>
                            function getBonus() {


                                $.ajax({
                                    type: 'POST',
                                    url: '/user/getBonus',
                                    date: {
                                        _token: _token
                                    },
                                    success: function (obj) {
                                        if ('success' in obj) {
                                            if (obj.success === 1) {
                                                return location.href = "";
                                            }
                                        }
                                        if ('error' in obj) {
                                            $('#error_bonus').show();
                                            return $('#error_bonus').html(obj.error.text);
                                        }
                                    }
                                });
                            }
                        </script>
                    </div>
                </div>


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
                             style="box-shadow: rgb(210, 215, 222) 7px 10px 23px -11px;border-radius: 6px!important;">

                            <div class="row">
                                <div class="col-lg-4 col-md-12 col-sm-12 ">
                                    <div class="p-1 text-xs-center mt52">
                                        <h3 class="display-6 blue-grey darken-1"
                                            style="text-transform: capitalize!important;">{{$u->username}}</h3>
                                        <h3 class="display-4 blue-grey darken-1">
												<span class="odometer odometer-auto-theme" id="userBalance"
                                                      mybalance="{{$u->balance}}">
													<div class="odometer-inside"><span class="odometer-digit"><span
                                                                    class="odometer-digit-spacer">{{$u->balance}}</span><span
                                                                    class="odometer-digit-inner"><span
                                                                        class="odometer-ribbon"><span
                                                                            class="odometer-ribbon-inner"><span
                                                                                class="odometer-value">{{$u->balance}}</span></span></span></span></span></div>
												</span>
                                            N
                                        </h3>
                                        <div class="card-body">
                                            <center>
                                                <ul class="list-inline list-inline-pipe" style="font-size:15px">
                                                    <li data-toggle="modal" data-target="#deposit"
                                                        style="cursor:pointer">Пополнить
                                                    </li>
                                                    <li data-toggle="modal" data-target="#withdraw"
                                                        style="cursor:pointer">Вывод
                                                    </li>
                                                </ul>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 border-right-blue-grey border-right-lighten-5 border-left-blue-grey border-left-lighten-5">
                                    <div class="p-1">
                                        <div class="card-body" style="margin-top:2px;">
                                            <div id="controlBet" class="row">
                                                <div class="col-md-6 col-xs-6">
                                                    <div class="form-group">
                                                        <span class="blue-grey darken-1 text-xs-center">Размер игры</span>
                                                        <input id="BetSize" onkeyup="validateBetSize(this)"
                                                               class="form-control text-xs-center" value="1">
                                                        <div style="margin-top:10px;-webkit-user-select: none;"
                                                             class="text-xs-center">
                                                            <div onclick="var x = ($('#BetSize').val()*2);$('#BetSize').val(parseFloat(x.toFixed(2)));updateProfit()"
                                                                 class="tag tag-default">
                                                                <span>Удвоить</span>
                                                            </div>
                                                            <div onclick="$('#BetSize').val(Math.max(($('#BetSize').val()/2).toFixed(2), 1));updateProfit()"
                                                                 class="tag tag-default" style="display:inline-block">
                                                                <span>Половина</span>
                                                            </div>
                                                            <div onclick="var max = $('#userBalance').attr('myBalance');$('#BetSize').val(Math.max(max,1));updateProfit()"
                                                                 class="tag tag-default"
                                                                 style="margin-left:-13px;margin-top:3px">
                                                                <span>Макс</span>
                                                            </div>
                                                            <div onclick="$('#BetSize').val(1);updateProfit()"
                                                                 class="tag tag-default" style="display:inline-block">
                                                                <span>Мин</span>
                                                            </div>
                                                        </div>
                                                        <script>
                                                            function validateBetSize(inp) {

                                                                inp.value = inp.value.replace(/[,]/g, '.')
                                                                    .replace(/[^\d,.]*/g, '')
                                                                    .replace(/([,.])[,.]+/g, '$1')
                                                                    .replace(/^[^\d]*(\d+([.,]\d{0,2})?).*$/g, '$1');
                                                            }
                                                        </script>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-xs-6">
                                                    <div class="form-group">
                                                        <span class="blue-grey darken-1 text-xs-center">% Шанс выигрыша</span>
                                                        <input id="BetPercent" onkeyup="validateBetPercent(this)"
                                                               class="form-control text-xs-center" value="50">
                                                        <div style="margin-top:10px;-webkit-user-select: none;"
                                                             class="text-xs-center">
                                                            <div onclick="$('#BetPercent').val(Math.min(($('#BetPercent').val()*2).toFixed(2), 85));updateProfit()"
                                                                 class="tag tag-default">
                                                                <span>Удвоить</span>
                                                            </div>
                                                            <div onclick="$('#BetPercent').val(Math.max(($('#BetPercent').val()/2).toFixed(2).replace(/.00/g, ''), 1));updateProfit()"
                                                                 class="tag tag-default" style="display:inline-block">
                                                                <span>Половина</span>
                                                            </div>
                                                            <div onclick="$('#BetPercent').val(85);updateProfit()"
                                                                 class="tag tag-default"
                                                                 style="margin-left:-14px;margin-top:3px">
                                                                <span>Макс</span>
                                                            </div>
                                                            <div onclick="$('#BetPercent').val(1);updateProfit()"
                                                                 class="tag tag-default" style="display:inline-block">
                                                                <span>Мин</span>
                                                            </div>
                                                        </div>
                                                        <script>
                                                            function validateBetPercent(inp) {
                                                                if (inp.value > 85) {
                                                                    inp.value = 85;
                                                                }


                                                                inp.value = inp.value.replace(/[,]/g, '.')
                                                                    .replace(/[^\d,.]*/g, '')
                                                                    .replace(/([,.])[,.]+/g, '$1')
                                                                    .replace(/^[^\d]*(\d+([.,]\d{0,2})?).*$/g, '$1');
                                                            }
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="hidden-xs-down">
                                                <div class="card-subtitle line-on-side text-muted text-xs-center font-small-3 mx-1 my-1 ">
                                                    <span>Hash игры </span>
                                                </div>
                                                <center style="word-wrap:break-word;padding-bottom:5px">
                                                    <b id="hashBet">
                                                        {{ json_decode($u->game)->hash }}</b>
                                                    <div id="loader_hash" style="position:relative;display:none">
                                                        <div id="dot-container_hash">
                                                            <div id="left-dot_hash" class="black-dot"></div>
                                                            <div id="middle-dot_hash" class="black-dot"></div>
                                                            <div id="right-dot_hash" class="black-dot"></div>
                                                        </div>
                                                    </div>
                                                </center>
                                                <center>
                                                    <cite style="cursor:pointer"
                                                          onclick="$('.dsec').hide();$('#realGame').show();$('#main-menu-navigation  li').removeClass('active');$('#gg').addClass('active');">Что
                                                        это?</cite>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="betStart" class="col-lg-4 col-md-6 col-sm-12 ">
                                    <div class="p-1 text-xs-center" style="margin-top:16px;">
                                        <div>
                                            <h3 class="display-4 success1 " style="word-wrap:break-word;"><span
                                                        id="BetProfit">2.00</span> N</h3>
                                            <span class="blue-grey darken-1 "
                                                  style="font-size:17px">Возможный выигрыш</span>
                                        </div>
                                        <div class="card-body">
                                            <div class="row text-xs-center" style="padding-top:10px">
                                                <div class="col-md-6 col-xs-6">
                                                    <div class="form-group">
                                                        @csrf
                                                        <span style="-webkit-user-select: none;-moz-user-select: none;"
                                                              class="blue-grey darken-1 ">0 - <span
                                                                    id="MinRange">499999</span></span>
                                                        <button onclick="bet('betMin')" id="buttonMin"
                                                                style="margin-top:5px;color:#fff;    background: linear-gradient(to right, rgb(122, 134, 148), rgb(99, 107, 116))!important; border: 0px solid;box-shadow:rgba(119, 133, 148, 0.73) 7px 10px 23px -11px; "
                                                                type="button"
                                                                class="bg-blue-grey bg-lighten-2  btn  btn-block mr-1 mb-1">
                                                            Меньше
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-xs-6">
                                                    <div class="form-group">
                                                        <span style="-webkit-user-select: none;-moz-user-select: none;"
                                                              class="blue-grey darken-1  "><span
                                                                    id="MaxRange">500000</span> - 999999</span>
                                                        <button onclick="bet('betMax')" type="button" id="buttonMax"
                                                                style="margin-top:5px;color:#fff; box-shadow:rgba(119, 133, 148, 0.73) 7px 10px 23px -11px;   background: linear-gradient(to right, rgb(122, 134, 148), rgb(99, 107, 116))!important; border: 0px solid "
                                                                class="bg-blue-grey bg-lighten-2  btn  btn-block mr-1 mb-1">
                                                            Больше
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <center>
                                                <div id="betLoad" class="cssload-loader"
                                                     style="background: none;display:none;">
                                                    <div class="cssload-inner cssload-one"></div>
                                                    <div class="cssload-inner cssload-two"></div>
                                                    <div class="cssload-inner cssload-three"></div>
                                                </div>
                                            </center>
                                            <a id="error_bet" class="btn  btn-block btnError"
                                               style="color:#fff;display:none"></a>
                                            <a id="succes_bet" class="btn  btn-block btnSuccess"
                                               style="color:#fff; cursor:default;   margin-top: 0rem; display:none"></a>
                                        </div>
                                        <center style="padding: 0.4rem!important;">
                                            <a id="checkBet"
                                               style="display:none;-webkit-user-select: none;-moz-user-select: none;"
                                               class="blue-grey darken-1 " href="" target="_blank">Проверить игру</a>
                                        </center>
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
                                    @foreach(\App\Game::with(['user'])->orderBy('id', 'desc')->limit(20)->get() as $game)
                                    <tr data-user="{{$game->user_id}}" data-game="1" onclick="window.open('/game/?id={{$game->id}}');">
                                        <td class="text-truncate" style="font-weight:600">{{$game->user->username}}</td>
                                        <td class="text-truncate @if($game->win == 0) danger @else success @endif" style="font-weight:600">{{json_decode($game->game)->win_number}}</td>
                                        <td class="text-truncate " style="font-weight:600">{{$game->betType}}</td>
                                        <td class="text-truncate" style="font-weight:600">{{$game->bet}} N</td>
                                        <td class="text-xs-center font-small-2">
															<span>
																<progress style="margin-top:8px" class="progress progress-sm @if($game->win == 0) progress-danger @else progress-success @endif mb-0" value="{{$game->betPercent}}" max="100"></progress>
															</span>
                                        </td>
                                        <td class="text-truncate @if($game->win == 0) danger @else success @endif" style="font-weight:600">{{$game->win}} N</td>
                                    </tr>
                                    @endforeach
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

                                    @foreach (\App\Withdraw::orderBy('id', 'desc')->limit(20)->get() as $w)
                                        <?php
                                        if($w->system == 1) { $img = '/files/ya.png'; }
                                        elseif($w->system == 2) { $img = '/files/payeer.png'; }
                                        elseif($w->system == 3) { $img = '/files/wm.png'; }
                                        elseif($w->system == 4) { $img = '/files/qiwi.png'; }
                                        elseif($w->system == 5) { $img = '/files/beeline.png'; }
                                        elseif($w->system == 6) { $img = '/files/megafon.png'; }
                                        elseif($w->system == 7) { $img = '/files/mts.png'; }
                                        elseif($w->system == 8) { $img = '/files/tele.png'; }
                                        elseif($w->system == 9) { $img = '/files/visa.png'; }
                                        elseif($w->system == 10) { $img = '/files/mc.png'; }
                                        $wallet = substr_replace($w->number, '****', -4);
                                        ?>
                                        <tr style="cursor:default!important">
                                            <td>{{$w->user_id}}</td>
                                            <td>{{$w->sum}} P</td>
                                            <td><img src="{{$img}}"/></td>
                                            <td>{{$wallet}}</td>
                                        </tr>
                                    @endforeach
                                    
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
                                <h6>Для связи с администрацией используйте <a href="mailto:toxanutiy@gmail.com">toxanutiy@gmail.com</a>
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
                                    <h4 class="card-title "><b>Ваша реферальная ссылка: </b> <span
                                                style="text-transform:none!important"> http://1nvuti.ru/?i={{$u->id}} </span>
                                        <i id="sucCopy" style="display:none" class="ft-check"></i><i
                                                onclick="$(this).hide();$('#sucCopy').show()"
                                                class="ft-copy btn-clipboard"
                                                data-clipboard-text="https://1nvuti.ru/?i={{$u->id}}" style="cursor:pointer"
                                                data-toggle="tooltip" data-placement="top" title=""
                                                data-original-title="Скопировать ссылку"></i></h4></div>
                                <div class="card-header">
                                    Выплаты производятся в <a href="https://vk.com/nvutiwork" target="blank">группе
                                        ВК</a>
                                </div>
                                <div class="card-body collapse in">
                                    <div class="card-block card-dashboard">
                                        Получайте 50% с каждого пополнения баланса реферала
                                    </div>
                                    <div class="table-responsive">

                                        <table class="table mb-0">
                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th class="text-xs-center">Дата</th>
                                                <th class="text-xs-center">Пользователь (Всего: 0)</th>
                                                <th class="text-xs-center">Принес (Всего: P)</th>
                                                <th></th>
                                                <th></th>
                                            </tr>


                                            </thead>
                                            <tbody></tbody>
                                        </table>
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
                            url: '/user/deposit',
                            data: {
                                size: $('#depositSize').val()
                            },
                            beforeSend: function (data) {
                                $('#depositLoad').show();
                                $('#depositButton').addClass('disabled');
                            },
                            success: function (obj) {
                                if ('success' in obj) {
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
    <div class="modal fade text-xs-left in" id="withdraw" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2"
         style="display: none; padding-right: 17px;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#F5F7FA;border-radius:6px">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="ft-x"></i></span>
                    </button>
                    <h4 class="modal-title" style="font-weight:600">Вывод средств</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <h5 class="text-xs-center"> Выплаты от 5 минут до 24 часов</h5>
                            <h5 class="text-xs-center"> Все комиссии берем на себя</h5>
                            <br>
                            <h6>Cумма: </h6><h6>
                                <input onkeyup="validateWithdrawSize(this)" id="WithdrawSize" class="form-control "
                                       value="">
                            </h6></div>
                    </div>
                    <div class="row">

                        <div class="col-lg-8 offset-lg-2">
                            <h6>Платежная система:</h6>
                            <select class="hide-search form-control select2-hidden-accessible" id="hide_search"
                                    onchange="withdrawSelect()" tabindex="-1" aria-hidden="true">
                                <optgroup label="Платежные системы">
                                    <option value="4">Qiwi</option>
                                    <option value="2">Payeer</option>
                                    <option value="3">WebMoney</option>
                                    <option value="1">Яндекс.Деньги</option>
                                </optgroup>
                                <optgroup label="Мобильная связь (Россия)">
                                    <option value="5">Билайн</option>
                                    <option value="6">Мегафон</option>
                                    <option value="7">МТС</option>
                                    <option value="8">Теле 2</option>
                                </optgroup>
                                <optgroup label="Банковские карты (Россия)">
                                    <option value="9">VISA</option>
                                    <option value="10">MASTERCARD</option>
                                </optgroup>

                            </select>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-lg-8 offset-lg-2" style="margin-top:8px">
                            <h6 id="nameWithdraw">Номер телефона:</h6>
                            <input id="walletNumber" class="form-control">

                        </div>
                    </div>
                    <center id="cardLL" style="display:none;color:red">Вывод до 3х рабочих дней, только РФ карты
                    </center>
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <a id="error_withdraw" class="btn  btn-block btnError"
                               style="color:#fff;display:none;margin-top:15px;"></a>
                            <a id="succes_withdraw" class="btn  btn-block btnSuccess"
                               style="color:#fff; cursor:default;  margin-top:15px;display:none;">Выплата успешно
                                создана</a>
                        </div>
                        <div class="col-lg-4 offset-lg-4" style="margin-top:15px;margin-bottom:18px">
                            <a class="btn  btn-block  " style="color:#fff;background: #6c7a89!important;"
                               onclick="withdraw()">
                                <center><span id="withdrawB">  Выплата</span>

                                    <div id="loader" style="display:none">
                                        <div id="dot-container">
                                            <div id="left-dot" class="white-dot"></div>
                                            <div id="middle-dot" class="white-dot"></div>
                                            <div id="right-dot" class="white-dot"></div>
                                        </div>
                                    </div>

                                </center>
                            </a>
                        </div>
                    </div>

                    <br>
                    <h5 class="text-xs-center"> Если хотите вернуть деньги обратно на баланс, нажмите на крестик</h5>
                    <!--<h5 class="text-xs-center" style="color: #fa7777;"> Сегодня возможны задержки на вывод <b>вне зависимости от статуса</b>. Eсли прошло 24 часа и деньги не пришли, пишите в поддержку</h5>-->

                    <br>
                    <div class="table-responsive">
                        <table class="table mb-0" id="withdrawTable">
                            <thead>
                            <tr style="cursor:default">
                                <th style="width:1%">Дата</th>
                                <th style="width:62%">Описание</th>
                                <th style="width:100%">Сумма</th>
                                <th>Статус</th>

                            </tr>
                            </thead>
                            <tbody id="withdrawT">
                                @forelse(\App\Withdraw::where('user_id', $u->id)->get() as $w)
                                    <tr style="cursor:default" id="{{$w->id}}_his">
                                        <td>
                                            @if($w->status == 0)
                                                <i class="ft-x" style="color:red;cursor:pointer;margin-left: -18px;" onclick="removeWithdraw({{$w->id}})"></i>
                                            @endif
                                            {{$w->created_at}}
                                        </td>
                                        <td>
                                            <?php
                                            if($w->system == 1) { $img = '/files/ya.png'; }
                                            elseif($w->system == 2) { $img = '/files/payeer.png'; }
                                            elseif($w->system == 3) { $img = '/files/wm.png'; }
                                            elseif($w->system == 4) { $img = '/files/qiwi.png'; }
                                            elseif($w->system == 5) { $img = '/files/beeline.png'; }
                                            elseif($w->system == 6) { $img = '/files/megafon.png'; }
                                            elseif($w->system == 7) { $img = '/files/mts.png'; }
                                            elseif($w->system == 8) { $img = '/files/tele.png'; }
                                            elseif($w->system == 9) { $img = '/files/visa.png'; }
                                            elseif($w->system == 10) { $img = '/files/mc.png'; }
                                            ?>
                                            <img src="{{$img}}"> {{$w->number}}
                                        </td>
                                        <td>{{$w->sum}} N</td>
                                        <td>
                                            @if($w->status == 0)
                                                <div class="tag tag-warning">Ожидание</div>
                                            @elseif($w->status == 1)
                                                <div class="tag tag-success">Выполнено</div>
                                            @elseif($w->status == 2)
                                                <div class="tag tag-danger">Отменено</div>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td id="emptyHistory" colspan="4" class="text-xs-center">История пуста</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div id="sh"></div>

                    <div class="text-xs-center">
                        <svg id="withdrawHistoryLoad" xmlns="https://www.w3.org/2000/svg"
                             xmlns:xlink="https://www.w3.org/1999/xlink" width="40px" height="40px"
                             viewBox="0 0 100 100" style="background: none;display:none">
                            <g transform="translate(50,50)">
                                <circle cx="0" cy="0" r="7.142857142857143" fill="none" stroke="#31444f"
                                        stroke-width="2" stroke-dasharray="22.43994752564138 22.43994752564138"
                                        transform="rotate(165.372)">
                                    <animateTransform attributeName="transform" type="rotate" values="0 0 0;360 0 0"
                                                      times="0;1" dur="1.6s" calcMode="spline" keySplines="0.2 0 0.8 1"
                                                      begin="0" repeatCount="indefinite"></animateTransform>
                                </circle>
                                <circle cx="0" cy="0" r="14.285714285714286" fill="none" stroke="#465e6b"
                                        stroke-width="2" stroke-dasharray="44.87989505128276 44.87989505128276"
                                        transform="rotate(212.151)">
                                    <animateTransform attributeName="transform" type="rotate" values="0 0 0;360 0 0"
                                                      times="0;1" dur="1.6s" calcMode="spline" keySplines="0.2 0 0.8 1"
                                                      begin="-0.16666666666666666"
                                                      repeatCount="indefinite"></animateTransform>
                                </circle>
                                <circle cx="0" cy="0" r="21.428571428571427" fill="none" stroke="#4c6470"
                                        stroke-width="2" stroke-dasharray="67.31984257692413 67.31984257692413"
                                        transform="rotate(257.801)">
                                    <animateTransform attributeName="transform" type="rotate" values="0 0 0;360 0 0"
                                                      times="0;1" dur="1.6s" calcMode="spline" keySplines="0.2 0 0.8 1"
                                                      begin="-0.3333333333333333"
                                                      repeatCount="indefinite"></animateTransform>
                                </circle>
                                <circle cx="0" cy="0" r="28.571428571428573" fill="none" stroke="#546E7A"
                                        stroke-width="2" stroke-dasharray="89.75979010256552 89.75979010256552"
                                        transform="rotate(300.471)">
                                    <animateTransform attributeName="transform" type="rotate" values="0 0 0;360 0 0"
                                                      times="0;1" dur="1.6s" calcMode="spline" keySplines="0.2 0 0.8 1"
                                                      begin="-0.5" repeatCount="indefinite"></animateTransform>
                                </circle>
                                <circle cx="0" cy="0" r="35.714285714285715" fill="none" stroke="#fff" stroke-width="2"
                                        stroke-dasharray="112.1997376282069 112.1997376282069"
                                        transform="rotate(337.276)">
                                    <animateTransform attributeName="transform" type="rotate" values="0 0 0;360 0 0"
                                                      times="0;1" dur="1.6s" calcMode="spline" keySplines="0.2 0 0.8 1"
                                                      begin="-0.6666666666666666"
                                                      repeatCount="indefinite"></animateTransform>
                                </circle>
                                <circle cx="0" cy="0" r="42.857142857142854" fill="none" stroke="#fff" stroke-width="2"
                                        stroke-dasharray="134.63968515384826 134.63968515384826"
                                        transform="rotate(359.62)">
                                    <animateTransform attributeName="transform" type="rotate" values="0 0 0;360 0 0"
                                                      times="0;1" dur="1.6s" calcMode="spline" keySplines="0.2 0 0.8 1"
                                                      begin="-0.8333333333333334"
                                                      repeatCount="indefinite"></animateTransform>
                                </circle>
                            </g>
                        </svg>
                    </div>

                </div>

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

<script>

    function resetPass() {
        if ($('#resetPass').val() == '') {
            $('#error_resetPass').show();
            return $('#error_resetPass').html('Введите пароль');
        }
        if ($('#resetPass').val().length < 5) {
            $('#error_resetPass').show();
            return $('#error_resetPass').html('Пароль от 5 символов');
        }
        if ($('#resetPass').val() != $('#resetPassRepeat').val()) {
            $('#error_resetPass').show();
            return $('#error_resetPass').html('Пароли не совпадают');
        }
        $.ajax({
            type: 'POST',
            url: '/user/resetPass',
            beforeSend: function () {
                $('#error_resetPass').hide();
                $('#succes_resetPass').hide();
            },
            data: {
                _token: _token,
                newPass: $('#resetPass').val()
            },
            success: function (obj) {
                if ('success' in obj) {
                    $("#succes_resetPass").show();
                } else {
                    $('#error_resetPass').show();
                    return $('#error_resetPass').html(obj.error.text);
                }
            }
        });

    }
</script>
<script type="text/javascript">
    const _token = $("input[name='_token']").val();
    function bet(type) {

        if ($('#userBalance').html() < $('#BetSize').val()) {
            $('#error_bet').html('Недостаточно средств');
            return $('#error_bet').css('display', '');
        }
        if ($('#BetPercent').val() > 85 || $('#BetPercent').val() < 1) {
            $('#error_bet').html('% Шанс от 1 до 85');
            return $('#error_bet').css('display', '');
        }
        $.ajax({
            type: 'POST',
            url: '/bet',
            beforeSend: function () {
                $('#checkBet').css('display', 'none');
                $('#error_bet').css('display', 'none')
                $('#succes_bet').css('display', 'none')
                $('#betLoad').css('display', '');
                $('#buttonMax').css('pointer-events', 'none');
                $('#buttonMin').css('pointer-events', 'none');
            },
            data: {
                _token: _token,
                type: type,
                hash: $.trim($('#hashBet').html()),
                betSize: $('#BetSize').val(),
                betPercent: $('#BetPercent').val(),
            },
            success: function (obj) {
                $('#buttonMax').css('pointer-events', '');
                $('#buttonMin').css('pointer-events', '');
                $('#betLoad').css('display', 'none');
                if ('success' in obj) {
                    $('#checkBet').css('display', '');

                    $('#checkBet').attr('href', 'game/?id=' + obj.success.check_bet);

                    if (obj.success.type == 'win') {
                        $('#succes_bet').css('display', '');
                        $("#succes_bet").html("Выиграли <b>" + obj.success.profit + " </b> N");
                    }
                    if (obj.success.type == 'lose') {

                        $('#error_bet').css('display', '');
                        $("#error_bet").html("Выпало " + obj.success.number);
                    }
                    $("#hashBet").html(obj.success.hash);
                    sss();
                    $('#userBalance').attr('myBalance', obj.success.new_balance);
                    updateBalance(obj.success.balance, obj.success.new_balance);
                }
                if ('error' in obj) {
                    $('#error_bet').html(obj.error.text);
                    return $('#error_bet').css('display', '');
                }
                if ('new' in obj) {
                    $("#hashBet").html(obj.new.hash);
                    sss();
                    $('#error_bet').html(obj.new.text);
                    $('#error_bet').css('display', '');

                }

            }
        });

    }
</script>
<script>
    function showWithdrawHistory(start) {

        $.ajax({
            type: 'POST',
            url: 'action.php',
            beforeSend: function () {
                $("#withdrawHistoryLoad").show();
            },
            data: {
                type: "withdrawHistory",
                sid: Cookies.get('sid'),
                start: start
            },
            success: function (data) {
                if (data == 'null') {
                    $("#withdrawHistoryLoad").hide();
                    return $("#sh").hide();
                }
                var obj = jQuery.parseJSON(data);
                if ('success' in obj) {
                    $("#withdrawHistoryLoad").hide();
                    var tt = $('#withdrawT').html();
                    $('#withdrawT').html(tt + obj.success.add);
                    $('#sh').html(obj.success.next);
                }
            }
        });

    }

    function removeWithdraw(id) {
        $.ajax({
            type: 'POST',
            url: '/user/removeWithdraw',
            data: {
                _token: _token,
                id: id
            },
            success: function (obj) {
                if ('success' in obj) {
                    $('#' + id + '_his').hide();
                    updateBalance(obj.success.balance, obj.success.new_balance);
                }
            }
        });
    }
</script>

<script>
    function withdraw() {
        if ($('#WithdrawSize').val() == '' || $('#walletNumber').val() == '' || $('#hide_search').val() == '') {
            $('#error_withdraw').show();
            return $('#error_withdraw').html('Заполните все поля');
        }

        if ($('#WithdrawSize').val() < 200) {
            $('#error_withdraw').show();
            return $('#error_withdraw').html('Минимальная сумма вывода - 200N');
        }
        $.ajax({
            type: 'POST',
            url: '/user/withdraw',
            beforeSend: function () {
                $('#withdrawB').html('');
                $('#error_withdraw').hide();
                $('#succes_withdraw').hide();
                $('#loader').css('display', '');
            },
            data: {
                _token: _token,
                system: $('#hide_search').val(),
                size: $('#WithdrawSize').val(),
                wallet: $('#walletNumber').val()
            },
            success: function (obj) {
                $('#withdrawB').html('Выплата');

                $('#loader').css('display', 'none');
                if ('success' in obj) {
                    $('#emptyHistory').hide();
                    $('#succes_withdraw').show();
                    var tt = $('#withdrawT').html();
                    $('#withdrawT').html(obj.success.add_bd + tt);
                    updateBalance(obj.success.balance, obj.success.new_balance);
                }

                if ('error' in obj) {
                    $('#error_withdraw').show();
                    return $('#error_withdraw').html(obj.error.text);
                }

            }
        });
    }

    function withdrawSelect() {
        $('#walletNumber').val('');
        var e = $('#hide_search').val();
        if (e >= 4 && e <= 8) {
            $('#nameWithdraw').html('Номер телефона:');
            $('#walletNumber').attr('placeholder', '');
        }
        if (e >= 1 && e <= 3) {

            if (e == 2) {
                $('#walletNumber').attr('placeholder', 'P1000000');
            }
            if (e == 1) {
                $('#walletNumber').attr('placeholder', '410011499718000');
            }
            if (e == 3) {
                $('#walletNumber').attr('placeholder', 'R123456789000');
            }
            $('#nameWithdraw').html('Номер кошелька:');
        }
        if (e >= 9) {
            $('#nameWithdraw').html('Номер карты:');
            $('#cardLL').show();
            if (e == 10) {
                $('#walletNumber').attr('placeholder', '512107XXXX785577');
            } else {
                $('#walletNumber').attr('placeholder', '412107XXXX785577');
            }
        }
    }

</script>
<script>
    function updateProfit() {
        $('#BetProfit').html(((100 / $('#BetPercent').val()) * $('#BetSize').val()).toFixed(2));
        $('#MinRange').html(Math.floor(($('#BetPercent').val() / 100) * 999999));
        $('#MaxRange').html(999999 - Math.floor(($('#BetPercent').val() / 100) * 999999));
    }

    function sss() {
        $('#hashBet').fadeOut('slow', function () {
            $('#hashBet').fadeIn('slow', function () {

            });
        });
    }

    $('#BetPercent').keyup(function () {
        $('#BetProfit').html(((100 / $('#BetPercent').val()) * $('#BetSize').val()).toFixed(2));
        $('#MinRange').html(Math.floor(($('#BetPercent').val() / 100) * 999999));
        $('#MaxRange').html(999999 - Math.floor(($('#BetPercent').val() / 100) * 999999));
    });
    $('#BetSize').keyup(function () {
        $('#MinRange').html(Math.floor(($('#BetPercent').val() / 100) * 999999));
        $('#MaxRange').html(999999 - Math.floor(($('#BetPercent').val() / 100) * 999999));
        $('#BetProfit').html(((100 / $('#BetPercent').val()) * $('#BetSize').val()).toFixed(2));
    });
</script>

<script>
    function updateBalance(start, end) {

        var el = document.getElementById('userBalance');

        od = new Odometer({
            el: el,
            value: start
        });

        od.update(end);
    }
</script>

<script>
    function validateWithdrawSize(inp) {
        inp.value = inp.value.replace(/[,]/g, '.')
            .replace(/[^\d,.]*/g, '')
            .replace(/([,.])[,.]+/g, '$1')
            .replace(/^[^\d]*(\d+([.,]\d{0,2})?).*$/g, '$1');
    }
</script>
<script>
    new ClipboardJS('.btn-clipboard');
</script>
</body>
</html>
