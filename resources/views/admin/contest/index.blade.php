@extends('admin.master')
@section('head')

@stop
@section('content')
    <div class="ui segment">
        <h3 class="ui header" style="margin: 10px !important;">Contest</h3>
        <div class="ui divider"></div>
        <table class="ui compact striped blue text-center table unstackable" id="contestTable">
            <thead><tr>
                <th class="one wide">No.</th>
                <th class="five wide">Name</th>
                <th class="two wide">Begin Time</th>
                <th class="two wide">Length</th>
                <th class="one wide">Status</th>
                <th class="three wide">Action</th>
            </tr></thead>
            <tbody>
            @foreach($contest as $c)
                <tr>
                    <td>{{$c->id}}</td>
                    <td><a href="">{{$c->name}}</a></td>
                    <td>{{$c->start_time}} <br> {{\Carbon\Carbon::parse($c->start_time)->DiffForHumans()}}</td>
                    <td>{{getContestLength($c->start_time,$c->end_time)}} Hours</td>
                    @if($c->visible)
                        <td><a class="ui green basic label">Active</a></td>
                    @else
                        <td><a class="ui red basic label">Not Active</a></td>
                    @endif
                    <td>
                        <div>
                            <a class="ui primary basic button" href="/contest/{{$c->id}}/edit" data-tooltip="Edit Contest"><i class="far fa-edit" style="color: blue"></i></a>
                            {{ Form::open(array('url' => 'contest/' . $c->id, 'style' => 'display:inline')) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                            <button class='ui red  basic button' type='submit' data-tooltip="Delete Contest"><i class="far fa-trash-alt" style="color:red"></i></button>
                            {{ Form::close() }}
                            <a class="ui green basic button" href="admin/contest/{{$c->id}}/add_problem" data-tooltip="Add Contest Problems"><i class="fas fa-plus" style="color: green"></i></a>
                        </div>
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
            $('#contestTable').DataTable();
        });
    </script>
@stop