<!DOCTYPE html>
<html>
<head>
    @include('template.head')
    <title>Moe Online Judge</title>
</head>
<body style="background-color: #EDECEC">
<div class="ui column centered grid" style="height: 100vh;">
    <div style="vertical-align: middle;align-self: center !important;">
        <h2 class="ui blue image header">
            <img src="/images/logo.png" class="image">
            <div class="content">
                Register to the World!
            </div>
        </h2>
        <div class="centered row">
            <form class="ui form" action="{{route('register')}}" method="POST">
                {!! csrf_field() !!}
                <div class="ui stacked segment">
                    <div class="field{{$errors->has('username')?' error':''}}">
                        <div class="ui left icon input">
                            <i class="eye icon"></i>
                            <input name="username" placeholder="Username" type="text" required>
                        </div>
                        @if($errors->has('username'))
                            <p style="color: #9F3A38">
                                {{$errors->first('username')}}
                            </p>
                        @endif
                    </div>
                    <div class="field{{$errors->has('real_name')?' error':''}}">
                        <div class="ui left icon input">
                            <i class="user icon"></i>
                            <input name="real_name" placeholder="Real Name" type="text" required>
                        </div>
                        @if($errors->has('real_name'))
                            <p style="color: #9F3A38">
                                {{$errors->first('real_name')}}
                            </p>
                        @endif
                    </div>
                    <div class="field{{$errors->has('email')?' error':''}}">
                        <div class="ui left icon input">
                            <i class="at icon"></i>
                            <input name="email" placeholder="E-mail address" type="email" required>
                        </div>
                        @if($errors->has('email'))
                            <p style="color: #9F3A38">
                                {{$errors->first('email')}}
                            </p>
                        @endif
                    </div>
                    <div class="field{{$errors->has('password')?' error':''}}">
                        <div class="ui left icon input">
                            <i class="lock icon"></i>
                            <input name="password" placeholder="Password" type="password" required>
                        </div>
                        @if($errors->has('password'))
                            <p style="color: #9F3A38">
                                {{$errors->first('password')}}
                            </p>
                        @endif
                    </div>
                    <div class="field{{$errors->has('password_confirmation')?' error':''}}">
                        <div class="ui left icon input">
                            <i class="lock icon"></i>
                            <input name="password_confirmation" placeholder="Re-type Password" type="password" required>
                        </div>
                        @if($errors->has('password_confirmation'))
                            <p style="color: #9F3A38">
                                {{$errors->first('password_confirmation')}}
                            </p>
                        @endif
                    </div>
                    <button class="ui fluid large blue submit button" type="submit">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
<script>
    $('.checkbox').checkbox();
</script>
</html>