<div class="ui vertical menu">
    <a class="{{(Request::is('contest/*') && !Request::is('contest/*/problems*') && !Request::is('contest/*/submission*') && !Request::is('contest/*/scoreboard') && !Request::is('contest/*/clarification*'))?'active ':''}}blue item" href="{{route('contest.show',$contest->id)}}">
        Home
        @if(Request::is('contest/*') && !Request::is('contest/*/problems*') && !Request::is('contest/*/submission*') && !Request::is('contest/*/scoreboard') && !Request::is('contest/*/clarification*'))
            <div class="ui blue left pointing label">&nbsp;</div>
        @endif
    </a>
    <a class="{{(Request::is('contest/*/problems*'))?'active ':''}}blue item" href="{{route('contest.problem.index',$contest->id)}}">
        Problem
        @if(Request::is('contest/*/problems*'))
            <div class="ui blue left pointing label">&nbsp;</div>
        @endif
    </a>
    <a class="{{(Request::is('contest/*/submission*'))?'active ':''}}blue item" href="{{route('contest.submission.index',$contest->id)}}">
        Submission
        @if(Request::is('contest/*/submission*'))
            <div class="ui blue left pointing label">&nbsp;</div>
        @endif
    </a>
    <a class="{{(Request::is('contest/*/clarification*'))?'active ':''}}blue item" href="{{route('clarification.index',$contest->id}}">
        Clarification
        @if(Request::is('contest/*/clarification*'))
            <div class="ui blue left pointing label">&nbsp;</div>
        @endif
    </a>
    <a class="{{(Request::is('contest/*/scoreboard'))?'active ':''}}blue item" href="{{route('contest.scoreboard',$contest->id)}}/scoreboard">
        Scoreboard
        @if(Request::is('contest/*/scoreboard'))
            <div class="ui blue left pointing label">&nbsp;</div>
        @endif
    </a>
</div>