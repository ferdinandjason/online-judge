@extends('template.master')
@section('head')
    <link href='https://fonts.googleapis.com/css?family=Consolas' rel='stylesheet'>
@stop
@section('left-segment')
    <div class="ui piled segment">
        <h4 class="ui header">Problem {{$problem->title}}</h4>
        <div class="ui divider"></div>
        @include('problem.navigator')
    </div>
    <div class="ui piled segment">
        <h4 class="ui header">Export Problem</h4>
        <div class="ui divider"></div>
        <div class="ui labeled button" tabindex="0" style="margin: 2px;">
            <div class="ui button">
                <i class="file excel outline icon"></i> Export to
            </div>
            <a class="ui basic left pointing label">
                CSV
            </a>
        </div>
        <div class="ui labeled button" tabindex="0" style="margin: 2px;">
            <div class="ui button">
                <i class="file alternate outline icon"></i> Export to
            </div>
            <a class="ui basic left pointing label">
                HTML
            </a>
        </div>
    </div>
@stop
@section('right-segment')
    <div class="ui piled segment">
        <h4 class="ui header">Tags</h4>
        <div class="ui divider"></div>
        @foreach($problem->tags as $tag)
            <div class="ui tag label">
                {{$tag->name}}
            </div>
        @endforeach
    </div>
    <div class="ui piled segment">
        <h4 class="ui header">Statistic</h4>
        <div class="ui divider"></div>

    </div>
@stop
@section('content')
    <?php
        $array_lang = ['C++','C'];
        $theme = ['chrome'=>'Chrome','monokai'=>'Monokai','solarized_dark'=>'Solarized Dark'];
    ?>
    {!! Form::open(['url' => action('SubmissionController@store'), 'class' => 'ui form submit']) !!}

    <div class="ui stackable grid">
        <div class="two wide column field column-label">Bahasa</div>
        <div class="six wide column field">
            {!! Form::select('lang', $array_lang, 'C++', ['class' => 'ui search selection dropdown','id'=>'text']) !!}
        </div>
        <div class="two wide column field column-label">Theme</div>
        <div class="six wide column field">
            {!! Form::select('theme', $theme, 'chrome', ['class' => 'ui search selection dropdown','id'=>'theme']) !!}
        </div>
    </div>
    <div class="ui stackable grid">
        <div class="two wide column field column-label">Source Code</div>
        <div class="fourteen wide column field inline">
            <div class="sendiri">
                <div id="editor" class="code" data-theme="chrome" style="font-family:'Ubuntu Mono'"></div>
                <div class="ui divider hidden"></div>
                {!! Form::submit('Submit', ['class' => 'ui blue button']) !!}
            </div>
        </div>
    </div>
    {!! Form::textarea('codes', old('code'), ['style'=>'display:none;']) !!}
    {!! Form::hidden('problem_id', $problem->problem_id) !!}
    {!! Form::hidden('user_id', Auth::user()->id) !!}
    {!! Form::close() !!}
@stop
@section('script')
    <script>
        $('.dropdown').dropdown()
        $(document).ready(function(){
            $('#problemTable').DataTable();
        });
    </script>
    <script src="/assets/editor/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
    <script src="/assets/editor.js" type="text/javascript" charset="utf-8"></script>
    <script>
        $('#theme').change(function () {
            var theme = $('#theme').val();
            $('#editor').attr('data-theme',theme);
            console.log('1');
            $(function(){
                ace.require("ace/ext/language_tools");
                var langSel = $('select[name=lang]');
                var selected = function(sel){ return sel.find('option')[sel.val()].text; };
                var editor = ace.edit('editor');
                initialize_editor(editor, getLanguageClass(selected(langSel)), $('#editor').attr('data-theme'));
                langSel.on('change', function(){
                    editor.session.setMode( 'ace/mode/' + getLanguageClass(selected(langSel)) );
                });
                $('form.submit').on('submit', function(){
                    $('textarea[name=codes]').val(editor.getValue());
                });
                var oldCode = $('textarea[name=codes]').val();
                editor.getSession().setValue(oldCode);
            });
            console.log('2');

        });

        $(function(){
            ace.require("ace/ext/language_tools");
            var langSel = $('select[name=lang]');
            var selected = function(sel){ return sel.find('option')[sel.val()].text; };
            var editor = ace.edit('editor');
            initialize_editor(editor, getLanguageClass(selected(langSel)), $('#editor').attr('data-theme'));
            langSel.on('change', function(){
                editor.session.setMode( 'ace/mode/' + getLanguageClass(selected(langSel)) );
            });
            $('form.submit').on('submit', function(){
                $('textarea[name=codes]').val(editor.getValue());
            });
            var oldCode = $('textarea[name=codes]').val();
            editor.getSession().setValue(oldCode);
        })

    </script>
@stop