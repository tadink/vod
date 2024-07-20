@extends('layout.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="myui-panel myui-panel-bg clearfix">
                <div class="myui-panel-box clearfix">
                    <div class="myui-panel_hd">
                        <div class="myui-panel__head clearfix">
                            <span class="text-muted more pull-right">今日更新：“15”
                                <span class="split-line"></span>
                                <a href="https://www.duboku.tv/label/new.html">最近更新</a>
                            </span>
                            <h3 class="title">
                                热剧推荐
                            </h3>
                        </div>
                    </div>
                    <div class="myui-panel_bd clearfix">
                        <ul class="myui-vodlist clearfix">
                            @php
                                $vods = queryVods(['order'=>[['vod_time','desc'],['score','desc']],'limit'=>8,'with'=>['actors']]);
                            @endphp

                            @foreach ($vods as $vod)
                                <li class="col-lg-8  col-md-8 col-sm-4 col-xs-3">
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
                                                {{ $vod->actors->implode('name', ',') }}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            @foreach ($types as $type)
                <div class="myui-panel myui-panel-bg clearfix">
                    <div class="myui-panel-box clearfix">
                        <div class="myui-panel_bd clearfix">
                            <div class=" col-xs-1 padding-0">
                                <div class="myui-panel_hd">
                                    <div class="myui-panel__head clearfix">
                                        <h3 class="title">
                                            {{ $type->name }} </h3>
                                        <a class="more text-muted" href="/typevod/{{ $type->id }}">更多 <i
                                                class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                                <ul class="myui-vodlist clearfix">
                                    @php
                                        $vods = queryVods([
                                            'where' => ['type_id' => ['=', $type->id]],
                                            'limit' => 9,
                                            'with' => ['actors'],
                                        ]);
                                    @endphp
                                    @foreach ($vods as $vod)
                                        <li class="col-lg-9 col-md-6 col-sm-4 col-xs-3">
                                            <div class="myui-vodlist__box">
                                                <a class="myui-vodlist__thumb lazyload"
                                                    href="/vod_detail/{{ $vod->id }}" title="{{ $vod->name }}"
                                                    data-original="{{ $vod->pic }}">
                                                    <span class="play hidden-xs"></span>
                                                    <span class="pic-tag pic-tag-top">
                                                        <span class="tag"
                                                            style="background-color: #858484;">{{ $vod->score }}分</span>
                                                    </span>
                                                    <span class="pic-text text-right">{{ $vod->remark }}</span> </a>
                                                <div class="myui-vodlist__detail">
                                                    <h4 class="title text-overflow"><a
                                                            href="/vod_detail/{{ $vod->id }}"
                                                            title="{{ $vod->name }}">{{ $vod->name }}</a></h4>
                                                    <p class="text text-overflow text-muted hidden-xs">
                                                        {{ $vod->actors->implode('name', ',') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
