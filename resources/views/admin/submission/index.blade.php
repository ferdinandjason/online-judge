@extends('admin.master')
@section('head')

@stop
@section('content')
    <div class="ui segment">
        <h3 class="ui header" style="margin: 10px !important;">Submission List</h3>
        <div class="ui divider"></div>
        
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
                <th style="width:10%;">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($submission as $solution)
                <tr>
                    <td><a href="/submissions/{{$solution->id}}">{{ $solution->id }}</a></td>
                    <td>
                        <a href="{{route('user.show',$solution->user_id)}}">{{ $solution->user->real_name }}</a>
                    </td>
                    <td>
                        <a>{{ $solution->problem_id }}</a>
                    </td>
                    @if(get_verdict($solution->verdict) == "ACCEPTED" || get_verdict($solution->verdict) == "WRONG ANSWER")
                        @if(get_verdict($solution->verdict) == "ACCEPTED")
                            <td style="color:green;text-align: center;">{{get_verdict($solution->verdict)}}</td>
                        @else
                            <td style="color:red;text-align: center;">{{get_verdict($solution->verdict)}}</td>
                        @endif
                        <td>{{number_format($solution->time, 2, ',', '')}} s</td>
                        <td>{{number_format((float)$solution->memory/1024.0,2, ',', '')}} MB</td>
                    @else
                        @if(get_verdict($solution->verdict) == "RUN TIME ERROR")
                            <td style="color:yellow;text-align: center;">{{get_verdict($solution->verdict)}}</td>
                        @elseif($solution->status == "COMPILE ERROR")
                            <td style="text-align: center;">{{get_verdict($solution->verdict)}}</td>
                        @else
                            <td style="color:blue;text-align: center;">{{get_verdict($solution->verdict)}}</td>
                        @endif
                        <td>-</td>
                        <td>-</td>
                    @endif
                    <td>{{$solution->lang}}</td>
                    <td>{{\Carbon\Carbon::parse($solution->created_at)->diffForHumans()}}</td>
                    <td>
                        <a onclick="location.href='{{route('admin.submissions.regrade',$solution->id)}}'"><button class='ui basic purple button' data-tooltip="Regrade Submissions"><i class="fas fa-retweet" style="color: purple"></i></button></a>
                        {{ Form::open(array('route'=>['admin.submissions.destroy',$solution->id], 'style' => 'display:inline')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        <button class='ui red basic button' type='submit' data-tooltip="Delete Submissions"><i class="far fa-trash-alt" style="color:red"></i></button>
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
@section('script')
    <script>
        $('.dropdown').dropdown()
        $(document).ready(function(){
            $('#submissionTable').DataTable();
        });
    </script>
@stop