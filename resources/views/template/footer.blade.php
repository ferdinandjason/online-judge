<div id="footer-navbar" class="ui inverted segment fixed" style="margin:0;width: 100vw;position: fixed;z-index: 100;top: calc(100vh - 47px);">
    <div style="text-decoration-color: white;text-align: center;">
        <div style="display: flex;float: left;">&nbsp;&nbsp;&nbsp;© 2018 Moe Online Judge</div>
        <div class="ui horizontal inverted small divided link list" style="margin: 0;">
            <a class="item" href="{{route('about')}}" target="_blank">About</a>
            <a class="item" href="{{route('problems.index')}}">Problems</a>
            <a class="item" href="{{route('submissions.index')}}">Submissions</a>
            <a class="item" href="{{route('user.rank')}}">Rank</a>
            <a class="item" href="{{route('contest.index')}}">Contest</a>
        </div>
        <div style="display: flex;float: right;">Version 0.8.5&nbsp;&nbsp;&nbsp;</div>
    </div>
</div>
<div id="footer" class="ui black inverted vertical footer segment" style="margin-top:0;">
    <div class="ui center aligned container">
        <div class="ui stackable inverted grid">
            <div class="four wide column">
                <img src="{{asset('images/logo.png')}}" class="ui centered mini image"/>
                <h4 class="ui inverted header" style="font-family: Lato;font-weight: 100;font-size: 1.5rem;margin:auto"><strong>Moe Online Judge</strong></h4>
                <div class="ui inverted link list">
                    <a class="item" href="{{route('about')}}" target="_blank">About</a>
                </div>
            </div>
            <div class="four wide column">
                <h4 class="ui inverted header">Problem</h4>
                <div class="ui inverted link list">
                    <a class="item" href="{{route('problems.index')}}">Problems</a>
                    <a class="item" href="{{route('submissions.index')}}">Submissions</a>
                </div>
            </div>
            <div class="four wide column">
                <h4 class="ui inverted header">OTHER</h4>
                <div class="ui inverted link list">
                    <a class="item" href="{{route('user.rank')}}">Rank</a>
                    <a class="item" href="{{route('contest.index')}}">Contest</a>
                </div>
            </div>

            <div class="four wide column">
                <div class="ui inverted link list">
                    <button class="ui circular facebook icon button">
                        <i class="facebook icon"></i>
                    </button>
                    <button class="ui circular twitter icon button">
                        <i class="twitter icon"></i>
                    </button>
                    <button class="ui circular linkedin icon button">
                        <i class="linkedin icon"></i>
                    </button>
                    <button class="ui circular google plus icon button">
                        <i class="google plus icon"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="ui inverted section divider"></div>
        <img src="{{asset('images/logo.png')}}" class="ui centered mini image"/>
        <div class="ui horizontal inverted small divided link list">
            <p class="item">Make with <span style="color:red">&#10084;</span> , Laravel , Semantic UI , Moe Contest Environment</p>
            <br>
            <p class="item">2018 &copy; All Rights Reserved by <a href="#" target="_blank"> ApaYha Team </a></p>
            <p class="item"> </p>
        </div>
    </div>
</div>