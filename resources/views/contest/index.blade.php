@extends('template.master')
@section('head')

@stop
@section('left-segment')
    <div class="ui piled segment">
        <h4 class="ui header">Contest</h4>
        <div class="ui divider"></div>
    </div>
@stop
@section('right-segment')
    <div class="ui piled segment">
        <h4 class="ui header">Feedback <i class="child icon"></i></h4>
        <div class="ui divider"></div>
        <p>
            Happy with our services?<br>
            Found a bug in our services?<br>
            Want to help improve the awesomes?<br>
            <br>
            Send your feedback to : <br>
            <i class="mail icon"></i> <strong>ferdinandjasong@gmail.com</strong>
            <i class="mail icon"></i> <strong>vinsensiusindra@gmail.com</strong>
            <i class="mail icon"></i> <strong>fwildanf@gmail.com</strong>
        </p>
    </div>
@stop
@section('content')
    <table class="ui compact striped blue text-center table unstackable" id="contestTable">
        <thead><tr>
            <th class="one wide">No.</th>
            <th class="five wide">Name</th>
            <th class="two wide">Begin Time</th>
            <th class="two wide">Length</th>
            <th class="one wide">People</th>
            <th class="three wide">Join</th>
        </tr></thead>
        <tbody>
        @foreach($contest as $c)
            <tr>
                <td>{{$c->id}}</td>
                <td><a href="/contest/{{$c->id}}">{{$c->name}}</a></td>
                <td>{{$c->start_time}} <br> {{\Carbon\Carbon::parse($c->start_time)->DiffForHumans()}}</td>
                <td>{{getContestLength($c->start_time,$c->end_time)}} Hours</td>
                <td><i class="user icon"></i>{{countPeopleJoin($c->id)}}</td>
                <td>
                    @if(NotInsideCM($c->id,$contestMember))
                        {!! Form::open(['action'=>'ContestMemberController@store']) !!}
                        {!! Form::hidden('contest_id',$c->id) !!}
                        {!! Form::hidden('user_id',Auth::user()->id) !!}
                        {!! Form::button('<i class="fa fa-user-plus"></i>'. ' Join', array('type' => 'submit', 'class' => 'small ui primary button','style'=>'margin:4px'))!!}
                        {!! Form::close() !!}
                    @else
                        <a href="/contest/{{$c->id}}"><button class="ui basic blue button"><i class="fa fa-user-plus"></i> Masuk</button></a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
@section('script')
    <script>
        $('.dropdown').dropdown()
        $(document).ready(function(){
            $('#contestTable').DataTable();
        });
    </script>
@stop