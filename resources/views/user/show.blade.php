@extends('user.master')
@section('head')

@stop

@section('content')
	<img class="ui tiny circular centered image" style="position: relative; top: 50px; z-index: 1;" src="/images/avatar.png">
	<div class="ui raised segment center aligned" style="width: 80%; margin-right: auto; margin-left: auto">
		<div class="ui grid" style="position: relative; top: 20px; left: 850px">
			<i class="pencil icon"></i>
		</div>
		<div class="ui grid" style="margin-bottom: 20px; margin-top: 30px;">
			<div class="sixteen wide column">
				<h2>Nama</h2>
				<h4>Email</h4>
				<div class="ui three column very relaxed grid">
					<div class="column">
						<h5>Solved</h5>
						<h3>30</h3>
					</div>
					<div class="column">
						<h5>Submissions</h5>
						<h3>100</h3>
					</div>
					<div class="column">
						<h5>Score</h5>
						<h3>0</h3>
					</div>
				</div>
				<div class="ui center aligned grid" style="margin-top: 50px">
					<i class="github icon"></i>
					<i class="mail icon"></i>
					<i class="globe icon"></i>
				</div>
			</div>
		</div>
	</div>

@stop