<div class="ui vertical menu">
    <a class="{{(Request::is('contest/*') && !Request::is('contest/*/problems*') && !Request::is('contest/*/submission*') && !Request::is('contest/*/scoreboard') && !Request::is('contest/*/clarification*'))?'active ':''}}blue item" href="/contest/{{$contest->id}}">
        Home
        @if(Request::is('contest/*') && !Request::is('contest/*/problems*') && !Request::is('contest/*/submission*') && !Request::is('contest/*/scoreboard') && !Request::is('contest/*/clarification*'))
            <div class="ui blue left pointing label">&nbsp;</div>
        @endif
    </a>
    <a class="{{(Request::is('contest/*/problems*'))?'active ':''}}blue item" href="/contest/{{$contest->id}}/problems">
        Problem
        @if(Request::is('contest/*/problems*'))
            <div class="ui blue left pointing label">&nbsp;</div>
        @endif
    </a>
    <a class="{{(Request::is('contest/*/submission*'))?'active ':''}}blue item" href="/contest/{{$contest->id}}/submission">
        Submission
        @if(Request::is('contest/*/submission*'))
            <div class="ui blue left pointing label">&nbsp;</div>
        @endif
    </a>
    <a class="{{(Request::is('contest/*/clarification*'))?'active ':''}}blue item" href="/contest/{{$contest->id}}/clarification">
        Clarification
        @if(Request::is('contest/*/clarification*'))
            <div class="ui blue left pointing label">&nbsp;</div>
        @endif
    </a>
    <a class="{{(Request::is('contest/*/scoreboard'))?'active ':''}}blue item" href="/contest/{{$contest->id}}/scoreboard">
        Scoreboard
        @if(Request::is('contest/*/scoreboard'))
            <div class="ui blue left pointing label">&nbsp;</div>
        @endif
    </a>
</div>