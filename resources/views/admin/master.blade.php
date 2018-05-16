<!DOCTYPE html>
<html>
<head>
    @include('admin.head')
    <title>Moe Online Judge</title>
    @yield('head')
</head>
<body style="background-color: #EDECEC">
    <div class="ui left fixed vertical menu" style="z-index: 1000;font-size: large;min-width: 18%">
        <div class="item">
            <img class="ui centered tiny image" src="/images/logo.png">
        </div>
        <div class="item">
            Problem
            <div class="menu">
                <a class="item" href="/admin/problems"><i class="list icon"></i> List Problem</a>
                <a class="item" href="/admin/problems/create"><i class="add icon"></i> Add Problem</a>
            </div>
        </div>
        <div class="item">
            Submission
            <div class="menu">
                <a class="item" href="/admin/submissions"><i class="list icon"></i> List Submission</a>
            </div>
        </div>
        <div class="item">
            Contest
            <div class="menu">
                <a class="item" href="/admin/contest"><i class="list icon"></i> List Contest</a>
                <a class="item" href="/admin/contest/create"><i class="add icon"></i> Add Contest</a>
            </div>
        </div>
    </div>
    @include('admin.navigator')
    <div style="margin-left: 19%;margin-right: 20px;margin-top: 80px;margin-bottom: 20px;">
        @yield('content')
    </div>
    @yield('script')
</body>
</html>