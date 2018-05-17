@extends('admin.master')
@section('head')

@stop
@section('content')
    <div class="ui segment">
        {!! Form::model($contest,['method'=>'PUT','action'=>['ContestController@update',$contest->id]]) !!}
        <div class="ui form">
            <div class="field{{($errors->has('name'))?' error':''}}">
                {!! Form::label('name','Nama Contest') !!}
                {!! Form::text('name',null,array('placeholder'=>'Nama Contest')) !!}
                @if ($errors->has('name'))
                    <p style="color:red"><strong>{{$errors->first('name')}}</strong><p>
                @endif
            </div>
            <div class="field{{($errors->has('announcement'))?' error':''}}">
                {!! Form::label('description','Announcement') !!}
                <textarea name="description" id="announcement" class="html-editor">
                             <p>Announcement Here</p>
                </textarea>
                @if ($errors->has('announcement'))
                    <p style="color:red"><strong>{{$errors->first('end_time')}}</strong><p>
                @endif
            </div>
            <div class="three fields">
                <div class="field{{($errors->has('start_time'))?' error':''}}">
                    {!! Form::label('start_time','Start Time') !!}
                    {!! Form::date('start_time',explode(' ',$contest->start_time)[0],array('placeholder'=>'Start Time')) !!}
                    {!! Form::time('start_time_',explode(' ',$contest->start_time)[1],array('placeholder'=>'Start Time')) !!}
                    @if ($errors->has('start_time'))
                        <p style="color:red"><strong>{{$errors->first('start_time')}}</strong><p>
                    @endif
                </div>
                <div class="field{{($errors->has('freeze_time'))?' error':''}}">
                    {!! Form::label('freeze_time','Freeze Time') !!}
                    {!! Form::date('freeze_time',explode(' ',$contest->freeze_time)[0],array('placeholder'=>'Freeze Time')) !!}
                    {!! Form::time('freeze_time_',explode(' ',$contest->freeze_time)[1],array('placeholder'=>'Freeze Time')) !!}
                @if ($errors->has('freeze_time'))
                        <p style="color:red"><strong>{{$errors->first('freeze_time')}}</strong><p>
                    @endif
                </div>
                <div class="field{{($errors->has('end_time'))?' error':''}}">
                    {!! Form::label('end_time','End Time') !!}
                    {!! Form::date('end_time',explode(' ',$contest->end_time)[0],array('placeholder'=>'End Time')) !!}
                    {!! Form::time('end_time_',explode(' ',$contest->end_time)[1],array('placeholder'=>'End Time')) !!}
                    @if ($errors->has('end_time'))
                        <p style="color:red"><strong>{{$errors->first('end_time')}}</strong><p>
                    @endif
                </div>
            </div>
            <div class="inline field">
                {!! Form::label('Active','Active ') !!}
                <div class="ui toggle checkbox{{($contest->active)?' checked':''}}" id="toogle">
                    <input name="visible" type="checkbox">
                </div>
            </div>
            <div style="display: flex;align-items: center;justify-content: center;margin:10px;">
                {!! Form::button('<i class="fa fa-plus-square"></i>'. '  Simpan Contest', array('type' => 'submit', 'class' => 'small ui primary button','style'=>'margin:4px'))!!}
                {!! Form::button('<i class="fa fa-times"></i>'. '  Reset Contest', array('type' => 'reset', 'class' => 'small ui red button','style'=>'margin:4px'))!!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@stop
@section('script')
    @include('template.editor')
    <script>
        var active = {{$contest->active}};

        if (active==1){
            $('.ui.checkbox').checkbox('check');
        }
        else{
            $('.ui.checkbox').checkbox('uncheck');
        }
        $('.dropdown').dropdown()
        $('.ui.checkbox').checkbox();
    </script>
@stop