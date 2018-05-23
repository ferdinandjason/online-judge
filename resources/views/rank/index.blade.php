@extends('template.master')
@section('head')

@stop

@section('left-segment')
    @include('rank.navigator')
@stop
@section('right-segment')
    @include('template.feedback')
@stop
@section('content')
    <table class="ui compact striped blue text-center table unstackable" id="problemTable">
        <thead>
            <tr>
                <th class="one wide">#</th>
                <th class="nine wide">Username</th>
                <th class="two wide">Total Accepted</th>
                <th class="two wide">Total Submission</th>
                <th class="two wide">Percentage</th>
            </tr>
        </thead>
        <tbody>
        
        </tbody>
    </table>
@stop
@section('script')
    <script>
        let problem;
        $('.dropdown').dropdown()
        $(document).ready(function(){
            problem = $('#problemTable').DataTable();
        });
    </script>
@stop