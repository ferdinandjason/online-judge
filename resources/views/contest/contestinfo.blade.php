<div class="ui grid">
    <div class="row" style="text-align: center;">
        <div class="four wide column"><strong>Begin :</strong> {{$contest->start_time}}</div>
        <div class="eight wide column"><h3 class="ui header">{{$contest->name}}</h3></div>
        <div class="four wide column"><strong>End :</strong> {{$contest->end_time}}</div>
    </div>
    <div class="row">
        <div class="sixteen wide column">
            <div class="ui indicating progress" data-percent="{{getCurrentPercentageTime($contest->start_time,$contest->end_time)}}" id="progress">
                <div class="bar"></div>
                <div class="label" id="contestLabel">Contest Progress</div>
            </div>
        </div>
    </div>
    <div class="row" style="text-align: center;">
        <div class="four wide column" id="elapsed"><strong>Elapsed :</strong> </div>
        <div class="eight wide column"> </div>
        <div class="four wide column" id="remaining"><strong>Remaining :</strong> </div>
    </div>
</div>
<script>
    function updateLabelTime(){
        let a = $('#progress').progress('get percent');
        if(a==100){
            $('#contestLabel').text('Contest Ended');
        }
        else{
            $('#contestLabel').text('Contest Running');
        }
    }

    function updateContestTime(){
        let a = $('#progress').progress('get percent');
        if(a==100){
            updateLabelTime();
            return;
        }
        $.ajax({
            type: "POST",
            url: '/api/v1/statistics/contest/percent/{{$contest->id}}',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(data){
                $('#progress').progress({percent:data});
            }
        });
        $.ajax({
            type: "POST",
            url: '/api/v1/statistics/contest/elapsed/{{$contest->id}}',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(data){
                $('#elapsed').html('<strong>Elapsed :</strong> '+data+' minutes');
            }
        });
        $.ajax({
            type: "POST",
            url: '/api/v1/statistics/contest/remaining/{{$contest->id}}',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(data){
                $('#remaining').html('<strong>Remaining :</strong> '+data+' minutes left');
            }
        });
        updateLabelTime();
    }

    function update(){
        updateContestTime();
        setTimeout(update,1000);
    }

    update();
</script>