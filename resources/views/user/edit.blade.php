	<div class="four wide column">
		<div class="ui slide up instant reveal">
			<div class="visible content">
				<img src="{{asset('storage/'.$user->avatar_path)}}" class="ui small circular bordered image">
			</div>
			<div class="hidden content" style="text-align: left">
				<label for="file">&nbsp;Choose a file</label>
				<br>
				<input name="avatar_path" type="file" class="ui small circular bordered image">
			</div>
		</div>
	</div>
	<div class="twelve wide column">
		<h2>Profile Setting</h2>
		<div class="ui form">
			<div class="fields">
				<div class="field seven column wide">
					<label>Username</label>
					<input type="text" placeholder="Username" name="username" value="{{$user->username}}">
				</div>
				<div class="field seven column wide">
					<label>Email</label>
					<input type="text" placeholder="Email" name="email" value="{{$user->email}}">
				</div>
			</div>
			<div class="fields">
				<div class="field seven column wide">
					<label>Name</label>
					<input type="text" placeholder="Name" name="real_name" value="{{$user->real_name}}">
				</div>
				<div class="field seven column wide">
					<label>School</label>
					<input type="text" placeholder="School" name="school" value="{{$user->school}}">
				</div>
			</div>
			<div class="fields">
				<div class="field seven column wide">
					<label>Major</label>
					<input type="text" placeholder="Major" name="major" value="{{$user->major}}">
				</div>
				<div class="field seven column wide">
					<label>Github</label>
					<input type="text" placeholder="Github" name="github" value="{{$user->github}}">
				</div>
			</div>
			<button class="ui primary button" style="margin-top: 100px">
				Save All
			</button>
		</div>
	</div>