<!DOCTYPE html>
<html>
<head>
    @include('template.head')
    <title>Moe Online Judge</title>
    @yield('head')
</head>
<body>
    @include('template.navigator')
    <div class="ui container" style="width: 50% !important;height: 100vh;margin-top: 20px;">
        <div class="ui top attached segment">
            <div class="left ui rail" style="padding-right: 0px;padding-left: 56px;">
                @yield('left-segment')
            </div>
            <div class="right ui rail" style="padding-left: 0px;padding-right: 56px;">
                @yield('right-segment')
            </div>
            @yield('content')
            <p></p>
            <p></p>
            <p></p>
            <p></p>
        </div>
    </div>
    @include('template.footer')
    <script>
        @yield('script')
    </script>
</body>
</html>