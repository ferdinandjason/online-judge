<div class="ui vertical menu">
    @if(\Carbon\Carbon::parse($contest->start_time)->diffInSeconds(\Carbon\Carbon::now(),false)>=0)
        @foreach($contestProblem as $p)
            <a class="{{(Request::is('contest/*/problems/'.$p->problem->id))?'active ':''}}blue item" href="{{route('contest.problem.show',[$contest->id,$p->problem_id])}}">
                {{$p->alias}} - {{$p->problem->id}}
                @if(Request::is('contest/*/problems/'.$p->problem->id))
                    <div class="ui blue left pointing label">&nbsp;</div>
                @endif
            </a>
        @endforeach
    @else
        <a class="blue item">
            No Problem's Added Yet.
        </a>
    @endif
</div>
<div class="ui vertical menu" id="clar">
    <a class="item"> Make Clarification</a>
</div>


<div class="ui mini modal" >
    <i class="close icon"></i>
    <div class="header">
        Make Clarification
    </div>
    <div class="image content">
            <form class="ui form" method="POST" action="{{route('clarification.store',$contest->id)}}">
                    {{csrf_field()}}
                    <div class="field">
                            <label>Title : </label>
                            <input name="title" placeholder="Clarification Title" type="text">
                    </div>
                    <div class="field">
                            <label>Content : </label>
                            <input name="content" placeholder="Content" type="text">
                    </div>
                    <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                    <input type="hidden" value="{{$contest->id}}" name="contest_id">
                    <input type="hidden" value="1" name="to">
                    <button class="ui primary button" type="submit">Submit</button>
            </form>
    </div>
</div>

<script>
    $('#clar').click(function() {
        $('.ui.modal').modal('show');
    });
</script>