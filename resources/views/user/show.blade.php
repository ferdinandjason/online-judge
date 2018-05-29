@extends('user.master')
@section('head')
	<style>
		.item .content{
			text-align: center;
		}
		.item .header{
			text-align: center;
			margin-bottom: 5px !important;
		}
		.button .icon{
			margin: 0 !important;
		}
	</style>
@stop
@section('left-segment')
	<div class="ui card" data-html="">
		<div class="image">
			<img src="/storage/{{ $user->avatar_path }}" style="object-fit: cover;object-position: center;width: 244px;height: 244px;">
		</div>
		<div class="content">
			<div class="header">{{$user->real_name}}&nbsp;&nbsp;
				@if(Auth::user()->id == $user->id)
					<a id="modal"><i class="pencil icon"></i></a>
				@endif
			</div>
			<div class="description">{{$user->username}}</div>
			<div class="ui divider"></div>
			<div class="ui middle aligned animated list" style="width: 100%">
				<div class="item">
					<div class="header">
						<i class="thumbs up icon"></i>&nbsp;Solved
					</div>
					<div class="content">
						{{$user->total_ac}}
					</div>
					<div class="ui divider"></div>
				</div>
				<div class="item">
					<div class="header">
						<i class="paper plane icon"></i>&nbsp;Submission
					</div>
					<div class="content">
						{{$user->total_submission}}
					</div>
					<div class="ui divider"></div>
				</div>
				<div class="item">
					<div class="header">
						<i class="clock outline icon"></i>&nbsp;Joined
					</div>
					<div class="content">
						{{\Carbon\Carbon::parse($user->created_at)->diffForHumans()}}
					</div>
				</div>
			</div>
		</div>
		<div class="ui three bottom attached buttons">
			<a href="https://github.com/{{$user->github}}"><div class="ui button" data-tooltip="{{$user->github}}">
				<i class="github icon"></i><br>
				Github
			</div></a>
			<div class="ui primary button" data-tooltip="{{$user->school}}">
				<i class="building icon"></i>
				School
			</div>
			<div class="ui positive button" data-tooltip="{{$user->major}}">
				<i class="globe icon"></i>
				Major
			</div>
		</div>
	</div>
	<div class="ui large modal" id="edit">
		<i class="close icon"></i>
		<div class="header">
			Edit Profile
		</div>
		<div class="content">
			<form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
				{{csrf_field()}}
				<input type="hidden" name="_method" value="PUT" />
				<div class="ui grid">
					@include('user.edit')
				</div>
			</form>
		</div>
	</div>
	<script>
		$('#modal').click(function(){
		    $('#edit').modal('show');
		});
	</script>
@stop
@section('right-segment')
	<div class="ui piled segment">
		<div style="display: flex">
			<h4 class="ui header">Statistic</h4>
			<button class="ui right aligned basic primary button" style="margin-left: 72px;" id="detail">Details</button>
		</div>
		<div class="ui divider"></div>
		<canvas id="stat" width="400" height="400"></canvas>
	</div>
	<div class="ui mini modal" id="prob">
		<i class="close icon"></i>
		<div class="header">
			Statistic Detail
		</div>
		<div class="image content">
			<canvas id="stat2" width="400" height="400"></canvas>
		</div>
	</div>
	<script>
		<?php
			try{
			    $a = ($user->total_ac*100)/($user->total_submission-$user->total_ac);
			}
			catch (Exception $e){
			    $a = 0;
			}
		?>
        Chart.Chart.pluginService.register({
            beforeDraw: function(chart) {
                if (chart.config.centerText.display !== null &&
                    typeof chart.config.centerText.display !== 'undefined' &&
                    chart.config.centerText.display) {
                    drawTotals(chart);
                }
            },
        });

        function drawTotals(chart) {

            var width = chart.chart.width,
                height = chart.chart.height,
                ctx = chart.chart.ctx;

            ctx.restore();
            var fontSize = (height / 114).toFixed(2);
            ctx.font = fontSize + "em sans-serif";
            ctx.textBaseline = "middle";

            var text = chart.config.centerText.text,
                textX = Math.round((width - ctx.measureText(text).width) / 2),
                textY = height / 2;

            ctx.fillText(text, textX, textY);
            ctx.save();
        }


        var ctx = $("#stat");
        var donut = new Chart(ctx,{
            type:'doughnut',
            data:{
                datasets: [{
                    data: [{{$user->total_submission-$user->total_ac}},{{$user->total_ac}}],
                    backgroundColor:['#FF6384','#36A2EB']
                }],
                labels: [
                    'Wrong Answer','Accepted'
                ]
			},
            centerText: {
                display: false,
                text: '{{$a}}'
            }
        });
        $('#detail').click(function(){
            var ctx = $("#stat2");
            var donut = new Chart(ctx,{
                type:'doughnut',
                data:{
                    datasets: [{
                        data: [{{$user->total_submission-$user->total_ac}},{{$user->total_ac}}],
                        backgroundColor:['#FF6384','#36A2EB']
                    }],
                    labels: [
                        'Wrong Answer','Accepted'
                    ]
                },
				centerText: {
                    display: true,
                    text: '{{$a}}'
                }
            });
            $('#prob').modal('show');
        });
	</script>
@stop
@section('content')
	<div class="ui header" style="margin-top: 0px !important;">
		Solved Problem
	</div>
	<div class="ui divider"></div>
	<div style="text-align: center;">
		@if(count($userSolvedProblem)>0)
			@foreach($userSolvedProblem as $usp)
                <a href="{{route('problems.show',$usp->problem_id)}}"><button class="ui primary basic button">{{$usp->problem_id}}</button></a>
			@endforeach
		@else
			No problem solved yet...
		@endif
	</div>
@stop
@section('activity')
	<div class="ui header" style="margin-top: 0px !important;">
		Activity
	</div>
	<div class="ui divider"></div>
	<div class="ui feed">
		<?php $counter = 1; ?>
		@if(count($userSolvedProblem)>0)
			@foreach($userSolvedProblem as $usp)
				<div class="event">
					<div class="label">
						<img src="{{asset('images/p.jpg')}}">
					</div>
					<div class="content">
						<div class="summary">
							<a class="user">
								{{$user->real_name}}
							</a> got Accepted in
							<a class="user">
								{{$usp->problem_id}}
							</a>
							<div class="date">
								{{\Carbon\Carbon::parse($usp->created_at)->diffForHumans()}}
							</div>
						</div>
					</div>
				</div>
				<?php
					$counter+=1;
					if($counter == 10) break;
				?>
			@endforeach
		@else
				<p style="text-align: center;">No current activity yet...</p>
		@endif
	</div>
@stop