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
    <div style="height: 350px;width: auto;">
        <canvas id="line"></canvas>
    </div>
@stop
@section('contest-only')
    <div class="ui segment">
        <table class="ui compact striped blue text-center table unstackable" id="scoreboard">
            <?php
                $idx=1;
                $first_acc = getFirstAccProblem($scoreboard,$contestProblem);
            ?>
            <thead>
            <tr style="text-align: center;">
                <th style="width:7%;">No.</th>
                <th style="width:20%;">User</th>
                <th style="width:10%;">Accepted</th>
                <th style="width:10%;">Score</th>
                @foreach($contestProblem as $c)
                    <th>{{$c->problem_id}}</th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            @foreach($scoreboard as $c)
                <tr style="text-align: center;">
                    <td>{{$idx}}</td>
                    <td>{{$c['name']}}</td>
                    <td>{{$c['total_accepted']}}</td>
                    <td>{{$c['total_penalty']}}</td>
                    @foreach($contestProblem as $x)
                        @if($c['score'][$x->problem_id]['is_accepted']>0)
                            @if(isFirstAccepted($c['score'][$x->problem_id]['accepted_in'],$first_acc,$x->problem_id))
                                <?php
                                    unset($first_acc[$x->problem_id]);
                                ?>
                                <td style="background: #33CC99;">{{$c['score'][$x->problem_id]['accepted_in']}}</td>
                            @else
                                <td style="background: #DFF0D8;">{{$c['score'][$x->problem_id]['accepted_in']}}</td>
                            @endif
                        @elseif($c['score'][$x->problem_id]['submission_count']>0)
                            <td style="background: #F2DEDE;">(-{{$c['score'][$x->problem_id]['submission_count']}})</td>
                        @else
                            <td></td>
                        @endif
                    @endforeach
                    <?php $idx+=1; ?>
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
            $('#scoreboard').DataTable();
        });

        $.ajax({
            type: "POST",
            url: '/api/v1/statistics/contest/linecharts/{{$contest->id}}',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(data){
                console.log(data);
                var ctx = $("#line");
                ctx.height(350);
                ctx.width(920);
                var line = new Chart(ctx,{
                    type:'scatter',
                    data:data,
                    options:{
                        elements: {
                            line: {
                                tension: 0
                            }
                        },
                        bezierCurve : false,
                        showLines:true,
                        responsive: false,
                        maintainAspectRatio: false,
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    max:{{count($contestProblem)}},
                                    stepSize: 1,
                                },
                                position: 'bottom',
                                type: 'linear',

                            }],
                            xAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    max:{{\Carbon\Carbon::parse($contest->end_time)->diffInMinutes($contest->start_time)}},
                                    stepSize:{{\Carbon\Carbon::parse($contest->end_time)->diffInMinutes($contest->start_time)/20}},
                                },
                                position: 'bottom',
                                type: 'linear',
                            }]
                        },
                    }
                });
            }
        });
    </script>
@stop