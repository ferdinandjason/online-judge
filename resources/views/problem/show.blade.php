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
            <a class="ui basic left pointing label">
                CSV
            </a>
        </div>
        <div class="ui labeled button" tabindex="0" style="margin: 2px;">
            <div class="ui button">
                <i class="file alternate outline icon"></i> Export to
            </div>
            <a class="ui basic left pointing label">
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
    <div class="ui piled segment">
        <div style="display: flex">
            <h4 class="ui header">Statistic</h4>
            <button class="ui right aligned basic primary button" style="margin-left: 72px;" id="detail">Details</button>
        </div>
        <div class="ui divider"></div>
        <canvas id="stat" width="400" height="400"></canvas>
    </div>
@stop
@section('content')
    {{--@include('problems.navigator', ['problem_id' => $problem->problem_id ])--}}
    {{--<div class="ui bottom attached segment">--}}
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
    {{--</div>--}}

    <div class="ui mini modal" >
        <i class="close icon"></i>
        <div class="header">
            Statistic Detail
        </div>
        <div class="image content">
            <canvas id="stat2" width="400" height="400"></canvas>
        </div>
    </div>
@stop
@section('script')
    <script>
        $('.dropdown').dropdown()
        $(document).ready(function(){
            $('#problemTable').DataTable();
        });

        $.ajax({
            type: "POST",
            url: '/api/v1/statistics/problems/{{$problem->id}}',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(data){
                console.log(data);
                var ctx = $("#stat");
                var donut = new Chart(ctx,{
                    type:'doughnut',
                    data:data
                });
            }
        });

        $('#detail').click(function(){
            $('.ui.modal').modal('show');
            $.ajax({
                type: "POST",
                url: '/api/v1/statistics/problems/{{$problem->id}}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(data){
                    console.log(data);
                    var ctx = $("#stat2");
                    var donut = new Chart(ctx,{
                        type:'doughnut',
                        data:data
                    });
                }
            });
        })


    </script>
@stop