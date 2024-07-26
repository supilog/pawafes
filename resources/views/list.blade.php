@extends('layouts.app')

@section('content')
    <div class="btnlist justify-content-center">
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
        <div class="positionbtn @if($position == 1)selected @endif">
            <a href="{{ PawafesHelper::getUrlForPosition($current, 3) }}">
                <img src="{{ asset('img/position/first.png') }}">
            </a>
        </div>
        <div class="positionbtn @if($position == 1)selected @endif">
            <a href="{{ PawafesHelper::getUrlForPosition($current, 4) }}">
                <img src="{{ asset('img/position/second.png') }}">
            </a>
        </div>
        <div class="positionbtn @if($position == 1)selected @endif">
            <a href="{{ PawafesHelper::getUrlForPosition($current, 5) }}">
                <img src="{{ asset('img/position/third.png') }}">
            </a>
        </div>
        <div class="positionbtn @if($position == 1)selected @endif">
            <a href="{{ PawafesHelper::getUrlForPosition($current, 6) }}">
                <img src="{{ asset('img/position/short.png') }}">
            </a>
        </div>
        <div class="positionbtn @if($position == 1)selected @endif">
            <a href="{{ PawafesHelper::getUrlForPosition($current, 7) }}">
                <img src="{{ asset('img/position/outfielder.png') }}">
            </a>
        </div>
    </div>
    <div class="search row justify-content-center">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form method="get" action="{{ route('list') }}">
                <div class="input-group">
                    <input class="form-control" type="text" name="s" placeholder="検索"
                           aria-label="default input example" value="{{ $sw }}">
                </div>
            </form>
        </div>
        <div class="col-md-4 pawafesnum">
            <span><span class="count_founded">0</span>人</span> / <span>全{{ $count['all'] }}人</span>
        </div>
    </div>
    <div class="row">
        @foreach($players as $player)
            <div class="col-md-3 mb-3 player pawafes{{ $player->no }}" data-playerno="{{ $player->no }}">
                <div class="row shadow">
                    <div class="col-4 player-image">
                        @if(!empty($player->img))
                            <img src="{{ $player->img }}">
                        @else
                            <img src="{{ asset('img/who.png') }}">
                        @endif
                    </div>
                    <div class="col-8 player-info">
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
