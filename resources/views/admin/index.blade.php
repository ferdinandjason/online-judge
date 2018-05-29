@extends('admin.master')
@section('head')
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: calc(100vh - 126px);
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
@stop
@section('content')
    <div class="ui segment">
        <div class="flex-center position-ref full-height">
            <div class="content">
                <img class="ui centered small image" src="/images/logo.png" style="margin-top: 25px;margin-bottom: 25px;">
                <div class="title m-b-md">
                    Welcome to Moe Online Judge, {{Auth::user()->real_name}}!
                </div>

                <div class="links">
                    <a href="{{route('admin.problems.index')}}">Problems</a>
                    <a href="{{route('admin.submissions.index')}}">Submission</a>
                    <a href="{{route('admin.contest.index')}}">Contest</a>
                    <a href="{{route('admin.clarification.admin.index')}}">Clarification</a>
                    {{--<a href="https://github.com/laravel/laravel">GitHub</a>--}}
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script>
        $('.dropdown').dropdown()
        $(document).ready(function(){
            $('#problemTable').DataTable();
        });
    </script>
@stop