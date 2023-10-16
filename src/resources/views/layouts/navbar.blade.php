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
                <a class="nav-link" href="{{ route('user.settings') }}">Settings</a>
            </li>
        </ul>
    </div>
     
    <div class="ml-auto">
        <img src="profile.jpg" alt="Profile Picture" width="40" height="40" class="rounded-circle">
        <span class="text-white mr-2">User Name</span>

        <form action="{{ route('user.logout') }}" method="POST">
            @csrf
            <button>Log out</button>
          </form> 
    </div>
</nav>
