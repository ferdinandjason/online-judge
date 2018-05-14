<!-- Navigator -->
<div class="ui nav" id="navigator" role="navigation" style="margin-bottom: 20px;">
    <div class="ui horizontal fixed menu" style="{{(Route::current()->getName() == 'welcome')?'background:rgba(44,49,65,.80)':''}};box-shadow: 2px 2px grey;" id={{ isset($isIndex) ? 'navi' : 'n' }}>
        @include('admin.nav-auth-buttons')
    </div>
</div>
