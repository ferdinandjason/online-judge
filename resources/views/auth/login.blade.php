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
                <img src="{{asset('images/logo.png')}}" class="image">
                <div class="content">
                    Log-in to the World!
                </div>
            </h2>
            <div class="centered row">
                <form class="ui large form" action="{{route('login')}}" method="POST">
                    {!! csrf_field() !!}
                    <div class="ui stacked segment">
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="user icon"></i>
                                <input name="email" placeholder="E-mail address" type="email">
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="lock icon"></i>
                                <input name="password" placeholder="Password" type="password">
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui checkbox" style="min-width: 50%;">
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                            </div>
                        </div>
                        <button class="ui fluid large blue submit button">Login</button>
                    </div>
                    <div class="ui error message"></div>
                </form>
            </div>
            <div class="ui message">
                New to us? <a href="{{route('register')}}">Sign Up</a>
            </div>
        </div>
    </div>
</body>
<script>
    $('.checkbox').checkbox();
</script>
</html>