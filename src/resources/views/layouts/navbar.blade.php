<nav class="navbar navbar-expand-lg sticky-top navbar-light p-3 shadow-sm" style="background-color: #6fb3b8;">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="{{ asset('assets/images/letter-m.png') }}" alt="Bootstrap" width="35" height="35">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link mx-2 text-uppercase text-white" aria-current="page" href="{{ route('user.home') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link mx-2 text-uppercase text-white" href="{{ route('profile.show') }}">Profile</a>
        </li>
      </ul>

      <ul class="navbar-nav ms-auto">
        <form id="search" action="{{ route('search.result') }}" method="GET" class="d-flex align-items-center mx-auto input-group" style="max-width: 300px;">
          @csrf
          <input name="query" type="text" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
          <button type="submit" class="btn btn-outline-light" style="min-width: 50px;"><i class="bi bi-search" style="font-size: 22px;"></i></button>
        </form>
        <li class="nav-item">
          <a class="nav-link mx-2" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="bi bi-box-arrow-right" style="font-size: 25px; color: white;"></i>
          </a>
          <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </li>
      </ul>
    </div>
  </div>
</nav>
