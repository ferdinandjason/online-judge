@extends('template.master')
@section('head')

@stop

@section('left-segment')
    <div class="ui piled segment">
        <h4 class="ui header">Problem</h4>
        <div class="ui divider"></div>
        <div class="ui vertical menu">
            <a class="item" href="{{route('problems.show',$problem[rand(0,count($problem)-1)]->id)}}">
                Go To Random Problem
            </a>
            <a class="item" href="{{route('problems.show',$problem[count($problem)-1]->id)}}">
                Go To Newest Problem
            </a>
            <a class="item" id="find">
                Go To Favorite Problem
            </a>
        </div>
    </div>
@stop
@section('right-segment')
    <div class="ui piled segment">
        <h4 class="ui header">Tags List</h4>
        <div class="ui divider"></div>
        @foreach($problemTag as $tag)
            <div class="ui tag label">
                {{$tag->name}}
            </div>
        @endforeach
    </div>
@stop
@section('content')
    <table class="ui compact striped blue text-center table unstackable" id="problemTable">
        <thead>
            <tr>
                <th class="one wide">#</th>
                <th class="ten wide">Problem</th>
                <th class="one wide">Total</th>
                <th class="one wide">Submit</th>
            </tr>
        </thead>
        <tbody>
        @foreach($problem as $p)
            <tr>
                <td>
                    {{ $p->id }}
                </td>
                <td class="left aligned">
                    <a href="{{ route('problems.show',$p->id) }}" style="vertical-align: middle">{{ $p->title }}</a>
                </td>
                <td><a>{{$p->total_submit}}</a></td>
                <td><a>{{$p->total_ac}}</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
@section('script')
    <script>
        let problem;
        $('.dropdown').dropdown()
        $(document).ready(function(){
            problem = $('#problemTable').DataTable();
        });

        $('#find').click(function(){
            console.log('asd');
            var fav = problem.column(0).data().sort();
            window.location.href="problems/"+fav[0];
        });
    </script>
@stop