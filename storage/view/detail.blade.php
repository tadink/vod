@extends('layout.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-wide-75 col-md-wide-7 col-xs-1 padding-0">
                <!-- 详细信息-->
                <div class="myui-panel myui-panel-bg clearfix">
                    <div class="myui-panel-box clearfix">
                        <div class="col-xs-1">
                            <span class="text-muted">当前位置：</span>
                            <a href="/">首页</a>
                            @if (!empty($currentType->parent))
                                <i class="fa fa-angle-right text-muted"></i>
                                <a href="/typevod/{{ $currentType->parent->id }}">{{ $currentType->parent->name }}</a>
                            @endif
                            <i class="fa fa-angle-right text-muted"></i>
                            <a href="/typevod/{{ $currentType->id }}">{{ $currentType->name }}</a>
                            <i class="fa fa-angle-right text-muted"></i>
                            <span class="text-muted">{{ $vod->name }}</span>
                        </div>
                        <div class="col-xs-1">
                            <div class="myui-content__thumb">
                                <a class="myui-vodlist__thumb picture"
                                    href="/vodplay/{{ $vod->id }}-{{ $vod->play_urls[0]->id }}"
                                    title="{{ $vod->name }}">
                                    <img class="lazyload" data-original="{{ $vod->pic }}" style="">
                                    <span class="play hidden-xs"></span>
                                </a>
                            </div>
                            <div class="myui-content__detail">

                                <h1 class="title">{{ $vod->name }}</h1>

                                <!-- 评分 -->
                                <div id="rating" class="score" data-mid="1" data-id="4670" data-score="5">
                                    <span class="left text-muted">评分：</span>
                                    <ul class="rating">
                                        <li title="很差" val="1"><i class="fa fa-star"></i></li>
                                        <li title="较差" val="2"><i class="fa fa-star"></i></li>
                                        <li title="还行" val="3"><i class="fa fa-star"></i></li>
                                        <li title="推荐" val="4"><i class="fa fa-star"></i></li>
                                        <li title="力荐" val="5"><i class="fa fa-star"></i></li>
                                    </ul>
                                    <span class="branch">{{ $vod->score }}</span>
                                    <span class="text-muted" id="ratewords">
                                        力荐 </span>
                                </div>
                                <p class="data">
                                    <span class="text-muted">分类：</span><a href="/typevod/{{ $vod->type_id }}">陆剧</a>
                                    <span class="split-line"></span>
                                    <span class="text-muted hidden-xs">地区：</span><a
                                        href="https://u.duboku.io/vodshow/13-%E5%86%85%E5%9C%B0----------.html">{{ $vod->area }}</a>
                                    <span class="split-line"></span>
                                    <span class="text-muted hidden-xs">年份：</span><a
                                        href="https://u.duboku.io/vodshow/13-----------2024.html">{{ $vod->year }}
                                    </a>
                                </p>
                                <p class="data hidden-sm"><span class="text-muted">更新：</span><span
                                        class="text-red">{{ $vod->vod_time }}</span></p>
                                <p class="data"><span class="text-muted">主演：</span>
                                    @foreach ($vod->actors as $actor)
                                        <a href="https://u.duboku.io/vodsearch/-%E6%9D%A8%E7%B4%AB------------.html"
                                            target="_blank">{{ $actor->name }}</a>&nbsp;
                                    @endforeach

                                </p>
                                <p class="data"><span class="text-muted">导演：</span>
                                    @foreach ($vod->directors as $director)
                                        <a href="https://u.duboku.io/vodsearch/-%E6%9D%A8%E7%B4%AB------------.html"
                                            target="_blank">{{ $director->name }}</a>&nbsp;
                                    @endforeach
                                </p>

                                <p class="data hidden-xs">
                                    <span class="text-muted">简介：</span>
                                    {{ mb_substr($vod->content, 0, 70) }}
                                    <a href="#desc">详情 <i class="fa fa-angle-right"></i></a>
                                </p>
                            </div>
                            <div class="myui-content__operate">
                                <a class="btn btn-warm"
                                    href="/vodplay/{{ $vod->id }}-{{ $vod->play_urls[0]->id }}"><i
                                        class="fa fa-play"></i> 立即播放</a>
                                <a class="btn btn-danger" href="javascript:;" onclick="Myui.User.Login();"><i
                                        class="fa fa-star"></i> 收藏</a>
                            </div>
                        </div>
                    </div>
                </div>

                <script type="text/javascript">
                    Myui.Score();
                </script>

                <div class="myui-panel myui-panel-bg clearfix" id="desc">
                    <div class="myui-panel-box clearfix">
                        <div class="myui-panel_hd">
                            <div class="myui-panel__head active bottom-line clearfix">
                                <h3 class="title">
                                    剧情简介
                                </h3>
                            </div>
                        </div>
                        <div class="myui-panel_bd">
                            <div class="col-pd text-collapse content">
                                <span class="sketch content">{{ mb_substr($vod->content, 0, 70) }}</span>
                                <span class="data" style="display: none;">
                                    <p>{{ $vod->content }}
                                    </p>
                                </span>
                                <a class="details" href="javascript:;">详情 <i class="fa fa-angle-down"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 剧情简介-->

                <div class="myui-panel myui-panel-bg clearfix">
                    <div class="myui-panel-box clearfix">
                        <div class="myui-panel_hd">
                            <div class="myui-panel__head active bottom-line clearfix">
                                <a class="more sort-button pull-right" href="javascript:;"><i
                                        class="fa fa-sort-amount-asc"></i> 排序</a>
                                <h3 class="title">
                                </h3>
                                <ul class="nav nav-tabs active">

                                    <li class="active"><a href="https://u.duboku.io/voddetail/4670.html#playlist1"
                                            data-toggle="tab">列表B</a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="tab-content myui-panel_bd">

                            <div id="playlist1" class="tab-pane fade in clearfix active">
                                <ul class="myui-content__list scrollbar sort-list clearfix"
                                    style="max-height: 300px; overflow: auto;">
                                    @foreach ($vod->play_urls as $url)
                                        <li class="col-lg-10 col-md-8 col-sm-6 col-xs-4"><a class="btn btn-default"
                                                href="/vodplay/{{ $vod->id }}-{{ $url->id }}">{{ $url->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-wide-25 col-md-wide-3 col-xs-1 myui-sidebar hidden-sm hidden-xs">
                <div class="myui-panel myui-panel-bg clearfix">
                    <div class="myui-panel-box clearfix">
                        <div class="myui-panel_hd">
                            <div class="myui-panel__head clearfix">
                                <h3 class="title">
                                    {{ $vod->type->name }}热播 </h3>
                                <a class="more text-muted" href="/typevod/{{ $vod->type->id }}">更多
                                    <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                        <div class="myui-panel_bd">


                            <ul class="myui-vodlist__media active col-pd clearfix">
                                @foreach ($highScoreList as $k => $vod)
                                    @if ($k == 0)
                                        <li>
                                            <div class="thumb">
                                                <a class="myui-vodlist__thumb img-xs-70 lazyload"
                                                    href="/vod_detail/{{ $vod->id }}" title="{{ $vod->name }}"
                                                    data-original="{{ $vod->pic }}"></a>
                                            </div>
                                            <div class="detail detail-side">
                                                <h4 class="title"><a href="/vod_detail/{{ $vod->id }}"><i
                                                            class="fa fa-angle-right text-muted pull-right"></i>
                                                        {{ $vod->name }}</a></h4>
                                                <p class="font-12"><span
                                                        class="text-muted">类型：</span>{{ $vod->type->name }}，<span
                                                        class="text-muted">地区：</span>{{ $vod->area }}</p>
                                                <p class="font-12 margin-0"><span
                                                        class="text-muted">主演：</span>{{ $vod->actors->implode('name', ',') }}
                                                </p>
                                            </div>
                                        </li>
                                    @break
                                @endif
                            @endforeach

                        </ul>
                        <ul class="myui-vodlist__text col-pd clearfix">
                            @foreach ($highScoreList as $i => $vod)
                                <li>
                                    <a href="/vod_detail/{{ $vod->id }}" title="{{ $vod->name }}">
                                        <span
                                            class="badge @if ($i == 0) badge-first @elseif($i == 1)badge-second @elseif($i == 2) badge-third @endif">{{ $i + 1 }}</span>{{ $vod->name }}
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
@endsection
