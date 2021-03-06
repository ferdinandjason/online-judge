<!DOCTYPE html>
<html>
<head>
    @include('template.head')
    <title>404 - Moe Online Judge</title>
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        body {
            background: #dedede;
            color: #737373;
            font: 18px/1.6em 'museo-sans-rounded',Helvetica,Arial,Verdana,sans-serif;
            height: 100%;
            min-height: 100%;
        }
        @font-face {
            font-family: 'museo-sans-rounded';
            src: url('//d7mj4aqfscim2.cloudfront.net/proxy/fonts/museo/museosansrounded-300-webfont.eot');
            src: url('//d7mj4aqfscim2.cloudfront.net/proxy/fonts/museo/museosansrounded-300-webfont.eot?#iefix') format('embedded-opentype'),
            url('//d7mj4aqfscim2.cloudfront.net/proxy/fonts/museo/museosansrounded-300-webfont.woff') format('woff'),
            url('//d7mj4aqfscim2.cloudfront.net/proxy/fonts/museo/museosansrounded-300-webfont.ttf') format('truetype'),
            url('//d7mj4aqfscim2.cloudfront.net/proxy/fonts/museo/museosansrounded-300-webfont.svg#museo_sans_rounded300') format('svg');
            font-weight: 300;
            font-style: normal;
        }
        @font-face {
            font-family: 'museo-sans-rounded';
            src: url('//d7mj4aqfscim2.cloudfront.net/proxy/fonts/museo/museosansrounded-700-webfont.eot');
            src: url('//d7mj4aqfscim2.cloudfront.net/proxy/fonts/museo/museosansrounded-700-webfont.eot?#iefix') format('embedded-opentype'),
            url('//d7mj4aqfscim2.cloudfront.net/proxy/fonts/museo/museosansrounded-700-webfont.woff') format('woff'),
            url('//d7mj4aqfscim2.cloudfront.net/proxy/fonts/museo/museosansrounded-700-webfont.ttf') format('truetype'),
            url('//d7mj4aqfscim2.cloudfront.net/proxy/fonts/museo/museosansrounded-700-webfont.svg#museo_sans_rounded700') format('svg');
            font-weight: 700;
            font-style: normal;
        }
        img {
            display: block;
        }
        #wrapper {
            height: 100%;
            min-height: 300px;
            min-width: 700px;
            position: relative;
            width: 100%;
        }
        #box_centered {
            left: 50%;
            margin: -100px 0 0 -310px;
            min-height: 200px;
            position: absolute;
            top: 50%;
            width: 650px;
        }
        .pane-left {
            width: 200px;
            float: left;
            margin-left: -290px;
        }
        .pane-right {
            width: 420px;
            float: right;
        }
        .owl {
            margin: -20px 0 0 0;
            height: 500px;
        }
        h1 {
            font-size: 36px;
            margin: 0 0 25px 0;
            font-weight: 300;
            width: 400px;
        }
        p {
            margin: 0 0 25px 0;
        }
        a {
            color: #737373;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover{
            color: #737373;
        }
        .moe{
            width: 50px;
        }
    </style>
</head>
<body>
<div id="wrapper">
    <div id="box_centered" class="clearfix">
        <div class="pane-left">
            <img src="{{asset('images/miku.png')}}" class="owl">
        </div>
        <div class="pane-right">
            <h1>Error <strong style="color: dodgerblue">404</strong></h1>
            <p>
                Sorry, the page you were looking for doesn’t exist. <br>
                Are you lost ? <br>
                Try going to <a href="{{route('root')}}">Home</a>, <br>
                or follow us on
                <div class="ui link list">
                    <button class="ui circular facebook icon button">
                        <i class="facebook icon"></i>
                    </button>
                    <button class="ui circular twitter icon button">
                        <i class="twitter icon"></i>
                    </button>
                    <button class="ui circular linkedin icon button">
                        <i class="linkedin icon"></i>
                    </button>
                    <button class="ui circular google plus icon button">
                        <i class="google plus icon"></i>
                    </button>
                </div>
            </p>
            <a href="{{route('root')}}" style="display: flex"><img src="{{asset('images/logo.png')}}" class="moe"><p class="subtitle" style="margin-top: 6px;">&nbsp;&nbsp;Moe Online Judge</p></a>
        </div>
    </div>
</div>
<a href="https://github.com/ferdinandjason/online-judge" class="github-corner" aria-label="View source on Github"><svg width="80" height="80" viewBox="0 0 250 250" style="fill:#151513; color:#fff; position: absolute; top: 0; border: 0; right: 0;" aria-hidden="true"><path d="M0,0 L115,115 L130,115 L142,142 L250,250 L250,0 Z"></path><path d="M128.3,109.0 C113.8,99.7 119.0,89.6 119.0,89.6 C122.0,82.7 120.5,78.6 120.5,78.6 C119.2,72.0 123.4,76.3 123.4,76.3 C127.3,80.9 125.5,87.3 125.5,87.3 C122.9,97.6 130.6,101.9 134.4,103.2" fill="currentColor" style="transform-origin: 130px 106px;" class="octo-arm"></path><path d="M115.0,115.0 C114.9,115.1 118.7,116.5 119.8,115.4 L133.7,101.6 C136.9,99.2 139.9,98.4 142.2,98.6 C133.8,88.0 127.5,74.4 143.8,58.0 C148.5,53.4 154.0,51.2 159.7,51.0 C160.3,49.4 163.2,43.6 171.4,40.1 C171.4,40.1 176.1,42.5 178.8,56.2 C183.1,58.6 187.2,61.8 190.9,65.4 C194.5,69.0 197.7,73.2 200.1,77.6 C213.8,80.2 216.3,84.9 216.3,84.9 C212.7,93.1 206.9,96.0 205.4,96.6 C205.1,102.4 203.0,107.8 198.3,112.5 C181.9,128.9 168.3,122.5 157.7,114.1 C157.9,116.9 156.7,120.9 152.7,124.9 L141.0,136.5 C139.8,137.7 141.6,141.9 141.8,141.8 Z" fill="currentColor" class="octo-body"></path></svg></a><style>.github-corner:hover .octo-arm{animation:octocat-wave 560ms ease-in-out}@keyframes octocat-wave{0%,100%{transform:rotate(0)}20%,60%{transform:rotate(-25deg)}40%,80%{transform:rotate(10deg)}}@media (max-width:500px){.github-corner:hover .octo-arm{animation:none}.github-corner .octo-arm{animation:octocat-wave 560ms ease-in-out}}</style>
</body>
</html>