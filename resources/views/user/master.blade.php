<!DOCTYPE html>
<html>
<head>
	@include('template.head')
	<title>Moe Online Judge</title>
	@yield('head')
</head>
<body>
	@include('template.navigator')
	<div class="ui container" style="min-height: 85vh">
		@yield('content')
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