<div class="ui vertical menu">
    @foreach($contestProblem as $p)
        <a class="{{(Request::is('contest/*/problems/'.$p->problem->id))?'active ':''}}blue item" href="/contest/{{$contest->id}}/problems/{{$p->problem->id}}">
            {{$p->alias}} - {{$p->problem->id}}
            @if(Request::is('contest/*/problems/'.$p->problem->id))
                <div class="ui blue left pointing label">&nbsp;</div>
            @endif
        </a>
    @endforeach
</div>