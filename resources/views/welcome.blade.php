<!DOCTYPE html>
<html>
<head>
    @include('template.head')
    <link href='https://fonts.googleapis.com/css?family=Rancho' rel='stylesheet'>
    <title>Moe Online Judge</title>
    <style>
        p.ui.header{
            position: absolute !important;
            font-size: 68px !important;
            z-index: 10;
            margin-left: auto;
            margin-right: auto;
            margin-top: -30px !important;
            left: 0;
            right: 0;
            color: #2185D0;
        }
        .stripe.segment{
            background-color: #FFFFFF;
            padding: 7.5em 0px;
            border-radius: 0em;
            margin: 0em;
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
    </style>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
</head>
<body>
<div class="ui segment" id="loading" style="padding: 0px;margin: 0px;">
    <div class="ui active inverted dimmer" style="width: 100vw;height: 100vh;">
        <div class="ui text loader">Loading</div>
    </div>
    <p></p>
</div>
<div class="nav">
    <div class="ui secondary pointing menu" id="navi" style="background:rgba(255,255,255,.80)">
        <div class="ui item right aligned" style="display: flex">
            <a class="ui item" href="{{route('problems.index')}}">Problem</a>
            <a class="ui item" href="{{route('submissions.index')}}">Submission</a>
        </div>
        <a href="{{route('root')}}"><img class="ui small circular centered image" style="position: relative;z-index: 1;width: 80px" src="{{asset("images/logo.png")}}"></a>
        <div class="ui item left aligned" style="display: flex">
            <a class="ui item" href="{{route('contest.index')}}">Contest</a>
            <a class="ui item" href="{{route('user.rank')}}">Rank</a>
        </div>
    </div>
</div>
<div id="particles-js" style="width: 100vw;height: 655px;position: absolute;z-index: -1;background: #2C3141"></div>
<div class="ui introhead" style="background:url(images/back.png) left bottom no-repeat,transparent;background-size:500px auto;background-position-x: left 16%;height: 655px;">
    <div class="ui container">
        <div class="introduction">
            <p class="subtitle" style="text-shadow: 3px 0 3px #000;margin-top: -40px;"><strong>
                An algorithm refers to a number of steps required for solving a problem.<br/>
                It makes you to become a better, smarter, productive being!<br/>
                Proof it now!</strong>
                @if (Route::has('login'))
                    @auth
                        <p class="subtitle" style="text-shadow: 3px 0 3px #000;">
                            Welcome, aboard !
                        </p>
                        {{--<form id="logout-form" action="/logout" method="POST" style="display: none;">--}}
                        <a class="ui blue big image label">
                            <img src="{{asset('storage/'.Auth::user()->avatar_path)}}">
                            {{Auth::user()->real_name}}
                            <div type="submit" class="detail" id="profile">Profile</div>
                            <div type="submit" class="detail" id="logout">Logout</div>
                        </a>
                        {{--</form>--}}
                    @else
                        <div class="ui buttons">
                            <button class="ui button" id="lgn">Login</button>
                            <div class="or"></div>
                            <button class="ui positive button" id="sgn">Sign Up</button>
                        </div>
                    @endauth
                @endif
            </p>
            @if (Route::has('login'))
                @auth
                <div class="ui large form" style="width: 400px;height: 400px;margin: auto;float: right;padding-top: 10px;" id="prob">
                    <p class="ui header" style="font-family: Rancho">Be Productive !</p>
                    <div class="ui stacked segment" style="padding-top: 40px">
                        <p style="color: #000;">Hello there!, I have some problem for you! check it out!</p>
                        <div class="ui card" style="position: relative;margin-left: 0;margin-right: 0;left: calc(50% - 145px);width: 290px;">
                            <div class="content">
                                <div class="header">
                                    {{$problem->title}}
                                </div>
                                <div class="meta">
                                    {{$problem->id}}
                                </div>
                                <?php $des = preg_replace('/<\?(.+?)\?>/','',$problem->description); ?>
                                <div class="description">
                                    {{str_limit(strip_tags($des),150, '...')}}
                                </div>
                            </div>
                            <div class="extra content">
                                <div class="ui two buttons">
                                    <a href="{{route('problems.show',$problem->id)}}"><div class="ui basic green button">Go for it !!!</div></a>
                                    <a href="{{route("root")}}"><div class="ui basic red button">Other problems ?</div></a>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                @else
                <form class="ui large form" action="{{route('login')}}" method="POST" style="width: 400px;height: 400px;margin: auto;float: right;padding-top: 10px;" id="login">
                    <p class="ui header" style="font-family: Rancho">Login</p>
                    {!! csrf_field() !!}
                    <div class="ui stacked segment" style="padding-top: 40px">
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="user icon"></i>
                                <input name="email" placeholder="E-mail address" type="email">
                            </div>
                            @if($errors->has('email'))
                                <p style="color: #9F3A38">
                                    {{$errors->first('email')}}
                                </p>
                            @endif
                        </div>
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="lock icon"></i>
                                <input name="password" placeholder="Password" type="password">
                            </div>
                            @if($errors->has('password'))
                                <p style="color: #9F3A38">
                                    {{$errors->first('password')}}
                                </p>
                            @endif
                        </div>
                        <div class="field">
                            <div class="ui checkbox" style="color: black;min-width: 50%;">
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                            </div>
                        </div>
                        <button class="ui fluid large blue submit button">Login</button>
                    </div>
                    <div class="ui error message"></div>
                </form>
                <form class="ui form" action="{{route('register')}}" method="POST" id="register" style="width: 400px;height: 400px;margin: auto;float: right;display: none;padding-top: 10px;">
                    <p class="ui header" style="font-family: Rancho">Sign Up</p>
                    {!! csrf_field() !!}
                    <div class="ui stacked segment" style="padding-top: 40px;">
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
                @endauth
            @endif
        </div>
    </div>
</div>
<div class="ui stripe segment">
    <div class="ui two column center aligned divided relaxed stackable grid container">
        <div class="ui horizontal divider">
            <i class="heart icon"></i>
        </div>
        <div class="row">
            <div class="column">
                <img src="{{asset('images/LaravelLogo.png')}}" style="height: 50px;width: auto">
                <h3 class="ui header">Laravel 5.5</h3>
            </div>
            <div class="column">
                <img src="{{asset('images/SemanticUI.svg')}}" style="height: 50px;width: auto">
                <h3 class="ui header">Semantic UI</h3>
            </div>
        </div>
        <div class="ui horizontal divider">
            <i class="heart icon"></i>
        </div>
    </div>
</div>


{{--@include('template.navigator')--}}
{{--<div class="ui container" style="min-height: 85vh">--}}

{{--</div>--}}
@include('template.footer')
<script>
    $(window).on("scroll",function(){
        $(this).scrollTop()>0?$('#navi').addClass('fixed').removeClass('pointing'):$('#navi').removeClass('fixed').addClass('pointing');
    });

    particlesJS.load('particles-js', 'assets/particles.json', function() {
        console.log('callback - particles.js config loaded');
    });

    $('.checkbox').checkbox();
    $(document).ready(function(){
        $('#loading').hide();
    })
    $('#sgn').click(function(){
       $('#register').show();
       $('#login').hide();
    });
    $('#lgn').click(function(){
       $('#login').show();
       $('#register').hide();
    });

    $('#logout').click(function(){
        $.ajax({
            type: "POST",
            url: '{{route('logout')}}',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(data){
                location.reload();
            }
        });
    });

    $('#profile').click(function(){
        @auth
            location.href = "{{route('user.show',Auth::user()->id)}}";
        @endauth
    });

    $(window).scroll(
        function() {
            if(isElementInViewport($("#footer")[0])){
                $("#footer-navbar").hide();
            }
            else{
                $("#footer-navbar").show();
            }
        }
    );

    function isElementInViewport(el) {
        var rect = el.getBoundingClientRect();

        var top = el.offsetTop;
        var left = el.offsetLeft;
        var width = el.offsetWidth;
        var height = el.offsetHeight;

        while(el.offsetParent) {
            el = el.offsetParent;
            top += el.offsetTop;
            left += el.offsetLeft;
        }

        return (
            top < (window.pageYOffset + window.innerHeight)-55 &&
            left < (window.pageXOffset + window.innerWidth)-55 &&
            (top + height) > window.pageYOffset &&
            (left + width) > window.pageXOffset
        );
    }
</script>
</body>
</html>