@extends('template.master')
@section('head')

@stop
@section('left-segment')
    <div class="ui piled segment">
        <h4 class="ui header">Problem Filter</h4>
        <div class="ui divider"></div>
    </div>
@stop
@section('right-segment')
    <div class="ui piled segment">
        <h4 class="ui header">Tags List</h4>
        <div class="ui divider"></div>
        @foreach($problemTag as $tag)
            <div class="ui label">
                $tag->name
            </div>
        @endforeach
        <div class="ui label">
            DP
        </div>
        <div class="ui label">
            greedy
        </div>
        <div class="ui label">
            asd
        </div>
    </div>
@stop
@section('content')
    asdasdasdasdads
@stop
@section('script')
    $('.dropdown').dropdown()
@stop