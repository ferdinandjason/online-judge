@extends('template.master')
@section('head')

@stop
@section('left-segment')
    <div class="ui piled segment">
        <h4 class="ui header">Submission</h4>
        <div class="ui divider"></div>
        <div class="ui vertical menu">
            <a class="item" id="self">
                My Submission
            </a>
            <a class="item" id="self_ac">
                Accepted Submission
            </a>
        </div>
    </div>
@stop
@section('right-segment')
    @include('template.feedback')
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
            <th style="width:10%;">Bahasa</th>
            <th style="width:10%;">Waktu</th>
        </tr>
        </thead>
        <tbody>
        @foreach($submission as $solution)
            <tr>
                <td><a href="{{route('submission.show',$solution->id)}}">{{ $solution->id }}</a></td>
                <td>
                    <a href="{{route('user.show',$solution->user_id)}}">{{ $solution->user->real_name }}</a>
                </td>
                <td>
                    <a href="{{route('problem.show',$solution->problem_id)}}">{{ $solution->problem_id }}</a>
                </td>
                @if(get_verdict($solution->verdict) == "ACCEPTED" || get_verdict($solution->verdict) == "WRONG ANSWER")
                    @if(get_verdict($solution->verdict) == "ACCEPTED")
                        <td style="color:green;text-align: center;">{{get_verdict($solution->verdict)}}</td>
                    @else
                        <td style="color:red;text-align: center;">{{get_verdict($solution->verdict)}}</td>
                    @endif
                    <td>{{number_format($solution->time, 2, ',', '')}} s</td>
                @else
                    @if(get_verdict($solution->verdict) == "RUN TIME ERROR")
                        <td style="color:yellow;text-align: center;">{{get_verdict($solution->verdict)}}</td>
                    @elseif($solution->status == "COMPILE ERROR")
                        <td style="text-align: center;">{{get_verdict($solution->verdict)}}</td>
                    @else
                        <td style="color:blue;text-align: center;">{{get_verdict($solution->verdict)}}</td>
                    @endif
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
        let submission;
        $('.dropdown').dropdown()
        $(document).ready(function(){
            submission = $('#submissionTable').DataTable({
                "order": [[ 1, "desc" ]]
            });
        });
        $('#self').click(function(){
            submission.search('{{Auth::user()->real_name}}').draw();
        });
        $('#self_ac').click(function(){
            submission.search('ACCEPTED').draw();
        });
    </script>
@stop