<div class="ui piled segment">
    <div style="display: flex">
        <h4 class="ui header">Statistic</h4>
        <button class="ui right aligned basic primary button" style="margin-left: 72px;" id="detail">Details</button>
    </div>
    <div class="ui divider"></div>
    <canvas id="stat" width="400" height="400"></canvas>
</div>
<div class="ui mini modal" >
    <i class="close icon"></i>
    <div class="header">
        Statistic Detail
    </div>
    <div class="image content">
        <canvas id="stat2" width="400" height="400"></canvas>
    </div>
</div>
<script>
    $.ajax({
        type: "POST",
        url: '/api/v1/statistics/problems/{{$problem->id}}',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:function(data){
            console.log(data);
            var ctx = $("#stat");
            var donut = new Chart(ctx,{
                type:'doughnut',
                data:data
            });
        }
    });

    $('#detail').click(function(){
        $('.ui.modal').modal('show');
        $.ajax({
            type: "POST",
            url: '/api/v1/statistics/problems/{{$problem->id}}',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(data){
                console.log(data);
                var ctx = $("#stat2");
                var donut = new Chart(ctx,{
                    type:'doughnut',
                    data:data
                });
            }
        });
    })

</script>