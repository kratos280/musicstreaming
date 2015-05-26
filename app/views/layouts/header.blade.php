<!-- header -->
<header>
    <nav class="navbar navbar-default">
        <div class="container">
            <a class="navbar-brand" href="/"></a>
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{{url('/')}}}"> ホーム</a></li>
                @if (!Auth::check())
                    <li><a href="{{{url('/auth/login')}}}">ログイン</a></li>
                @endif
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <div class="navbar-form" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="検索" name="keyword" id="srch-term">
                            <div class="input-group-btn">
                                <button class="btn btn-default" data-url="{{{url('/list')}}}" id="searchButton"><i class="glyphicon glyphicon-search"></i></button>
                            </div>
                        </div>
                    </div>
                </li>
                @if (Auth::check())
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">{{{Auth::user()->username}}} <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{{url('/playlists')}}}">プレイリスト</a></li>
                        <li class="divider"></li>
                        <li><a href="{{{url('/auth/logout')}}}">ログアウト</a></li>
                    </ul>
                </li>
                <li><img src="{{{Auth::user()->profile_image}}}" class="profile-image img-circle" width="50px" height="50px"> </li>
                @endif
            </ul>
        </div>
    </nav>

    {{ HTML::script('js/global_js.js') }}

</header>

