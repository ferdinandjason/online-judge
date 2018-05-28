@extends('admin.master')
@section('head')

@stop
@section('content')
    <?php
        $arrayContestProblem = [];
    ?>
    <div class="ui segment">
        <table class="ui compact striped text-center table unstackable">
            <thead><tr>
                <th class="six wide"><b>Alias<b></th>
                <th class="six wide"><b>Problems<b></th>
                <th><b>Keterangan<b></th>
            </tr></thead>
            @foreach($contestProblem as $cp)
                <tr> <td> {{$cp->alias}} </td><td>{{$cp->problem_id}}</td>
                    <td align="center">
                        {{ Form::open(array('url' => 'contest/' . $contest->id . '/problems/' . $cp->id, 'style' => 'display:inline')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        <button class='ui red small button' type='submit'><i class='fa fa-times-circle'></i> Delete</button>
                        {{ Form::close() }}
                    </td>
                </tr>
                <?php array_push($arrayContestProblem,$cp->problem_id) ?>
            @endforeach
        </table>
        <p><strong>Tambah Problem :</strong></p>
        {!! Form::open(array('action'=>array('ContestProblemController@store',$contest->id),'id'=>'form','class'=>'ui form')) !!}
        {!! Form::hidden('contest_id',$contest->id) !!}
        <div class="four fields">
            <div class="field">
                {{Form::text('alias',null,array('placeholder'=>'Alias'))}}
            </div>
        </div>
        <div class="four fields">
            <div class="field">
                <select class="ui fluid selection dropdown" name="problem_id" id="problem_id" value="">
                    <option value="-">- - -</option>
                    @foreach($problem as $p)
                        @if(!in_array($p->id,$arrayContestProblem))
                            <option value="{{$p->id}}">{{$p->id}} | {{$p->title}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        {!! Form::button('<i class="fa fa-plus-square"></i>'. '  Tambah Problem', array('type' => 'submit', 'class' => 'ui primary small button'))!!}
    </div>
@stop
@section('script')
    @include('template.editor')
    <script>
        $('.dropdown').dropdown()
        $('.ui.checkbox').checkbox();
    </script>
@stop