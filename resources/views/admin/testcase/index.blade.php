@extends('admin.master')
@section('head')

@stop
@section('content')
    <div class="ui segment">
        <h3 class="ui header" style="margin: 10px !important;">Problems {{$problem->title}} Testcase</h3>
        <div class="ui divider"></div>
        <table class="ui compact striped text-center table unstackable">
            <thead><tr>
                <th class="six wide"><b>Testcase In<b></th>
                <th class="six wide"><b>Testcase Out<b></th>
                <th><b>Keterangan<b></th>
            </tr></thead>
            @foreach($tc as $t)
                <tr> <td> <a href={{asset('storage/'.$t->path_input)}}> {{$t->path_input }}<a> </td> <td> <a href={{asset('storage/'.$t->path_output)}}> {{$t->path_output}} </a></td>
                    <td align="center">
                        {{ Form::open(array('url' => 'problems/' . $t->problem_id . '/testcase/' . $t->tid, 'style' => 'display:inline')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        <button class='ui red small button' type='submit'><i class='fa fa-times-circle'></i> Delete</button>
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
            {!! Form::open(array('action'=>array('TestcaseController@store',$problem->id),'files'=>'true')) !!}
            <tr> <td>{{Form::file('input',null,array('placeholder'=>'input'))}} </td>
                <td>{{Form::file('output',null,array('placeholder'=>'output'))}}</td>
                <td>{!! Form::button('<i class="fa fa-plus-square"></i>'. '   Simpan Testcase', array('type' => 'submit', 'class' => 'ui primary small button'))!!}</td>
            </tr>
        </table>
    </div>

@stop
@section('script')
    <script>
        $('.dropdown').dropdown();
    </script>
@stop