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
        <div class="ui vertical menu" id="submit">
            <a class="blue item">
                Submit
            </a>
        </div>
    </div>
@stop
@section('content')
    @include('contest.contestinfo')
@stop
@section('contest-only')
    <div class="ui segment">
        <table class="ui celled padded single line table segment unstackable">
            <thead><tr>
                <th>Time Limit</th>
                <th>Memory Limit</th>
            </tr></thead>
            <tbody><tr>
                <td>- s</td>
                <td>- MB</td>
            </tr></tbody>
        </table>

        <div id="problem">

            <div class="ui horizontal divider"><i class="pencil icon"></i>&nbsp;&nbsp;Deskripsi Soal</div>
            <div class="context">

            </div>
            <div class="ui horizontal divider">Contoh</div>
            <div class="ui stackable grid">
                <div class="eight wide column">
                    <div class="ui segment code">
                        <div class="ui top attached label">Input</div>
                        <pre> - </pre>
                    </div>
                </div>
                <div class="eight wide column">
                    <div class="ui segment code">
                        <div class="ui top attached label">Output</div>
                        <pre> - </pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script>
        $('.dropdown').dropdown()
    </script>
@stop