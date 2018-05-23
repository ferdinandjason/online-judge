@extends('template.master')
@section('head')

@stop
@section('left-segment')
    <div class="ui piled segment">
        <h4 class="ui header">Problem {{$problem->title}}</h4>
        <div class="ui divider"></div>
        @include('problem.navigator')
    </div>
    <div class="ui piled segment">
        <h4 class="ui header">Export Problem</h4>
        <div class="ui divider"></div>
        <div class="ui labeled button" tabindex="0" style="margin: 2px;">
            <div class="ui button">
                <i class="file excel outline icon"></i> Export to
            </div>
            <a class="ui basic left pointing label" href="{{$problem->id}}/csv">
                CSV
            </a>
        </div>
        <div class="ui labeled button" tabindex="0" style="margin: 2px;">
            <div class="ui button">
                <i class="file alternate outline icon"></i> Export to
            </div>
            <a class="ui basic left pointing label" href="{{$problem->id}}/html">
                HTML
            </a>
        </div>
    </div>
@stop
@section('right-segment')
    <div class="ui piled segment">
        <h4 class="ui header">Tags</h4>
        <div class="ui divider"></div>
        @foreach($problem->tags as $tag)
            <div class="ui tag label">
                {{$tag->name}}
            </div>
        @endforeach
    </div>
    @include('problem.stat',['problem_id'=>$problem->id])
@stop
@section('content')
    <table class="ui compact striped blue text-center table unstackable" id="problemTable">
        <thead>
            <tr>
                <th class="one wide">#</th>
                <th class="nine wide">Name</th>
                <th class="two wide">Time</th>
                <th class="two wide">Memory</th>
                <th class="two wide">Time Accepted</th>
            </tr>
        </thead>
        <tbody>
        
        </tbody>
    </table>
@stop
@section('script')
    <script>
        $('.dropdown').dropdown()
        $(document).ready(function(){
            $('#problemTable').DataTable();
        });
    </script>
@stop