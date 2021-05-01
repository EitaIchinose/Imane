<nav class="navbar navbar-expand-lg bg-primary">
  <div class="container">
    <div class="navbar-translate">
      <a class="navbar-brand" href="#pablo" style="font-size:15px;">I.mane</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#example-navbar-primary" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-bar bar1"></span>
        <span class="navbar-toggler-bar bar2"></span>
        <span class="navbar-toggler-bar bar3"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="example-navbar-primary">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><span style="font-size:15px; padding-right:8px;">{{ Auth::user()->name }}</span>
            <i class="fas fa-sign-out-alt size" style="color:green;"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>