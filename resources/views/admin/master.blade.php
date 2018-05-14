<!DOCTYPE html>
<html>
<head>
    @include('admin.head')
    <title>Moe Online Judge</title>
    @yield('head')
</head>
<body style="background-color: #EDECEC">
    <div class="ui left fixed vertical menu" style="z-index: 1000;">
        <div class="item">
            <img class="ui centered tiny image" src="/images/logo.png">
        </div>
        <div class="ui dropdown item">
            Problem
            <i class="dropdown icon"></i>
            <div class="menu">
                <a class="item" href="/admin/problems"><i class="list icon"></i> List Problem</a>
                <a class="item" href="/admin/problems/create"><i class="add icon"></i> Add Problem</a>
            </div>
        </div>
    </div>
    @include('admin.navigator')
    <div style="margin-left: 230px;margin-right: 30px;margin-top: 80px;margin-bottom: 20px;">
        @yield('content')
    </div>
    @yield('script')
</body>
</html>