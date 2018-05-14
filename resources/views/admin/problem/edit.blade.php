@extends('admin.master')
@section('head')

@stop
@section('content')
    <div class="ui segment">
        {!! Form::model($problem,['method'=>'PUT','action'=>['ProblemController@update',$problem->id]]) !!}
        <div class="ui form">
            <div class="four fields">
                <div class="field{{($errors->has('id'))?' error':''}}">
                    {!! Form::label('id','Problem ID') !!}
                    {!! Form::text('id',null,array('placeholder'=>'Problem ID')) !!}
                    @if ($errors->has('id'))
                        <p style="color:red"><strong>{{$errors->first('problem_id')}}</strong><p>
                    @endif
                </div>
                <div class="field{{($errors->has('title'))?' error':''}}">
                    {!! Form::label('title','Problem Title') !!}
                    {!! Form::text('title',null,array('placeholder'=>'Problem Title')) !!}
                    @if ($errors->has('problem_title'))
                        <p style="color:red"><strong>{{$errors->first('problem_title')}}</strong><p>
                    @endif
                </div>
                <div class="field{{($errors->has('time_limit'))?' error':''}}">
                    {!! Form::label('time_limit','Time Limit') !!}
                    <div class="ui right labeled input">
                        {!! Form::text('time_limit',null,array('placeholder'=>'Time Limit')) !!}
                        <div class="ui basic label"><div class="text">s</div></div>
                    </div>
                    @if ($errors->has('time_limit'))
                        <p style="color:red"><strong>{{$errors->first('time_limit')}}</strong><p>
                    @endif
                </div>
                <div class="field{{($errors->has('memory_limit'))?' error':''}}">
                    {!! Form::label('memory_limit','Memory Limit') !!}
                    <div class="ui right labeled input">
                        {!! Form::text('memory_limit',null,array('placeholder'=>'Memory Limit')) !!}
                        <div class="ui basic label"><div class="text">MB</div></div>
                    </div>
                    @if ($errors->has('memory_limit'))
                        <p style="color:red"><strong>{{$errors->first('memory_limit')}}</strong><p>
                    @endif
                </div>
            </div>
        </div>
        <br>
        <div class="ui form">
            <div class="field{{($errors->has('description'))?' error':''}}">
                {!! Form::label('description','Problems description') !!}
                <textarea name="description" id="description" class="html-editor">
                            <p>Deskripsi Soal</p>
                            <p style="text-align: center;"><strong>Format Input</strong></p>
                            <br>
                            <p>Diberikan sebuah bilangan T yang melambangkan Testcase</p>
                            <br>
                            <p style="text-align: center;"><strong>Format Output</strong></p>
                            <br>
                            <p>Untuk setiap testcase </p>
                            <br>
                            <p style="text-align: center;"><strong>Constraint</strong></p>
                            <br><br>
                            <p style="text-align: center;"><strong>Explanation</strong></p>
                            <br><br>
                    </textarea>
                @if ($errors->has('description'))
                    <p style="color:red"><strong>{{$errors->first('description')}}</strong><p>
                @endif
            </div>
        </div>
        <br>
        <div class="ui form">
            <div class="two fields">
                <div class="field">
                    {!! Form::label('sample_input','Sample Input') !!}
                    {!! Form::textarea('sample_input',null,array('placeholder'=>'Sample Input')) !!}
                    @if ($errors->has('sample_input'))
                        <p style="color:red"><strong>{{$errors->first('sample_input')}}</strong><p>
                    @endif
                </div>
                <div class="field">
                    {!! Form::label('sample_output','Sample Output') !!}
                    {!! Form::textarea('sample_output',null,array('placeholder'=>'Sample Output')) !!}
                    @if ($errors->has('sample_output'))
                        <p style="color:red"><strong>{{$errors->first('sample_output')}}</strong><p>
                    @endif
                </div>
            </div>
        </div>
        <br>
        <?php
        $temp = Array();
        foreach($problem->tags as $t){

            array_push($temp,$t->name);
        }
        $string = join(",",$temp);
        ?>
        <div class="ui form">
            <div class="fields">
                <div class="two wide field">
                    {!! Form::label('active','Public') !!}
                    <div class="ui toggle checkbox">
                        <input name="active" type="checkbox">
                    </div>
                </div>
                <div class="fourteen wide field{{($errors->has('tags'))?' error':''}}">
                    {!! Form::label('tags','Tag') !!}
                    {!! Form::text('tags',$string,array('placeholder'=>'Tags (Jika tag lebih dari 1, pisahkan dengan tanda koma)')) !!}
                    @if ($errors->has('tags'))
                        <p style="color:red"><strong>{{$errors->first('Tags')}}</strong><p>
                    @endif
                </div>
            </div>
        </div>
        <div style="display: flex;align-items: center;justify-content: center;margin:10px;">
            {!! Form::button('<i class="fa fa-plus-square"></i>'. '  Simpan Problem', array('type' => 'submit', 'class' => 'small ui primary button','style'=>'margin:4px'))!!}
            {!! Form::button('<i class="fa fa-times"></i>'. '  Reset Problem', array('type' => 'reset', 'class' => 'small ui red button','style'=>'margin:4px'))!!}
        </div>
        {!! Form::close()!!}
    </div>
@stop
@section('script')
    @include('template.editor')
    <script>
        $('.dropdown').dropdown();
        $('.checkbox').checkbox();
        $(document).ready(function(){
            $('#problemTable').DataTable();
        });
        var active = {{$problem->contest_only}};
        if (active==1){
            $('.ui.checkbox').checkbox('check');
        }
        else{
            $('.ui.checkbox').checkbox('uncheck');
        }
    </script>
@stop