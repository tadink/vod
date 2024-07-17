<!DOCTYPE html>
<!-- saved from url=(0036)https://www.duboku.tv/vodtype/2.html -->
<html>

<head>
    <title>电视剧 - 独播库</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="keywords" content="电视剧,最新电视剧,好看的电视剧,热播电视剧,电视剧线上看">
    <meta name="description" content="最新陆剧、美剧、韩剧、港台剧线上看。">
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
    <script>
        var maccms = {
            "path": "",
            "mid": "1",
            "url": "www.duboku.tv",
            "wapurl": "www.duboku.tv",
            "mob_status": "0"
        };
        var myui = {
            "tpl": "/static/",
            "shortapi": "",
            "thunderurl": "",
            "language": "0"
        };
    </script>
    <script type="text/javascript" src="/static/jquery.min.js"></script>
    <link rel="stylesheet" href="/static/layer.css" id="layuicss-layer">
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
            background: url(/static/d31516e51.png) no-repeat;
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

<body>
    @include('nav')
    <div class="container">
        <div class="row">
            <div class="myui-panel active myui-panel-bg2 clearfix">
                <div class="myui-panel-box clearfix">
                    <div class="myui-panel_hd">
                        <div class="myui-panel__head active bottom-line clearfix">
                            <a class="slideDown-btn more pull-right" href="javascript:;">收起 <i class="fa fa-angle-up"></i></a>
                            <h3 class="title"> {{$currentType->name}} </h3>
                        </div>
                    </div>
                    <div class="myui-panel_bd">
                        <div class="slideDown-box">
                            @if (!empty($currentType->children))
                                <ul class="myui-screen__list nav-slide clearfix" data-align="left">
                                    <li>
                                        <a class="text-muted btn">类型</a>
                                    </li>
                                    <li><a class="btn  href="/vodtype/{{$currentType->id}}">全部</a></li>
                                    @foreach ($currentType->children as $child)
                                        <li><a class="btn"
                                                href="/vodtype/{{$child->id}}">{{ $child->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif


                            @if (!empty($filter['classes']))
                                <ul class="myui-screen__list nav-slide clearfix" data-align="left">
                                    <li>
                                        <a class="btn text-muted">剧情</a>
                                    </li>
                                    <li><a class="btn  @if(empty($queryVars['class'])) btn-warm @endif" href="{{makeUrl(['class'=>null])}}">全部</a></li>
                                    @foreach ($filter['classes'] as $class)
                                        <li><a class="btn @if(!empty($queryVars['class'])&&$queryVars['class']==$class) btn-warm @endif"
                                                href="{{makeUrl(['class'=>$class])}}">{{ $class }}</a>
                                        </li>
                                    @endforeach

                                </ul>
                            @endif
                            @if (!empty($filter['areas']))
                                <ul class="myui-screen__list nav-slide clearfix" data-align="left">
                                    <li>
                                        <a class="btn text-muted">地区</a>
                                    </li>
                                    <li><a class="btn @if(empty($queryVars['area'])) btn-warm @endif"
                                            href="{{makeUrl(['area'=>null])}}">全部</a></li>
                                    @foreach ($filter['areas'] as $area)
                                        <li><a class="btn @if(!empty($queryVars['area'])&&$queryVars['area']==$area) btn-warm @endif"
                                                href="{{makeUrl(['area'=>$area])}}">{{ $area }}</a>
                                        </li>
                                    @endforeach

                                </ul>
                            @endif
                            @if (!empty($filter['years']))
                                <ul class="myui-screen__list nav-slide clearfix" data-align="left">
                                    <li>
                                        <a class="btn text-muted">年份</a>
                                    </li>
                                    <li><a class="btn @if(empty($queryVars['year'])) btn-warm @endif"
                                            href="{{makeUrl(['year'=>null])}}">全部</a></li>
                                    @foreach ($filter['years'] as $year)
                                        <li><a class="btn @if(!empty($queryVars['year'])&&$queryVars['year']==$year) btn-warm @endif"
                                                href="{{makeUrl(['year'=>$year])}}">{{ $year }}</a>
                                        </li>
                                    @endforeach

                                </ul>
                            @endif
                            @if (!empty($filter['languages']))
                                <ul class="myui-screen__list nav-slide clearfix" data-align="left">
                                    <li>
                                        <a class="btn text-muted">语言</a>
                                    </li>
                                    <li><a class="btn @if(empty($queryVars['language'])) btn-warm @endif"
                                            href="{{makeUrl(['language'=>null])}}">全部</a></li>
                                    @foreach ($filter['languages'] as $language)
                                        <li><a class="btn @if(!empty($queryVars['language'])&&$queryVars['language']==$language) btn-warm @endif"
                                                href="{{makeUrl(['language'=>$language])}}">{{ $language }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                            @if (!empty($filter['letters']))
                                <ul class="myui-screen__list nav-slide clearfix" data-align="left">
                                    <li>
                                        <a class="btn text-muted">字母</a>
                                    </li>
                                    <li><a class="btn @if(empty($queryVars['letter'])) btn-warm @endif"
                                            href="{{makeUrl(['letter'=>null])}}">全部</a></li>
                                    @foreach ($filter['letters'] as $letter)
                                        <li><a class="btn  @if(!empty($queryVars['letter'])&&$queryVars['letter']==$letter) btn-warm @endif"
                                                href="{{makeUrl(['letter'=>$letter])}}">{{ $letter }}</a>
                                        </li>
                                    @endforeach

                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="myui-panel myui-panel-bg clearfix">
                <div class="myui-panel-box clearfix">
                    <div class="myui-panel_bd">
                        <ul class="myui-vodlist clearfix">

                            @foreach ($paginate->items() as $vod)
                                <li class="col-lg-8 col-md-6 col-sm-4 col-xs-3">
                                    <div class="myui-vodlist__box">
                                        <a class="myui-vodlist__thumb lazyload" href="/vod_detail/{{ $vod->id }}"
                                            title="{{ $vod->name }}" data-original="{{ $vod->pic }}">
                                            <span class="play hidden-xs"></span>
                                            <span class="pic-tag pic-tag-top">
                                                <span class="tag"
                                                    style="background-color: #858484;">{{ $vod->score }}分</span>
                                            </span>
                                            <span class="pic-text text-right">{{ $vod->remark }}</span> </a>
                                        <div class="myui-vodlist__detail">
                                            <h4 class="title text-overflow"><a href="/vod_detail/{{ $vod->id }}"
                                                    title="{{ $vod->name }}">{{ $vod->name }}</a></h4>
                                            <p class="text text-overflow text-muted hidden-xs">
                                                {{ $vod->actors->implode('name', ',') }}</p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            @if ($paginate->lastPage() >= $paginate->currentPage())
                @php
                    $start = 1;
                    $end = 5;
                    if ($paginate->currentPage() < 3) {
                        $end = min($end, $paginate->lastPage());
                    } elseif ($paginate->currentPage() > $paginate->lastPage() - 3) {
                        $start = max($paginate->lastPage() - 4,1);
                        $end = $paginate->lastPage();
                    } else {
                        $start = $paginate->currentPage() - 2;
                        $end = $paginate->currentPage() + 2;
                    }
                @endphp
                <ul class="myui-page text-center clearfix">
                    <li><a class="btn btn-default" href="{{ $paginate->url(1) }}">首页</a></li>
                    <li><a class="btn btn-default" href="{{ $paginate->previousPageUrl() }}">上一页</a></li>
                    @for ($i = $start; $i <= $end; $i++)
                        <li class="hidden-xs"><a
                                class="btn  {{ $i == $paginate->currentPage() ? 'btn-warm' : 'btn-default' }}"
                                href="{{ $paginate->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor

                    <li class="visible-xs"><a
                            class="btn btn-warm">{{ $paginate->currentPage() }}/{{ $paginate->lastPage() }}</a></li>
                    <li><a class="btn btn-default" href="{{ $paginate->nextPageUrl() }}">下一页</a></li>
                    <li><a class="btn btn-default" href="{{ $paginate->url($paginate->lastPage()) }}">尾页</a></li>
                </ul>
            @endif


        </div>
    </div>
    <div class="myui-foot clearfix">
        <div class="container min">
            <div class="row">
                <div class="col-pd text-center">
                    <p>联系邮箱dubokucom#gmail.com(#=@）</p>
                    <p class="hidden-xs">
                        <a target="_blank" href="https://www.duboku.tv/map.html">网站地图</a><span
                            class="split-line"></span>
                        <a target="_blank" href="https://www.duboku.tv/rss.xml">RSS订阅</a><span
                            class="split-line"></span>
                        <a target="_blank" href="https://www.duboku.tv/rss/baidu.xml">百度蜘蛛</a><span
                            class="split-line"></span>
                        <a target="_blank" href="https://www.duboku.tv/rss/google.xml">谷歌地图</a><span
                            class="split-line"></span>
                        <a target="_blank" href="https://www.duboku.tv/rss/bing.xml">必应地图</a><span
                            class="split-line"></span>
                        <a target="_blank" href="https://www.duboku.tv/rss/so.xml">360地图</a><span
                            class="split-line"></span>
                        <a target="_blank" href="https://www.duboku.tv/rss/sogou.xml">搜狗地图</a>
                    </p>
                    <p class="margin-0">
                        ©独播库 </p>
                    <div class="tongji"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="myui-msg__form ajax_login"
        style="display: none; width: 290px; padding: 50px 30px 20px; margin: 0; box-shadow: none;">
        <div class="myui-panel clearfix">
            <div class="myui-panel-box clearfix">
                <div class="myui-panel_bd">
                    <div class="myui-msg__head text-center">
                        <p>登录账号</p>
                    </div>
                    <form class="mac_login_form">
                        <p>
                            <input type="text" class="form-control" name="user_name" placeholder="手机/登录账号">
                        </p>
                        <p>
                            <input type="password" class="form-control" name="user_pwd" placeholder="登录密码">
                        </p>
                        <p>
                            <img class="mac_verify_img pull-right" src="" height="35">
                            <input type="text" class="form-control" name="verify" placeholder="验证码"
                                style="display: inline-block; width: 100px;">
                        </p>
                        <p>
                            <a href="javascript:;" class="btn btn-block btn-primary login_form_submit">登录</a>
                        </p>
                        <p>
                            <a class="pull-right" href="https://www.duboku.tv/user/reg.html">注册</a>
                            <a href="https://www.duboku.tv/user/findpass.html">忘记密码</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        MyTheme.Other.Skin();
    </script>
</body>

</html>
