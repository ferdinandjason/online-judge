<!DOCTYPE html>
<html>
<head>
    @include('admin.head')
    <title>Moe Online Judge</title>
    @yield('head')
</head>
<body style="background-color: #EDECEC">
    <div class="ui left fixed vertical menu" style="z-index: 1000;font-size: large;min-width: 18%;background: rgba(221, 221, 221, 0.1);">
        <div class="item" style="background-color: white;">
            <img class="ui centered tiny image" src="/images/logo.png">
        </div>
        <div class="item">
            Problem
            <div class="menu">
                <a class="item" href="/admin/problems"><i class="list icon" style="color: blue;"></i> List Problem</a>
                <a class="item" href="/admin/problems/create"><i class="add icon" style="color: green;"></i> Add Problem</a>
            </div>
        </div>
        <div class="item">
            Submission
            <div class="menu">
                <a class="item" href="/admin/submissions"><i class="list icon" style="color: blue;"></i> List Submission</a>
            </div>
        </div>
        <div class="item">
            Contest
            <div class="menu">
                <a class="item" href="/admin/contest"><i class="list icon"></i> List Contest</a>
                <a class="item" href="/admin/contest/create"><i class="add icon"></i> Add Contest</a>
            </div>
        </div>
        <div class="item">
            Clarification
            <div class="menu">
                <a class="item" href="/admin/clarification"><i class="list icon"></i> List Clarification</a>
                <a class="item" id="addclar"><i class="add icon"></i> Add Clarification</a>
            </div>
        </div>
    </div>

    <div class="ui mini modal" >
        <i class="close icon"></i>
        <div class="header">
            Make Clarification
        </div>
        <div class="image content">
            <form class="ui form" method="POST" action="/admin/clarification">
                {{csrf_field()}}
                <div class="field">
                    <label>Title : </label>
                    <input name="title" placeholder="Clarification Title" type="text">
                </div>
                <div class="field">
                    <label>Content : </label>
                    <input name="content" placeholder="Content" type="text">
                </div>
                <label>Contest : </label>
                <div class="field">
                    <div class="ui selection dropdown">
                        <input name="contest_id" type="hidden">
                        <i class="dropdown icon"></i>
                        <div class="default text"> - </div>
                        <div class="menu">
                            @foreach($contest as $c)
                                <div class="item" data-value="{{$c->id}}">{{$c->name}}</div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                <input type="hidden" value="0" name="to">
                <button class="ui primary button" type="submit">Submit</button>
            </form>
        </div>
    </div>

    @include('admin.navigator')
    <div style="margin-left: 19%;margin-right: 20px;margin-top: 80px;margin-bottom: 20px;">
        @yield('content')
    </div>
    <script>
        $('#addclar').click(function() {
            $('.ui.modal').modal('show');
        });
    </script>
    @yield('script')
</body>
</html>