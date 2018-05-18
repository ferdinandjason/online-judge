<!DOCTYPE html>
<html>
<head>
    @include('template.head')
    <title>Moe Online Judge</title>
    @yield('head')
</head>
<body>
    @include('template.navigator')
    <div class="ui container" style="width: 50% !important;min-height: 100vh;margin-top: 20px;">
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
        $(window).scroll(
            function() {
                if(isElementInViewport($("#footer")[0])){
                    console.log('asdasd')
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
            console.log(top)
            console.log(window.pageYOffset + window.innerHeight)
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