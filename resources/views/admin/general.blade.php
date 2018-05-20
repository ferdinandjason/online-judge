@extends('admin.master')
@section('head')
    <style>
        .statistic{
            margin-left: 115px !important;
            margin-right: 80px !important;
        }
    </style>
@stop
@section('content')
    <div class="ui segment">
        <div style="display: flex">
            <h3 class="ui header" style="margin: 10px !important;width: 80%">Online Judge Status</h3>
            <div style="float:right;display: flex">
                <button class="ui positive basic button"> STATUS </button><h3 class="ui header" style="margin: 10px !important;width: 80%"> : </h3>
                @if(!App::runningInConsole())
                    <button class="ui primary basic button"> Normal </button>
                @else
                    <button class="ui negative basic button"> Abnormal </button>
                @endif
            </div>
        </div>
        <div class="ui divider"></div>
        <div class="ui statistics">
            <div class="statistic">
                <div class="value">
                    {{count(App\User::all())}}
                </div>
                <div class="label">
                    Members
                </div>
            </div>
            <div class="statistic">
                <div class="value">
                    {{count(App\Problem::all())}}
                </div>
                <div class="label">
                    Problems
                </div>
            </div>
            <div class="statistic">
                <div class="value">
                    {{count(App\Submission::all())}}
                </div>
                <div class="label">
                    Submission
                </div>
            </div>
            <div class="statistic">
                <div class="value">
                    {{count(App\Contest::all())}}
                </div>
                <div class="label">
                    Contest
                </div>
            </div>
        </div>

    </div>

    <div class="ui segment">
        <h3 class="ui header" style="margin: 10px !important;">Server Status</h3>
        <div class="ui divider"></div>
        <table class="ui compact text-center table sigle line" id="problemTable">
            <thead>
            <tr>
                <th class="one wide">#</th>
                <th class="one wide">Status</th>
                <th class="one wide">CPU Usage</th>
                <th class="one wide">Memory Usage</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$_SERVER['REMOTE_ADDR']}}:80</td>
                    <td>
                        @if(sys_getloadavg()[0]>0.8)
                            <button class="ui negative basic button"> Heavy </button>
                        @elseif(sys_getloadavg()[0]>0.3)
                            <button class="ui primary basic button"> Normal </button>
                        @else
                            <button class="ui positive basic button"> Easy </button>
                        @endif
                    </td>
                    <td>{{sys_getloadavg()[0]*100}} % </td>
                    <td>{{memory_get_usage()/(1024)}} MB </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="ui segment">
        <h3 class="ui header" style="margin: 10px !important;">Judge Status</h3>
        <div class="ui divider"></div>
        <table class="ui compact text-center table sigle line" id="problemTable">
            <thead>
            <tr>
                <th class="one wide">#</th>
                <th class="one wide">Status</th>
                <th class="one wide">CPU Usage</th>
                <th class="one wide">Memory Usage</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$_SERVER['REMOTE_ADDR']}}</td>
                <td>
                    <button class="ui negative basic button"> OFF </button>
                </td>
                <td> - </td>
                <td> - </td>
            </tr>
            </tbody>
        </table>
    </div>
@stop
@section('script')
    <script>
        $('.dropdown').dropdown()
    </script>
@stop