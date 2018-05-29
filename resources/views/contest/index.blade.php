@extends('template.master')
@section('head')

@stop
@section('left-segment')
    <div class="ui piled segment">
        <h4 class="ui header">Contest</h4>
        <div class="ui divider"></div>
        <div class="ui vertical menu">
            <a class="item" href="{{route('contest.index')}}?query=all">
                All Contest
            </a>
            <a class="item" href="{{route('contest.index')}}?query=active">
                Active Contest
            </a>
            <a class="item" href="{{route('contest.index')}}?query=past">
                Past Contest
            </a>
            <a class="item" href="{{route('contest.index')}}?query=my">
                My Participation
            </a>
        </div>
    </div>
@stop
@section('right-segment')
    @include('template.feedback')
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
            {{--{{dd(NotInsideCM($c->id,$contestMember))}}--}}
            @if(Request::get('query')=='my' && !NotInsideCM($c->id,$contestMember) == true)
                <tr>
                    <td>{{$c->id}}</td>
                    <td><a href="{{route('contest.show',$c->id)}}">{{$c->name}}</a>&nbsp;&nbsp;@if($c->visible)<button class="ui green basic label">Active</button>@else<button class="ui red basic label">Non-Active</button>@endif</td>
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
                            <a href="{{route('contest.show',$c->id)}}"><button class="ui basic blue button"><i class="fa fa-user-plus"></i> Masuk</button></a>
                        @endif
                    </td>
                </tr>
            @elseif(Request::get('query')=='my' && !NotInsideCM($c->id,$contestMember) == false)

            @else
                <tr>
                    <td>{{$c->id}}</td>
                    <td><a href="{{route('contest.show',$c->id)}}">{{$c->name}}</a>&nbsp;&nbsp;@if($c->visible)<button class="ui green basic label">Active</button>@else<button class="ui red basic label">Non-Active</button>@endif</td>
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
                            <a href="{{route('contest.show',$c->id)}}"><button class="ui basic blue button"><i class="fa fa-user-plus"></i> Masuk</button></a>
                        @endif
                    </td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
@stop
@section('script')
    <script>
        $('.dropdown').dropdown()
        $(document).ready(function(){
            //$('#contestTable').DataTable();
        });
    </script>
@stop