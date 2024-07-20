<!DOCTYPE html>
<html>
<head>
    <title>独播库</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="keywords" content="独播库,线上看,免费在线观看,电影,电视剧,动漫,视频网站,高清视频,Series,Movie,TV Shows,Online Free Watch">
    <meta name="description" content="独播库,线上看,免费在线观看,电影,电视剧,动漫,视频网站,高清视频,Series,Movie,TV Shows,Online Free Watch">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" href="https://www.duboku.tv/template/mytheme/statics/image/20200420/92ef7bc2b.ico"
        type="image/x-icon">
    <link rel="stylesheet" href="/static/mytheme-font.css" type="text/css">
    <link rel="stylesheet" href="/static/mytheme-ui.css" type="text/css">
    <link rel="stylesheet" href="/static/mytheme-site.css" type="text/css">
    <link rel="stylesheet" href="/static/mytheme-color.css" type="text/css" name="default">
    <link rel="stylesheet" href="/static/mytheme-color.css" type="text/css" name="skin" disabled="">
    <link rel="stylesheet" href="/static/mytheme-color1.css" type="text/css" name="skin" disabled="">
    <link rel="stylesheet" href="/static/mytheme-color2.css" type="text/css" name="skin" disabled="">
    <link rel="stylesheet" href="/static/mytheme-color3.css" type="text/css" name="skin" disabled="">
 
    <script type="text/javascript" src="/static/jquery.min.js"></script>
    <script type="text/javascript" src="/static/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="/static/mytheme-site.js"></script>
    <script type="text/javascript" src="/static/mytheme-ui.js"></script>
    <script type="text/javascript" src="/static/mytheme-cms.js"></script>
    <script type="text/javascript" src="/static/home.js"></script>
    <style type="text/css">
        body {
            font-family: "Microsoft YaHei", "微软雅黑", "STHeiti", "WenQuanYi Micro Hei", SimSun, sans-serif;
        }

        .myui-header__top {
            position: relative;
            margin-bottom: 30px;
        }

        body.active .myui-header__top {
            margin-bottom: 0;
        }

        [class*=col-],
        .myui-content__list li,
        .myui-vodlist__media.col li {
            padding: 10px
        }

        .btn {
            border-radius: 5px;
        }

        .myui-vodlist__thumb {
            border-radius: 5px;
            padding-top: 150%;
            background: url(/template/mytheme/statics/image/20200420/d31516e51.png) no-repeat;
        }

        .myui-vodlist__thumb.square {
            padding-top: 100%;
            background: url(/template/mytheme/statics/image/20200420/7e1e7843c.gif) no-repeat;
        }

        .myui-vodlist__thumb.wide {
            padding-top: 60%;
            background: url(/template/mytheme/statics/image/20200420/f41f57423.gif) no-repeat;
        }

        .myui-vodlist__thumb.actor {
            padding-top: 140%;
        }

        .flickity-prev-next-button.previous {
            left: 10px;
        }

        .flickity-prev-next-button.next {
            right: 10px;
        }

        .myui-sidebar {
            padding: 0 0 0 20px;
        }

        .myui-panel {
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .myui-panel-mb {
            margin-bottom: 20px;
        }

        .myui-player__item .fixed {
            width: 500px;
        }

        .myui-vodlist__text li a,
        .myui-vodlist__media li {
            padding: 10px 0;
        }

        .myui-screen__list {
            padding: 10px 10px 0;
        }

        .myui-screen__list li {
            margin-bottom: 10px;
            margin-right: 10px;
        }

        .myui-page {
            padding: 0 10px;
        }

        .myui-extra {
            right: 20px;
            bottom: 30px;
        }

        @media (min-width: 1200px) {
            .container {
                max-width: 1920px;
            }

            .container {
                padding-left: 120px;
                padding-right: 120px;
            }

            .container.min {
                width: 1200px;
                padding: 0;
            }
        }

        @media (max-width: 767px) {

            body,
            body.active {
                padding-bottom: 50px;
            }

            [class*=col-],
            .myui-panel,
            .myui-content__list li {
                padding: 5px
            }

            .flickity-prev-next-button.previous {
                left: 5px;
            }

            .flickity-prev-next-button.next {
                right: 5px;
            }

            .myui-vodlist__text li a,
            .myui-vodlist__media li {
                padding: 10px 0;
            }

            .myui-screen__list {
                padding: 10px 5px 0;
            }

            .myui-screen__list li {
                margin-bottom: 5px;
                margin-right: 5px;
            }

            .myui-extra {
                right: 20px;
                bottom: 80px;
            }

            .myui-page {
                padding: 0 5px;
            }
        }

        .myui-topbg {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            width: 100%;
        }
    </style>

</head>

<body class="active">
    @include('layout.nav')
    @yield('content')
    @include("layout.footer")
    <script type="text/javascript">
        MyTheme.Other.Skin();
    </script>
</body>

</html>
