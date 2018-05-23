<div class="ui vertical menu">

    <a class="{{(Request::is('problems/*') && !Request::is('problems/*/submit') && !Request::is('problems/*/rank'))?'active ':''}}blue item" href="/problems/{{$problem->id}}">
        Description
        @if(Request::is('problems/*') && !Request::is('problems/*/submit') && !Request::is('problems/*/rank'))
            <div class="ui blue left pointing label">&nbsp;</div>
        @endif
    </a>
    <a class="{{(Request::is('problems/*/rank'))?'active ':''}}blue item" href="/problems/{{$problem->id}}/rank">
        Rank
        @if(Request::is('problems/*/rank'))
            <div class="ui blue left pointing label">&nbsp;</div>
        @endif
    </a>
    <a class="{{(Request::is('problems/*/submit'))?'active ':''}}blue item" href="/problems/{{$problem->id}}/submit">
        Submit
        @if(Request::is('problems/*/submit'))
            <div class="ui blue left pointing label">&nbsp;</div>
        @endif
    </a>
</div>