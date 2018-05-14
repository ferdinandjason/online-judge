<!-- Navigator -->
<div class="nav" id="navigator" role="navigation">
    <div class="ui blue secondary pointing menu" style="{{(Route::current()->getName() == 'welcome')?'background:rgba(44,49,65,.80)':''}}" id={{ isset($isIndex) ? 'navi' : 'n' }}>
        <div class="ui container">
            @if ( ! isset($isIndex) )
                <a class="ui item brand" href="/">
                    <img src="/images/logo.png" >&nbsp;
                </a>
            @endif
            <a href="/problems" class="ui item{{(\Request::is('problems*') || \Request::is('tag*'))?' active':''}}"><i class="fas fa-file-code" style="color: blue"></i>&nbsp;&nbsp;Problem</a>
            <a href="/submissions" class="ui item{{(\Request::is('submissions'))?' active':''}}" style="{{(\Request::is('submissions'))?'color:red !important':''}}"><i class="far fa-thumbs-up" style="color: red"></i>&nbsp;&nbsp;Submission</a>
            <a href="/rank" class="ui item{{(\Request::is('rank'))?' active':''}}" style="{{(\Request::is('rank'))?'color:green  !important':''}}"><i class="fas fa-chart-line" style="color: green"></i>&nbsp;&nbsp;Rank</a>
            <a href="/contest" class="ui item{{(\Request::is('contest*'))?' active':''}}" style="{{(\Request::is('contest*'))?'color:gold  !important':''}}"><i class="fas fa-trophy" style="color: gold"></i>&nbsp;&nbsp;Contest</a>
            {{--<a href="/contest" class="ui item{{(\Request::is('training-ground*'))?' active':''}}" style="{{(\Request::is('training-ground*'))?'color:brown  !important':''}}"><i class="fas fa-book" style="color: brown"></i>&nbsp;&nbsp;Training Ground</a>--}}

            <a href="/about" class="ui item{{(\Request::is('about*'))?' active':''}}" tabindex="0" style="{{(\Request::is('about*'))?'color:black  !important':''}}">
                <i class="fas fa-info" style="color: #000;"></i>&nbsp;&nbsp;&nbsp;
                About
            </a>
            @include('template.nav-auth-buttons')
        </div>
    </div>

@if ( isset($isIndex) )
    <!-- Index Page Navigator -->
        <div class="nav trigger"></div>

        <script>
            $('.nav.trigger')
                .visibility({
                    onUpdate: function(calculations) {
                        if( calculations.passing == false )
                            $('#navigator>.menu').addClass('light');
                        else
                            $('#navigator>.menu').removeClass('light');
                    },
                    continuous: true
                })
            ;
        </script>
    @endif

    <script>
        $(window).on("scroll",function(){
            $(this).scrollTop()>0?$('#navi').addClass('fixed').removeClass('pointing'):$('#navi').removeClass('fixed').addClass('pointing');
        });
        $('.ui.dropdown').dropdown();
    </script>

</div>
