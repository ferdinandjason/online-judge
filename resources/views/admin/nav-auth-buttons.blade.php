@if (Route::has('login'))
    @auth
        <div class="ui right dropdown item" style="color: #000 !important;">
            <img class="ui avatar image" src="/storage/{{ Auth::user()->avatar_path }}">&nbsp;&nbsp;
            <strong>Hi,&nbsp;&nbsp;&nbsp;</strong>{{ Auth::user()->real_name }}
            <i class="dropdown icon"></i>
            <div class="menu">
                <a class="item" href="/user/{{ Auth::user()->id }}"><i class="fa fa-fw fa-user"></i>Profile</a>
                <div class="menu"></div>
                <a class="item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-fw fa-power-off"></i> Log-out
                </a>
                <form id="logout-form" action="/logout" method="POST" style="display: none;">
                    Log-out
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    @else
        <div class="ui right index item" style="color: #000 !important;">
            <div class="ui breadcrumb">
                <a class="section" href="/login">Login</a>
                <span class="divider">/</span>
                <a class="section" href="/register">Register</a>
            </div>
        </div>
    @endauth
    {{--</div>--}}
@endif