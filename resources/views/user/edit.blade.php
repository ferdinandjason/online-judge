@extends('user.master')
@section('head')

@stop

@section('content')
	<div class="ui raised segment">
		<div class="ui grid" style="margin-bottom: 20px; margin-top: 10px;margin-left: 5px">
			<div class="four wide column">
				<div class="ui slide up instant reveal">
					<div class="visible content">
						<img src="/images/avatar.png" class="ui small circular bordered image">
					</div>
					<div class="hidden content">
						<img src="/images/changeavatar.png" class="ui small circular bordered image">
					</div>
				</div>
			</div>
			<div class="twelve wide column">
				<h2>Profile Setting</h2>
				<div class="ui form">
					<div class="fields">
						<div class="field seven column wide">
							<label>Name</label>
							<input type="text" placeholder="Name">
						</div>
						<div class="field seven column wide">
							<label>School</label>
							<input type="text" placeholder="School">
						</div>
					</div>
					<div class="fields">
						<div class="field seven column wide">
							<label>Major</label>
							<input type="text" placeholder="Major">
						</div>
						<div class="field seven column wide">
							<label>Github</label>
							<input type="text" placeholder="Github">
						</div>
					</div>
					<div class="fields">
						<div class="field seven column wide">
							<label>New Password</label>
							<input type="text" placeholder="New Password">
						</div>
						<div class="field seven column wide">
							<label>Re-enter Password</label>
							<input type="text" placeholder="Re-enter Password">
						</div>
					</div>
					<button class="ui primary button" style="margin-top: 100px">
  						Save All
					</button>
				</div>
			</div>
		</div>
	</div>
@stop