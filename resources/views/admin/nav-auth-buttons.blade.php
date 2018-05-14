@if (Route::has('login'))
    @auth
        <div class="ui right dropdown item">
            <img class="ui avatar image" src="/storage/{{ Auth::user()->profile_picture }}">&nbsp;&nbsp;
            <strong>Hi,&nbsp;&nbsp;&nbsp;</strong>{{ Auth::user()->name }}
            <i class="dropdown icon"></i>
            <div class="menu">
                <a class="item" href="/user/{{ Auth::user()->id }}"><i class="fa fa-fw fa-user"></i>Profile</a>
                <!-- <a class="item" href="/settings">설정</a> -->
                <div class="menu"></div>
                @if(config('adminlte.logout_method') == 'GET' || !config('adminlte.logout_method') && version_compare(\Illuminate\Foundation\Application::VERSION, '5.3.0', '<'))
                    <a class="item" href="{{ url(config('adminlte.logout_url', 'auth/logout')) }}">
                        <i class="fa fa-fw fa-power-off"></i> {{ trans('adminlte::adminlte.log_out') }}
                    </a>
                @else
                    <a class="item" href="#"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    >
                        <i class="fa fa-fw fa-power-off"></i> {{ trans('adminlte::adminlte.log_out') }}
                    </a>
                    <form id="logout-form" action="{{ url(config('adminlte.logout_url', 'auth/logout')) }}" method="POST" style="display: none;">
                        @if(config('adminlte.logout_method'))
                            {{ method_field(config('adminlte.logout_method')) }}
                        @endif
                        {{ csrf_field() }}
                    </form>
                @endif
            </div>
        </div>
    @else
        <div class="ui right index item">
            <div class="ui breadcrumb">
                <a class="section" href="/login">Login</a>
                <span class="divider">/</span>
                <a class="section" href="/register">Register</a>
            </div>
        </div>
        @endauth
        </div>
    @endif