@extends('admin.master')
@section('head')

@stop
@section('content')
    <div class="ui segment">
        <h3 class="ui header" style="margin: 10px !important;">Clarification</h3>
        <div class="ui divider"></div>
        <table class="ui striped blue table compact single line unstackable" id="clarificationTable">
            <thead>
            <tr>
                <th class="one wide">No.</th>
                <th class="two wide">To</th>
                <th class="two wide">Title</th>
                <th class="">Content</th>
                <th class="two wide">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clarification as $clar)
                <tr>
                    <td><a>{{ $clar->id }}</a></td>
                    <td>
                        <button class="ui negative basic button">Administrator</button>
                    </td>
                    <td>
                        {{$clar->title}}
                    </td>
                    <td>
                        {{$clar->content}}
                    </td>
                    <td>
                        <a href="{{route('admin.clarification.admin.show',$clar->id)}}"><button class="ui primary basic button" onclick="show({{$clar->id}})">Detail</button></a>
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
            $('#clarificationTable').DataTable();
        });
    </script>
@stop