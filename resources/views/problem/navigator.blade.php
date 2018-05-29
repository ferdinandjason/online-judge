<div class="ui vertical menu">

    <a class="{{(Request::is('problems/*') && !Request::is('problems/*/submit') && !Request::is('problems/*/rank'))?'active ':''}}blue item" href="{{route('problem/show',$problem->id)}}">
        Description
        @if(Request::is('problems/*') && !Request::is('problems/*/submit') && !Request::is('problems/*/rank'))
            <div class="ui blue left pointing label">&nbsp;</div>
        @endif
    </a>
    <a class="{{(Request::is('problems/*/rank'))?'active ':''}}blue item" href="{{route('problem.rank',$problem->id)}}">
        Rank
        @if(Request::is('problems/*/rank'))
            <div class="ui blue left pointing label">&nbsp;</div>
        @endif
    </a>
    <a class="{{(Request::is('problems/*/submit'))?'active ':''}}blue item" href="{{route('problem.submit',$problem->id)}}">
        Submit
        @if(Request::is('problems/*/submit'))
            <div class="ui blue left pointing label">&nbsp;</div>
        @endif
    </a>
</div>