<div class="ui comments">
    @foreach($comment as $c)
        <div class="comment">
            <a class="avatar">
                <img src="../../storage/{{asset('storage/'.$c->user->avatar_path)}}">
            </a>
            <div class="content">
                <a class="author">{{$c->user->real_name}}</a>
                <div class="metadata">
                    <span class="date">{{\Carbon\Carbon::parse($c->created_at)}}</span>
                </div>
                <div class="text">
                    {{$c->comment}}
                </div>
                {{--<div class="actions">--}}
                    {{--<a class="reply">Reply</a>--}}
                {{--</div>--}}
            </div>
        </div>
    @endforeach
    <a class="" id="add">Add new comment</a>
    <form class="ui reply form" method="POST" action="{{route('comment.store')}}" id="commentreply">
        <div class="field">
            {{csrf_field()}}
            <input name="comment" style="min-height: 168px;">
            <input type="hidden" value="{{$problem->id}}" name="problem_id">
            <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
        </div>
        <button class="ui blue labeled submit icon button">
            <i class="icon edit"></i> Add Reply
        </button>
    </form>
    <script>
        $('#commentreply').hide();
        $('#add').click(function(){
            if($('#commentreply').css('display') == 'none'){
                $('#commentreply').show();
            }
            else{
                $('#commentreply').hide();
            }

        });
    </script>
</div>

