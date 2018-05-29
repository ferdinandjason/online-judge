@extends('template.master')
@section('head')

@stop
@section('left-segment')
    <div class="ui piled segment">
        <h4 class="ui header">Contest {{$contest->name}}</h4>
        <div class="ui divider"></div>
        @include('contest.navigator')
    </div>
@stop
@section('right-segment')
    <div class="ui piled segment">
        <h4 class="ui header">Problem</h4>
        <div class="ui divider"></div>
        @include('contest.problem.contestproblem')
    </div>
@stop
@section('content')
    @include('contest.contestinfo')
@stop
@section('contest-only')
    <div class="ui segment">
        @if(\Carbon\Carbon::parse($contest->start_time)->diffInSeconds(\Carbon\Carbon::now(),false)>=0)
            <table class="ui compact striped blue text-center table unstackable" id="problemTable">
                <thead>
                <tr>
                    <th class="one wide">#</th>
                    <th class="six wide">Problem</th>
                    <th class="one wide">Alias</th>
                    <th class="one wide">Submit</th>
                </tr>
                </thead>
                <tbody>
                @foreach($contestProblem as $p)
                    <tr>
                        <td>{{ $p->problem->id }}</td>
                        <td class="left aligned">
                            <a href="{{route('contest.problem.show',[$contest->id,$p->problem->id])}}" style="vertical-align: middle">{{ $p->problem->title }}</a>
                        </td>
                        <td><a>{{$p->alias}}</a></td>
                        <td><button class="ui basic blue button"><a href="{{route('contest.problem.show',[$contest->id,$p->problem->id])}}"><i class="fa fa-user-plus"></i> Masuk</a></button></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <a class="">No Problem's Added Yet!</a>
        @endif
    </div>
@stop
@section('script')
    <script>
        $('.dropdown').dropdown()
        $(document).ready(function(){
            $('#problemTable').DataTable();
        });
    </script>
@stop