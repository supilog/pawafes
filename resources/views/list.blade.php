@extends('layouts.app')

@section('content')
    <div id="search-condition" data-sw="{{ $sw }}" data-position="{{ $position }}" data-area="{{ $area }}"></div>
    <div class="positionlist">
        <div class="positionbtn @if($position == 1)selected @endif">
            <a href="{{ PawafesHelper::getUrlForPosition($current, 1) }}">
                <img src="{{ asset('img/position/pitcher.png') }}">
            </a>
        </div>
        <div class="positionbtn @if($position == 2)selected @endif">
            <a href="{{ PawafesHelper::getUrlForPosition($current, 2) }}">
                <img src="{{ asset('img/position/catcher.png') }}">
            </a>
        </div>
        <div class="positionbtn @if($position == 3)selected @endif">
            <a href="{{ PawafesHelper::getUrlForPosition($current, 3) }}">
                <img src="{{ asset('img/position/first.png') }}">
            </a>
        </div>
        <div class="positionbtn @if($position == 4)selected @endif">
            <a href="{{ PawafesHelper::getUrlForPosition($current, 4) }}">
                <img src="{{ asset('img/position/second.png') }}">
            </a>
        </div>
        <div class="positionbtn @if($position == 5)selected @endif">
            <a href="{{ PawafesHelper::getUrlForPosition($current, 5) }}">
                <img src="{{ asset('img/position/third.png') }}">
            </a>
        </div>
        <div class="positionbtn @if($position == 6)selected @endif">
            <a href="{{ PawafesHelper::getUrlForPosition($current, 6) }}">
                <img src="{{ asset('img/position/short.png') }}">
            </a>
        </div>
        <div class="positionbtn @if($position == 7)selected @endif">
            <a href="{{ PawafesHelper::getUrlForPosition($current, 7) }}">
                <img src="{{ asset('img/position/outfielder.png') }}">
            </a>
        </div>
    </div>
    <div class="arealist">
        <div class="center">
            <div class="input-group">
                <select id="select-area" class="form-select" name="a">
                    <option value="0" @if($area == 0)selected @endif>エリア選択なし</option>
                    <option value="1" @if($area == 1)selected @endif>初期</option>
                    <option value="2" @if($area == 2)selected @endif>スカウ島</option>
                    <option value="4" @if($area == 4)selected @endif>試練の洞窟</option>
                    <option value="3" @if($area == 3)selected @endif>東海岸</option>
                    <option value="5" @if($area == 5)selected @endif>ハナレ島</option>
                    <option value="6" @if($area == 6)selected @endif>空中庭園</option>
                    <option value="7" @if($area == 7)selected @endif>空中庭園空中マップ</option>
                    <option value="8" @if($area == 8)selected @endif>月面</option>
                    <option value="9" @if($area == 9)selected @endif>月面カグヤ城内</option>
                    <option value="10" @if($area == 10)selected @endif>その他</option>
                </select>
            </div>
        </div>
    </div>
    <div class="search">
        <div class="center">
            <form method="get" action="{{ route('list') }}">
                <input type="hidden" name="p" value="{{ $position }}">
                <input type="hidden" name="a" value="{{ $area }}">
                <div class="input-group">
                    <input id="input-sw" class="form-control" type="text" name="sw" placeholder="検索"
                           value="{{ $sw }}">
                </div>
            </form>
        </div>
    </div>
    <div class="pawafesnum">
        <span class="count_founded">0</span><span>人</span> / <span>全{{ $count['all'] }}人</span>
    </div>
    <div class="row">
        @foreach($players as $player)
            <div class="col-md-3 mb-3 player">
                <div class="player-wrap pawafes{{ $player->no }} shadow" data-playerno="{{ $player->no }}">
                    <div class="player-image">
                        @if(!empty($player->img))
                            <img src="{{ $player->img }}">
                        @else
                            <img src="{{ asset('img/who.png') }}">
                        @endif
                    </div>
                    <div class="player-info">
                        <div class="name">
                            <span class="no">{{ $player->no }}</span>&nbsp;{{ $player->name }}&nbsp;
                        </div>
                        <div class="position">{{ $player->position }}&nbsp;</div>
                        <div class="condition">{{ $player->condition }}&nbsp;</div>
                        <div class="area">{{ $player->area }}&nbsp;</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
