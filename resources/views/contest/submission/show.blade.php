@extends('template.master')
@section('head')

@stop
@section('left-segment')
    <div class="ui piled segment">
        <h4 class="ui header">Contest {{$contest->name}}</h4>
        <div class="ui divider"></div>
        @include('contest.navigator')
    </div>
@stop
@section('right-segment')
    <div class="ui piled segment">
        <h4 class="ui header">Problem</h4>
        <div class="ui divider"></div>
        @include('contest.problem.contestproblem')
    </div>
@stop
@section('content')
    @include('contest.contestinfo')
@stop
@section('contest-only')
    <div class="ui container">
        <div class="ui horizontal divider"><i class="file icon"></i>  Submissions</div>
        <table class="ui celled padded single line table segment unstackable">
            <thead><tr>
                <th>User</th>
                <th>Problem ID</th>
                <th>Runtime</th>
                <th>Memory Usage</th>
                <th>Status</th>
                <th>Language</th>
                <th>Submit</th>
            </tr></thead>
            <tbody style="background-color:#eee"><tr>
                <td>{{$submission->user->real_name}}</td>
                <td>{{$submission->problem_id}}</td>
                <td>{{$submission->time}} s</td>
                <td>{{$submission->memory/1024.0}} MB</td>
                <td>{{get_verdict($submission->verdict)}}</td>
                <td>{{$submission->lang}}</td>
                <td>{{\Carbon\Carbon::parse($submission->created_at)->diffForHumans()}}</td>
            </tr></tbody>
        </table>
        <div class="ui horizontal divider"><i class="code icon"></i>  Kode</div>
        @if(Auth::user()!=null && (Auth::user()->id == $submission->user->id))
            <div id="codes"  style="font-family:Ubuntu\ Mono !important;font-size:12pt !important;">
                <div class="code" id="editor" data-theme="chrome" data-lang="c++"><?php echo htmlspecialchars($submission->codes()->code) ?></div>
            </div>
        @endif
        <div class="ui horizontal divider"><i class="code icon"></i>  Compile Result</div>
        @if(Auth::user()!=null && (Auth::user()->id == $submission->user->id))
            <div id="compile"  style="font-family:Ubuntu\ Mono !important;font-size:12pt !important;">
                <div class="ui segment code">
                    <pre style="overflow: auto;"><code><?php echo $submission->compile_result ?></code></pre>
                </div>
            </div>
        @endif
    </div>
@stop
@section('script')
    <script>
        $('.dropdown').dropdown()
    </script>
    <script src="/assets/editor/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
    <script src="/assets/editor.js" type="text/javascript" charset="utf-8"></script>
    <script>
        $(function(){
            var lang = $('#editor').attr('data-lang');
            var editor = ace.edit('editor');
            initialize_editor(editor, getLanguageClass(lang), $('#editor').attr('data-theme'));
            editor.setReadOnly(true);
            editor.setOptions({
                minLines: 5,
                maxLines: Infinity
            });
        })
        $("pre code").each(function(){
            var html = $(this).html();
            var pattern = html.match(/\s*\n[\t\s]*/);
            $(this).html(html.replace(new RegExp(pattern, "g"),'\n'));
        });
    </script>
@stop