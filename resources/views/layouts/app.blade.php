<!doctype html>
<html lang="en-US">
<head>
    <?php $setting = App\Models\Setting::where('id', 1)->first(); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('/frontend/images/logo.png') }}" rel="shortcut icon" type="image/x-icon">
    <meta name="description" content="{{ isset($data['blog']->sort_description) ? $data['blog']->sort_description : (isset($setting->meta_description) ? $setting->meta_description : '') }}">
    <meta name="keywords" content="{{ isset($data['blog']->keyword) ? $data['blog']->keyword : (isset($setting->keyword) ? $setting->keyword : '') }}">
    <title>{{ isset($data['blog']->name) ? $data['blog']->name : (isset($setting->site_name) ? $setting->site_name : '') }}</title>

    <?php
    if(isset($data['blog'])) { 
    if (isset($data['blog']->images->file_name) && $data['blog']->images->file_name != '' && !empty($data['blog']->images->file_name) && empty($blog->link)) {
        $blog_file = $data['blog']->images->file_name;
    } else {
        $file = App\Models\File::where( "id", $data['blog']->thumb_images)->first();
        $blog_file = $file->file_name;
    } 
    $ff = isset($blog_file) ? $blog_file : ''; ?>
    <meta property="fb:app_id" content="3916260501994016"/>
    <meta property="og:site_name" content="newsnmf"/>
    <meta property="og:title" content="{{ $data['blog']->name }}" />
    <meta property="og:description" content="{{ $data['blog']->sort_description }}" />
    <meta property="og:type" content="xxx:photo">
    <meta property="og:url" content="{{ asset('/').$data['category']->site_url.'/'.$data['blog']->site_url }}"/>
    <meta property="og:image" content="{{ asset('/file').'/'.$ff }}"/>
    <?php } ?>
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <meta name="robots" content="max-image-preview:large" />
    <link rel="dns-prefetch" href="//fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-9D3VCPPRWL"></script>
    <!-- <script> window._izq = window._izq || []; window._izq.push(["init"]); </script>
    <script src="https://cdn.izooto.com/scripts/08c8e31c0763314b6900fa47547eb2d5bcf2047c.js"></script>-->
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-9D3VCPPRWL');
    </script> 
    <script type="text/javascript">
        /* <![CDATA[ */
        window._wpemojiSettings = { "baseUrl": "https:\/\/s.w.org\/images\/core\/emoji\/14.0.0\/72x72\/", "ext": ".png", "svgUrl": "https:\/\/s.w.org\/images\/core\/emoji\/14.0.0\/svg\/", "svgExt": ".svg", "source": { "concatemoji": "https:\/\/demo.themebeez.com\/demos-2\/cream-magazine-free\/wp-includes\/js\/wp-emoji-release.min.js?ver=6.4.4" } };
        /*! This file is auto-generated */
        !function (i, n) { var o, s, e; function c(e) { try { var t = { supportTests: e, timestamp: (new Date).valueOf() }; sessionStorage.setItem(o, JSON.stringify(t)) } catch (e) { } } function p(e, t, n) { e.clearRect(0, 0, e.canvas.width, e.canvas.height), e.fillText(t, 0, 0); var t = new Uint32Array(e.getImageData(0, 0, e.canvas.width, e.canvas.height).data), r = (e.clearRect(0, 0, e.canvas.width, e.canvas.height), e.fillText(n, 0, 0), new Uint32Array(e.getImageData(0, 0, e.canvas.width, e.canvas.height).data)); return t.every(function (e, t) { return e === r[t] }) } function u(e, t, n) { switch (t) { case "flag": return n(e, "\ud83c\udff3\ufe0f\u200d\u26a7\ufe0f", "\ud83c\udff3\ufe0f\u200b\u26a7\ufe0f") ? !1 : !n(e, "\ud83c\uddfa\ud83c\uddf3", "\ud83c\uddfa\u200b\ud83c\uddf3") && !n(e, "\ud83c\udff4\udb40\udc67\udb40\udc62\udb40\udc65\udb40\udc6e\udb40\udc67\udb40\udc7f", "\ud83c\udff4\u200b\udb40\udc67\u200b\udb40\udc62\u200b\udb40\udc65\u200b\udb40\udc6e\u200b\udb40\udc67\u200b\udb40\udc7f"); case "emoji": return !n(e, "\ud83e\udef1\ud83c\udffb\u200d\ud83e\udef2\ud83c\udfff", "\ud83e\udef1\ud83c\udffb\u200b\ud83e\udef2\ud83c\udfff") }return !1 } function f(e, t, n) { var r = "undefined" != typeof WorkerGlobalScope && self instanceof WorkerGlobalScope ? new OffscreenCanvas(300, 150) : i.createElement("canvas"), a = r.getContext("2d", { willReadFrequently: !0 }), o = (a.textBaseline = "top", a.font = "600 32px Arial", {}); return e.forEach(function (e) { o[e] = t(a, e, n) }), o } function t(e) { var t = i.createElement("script"); t.src = e, t.defer = !0, i.head.appendChild(t) } "undefined" != typeof Promise && (o = "wpEmojiSettingsSupports", s = ["flag", "emoji"], n.supports = { everything: !0, everythingExceptFlag: !0 }, e = new Promise(function (e) { i.addEventListener("DOMContentLoaded", e, { once: !0 }) }), new Promise(function (t) { var n = function () { try { var e = JSON.parse(sessionStorage.getItem(o)); if ("object" == typeof e && "number" == typeof e.timestamp && (new Date).valueOf() < e.timestamp + 604800 && "object" == typeof e.supportTests) return e.supportTests } catch (e) { } return null }(); if (!n) { if ("undefined" != typeof Worker && "undefined" != typeof OffscreenCanvas && "undefined" != typeof URL && URL.createObjectURL && "undefined" != typeof Blob) try { var e = "postMessage(" + f.toString() + "(" + [JSON.stringify(s), u.toString(), p.toString()].join(",") + "));", r = new Blob([e], { type: "text/javascript" }), a = new Worker(URL.createObjectURL(r), { name: "wpTestEmojiSupports" }); return void (a.onmessage = function (e) { c(n = e.data), a.terminate(), t(n) }) } catch (e) { } c(n = f(s, u, p)) } t(n) }).then(function (e) { for (var t in e) n.supports[t] = e[t], n.supports.everything = n.supports.everything && n.supports[t], "flag" !== t && (n.supports.everythingExceptFlag = n.supports.everythingExceptFlag && n.supports[t]); n.supports.everythingExceptFlag = n.supports.everythingExceptFlag && !n.supports.flag, n.DOMReady = !1, n.readyCallback = function () { n.DOMReady = !0 } }).then(function () { return e }).then(function () { var e; n.supports.everything || (n.readyCallback(), (e = n.source || {}).concatemoji ? t(e.concatemoji) : e.wpemoji && e.twemoji && (t(e.twemoji), t(e.wpemoji))) })) }((window, document), window._wpemojiSettings);
        /* ]]> */
    </script>
    <style id="wp-emoji-styles-inline-css" type="text/css">
         img.wp-smiley,
        img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 0.07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }
    </style>

    <style>
        /* new header style*/
        .header-topstrip {
            padding: 8px 0;
        }

        .header-topstrip {
            background-color: #e2e2e2;
        }

        .header-topstrip ul.social-icons li a {
            font-size: 14px;
            width: 30px;
            height: 30px;
        }

        ul.topsocial-icons li {
            display: inline-block;
            margin-right: 8px;
        }

        .header-topstrip ul.topsocial-icons li a {
            font-size: 14px;
            width: 30px;
            height: 30px;
            padding-top: 4px;
            margin-right: 0;
            text-align: center;
            display: inline-block;
            border-radius: 50%;
            color: #fff;
        }

        .header-topstrip ul.topsocial-icons li.fb a {
            background: #4267b2;
        }

        .header-topstrip ul.topsocial-icons li.insta a {
            background: #8a33a4;
        }

        .header-topstrip ul.topsocial-icons li.tw a {
            background: #1da1f2;
        }

        .header-topstrip ul.topsocial-icons li.linken a {
            background: #0274b3;
        }

        .header-topstrip ul.topsocial-icons li.yt a {
            background: #ff0000;
        }

        .header-topstrip .contact-link {
            color: #fe1600;
            font-size: 15px;
        }

        .social-link-mobile,
        .mobile-topbanner,
        .mobile-inline-menu,
        .mobile-only {
            display: none;
        }

        .psticky {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 999;
            margin: 0 auto;
            max-width: 1170px;
            padding-left: 15px;
            padding-right: 15px;
        }

        @media (max-width: 992px) {

            .sm-d-none {
                display: none;
            }

            #myHeader{
                display: none;
            }
            

            .mobile-inline-menu {
                display: block;
            }

            .logo {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .cm-header-style-one {
                background-color: #f21500;
            }

            .social-link-mobile {
                display: block;
                text-align: right;
            }

            .mobile-topbanner {
                display: block;
            }

            ul.topsocial-icons {
                margin: 0;
                padding: 0;
            }

            ul.topsocial-icons li {
                display: inline-block;
                margin-right: 6px;
            }

            ul.topsocial-icons li:last-child {
                margin-right: 0px;
            }

            .social-link-mobile ul.topsocial-icons li a {
                font-size: 14px;
                width: 28px;
                height: 28px;
                margin-right: 0;
                text-align: center;
                display: inline-block;
                border-radius: 50%;
                color: #fff;
                border: 2px solid #fff;
                padding: 1px 0 0 0;
                transition: all 0.6s linear;
                padding-top: 1px;
            }

            .social-link-mobile ul.topsocial-icons li a:hover {
                border-color: #e2e2e2;
            }

            .social-link-mobile ul.topsocial-icons li.fb a {
                background: #4267b2;
            }

            .social-link-mobile ul.topsocial-icons li.insta a {
                background: #8a33a4;
            }

            .social-link-mobile ul.topsocial-icons li.tw a {
                background: #1da1f2;
            }

            .social-link-mobile ul.topsocial-icons li.linken a {
                background: #0274b3;
            }

            .social-link-mobile ul.topsocial-icons li.yt a {
                background: #ff0000;
            }

            .social-link-mobile .contact-link {
                color: #fff;
                font-size: 15px;
            }

            .mobile-inline-menu {
                background-color: #ffffff;
            }

            .mobile-inline-menu ul.mobile-inline-link {
                display: flex;
                align-items: center;
                flex-shrink: 0;
                padding: 0;
                margin: 0;
                list-style: none;
            }

            .mobile-inline-menu ul.mobile-inline-link>li:not(:last-child) {
                margin-right: 15px;
            }

            .mobile-inline-menu ul.mobile-inline-link>li>a {
                text-transform: uppercase;
                font-size: .875rem;
                font-weight: 700;
                color: #888888;
                display: flex;
                align-items: center;
                cursor: pointer;
                line-height: 1.5;
                padding: 4px;
            }

            .justify-content-sb {
                justify-content: space-between;
            }

            .mobile-inline-menu .menu-toggle .fa {
                font-size: 22px;
                margin-right: 5px;
            }

            .mobile-inline-menu .menu-toggle {
                color: #888888;
            }

            img.w-100 {
                width: 100%;
            }

            .main-navigation>.mobile>.menu-toggle {
                display: none !important;
            }

            .w-100 {
                width: 100%;
            }

            .mobile-only {
                display: block;
            }

            .primary-navigation.mobile ul {
                position: absolute !important;
                width: 100% !important;
                z-index: 999 !important;
            }

            .primary-navigation.mobile li a {
                border-bottom: none !important;
                color: #888888 !important;
            }

            .primary-navigation.mobile.dark ul>li.home-btn {
                background: #fff !important;
            }

            .primary-navigation.mobile.dark ul {
                background: #fff !important;
            }

            .logo-container {
                padding: 9px 0 !important;
            }

        }

        /* new header style*/
    </style>
    <link rel="stylesheet" id="wp-block-library-css" href="{{ asset('/new_frontend/style.min.css')}}" type="text/css" media="all" />
    <link rel="stylesheet" id="cream-magazine-fonts-css"
        href="https://fonts.googleapis.com/css2?family=Inter&#038;family=Poppins:ital,wght@0,600;1,600&#038;display=swap"
        type="text/css" media="all" />
    <link rel="stylesheet" id="fontAwesome-4-css"
        href="{{ asset('/new_frontend/fonts/fontAwesome/fontAwesome.min.css') }}"
        type="text/css" media="all" />
    <link rel="stylesheet" id="feather-icons-css"
        href="{{ asset('/new_frontend/fonts/feather/feather.min.css') }}"
        type="text/css" media="all" />
    <link rel="stylesheet" id="cream-magazine-main-css"
        href="{{ asset('/new_frontend/css/main.css') }}"
        type="text/css" media="all" />
    <script type="text/javascript"
        src="{{ asset('/new_frontend/js/jquery/jquery.min.js') }}"
        id="jquery-core-js"></script>
    <script type="text/javascript"
        src="{{ asset('/new_frontend/js/jquery/jquery-migrate.min.js')}}"
        id="jquery-migrate-js"></script>
        <link rel="stylesheet"
        href="{{ asset('/new_frontend/css/style.css') }}"
        type="text/css" media="all" />
    <style id="theia-sticky-sidebar-stylesheet-TSS">
        .theiaStickySidebar:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
