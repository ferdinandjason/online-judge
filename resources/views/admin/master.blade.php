<!DOCTYPE html>
<html>
<head>
    @include('admin.head')
    <title>Moe Online Judge</title>
    @yield('head')
</head>
<body style="background-color: #EDECEC">
    {{--@include('admin.navigator')--}}
    <div class="ui left fixed vertical menu">
        <div class="item">
            <img class="ui centered mini image" src="/images/logo.png">
        </div>
        <a class="item">Features</a>
        <a class="item">Testimonials</a>
        <a class="item">Sign-in</a>
        <div class="ui dropdown item">
            More
            <i class="dropdown icon"></i>
            <div class="menu">
                <a class="item"><i class="edit icon"></i> Edit Profile</a>
                <a class="item"><i class="globe icon"></i> Choose Language</a>
                <a class="item"><i class="settings icon"></i> Account Settings</a>
            </div>
        </div>
    </div>
    <div style="margin-left: 230px;margin-right: 30px;">
        @yield('content')
    </div>
    <script>
        @yield('script')
    </script>
</body>
</html>