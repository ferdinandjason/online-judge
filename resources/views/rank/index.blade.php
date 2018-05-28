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
    <table class="ui compact striped blue text-center table unstackable" id="rankTable">
        <thead>
            <tr>
                <th class="one wide">#</th>
                <th class="nine wide">Name</th>
                <th class="two wide">Total Accepted</th>
                <th class="two wide">Total Submission</th>
                <th class="two wide">Percentage</th>
            </tr>
        </thead>
        <tbody>
        @foreach($user as $u)
            <tr>
                <?php
                    try{
                        $percent = ($u->total_ac*100)/($u->total_submission-$u->total_ac);
                    }
                    catch (Exception $e){
                        $percent = 0;
                    }
                ?>
                <td>{{$u->id}}</td>
                <td>{{$u->real_name}}</td>
                <td>{{$u->total_ac}}</td>
                <td>{{$u->total_submission}}</td>
                <td>{{$percent}}%</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
@section('script')
    <script>
        let problem;
        $('.dropdown').dropdown()
        let rank;
        rank = $('#rankTable').DataTable();
        rank.on( 'order.dt search.dt', function () {
            rank.column(0).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();
    </script>
@stop