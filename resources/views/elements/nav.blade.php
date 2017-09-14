<nav>
	<ul>
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
	</ul>
</nav>