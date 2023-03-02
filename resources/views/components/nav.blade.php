<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand mb-0 h1" href="{{ route('home') }}">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('todo') }}">Todo List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('banner') }}">Banner Images</a>
        </li>
      </ul>
      @if (Auth::user())
        <form method="POST" action="{{ route('logout') }}">
        @csrf
          <x-dropdown-link href="{{ route('logout') }}"
            class="btn btn-warning"
            onclick="event.preventDefault();
                  this.closest('form').submit();">
            {{ __('Log Out') }}
          </x-dropdown-link>
        </form>
      @else
        <a href="{{ route('login') }}" class="btn btn-warning">Log In</a>
        <a href="{{ route('register') }}" class="btn btn-warning">Register</a> 
      @endif

    </div>
  </div>
</nav>