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
        <table class="ui striped blue table compact single line unstackable" id="clarificationTable">
            <thead>
            <tr>
                <th class="one wide">No.</th>
                <th class="two wide">From</th>
                <th class="two wide">Title</th>
                <th class="">Content</th>
                <th class="one wide">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clarification as $clar)
                <tr>
                    <td><a>{{ $clar->id }}</a></td>
                    <td>
                        <button class="ui negative basic button">Administrator</button>
                    </td>
                    <td>
                        {{$clar->title}}
                    </td>
                    <td>
                        {{$clar->content}}
                    </td>
                    <td>
                        <button class="ui primary basic button" onclick="show({{$clar->id}})">Detail</button>
                    </td>
                </tr>

                <div class="ui mini modal" id="clar{{$clar->id}}">
                    <i class="close icon"></i>
                    <div class="header">
                        Make Clarification
                    </div>
                    <div class="image content">
                        <div class="ui form">
                            <div class="field">
                                <label>Title : </label>
                                <input value="{{$clar->title}}">
                            </div>
                            <div class="field">
                                <label>Content : </label>
                                <input value="{{$clar->content}}">
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
            </tbody>
        </table>
    </div>
@stop
@section('script')
    <script>
        $('.dropdown').dropdown()
        $(document).ready(function(){
            $('#clarificationTable').DataTable();
        });

        function show(id) {
            $('#clar'+id).modal('show');
        }
    </script>
@stop