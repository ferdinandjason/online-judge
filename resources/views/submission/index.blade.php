@extends('template.master')
@section('head')

@stop
@section('left-segment')
    <div class="ui piled segment">
        <h4 class="ui header">Submission</h4>
        <div class="ui divider"></div>
    </div>
@stop
@section('right-segment')
    <div class="ui piled segment">

    </div>
@stop
@section('content')
    <table class="ui striped blue table compact single line unstackable" id="submissionTable">
        <thead>
        <tr>
            <th style="width:7%;">No.</th>
            <th style="width:12%;">User</th>
            <th style="width:12%;">Problem</th>
            <th style="text-align:center">Status</th>
            <th style="width:10%;">Time</th>
            <th style="width:10%;">Memori</th>
            <th style="width:10%;">Bahasa</th>
            <th style="width:10%;">Waktu</th>
        </tr>
        </thead>
        <tbody>
        @foreach($submission as $solution)
            <tr>
                <td><a href="/submissions/{{$solution->id}}">{{ $solution->id }}</a></td>
                <td>
                    <a href="/user/{{ $solution->user->id }}">{{ $solution->user->real_name }}</a>
                </td>
                <td>
                    <a href="/problems/{{ $solution->problem_id }}">{{ $solution->problem_id }}</a>
                </td>
                @if(get_verdict($solution->status) == "ACCEPTED" || get_verdict($solution->status) == "WRONG ANSWER")
                    @if(get_verdict($solution->status) == "ACCEPTED")
                        <td style="color:green;text-align: center;">{{get_verdict($solution->status)}}</td>
                    @else
                        <td style="color:red;text-align: center;">{{get_verdict($solution->status)}}</td>
                    @endif
                    <td>{{number_format($solution->time, 2, ',', '')}} s</td>
                    <td>{{number_format((float)$solution->memory/1024.0,2, ',', '')}} MB</td>
                @else
                    @if(get_verdict($solution->status) == "RUN TIME ERROR")
                        <td style="color:yellow;text-align: center;">{{get_verdict($solution->status)}}</td>
                    @elseif($solution->status == "COMPILE ERROR")
                        <td style="text-align: center;">{{get_verdict($solution->status)}}</td>
                    @else
                        <td style="color:blue;text-align: center;">{{get_verdict($solution->status)}}</td>
                    @endif
                    <td>-</td>
                    <td>-</td>
                @endif
                <td>{{$solution->lang}}</td>
                <td>{{\Carbon\Carbon::parse($solution->created_at)->diffForHumans()}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
@section('script')
    <script>
        $('.dropdown').dropdown()
        $(document).ready(function(){
            $('#submissionTable').DataTable();
        });
    </script>
@stop