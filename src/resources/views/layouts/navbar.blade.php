<nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="padding-left: 10px; padding-right: 20px; background-color: #023047">
    <a class="navbar-brand" href="#">Microblog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile.show') }}">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.home') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile-info.create') }}">Settings</a>
            </li>
        </ul>
    </div>

    <form id="search" action="{{ route('search.result') }}" method="GET" class="d-flex align-items-center mx-auto input-group" style="max-width: 300px;">
        @csrf
        <input name="query" type="text" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
        <button type="submit" class="btn btn-outline-light" style="min-width: 50px;">Search</button>
    </form>

    <div class="ml-auto">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <img src="profile.jpg" alt="Profile Picture" width="40" height="40" class="rounded-circle">
                <li class="nav-item">
                    <a class="nav-link" href="">Username</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
