<nav>
    <ul>
        @auth
            <li>
                @if(Route::currentRouteName() == 'home')
                    <span class="current-link">Home</span>
                @else 
                    <a href="{{ route('home') }}">Home</a>
                @endif
            </li>
            <li>
                <a href="/logout"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="/logout" method="POST">
                    {{ csrf_field() }}
                </form>
            </li>
        @endauth

        @guest
            @if(Route::currentRouteName() != 'welcome')
                <li>
                    <a href="{{ route('welcome') }}">Home</a>
                </li>

                <li>
                    @if(Route::currentRouteName() == 'login')
                        <span class="current-link">Login</span>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                    @endif
                </li>
            @endif
        @endauth
    </ul>
</nav>