@extends('template.master')
@section('head')

@stop
@section('left-segment')
    <div class="ui piled segment">
        <h4 class="ui header">Contest</h4>
        <div class="ui divider"></div>
        @include('contest.navigator')
    </div>
@stop
@section('right-segment')
    <div class="ui piled segment">

    </div>
@stop
@section('content')
    @include('contest.contestinfo')
@stop
@section('contest-only')
    <div class="ui segment">
        <table class="ui compact striped blue text-center table unstackable" id="problemTable">
            <thead>
            <tr>
                <th class="one wide">#</th>
                <th class="ten wide">Problem</th>
                <th class="one wide">Alias</th>
                <th class="one wide">Submit</th>
            </tr>
            </thead>
            <tbody>
            @foreach($contestProblem as $p)
                <tr>
                    <td>{{ $p->problem_id }}</td>
                    <td class="left aligned">
                        <a href="contest/{{$contest->id}}/problems/{{$p->id}}" style="vertical-align: middle">{{ $p->problem->title }}</a>
                    </td>
                    <td><a>{{$p->alias}}</a></td>
                    <td><a> tombol submit </a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
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