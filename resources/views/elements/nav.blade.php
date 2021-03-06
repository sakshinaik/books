{{-- TODO: Figure out a more maintainable way to change the links between a and span --}}

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
                @if(Route::currentRouteName() == 'book.add')
                    <span class="current-link">Add Book</span>
                @else
                    <a href="{{ route('book.add') }}">Add Book</a>
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
                    @if(Route::currentRouteName() == 'register')
                        <span class="current-link">Register</span>
                    @else
                        <a href="{{ route('register') }}">Register</a>
                    @endif
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