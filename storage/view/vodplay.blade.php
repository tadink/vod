@extends('layout.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-wide-75 col-md-wide-7 col-xs-1 padding-0">
                <div class="myui-panel myui-panel-bg clearfix">
                    <div class="myui-panel-box clearfix">
                        <div class="col-pd">
                            <div class="myui-player__item clearfix" style="background-color: #1f1f1f;">
                                <div class="myui-player__box">
                                    <div id="player" class="clearfix"> </div>
                                    <script type="text/javascript" src="/js/hls.js?t=a20240718"></script>
                                    <script type="text/javascript" src="/js/DPlayer.min.js?t=20240718"></script>
                                    <script>
                                        const player = new DPlayer({
                                            container: document.getElementById('player'),
                                            video: {
                                                url: '{{ $currentUrl->url }}',
                                            },
                                        });
                                    </script>
                                </div>
                                <ul class="myui-player__operate" style="background-color: #1b1a25;">
                                    <li>
                                        <a href="javascript:;" onclick="Myui.User.Login();"><i class="fa fa-star"></i>
                                            收藏</a>
                                    </li>
                                    <li>
                                        <a
                                            href="/gbook.html?id=4670&name=【长相思 第二季】不能观看请检查修复，页面地址https://u.duboku.io/vodplay/4670-1-1.html"><i
                                                class="fa fa-close"></i> 报错</a>
                                    </li>
                                    <li>
                                        <a href="javascript:;" onclick="window.location.reload()"><i
                                                class="fa fa-spinner"></i> 刷新</a>
                                    </li>
                                    <li>
                                        <a class="digg_link" data-id="4670" data-mid="1" data-type="up"
                                            href="javascript:;">
                                            <i class="fa fa-thumbs-up"></i>
                                            <span class="digg_num">8744</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="digg_link" data-id="4670" data-mid="1" data-type="down"
                                            href="javascript:;">
                                            <i class="fa fa-thumbs-down"></i>
                                            <span class="digg_num">639</span>
                                        </a>
                                    </li>
                                    <li class="playshare dropdown-hover">
                                        <a href="javascript:;"><i class="fa fa-share font14"></i> 分享</a>
                                        <div class="dropdown-box bottom fadeInDown clearfix">
                                            <div class="item text-center" style="width: 260px;">
                                                <div class="col-pd" class="">
                                                    <p>复制下方内容粘贴给好友</p>
                                                    <p>
                                                        <textarea class="form-control content" rows="4">我正在观看《{{ $vod->name }}》，地址：/voddetail/{{ $vod->id }}</textarea>
                                                    </p>
                                                    <a class="btn btn-xs btn-primary myui-copy-html"
                                                        href="javascript:;">复制到剪贴板</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li><a class="@if (empty($previousUrl)) disabled @endif"
                                            href="@if (!empty($previousUrl)) /vodplay/{{ $vod->id }}-{{ $previousUrl->id }} @endif"><i
                                                class="fa fa-caret-up"></i> 上集</a></li>
                                    <li><a class="@if (empty($nextUrl)) disabled @endif"
                                            href="@if (!empty($nextUrl)) /vodplay/{{ $vod->id }}-{{ $nextUrl->id }} @endif"><i
                                                class="fa fa-caret-down"></i> 下集</a></li>

                                </ul>
                            </div>

                            <div class="myui-player__data clearfix">
                                <h2 class="title">
                                    <a href="/voddetail/{{ $vod->id }}">{{ $vod->name }}</a>
                                    <small class="text-muted">{{ $currentUrl->name }}</small>
                                </h2>
                                <p class="text-muted margin-0">
                                    <span class="text-red">{{ $vod->score }}分</span> / <span
                                        class="text">{{ $vod->remark }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="myui-panel myui-panel-bg clearfix">
                    <div class="myui-panel-box clearfix">
                        <div class="myui-panel_hd">
                            <div class="myui-panel__head bottom-line clearfix">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#playlist1" data-toggle="tab">列表B</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-content myui-panel_bd">
                            <div id="playlist1" class="tab-pane fade in active clearfix">
                                <ul class="myui-content__list scrollbar sort-list clearfix"
                                    style="max-height: 300px; overflow: auto;">
                                    @foreach ($vod->play_urls as $playUrl)
                                        <li class="col-lg-10 col-md-8 col-sm-6 col-xs-4"><a
                                                class="btn @if ($currentUrl->id == $playUrl->id) btn-warm @else btn-default @endif"
                                                href="/vodplay/{{ $vod->id }}-{{ $playUrl->id }}">{{ $playUrl->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="myui-panel myui-panel-bg clearfix">
                    <div class="myui-panel-box clearfix">
                        <div class="myui-panel_bd">
                            <div class="myui-panel_hd">
                                <div class="myui-panel__head clearfix">
                                    <h3 class="title">
                                        影片评论
                                    </h3>
                                </div>
                            </div>
                            <div class="myui-panel_bd">

                                <script>
                                    $(function() {
                                        MAC.Comment.Login = 1;
                                        MAC.Comment.Verify = 1;
                                        Myui.Comment.Show(1);
                                    });
                                </script>
                                <div class="myui_comment" data-id="4670" data-mid="1"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 评论-->

            </div>
            <div class="col-lg-wide-25 col-md-wide-3 col-xs-1 myui-sidebar hidden-sm hidden-xs">

                <div class="myui-panel myui-panel-bg clearfix">
                    <div class="myui-panel-box clearfix">

                        <div class="myui-panel_hd">
                            <div class="myui-panel__head clearfix">

                                <h3 class="title">
                                    {{ $currentType->name }}热播 </h3>
                                <a class="more text-muted" href="/typevod/{{ $currentType->id }}">更多 <i
                                        class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                        <div class="myui-panel_bd">
                            <ul class="myui-vodlist__media active col-pd clearfix">
                                @foreach ($highScoreList as $k => $item)
                                    @if ($k == 0)
                                        <li>
                                            <div class="thumb">
                                                <a class="myui-vodlist__thumb img-xs-70 lazyload"
                                                    href="/vod_detail/{{ $item->id }}" title="{{ $item->name }}"
                                                    data-original="{{ $item->pic }}"></a>
                                            </div>
                                            <div class="detail detail-side">
                                                <h4 class="title"><a href="/vod_detail/{{ $item->id }}"><i
                                                            class="fa fa-angle-right text-muted pull-right"></i>
                                                        {{ $item->name }}</a></h4>
                                                <p class="font-12"><span
                                                        class="text-muted">类型：</span>{{ $item->type->name }}，<span
                                                        class="text-muted">地区：</span>{{ $item->area }}</p>
                                                <p class="font-12 margin-0"><span
                                                        class="text-muted">主演：</span>{{ $item->actors->implode('name', ',') }}
                                                </p>
                                            </div>
                                        </li>
                                    @break
                                @endif
                            @endforeach
                        </ul>
                        <ul class="myui-vodlist__text col-pd clearfix">
                            @foreach ($highScoreList as $i => $item)
                                <li>
                                    <a href="/vod_detail/{{ $item->id }}" title="{{ $item->name }}">
                                        <span
                                            class="badge @if ($i == 0) badge-first @elseif($i == 1)badge-second @elseif($i == 2) badge-third @endif">{{ $i + 1 }}</span>{{ $item->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
 MyTheme.History.Add({
    link:document.URL,
    name:"{{ $vod->name }}",
    part:"{{ $currentUrl->name }}",
    pic:"{{ $vod->pic }}",
 });

</script>
@endsection
