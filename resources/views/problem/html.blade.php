<h1 style="text-align: center;">{{$problem->id}} - {{$problem->title}}</h1>
<style>
    .bold{
        font-weight: 900;
    }
</style>
<table align="center">
    <thead><tr>
        <th>Time Limit</th>
        <th>Memory Limit</th>
        <th>Accepted</th>
        <th>Submited</th>
    </tr></thead>
    <tbody><tr>
        <td>{{ $problem->time_limit }} s</td>
        <td>{{ $problem->memory_limit }} MB</td>
        <td>{{ $problem->total_ac }}</td>
        <td>{{ $problem->total_submit }}</td>
    </tr></tbody>
</table>

<div id="problem">
    <div class="bold">Deskripsi Soal</div>
    <div class="context">
        <?php
        echo $problem->description;
        ?>
    </div>
    <div class="bold">Contoh Input</div>
    <pre>{{ $problem->sample_input }}</pre>
    <div class="bold">Contoh Output</div>
    <pre>{{ $problem->sample_output }}</pre>
    </div>
</div>