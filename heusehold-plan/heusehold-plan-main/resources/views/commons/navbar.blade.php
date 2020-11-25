<header class="mb-4 navbar-dark bg-dark">
    <nav class="navbar navbar-expand-sm container">
        <a class="navbar-brand" href="/household-plan/public">Household-Plan</a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Auth::check())
                    <li class="nav-item"><a href="#" class="nav-link">ユーザー</a></li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu dropdown-menu-right p-0">
                            <li class="dropdown-item p-0 text-center"><a href="#" class="d-block px-3 py-2 text-decoration-none text-muted">マイプロフィール</a></li>
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item p-0 text-center">{!! link_to_route('logout.get', 'ログアウト', [] , ['class' => 'd-block px-3 py-2 text-decoration-none text-muted']) !!}</li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">{!! link_to_route('signup.get', '新規登録', [], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item">{!! link_to_route('login.get', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
                @endif
            </ul>
        </div>
    </nav>
</header>