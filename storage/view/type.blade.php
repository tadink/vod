@extends('layout.layout')

@section('content')
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
                        @if (!empty($topType->children))
                            <ul class="myui-screen__list nav-slide clearfix" data-align="left">
                                <li>
                                    <a class="text-muted btn">类型</a>
                                </li>
                                <li><a class="btn @if($currentType->id==$topType->id) btn-warm @endif"  href="/typevod/{{ $topType->id }}">全部</a></li>
                                @foreach ($topType->children as $child)
                                    <li><a class="btn @if($currentType->id==$child->id) btn-warm @endif"
                                            href="/typevod/{{$child->id}}">{{ $child->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif


                        @if (!empty($filter['classes']))
                            <ul class="myui-screen__list nav-slide clearfix" data-align="left">
                                <li>
                                    <a class="btn text-muted">剧情</a>
                                </li>
                                <li><a class="btn  @if(empty($queryVars['class'])) btn-warm @endif" href="{{makeUrl(['class'=>null,'page'=>null])}}">全部</a></li>
                                @foreach ($filter['classes'] as $class)
                                    <li><a class="btn @if(!empty($queryVars['class'])&&$queryVars['class']==$class) btn-warm @endif"
                                            href="{{makeUrl(['class'=>$class,'page'=>null])}}">{{ $class }}</a>
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
                                        href="{{makeUrl(['area'=>null,'page'=>null])}}">全部</a></li>
                                @foreach ($filter['areas'] as $area)
                                    <li><a class="btn @if(!empty($queryVars['area'])&&$queryVars['area']==$area) btn-warm @endif"
                                            href="{{makeUrl(['area'=>$area,'page'=>null])}}">{{ $area }}</a>
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
                                        href="{{makeUrl(['year'=>null,'page'=>null])}}">全部</a></li>
                                @foreach ($filter['years'] as $year)
                                    <li><a class="btn @if(!empty($queryVars['year'])&&$queryVars['year']==$year) btn-warm @endif"
                                            href="{{makeUrl(['year'=>$year,'page'=>null])}}">{{ $year }}</a>
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
                                        href="{{makeUrl(['language'=>null,'page'=>null])}}">全部</a></li>
                                @foreach ($filter['languages'] as $language)
                                    <li><a class="btn @if(!empty($queryVars['language'])&&$queryVars['language']==$language) btn-warm @endif"
                                            href="{{makeUrl(['language'=>$language,'page'=>null])}}">{{ $language }}</a>
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
                                        href="{{makeUrl(['letter'=>null,'page'=>null])}}">全部</a></li>
                                @foreach ($filter['letters'] as $letter)
                                    <li><a class="btn  @if(!empty($queryVars['letter'])&&$queryVars['letter']==$letter) btn-warm @endif"
                                            href="{{makeUrl(['letter'=>$letter,'page'=>null])}}">{{ $letter }}</a>
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
        {!! $paginate->render() !!}
    </div>
</div>
@endsection