</head>

<body data-rsssl="1"
    class="home page-template page-template-template-home page-template-template-home-php page page-id-362 wp-custom-logo wp-embed-responsive right-sidebar">
    <a class="skip-link screen-reader-text" href="#content">Skip to content</a>
    <div class="page-wrapper">
        <header class="general-header cm-header-style-one">
            <div class="header-topstrip">
                <div class="cm-container">
                    <div class="row">
                        <div class="cm-col-lg-4 cm-col-md-5 cm-col-12">
                            <div class="top-header-left">
                                <img src="{{ asset('/frontend/images/header-tagline.png') }}" alt="NMF News">
                            </div>
                        </div>
                        <div class="cm-col-lg-8 cm-col-md-7 cm-col-12 sm-d-none">
                            <div class="top-header-social-links d-flex align-items-center justify-content-end">
                                <ul class="topsocial-icons mr-2">
                                    <li class="fb">
                                        <a href="https://facebook.com/NMFNewsOriginal" target="_blank">
                                            <i class="fa fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li class="insta">
                                        <a href="https://instagram.com/nmfnewsofficial" target="_blank">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li class="tw">
                                        <a href="https://twitter.com/NMFNewsOfficial" target="_blank">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="linken">
                                        <a href="https://in.linkedin.com/company/khetanmediacreationpvtltd"
                                            target="_blank">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </li>
                                    <li class="yt">
                                        <a href="https://www.youtube.com/c/NMFNews/featured" target="_blank">
                                            <i class="fa fa-youtube-play"></i>
                                        </a>
                                    </li>


                                </ul>

                                <a href="https://newsnmf.com/contact" class="contact-link">विज्ञापन के लिए संपर्क करें</a>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cm-container">
                <div class="logo-container">
                    <div class="row align-items-center">
                        <div class="cm-col-lg-4 cm-col-12">
                            <div class="logo">
                                <h1 class="site-logo d-flex">
                                    <a href="{{ asset('/') }}"
                                        class="custom-logo-link" rel="home" aria-current="page"><img 
                                            src="{{ asset('/frontend/images/logo.png') }}"
                                            class="custom-logo" alt="NewsNmf" decoding="async"
                                            srcset="{{ asset('/frontend/images/logo.png') }}"
                                            sizes="(max-width: 343px) 100vw, 343px" /></a>
                                            <span class="sm-d-none"><img src="{{ asset('/frontend/images/logo-tagline.png') }}" class="ml-3" alt="NMF News"></span>
                                </h1>
                                <div class="social-link-mobile">
                                    <ul class="topsocial-icons mb-2">
                                        <li class="fb">
                                            <a href="https://facebook.com/NMFNewsOriginal" target="_blank">
                                                <i class="fa fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li class="insta">
                                            <a href="https://instagram.com/nmfnewsofficial" target="_blank">
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        </li>
                                        <li class="tw">
                                            <a href="https://twitter.com/NMFNewsOfficial" target="_blank">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="linken">
                                            <a href="https://in.linkedin.com/company/khetanmediacreationpvtltd"
                                                target="_blank">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                        </li>
                                        <li class="yt">
                                            <a href="https://www.youtube.com/c/NMFNews/featured" target="_blank">
                                                <i class="fa fa-youtube-play"></i>
                                            </a>
                                        </li>


                                    </ul>

                                    <a href="https://newsnmf.com/contact" class="contact-link">विज्ञापन के लिए संपर्क
                                        करें</a>

                                </div>
                            </div>
                        </div>
                        <div class="cm-col-lg-8 cm-col-12">
                            <div class="advertisement-area">
                                <div id="media_image-4" class="widget widget_media_image"><a
                                target="__blank"  href="https://www.youtube.com/channel/UCEWHoHLo89dkQJR_axIupEA"><img width="728" height="90"
                                            src="{{ asset('/banner/news.jpeg') }}"
                                            class="image wp-image-756  attachment-full size-full" alt
                                            style="max-width: 100%; height: auto;" decoding="async" fetchpriority="high"
                                            srcset=""
                                            sizes="(max-width: 728px) 100vw, 728px" /></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <nav class="main-navigation" id="myHeader">
                    <div id="" class="primary-navigation-mobile dark">
                        <ul  class>
                            <li class="home-btn"><a href="{{ asset('/') }}"><i
                                        class="fa fa-home" aria-hidden="true"></i></a></li>
                            <?php 
                            $menus = App\Models\Menu::whereHas('type', function ($query) {
                                $query->where('type', 'Header');
                            })
                            ->whereHas('category', function ($query) {
                                $query->where('category', 'User');
                            })->where('status', '1')
                            ->where('menu_id', '=', 0)->get()->toArray();
                            // $menus = App\Models\Menu::get()->where('menu_id', 0)->where('status', 1)->where('type_id', '1')->where('category_id', '2')->all();
                            ?>
                            @foreach($menus as $menu)
                            <?php 
                            $subMenus = App\Models\Menu::get()->where('menu_id', $menu['id'])->where('status', '1')->where('type_id', '1')->where('category_id', '2')->all(); 
                            ?>

                            <li
                                class="menu-item menu-item-type-custom menu-item-object-custom <?php if(count($subMenus) > 0){ echo "menu-item-has-children menu-item-369"; }  else { echo "current-menu-item current_page_item menu-item-home menu-item-400"; }?>">
                                <a href="<?php if(count($subMenus) > 0){ echo asset('/').$menu['menu_link']; } else { echo $menu['menu_link']; } ?>"
                                    aria-current="page" style="padding: 15px 6px;">{{ $menu['menu_name'] }}</a>
                                    <?php if(count($subMenus) > 0){ ?>
                                    <ul class="sub-menu">
                                        @foreach($subMenus as $subMenu)
                                        <li id="menu-item-394"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-394">
                                            <a href="{{ asset('/').$subMenu->menu_link }}">{{ $subMenu->menu_name }}</a></li>
                                        @endforeach
                                    </ul>
                                    <?php } ?>
                            </li>
                            @endforeach    
                            <li class="primarynav_search_icon" style="float: right;"><a class="search_box-mobile" href="javascript:;"><i class="fa fa-search" aria-hidden="true"></i></a></li>         
                        </ul>
                </nav>
                <div class="header-search-container-mobile" style="display: none;">
                  <div class="search-form-entry">
                    <form role="search" class="cm-search-form" method="get" action="{{ asset('/search')}}"><input type="search" name="search" placeholder="Search..." value=""><button type="submit" class="cm-submit-btn"><i class="fa fa-search"></i></button></form> </div>
                  </div>
                </div>
            </div>
        </header>
        <div class="mobile-inline-menu">
            <div class="d-flex py-1">
                <div class="cm-container d-flex justify-content-sb align-items-center">
                    <ul class="mobile-inline-link">
                    <li class="home-btn"><a href="{{ asset('/') }}"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                    <li class="home-btn"><a href="{{ asset('/news') }}">न्यूज</a></li>
                    <li class="home-btn"><a href="{{ asset('/election-2024') }}">चुनाव 2024</a></li>
                    <li class="home-btn"><a href="{{ asset('/dharma-gyan') }}">धर्म ज्ञान</a></li>
                    <!-- <li class="home-btn"><a href="{{ asset('/exclusive') }}">एक्सक्लूसिव </a></li> -->
                    <li class="home-btn"><a href="{{ asset('/program') }}">कार्यक्रम </a></li>
                    </ul>
                    <a href="#" class="menu-toggle full"><i class="fa fa-bars"></i></a>
                </div>
            </div>
        </div>
        <nav class="main-navigation mobile-only">
            <div id="main-navmbile" class="primary-navigation">
                <ul id="menu-main-menu2" class>
                <!-- <li class="home-btn"><a href="{{ asset('/') }}"><i -->
                                        <!-- class="fa fa-home" aria-hidden="true"></i></a></li> -->
                            <?php 
                            $menus = App\Models\Menu::whereHas('type', function ($query) {
                                $query->where('type', 'Header');
                            })
                            ->whereHas('category', function ($query) {
                                $query->where('category', 'User');
                            })->where('status', '1')
                            ->where('menu_id', '=', 0)->get()->toArray();
                            // $menus = App\Models\Menu::get()->where('menu_id', 0)->where('status', 1)->where('type_id', '1')->where('category_id', '2')->all();
                            ?>
                            @foreach($menus as $menu)
                            <?php 
                            $subMenus = App\Models\Menu::get()->where('menu_id', $menu['id'])->where('status', '1')->where('type_id', '1')->where('category_id', '2')->all(); 
                            ?>

                            <li
                                class="menu-item menu-item-type-custom menu-item-object-custom <?php if(count($subMenus) > 0){ echo "menu-item-has-children menu-item-369"; }  else { echo "current-menu-item current_page_item menu-item-home menu-item-400"; }?>">
                                <a href="<?php if(count($subMenus) > 0){ echo asset('/').$menu['menu_link']; } else { echo $menu['menu_link']; } ?>"
                                    aria-current="page">{{ $menu['menu_name'] }}</a>
                                    <?php if(count($subMenus) > 0){ ?>
                                    <ul class="sub-menu">
                                        @foreach($subMenus as $subMenu)
                                        <li id="menu-item-394"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-394">
                                            <a href="{{ asset('/').$subMenu->menu_link }}">{{ $subMenu->menu_name }}</a></li>
                                        @endforeach
                                    </ul>
                                    <?php } ?>
                            </li>
                            @endforeach 
                            <li>
                            <div class="header-search-container" style="display: none;">
                                <div class="search-form-entry">
                                    <form role="search" class="cm-search-form" method="get" action="{{ asset('/search')}}"><input type="search" name="search" placeholder="Search..." value=""><button type="submit" class="cm-submit-btn"><i class="fa fa-search"></i></button></form> </div>
                            </div>
                            </li>
                </ul>
            </div>
        </nav>
        <div class="mobile-topbanner"><a href="https://www.youtube.com/channel/UCEWHoHLo89dkQJR_axIupEA" target="__blank"><img src="{{ asset('/frontend/images/topbanner-mobile.jpg') }}" alt="" class="w-100"></a></div>
        <div id="content" class="site-content">
        @yield('content')
        </div>
        <footer class="footer">
            <div class="footer_inner">
                <div class="cm-container">
                    <div class="row footer-widget-container">
                        <div class="cm-col-lg-4 cm-col-12">
                            <div class="blocks">
                                <div id="cream-magazine-post-widget-3" class="widget widget_cream-magazine-post-widget">
                                    <div class="widget-title">
                                        <h2>लेटेस्ट न्यूज</h2>
                                    </div>
                                    <?php
                                    $latest_blog = App\Models\Blog::orderBy('id', 'DESC')->limit(3)->get();
                                    ?>
                                    <div class="cm_recent_posts_widget">
                                        @foreach($latest_blog as $blog)
                                        <?php
                                        $blog_file = App\Models\File::where( "id", isset($blog->image_ids)? $blog->image_ids : $blog->thumb_images)->first();
                                        $truncated = substr($blog->name, 0, 50) . '...';
                                        $ff = isset($blog_file->file_name) ? $blog_file->file_name : '';
                                        $cat = App\Models\Category::where('id',$blog->categories_ids)->first();
                                        ?>
                                        <div class="box">
                                            <div class="row">
                                                <div class="cm-col-lg-5 cm-col-md-5 cm-col-4">
                                                    <div class="post_thumb">
                                                        <a
                                                            href="{{ asset('/') }}{{isset($cat->site_url) ? $cat->site_url : '-'}}/<?php echo isset($blog->site_url) ? $blog->site_url : ''; ?>">
                                                            <figure class="imghover">
                                                                <img width="720" height="540"
                                                                    src="{{ asset('/file').'/'.$ff }}"
                                                                    class="attachment-cream-magazine-thumbnail-3 size-cream-magazine-thumbnail-3 wp-post-image"
                                                                    alt="{{ $blog->name }}"
                                                                    decoding="async" loading="lazy" />
                                                            </figure>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="cm-col-lg-7 cm-col-md-7 cm-col-8">
                                                    <div class="post_title">
                                                        <h2><a
                                                                href="{{ asset('/') }}{{isset($cat->site_url) ? $cat->site_url : '-' }}/<?php echo isset($blog->site_url) ? $blog->site_url : ''; ?>"><?php echo $blog->name; ?></a></h2>
                                                    </div>
                                                    <div class="cm-post-meta">
                                                        <ul class="post_meta">
                                                            <li class="">
                                                                <a
                                                                    href="{{ asset('/') }}{{isset($cat->site_url) ? $cat->site_url : '-' }}/<?php echo isset($blog->site_url) ? $blog->site_url : ''; ?>"><i class="fa fa-calendar" aria-hidden="true">&nbsp;&nbsp;<time
                                                                        class="entry-date published"
                                                                        datetime="{{ $blog->created_at }}">{{ $blog->created_at }}</time></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cm-col-lg-4 cm-col-12">
                            <div class="blocks">
                                <div id="cream-magazine-social-widget-3" class="widget social_widget_style_1">
                                    <div class="widget-title">
                                        <h2>Social</h2>
                                    </div>
                                    <div class="widget-contents">
                                        <ul>
                                            <li class="fb">
                                                <a href="https://{{ isset($setting->facebook) ? $setting->facebook : '' }}" target="_blank">
                                                    <i class="fa fa-facebook-f"></i><span>Like</span>
                                                </a>
                                            </li>
                                            <li class="insta">
                                                <a href="https://{{ isset($setting->instagram) ? $setting->instagram : '' }}" target="_blank">
                                                    <i class="fa fa-instagram"></i><span>Follow</span>
                                                </a>
                                            </li>
                                            <li class="tw">
                                                <a href="https://twitter.com/NMFNewsOfficial" target="_blank">
                                                    <i class="fa fa-twitter"></i><span>Follow</span>
                                                </a>
                                            </li>
                                            <li class="linken">
                                                <a href="https://in.linkedin.com/company/khetanmediacreationpvtltd" target="_blank">
                                                    <i class="fa fa-linkedin"></i><span>Connect</span>
                                                </a>
                                            </li>
                                            <li class="yt">
                                                <a href="https://{{ isset($setting->youtube) ? $setting->youtube : '' }}" target="_blank">
                                                    <i class="fa fa-youtube-play"></i><span>Follow</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cm-col-lg-4 cm-col-12">
                            <div class="blocks">
                                <div id="cream-magazine-post-widget-4" class="widget widget_cream-magazine-post-widget">
                                    <div class="widget-title">
                                        <h2>&nbsp;</h2>
                                    </div>
                                    <div class="cm_recent_posts_widget">
                                        <div class="box">
                                            <div class="row">
                                                <div class="cm-col-lg-12 cm-col-md-12 cm-col-12">
                                                    <div class="">
                                                        <img src="{{ asset('/banner/') }}/logo.png"/>
                                                        <p style="margin: 10px 10px 20px;">Khetan Media Creations is stepping towards its dream destination everyday. We invite you to have a glimpse of our beautiful world of creative creations that has been crafted after long hardworking days by our tremendous team.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="copyright_section">
                        <div class="row">
                            <div class="cm-col-lg-7 cm-col-md-6 cm-col-12">
                                <div class="copyrights">
                                    <p>
                                        <span class="copyright-text">© COPYRIGHT KMC PVT. LTD. ALL RIGHTS RESERVED.</span>
                                    </p>
                                </div>
                            </div>
                            <div class="cm-col-lg-5 cm-col-md-6 cm-col-12">
                                <div class="footer_nav">
                                    <ul id="menu-footer-menu" class="menu">
                                        <li id="menu-item-417"
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-417">
                                            <a href="{{ asset('/about') }}">About Us</a></li> 
                                        <li id="menu-item-417"
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-417">
                                            <a href="{{ asset('/privacy') }}">Privacy Policy</a></li> 
                                        <li id="menu-item-418"
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-418">
                                            <a href="{{ asset('/disclaimer') }}">Disclaimer</a></li> 
                                        <li id="menu-item-419"
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-419">
                                            <a href="{{ asset('/contact') }}">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <div class="backtoptop">
        <button id="toTop" class="btn btn-info">
            <i class="fa fa-angle-up" aria-hidden="true"></i>
        </button>
    </div>
    <script type="text/javascript" id="cream-magazine-bundle-js-extra">
        /* <![CDATA[ */
        var cream_magazine_script_obj = { "show_search_icon": "1", "show_news_ticker": "1", "show_banner_slider": "1", "show_to_top_btn": "1", "enable_sticky_sidebar": "1", "enable_sticky_menu_section": "" };
        /* ]]> */
    </script>
    <script type="text/javascript"
        src="{{ asset('/new_frontend/js/bundle.min.js') }}"
        id="cream-magazine-bundle-js"></script>
    <script defer
        src="https://static.cloudflareinsights.com/beacon.min.js/v55bfa2fee65d44688e90c00735ed189a1713218998793"
        integrity="sha512-FIKRFRxgD20moAo96hkZQy/5QojZDAbyx0mQ17jEGHCJc/vi0G2HXLtofwD7Q3NmivvP9at5EVgbRqOaOQb+Rg=="
        data-cf-beacon='{"rayId":"877e2b567a269fa5","r":1,"version":"2024.3.0","token":"e07ffd4cc02748408b326adb64b6cc16"}'
        crossorigin="anonymous"></script>
    <script>
        window.onscroll = function () { myFunction() };

        var header = document.getElementById("myHeader");
        var sticky = header.offsetTop;

        function myFunction() {
            if (window.pageYOffset > sticky) {
                header.classList.add("psticky");
            } else {
                header.classList.remove("psticky");
            }
        }
    </script>
    
</body>

</html>