@extends('admin.master')
@section('head')

@stop
@section('content')
    <div class="ui segment">
        <h3 class="ui header" style="margin: 10px !important;">Problems</h3>
        <div class="ui divider"></div>
        <table class="ui compact striped blue text-center table unstackable" id="problemTable">
            <thead>
                <tr>
                    <th class="one wide">#</th>
                    <th class="ten wide">Problem</th>
                    <th class="one wide">Total</th>
                    <th class="one wide">Submit</th>
                    <th class="three wide">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($problem as $p)
                <tr>
                    <td>
                        {{ $p->id }}
                    </td>
                    <td class="left aligned">
                        <a href="problems/{{$p->id}}" style="vertical-align: middle">{{ $p->title }}</a>
                    </td>
                    <td><a>{{$p->total_submit}}</a></td>
                    <td><a>{{$p->total_ac}}</a></td>
                    <td style="display:inline;padding: 0;">
                        <div>
                            <a class="ui basic blue button" href="problems/{{$p->id}}/edit" data-tooltip="Edit Problem"><i class="far fa-edit" style="color: blue"></i></a>
                            {{ Form::open(array('url' => 'problems/' . $p->id, 'style' => 'display:inline')) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                            <button class='ui basic red button' type='submit' data-tooltip="Delete Problem"><i class="far fa-trash-alt" style="color:red"></i></button>
                            {{ Form::close() }}
                            <a class="ui basic green button" href="problems/{{$p->id}}/testcase" data-tooltip="Add Testcase Problem"><i class="fas fa-plus" style="color: green"></i></a>
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
            $('#problemTable').DataTable();
        });
    </script>
@stop