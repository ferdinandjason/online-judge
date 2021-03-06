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
            <img class="ui centered tiny image" src="{{asset('images/logo.png')}}" style="margin-top: 25px;margin-bottom: 25px;">
        </div>
        <div class="item{{(Request::is('admin') || Request::is('admin/general'))?' active':''}}">
            <i class="clone outline icon left"></i>Dashboard <i class="angle up icon"></i>
            <div class="menu">
                <a class="item{{Request::is('admin')?' active blue':''}}" href="{{route('admin.index')}}"> Dashboard</a>
                <a class="item{{Request::is('admin/general')?' active blue':''}}" href="{{route('admin.general')}}"> General</a>
            </div>
        </div>
        <div class="item{{Request::is('admin/problem*')?' active':''}}">
            <i class="clone outline icon left"></i>Problem <i class="angle up icon"></i>
            <div class="menu">
                <a class="item{{Request::is('admin/problems')?' active blue':''}}" href="{{route('admin.problems.index')}}"> List Problem</a>
                <a class="item{{Request::is('admin/problems/create')?' active blue':''}}" href="{{route('admin.problems.create')}}"> Add Problem</a>
            </div>
        </div>
        <div class="item{{Request::is('admin/submissions*')?' active':''}}">
            <i class="file icon left"></i>Submission <i class="angle up icon"></i>
            <div class="menu">
                <a class="item{{Request::is('admin/submissions')?' active blue':''}}" href="{{route('admin.submissions.index')}}"> List Submission</a>
            </div>
        </div>
        <div class="item{{Request::is('admin/contest*')?' active':''}}">
            <i class="star icon left"></i>Contest <i class="angle up icon"></i>
            <div class="menu">
                <a class="item{{Request::is('admin/contest')?' active blue':''}}" href="{{route('admin.contest.index')}}"> List Contest</a>
                <a class="item{{Request::is('admin/contest/create')?' active blue':''}}" href="{{route('admin.contest.create')}}"> Add Contest</a>
            </div>
        </div>
        <div class="item{{Request::is('admin/clarification*')?' active':''}}">
            <i class="question icon left"></i>Clarification <i class="angle up icon"></i>
            <div class="menu">
                <a class="item{{Request::is('admin/clarification')?' active blue':''}}" href="{{route('admin.clarification.admin.index')}}"> List Clarification</a>
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
            <form class="ui form" method="POST" action="{{route('admin.clarification.admin.store')}}">
                {{csrf_field()}}
                <div class="field{{($errors->has('title'))?' error':''}}">
                    <label>Title : </label>
                    <input name="title" placeholder="Clarification Title" type="text">
                    @if ($errors->has('title'))
                        <p style="color:red"><strong>{{$errors->first('title')}}</strong></p>
                    @endif
                </div>
                <label>Contest : </label>
                <div class="field{{($errors->has('contest_id'))?' error':''}}">
                    <div class="ui selection dropdown">
                        <input name="contest_id" type="hidden">
                        @if ($errors->has('contest_id'))
                        <p style="color:red"><strong>{{$errors->first('contest_id')}}</strong></p>
                        @endif
                        <i class="dropdown icon"></i>
                        <div class="default text"> - </div>
                        @if(!strpos($_SERVER['REQUEST_URI'], 'add') && !strpos($_SERVER['REQUEST_URI'], 'edit'))
                            <div class="menu">
                                @foreach($contest as $c)
                                    <div class="item" data-value="{{$c->id}}">{{$c->name}}</div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                <div class="field{{($errors->has('content'))?' error':''}}">
                    <label>Content : </label>
                    <input name="content" placeholder="Content" type="text">
                    @if ($errors->has('content'))
                    <p style="color:red"><strong>{{$errors->first('content')}}</strong></p>
                    @endif
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