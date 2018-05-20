<!DOCTYPE html>
<html>
<head>
    @include('admin.head')
    <title>Moe Online Judge</title>
    @yield('head')
    <style>
        .left{
            float:left !important;
            margin: 0 .35714286em 0 0 !important;
        }
        .item::before{
            width: 0 !important;
        }
        .item > .menu > .item{
            margin-left: 20px;
            margin-top: 15px;
        }
        .angle.icon{
            cursor: pointer;
        }
    </style>
</head>
<body style="background-color: #EDECEC">
    <div class="ui left fixed vertical menu" style="z-index: 1000;font-size: 16px;min-width: 17%;background: white;">
        <div class="item" style="background-color: white;min-height: 100px;">
            <img class="ui centered tiny image" src="/images/logo.png" style="margin-top: 25px;margin-bottom: 25px;">
        </div>
        <div class="item{{(Request::is('admin') || Request::is('admin/general'))?' active':''}}">
            <i class="clone outline icon left"></i>Dashboard <i class="angle up icon"></i>
            <div class="menu">
                <a class="item{{Request::is('admin')?' active blue':''}}" href="/admin"> Dashboard</a>
                <a class="item{{Request::is('admin/general')?' active blue':''}}" href="/admin/general"> General</a>
            </div>
        </div>
        <div class="item{{Request::is('admin/problem*')?' active':''}}">
            <i class="clone outline icon left"></i>Problem <i class="angle up icon"></i>
            <div class="menu">
                <a class="item{{Request::is('admin/problems')?' active blue':''}}" href="/admin/problems"> List Problem</a>
                <a class="item{{Request::is('admin/problems/create')?' active blue':''}}" href="/admin/problems/create"> Add Problem</a>
            </div>
        </div>
        <div class="item{{Request::is('admin/submissions*')?' active':''}}">
            <i class="file icon left"></i>Submission <i class="angle up icon"></i>
            <div class="menu">
                <a class="item{{Request::is('admin/submissions')?' active blue':''}}" href="/admin/submissions"> List Submission</a>
            </div>
        </div>
        <div class="item{{Request::is('admin/contest*')?' active':''}}">
            <i class="star icon left"></i>Contest <i class="angle up icon"></i>
            <div class="menu">
                <a class="item{{Request::is('admin/contest')?' active blue':''}}" href="/admin/contest"> List Contest</a>
                <a class="item{{Request::is('admin/contest/create')?' active blue':''}}" href="/admin/contest/create"> Add Contest</a>
            </div>
        </div>
        <div class="item{{Request::is('admin/clarification*')?' active':''}}">
            <i class="question icon left"></i>Clarification <i class="angle up icon"></i>
            <div class="menu">
                <a class="item{{Request::is('admin/clarification')?' active blue':''}}" href="/admin/clarification"> List Clarification</a>
                <a class="item" id="addclar"> Add Clarification</a>
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
                <div class="field">
                    <label>Content : </label>
                    <input name="content" placeholder="Content" type="text">
                </div>
                <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                <input type="hidden" value="0" name="to">
                <button class="ui primary button" type="submit">Submit</button>
            </form>
        </div>
    </div>

    @include('admin.navigator')
    <div style="margin-left: 18%;margin-right: 20px;margin-top: 0px;margin-bottom: 20px;">
        @yield('content')
    </div>
    <script>
        $('#addclar').click(function() {
            $('.ui.modal').modal('show');
        });

        $('.menu .icon').click(function(){
            $(this).parent().children().filter('div').slideToggle('slow');
            if($(this).hasClass('up')){
                $(this).removeClass('up');
                $(this).addClass('down');
            }
            else{
                $(this).removeClass('down');
                $(this).addClass('up');
            }
        });

    </script>
    @yield('script')
</body>
</html>