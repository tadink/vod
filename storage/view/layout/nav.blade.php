<header class="myui-header__top clearfix" id="header-top">
    <div class="container">
        <div class="row">
            <div class="myui-header_bd clearfix">
                <div class="myui-header__logo">
                    <a class="logo" href="/">
                        <img class="img-responsive hidden-xs" src="/static/logo.png">
                        <img class="img-responsive visible-xs" src="/static/logo_min.png">
                    </a>
                </div>
                <ul class="myui-header__menu nav-menu">
                    <li class=" @if(empty($topType)) active @endif hidden-sm hidden-xs"><a href="/">首页</a></li>
                    @foreach ($types as $type)
                        <li class="@if(!empty($topType)&&$topType->id==$type->id) active @endif hidden-sm hidden-xs"><a href="/typevod/{{ $type->id }}">{{ $type->name }}</a></li>
                    @endforeach
                    <li class="dropdown-hover visible-sm visible-xs">
                        <a href="javascript:;">频道 <i class="fa fa-angle-down"></i></a>
                        <div class="dropdown-box bottom fadeInDown clearfix">
                            <ul class="item nav-list clearfix">
                                <li class="col-lg-5 col-md-5 col-sm-5 col-xs-3"><a
                                        class="btn btn-sm btn-block @if(!empty($topType)) btn-default @else btn-warm @endif " href="/">首页</a>
                                </li>
                                @foreach ($types as $type)
                                    <li class="col-lg-5 col-md-5 col-sm-5 col-xs-3"><a
                                            class="btn btn-sm btn-block @if(!empty($topType)&&$topType->id==$type->id) btn-warm @else btn-default @endif "
                                            href="/typevod/{{ $type->id }}">{{ $type->name }}</a></li>
                                @endforeach

                            </ul>
                        </div>
                    </li>
                </ul>
                <script type="text/javascript" src="/static/jquery.autocomplete.js"></script>
                <div class="myui-header__search search-box">
                    <form id="search" name="search" method="get"
                        action="https://www.duboku.tv/vodsearch/-------------.html" onsubmit="return qrsearch();">
                        <input type="text" id="wd" name="wd" class="search_wd form-control ac_input"
                            value="" placeholder="" autocomplete="off" style="">
                        <button class="submit search_submit" id="searchbutton" type="submit" name="submit"><i
                                class="fa fa-search"></i></button>
                    </form>
                    <a class="search-close visible-xs" href="javascript:;"><i class="fa fa-close"></i></a>
                </div>
                <ul class="myui-header__user">
                    <li class="visible-xs">
                        <a class="open-search" href="javascript:;"><i class="fa fa-search"></i></a>
                    </li>
                    <li class="dropdown-hover">
                        <a href="javascript:;" title="播放记录"> <i class="fa fa-clock-o"></i></a>
                        <div class="dropdown-box fadeInDown">
                            <div class="item clearfix">
                                <p class="text-muted">
                                    <a class="text-red pull-right" href="javascript:;"
                                        onclick="MyTheme.Cookie.Del('history','您确定要清除记录吗？');">[清空]</a>
                                    播放记录
                                </p>
                                <div class="history-list clearfix">
                                    <script type="text/javascript">
                                        var history_get = MyTheme.Cookie.Get("history");
                                        if (history_get) {
                                            var json = eval("(" + history_get + ")");
                                            for (i = 0; i < json.length; i++) {
                                                document.write("<p><a class='text-333' href='" + json[i].link + "' title='" + json[i].name +
                                                    "'><span class='pull-right text-red'>" + json[i].part + "</span>" + json[i].name + "</a></p>");
                                            }
                                        } else {
                                            document.write("<p style='padding: 80px 0; text-align: center'>您还没有看过影片哦</p>");
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li><a href="javascript:;" class="btnskin" title="切换皮肤"><i class="fa fa-windows"></i></a>
                    </li>
                    <li>
                        <a href="javascript:;" onclick="Myui.User.Login();"><i class="fa fa-user"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>