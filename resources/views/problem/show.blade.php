@extends('template.master')
@section('head')

@stop
@section('left-segment')
    <div class="ui piled segment">
        <h4 class="ui header">Problem {{$problem->title}}</h4>
        <div class="ui divider"></div>

    </div>
@stop
@section('right-segment')
    <div class="ui piled segment">
        <h4 class="ui header">Tags</h4>
        <div class="ui divider"></div>
        @foreach($problemTag as $tag)
            <div class="ui tag label">
                {{$tag->name}}
            </div>
        @endforeach
    </div>
@stop
@section('content')
    {{--@include('problems.navigator', ['problem_id' => $problem->problem_id ])--}}
    <div class="ui bottom attached segment">
        <table class="ui celled padded single line table segment unstackable">
            <thead><tr>
                <th>Time Limit</th>
                <th>Memory Limit</th>
                <th>Accepted</th>
                <th>Submited</th>
            </tr></thead>
            <tbody><tr>
                <td>{{ $problem->time_limit }} s</td>
                <td>{{ $problem->memory_limit }} MB</td>
                <td>{{ $problem->total_ac }}</td>
                <td>{{ $problem->total_submit }}</td>
            </tr></tbody>
        </table>

        <div id="problem">

            <div class="ui horizontal divider"><i class="pencil icon"></i>&nbsp;&nbsp;Deskripsi Soal</div>
            <div class="context">
                <?php
                    echo $problem->description;
                ?>
            </div>
            <div class="ui horizontal divider">Contoh</div>
            <div class="ui stackable grid">
                <div class="eight wide column">
                    <div class="ui segment code">
                        <div class="ui top attached label">Input</div>
                        <pre>{{ $problem->sample_input }}</pre>
                    </div>
                </div>
                <div class="eight wide column">
                    <div class="ui segment code">
                        <div class="ui top attached label">Output</div>
                        <pre>{{ $problem->sample_output }}</pre>
                    </div>
                </div>
            </div>
            <div class="ui horizontal divider">Hint</div>
            <div class="context">
                <div class="vhint tags">
                    <h2 class="ui sub header">Tags</h2>
                    @foreach( $problem->tags as $t )
                        <a class="ui tag label" href="">{{ $t->Tags }}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="ui horizontal divider">Comments</div>
    </div>
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