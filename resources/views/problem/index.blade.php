@extends('template.master')
@section('head')

@stop

@section('left-segment')
    <div class="ui piled segment">
        <h4 class="ui header">Problem</h4>
        <div class="ui divider"></div>
    </div>
@stop
@section('right-segment')
    <div class="ui piled segment">
        <h4 class="ui header">Tags List</h4>
        <div class="ui divider"></div>
        @foreach($problemTag as $tag)
            <div class="ui tag label">
                {{$tag->name}}
            </div>
        @endforeach
    </div>
@stop
@section('content')
    <table class="ui compact striped blue text-center table unstackable" id="problemTable">
        <thead>
            <tr>
                <th class="one wide">#</th>
                <th class="ten wide">Problem</th>
                <th class="one wide">Total</th>
                <th class="one wide">Submit</th>
            </tr>
        </thead>
        <tbody>
        @foreach($problem as $p)
            <tr>
                <td>
                    {{ $p->id }}
                </td>
                <td class="left aligned">
                    <a href="{{ url('/problems/'.$p->id) }}" style="vertical-align: middle">{{ $p->title }}</a>
                </td>
                <td><a>{{$p->total_submit}}</a></td>
                <td><a>{{$p->total_ac}}</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
@section('script')
    <script>
        $('.dropdown').dropdown()
        $(document).ready(function(){
            $('#problemTable').DataTable();
        });
    </script>
@stop