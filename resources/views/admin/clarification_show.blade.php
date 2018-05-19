@extends('admin.master')
@section('head')

@stop
@section('content')
    <div class="ui segment">
        <h3 class="ui header" style="margin: 10px !important;">Clarification {{$clarification->id}}</h3>
        <div class="ui divider"></div>
        <div class="ui form">
            <div class="field">
                <label>Title : </label>
                <input value="{{$clarification->title}}">
            </div>
            <div class="field">
                <label>Content : </label>
                <input value="{{$clarification->content}}">
            </div>
        </div>
    </div>
@stop
@section('script')
    <script>
        $('.dropdown').dropdown()
        $(document).ready(function(){
            $('#clarificationTable').DataTable();
        });
    </script>
@stop