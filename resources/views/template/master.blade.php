<!DOCTYPE html>
<html>
<head>
    @include('template.head')
    <title>Moe Online Judge</title>
    @yield('head')
</head>
<body class="wallpaper">
    <div class="ui segment" id="loading" style="padding: 0px;margin: 0px;">
        <div class="ui active inverted dimmer" style="width: 100vw;height: 100vh;">
            <div class="ui text loader">Loading</div>
        </div>
        <p></p>
    </div>
    @include('template.navigator')
    <div class="ui container" style="width: 50% !important;min-height: 85vh;margin-top: 20px;margin-bottom: 20px;">
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
        @yield('contest-only')
    </div>
    @include('template.footer')
    @yield('script')
    <script>
        $(document).ready(function(){
            $('#loading').hide();
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