<nav class="navbar navbar-expand-lg bg-primary" style="margin-bottom:0px;">
  <div class="container">
    <div class="navbar-translate">
      <a class="navbar-brand" href="/" style="font-size:15px;">I.mane</a>
      <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar top-bar"></span>
          <span class="navbar-toggler-bar middle-bar"></span>
          <span class="navbar-toggler-bar bottom-bar"></span>
        </button>
      </div>
    <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="/css/images/blurred-image-1.jpg">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><span style="font-size:15px; padding-right:8px;">{{ Auth::user()->name }}</span>
          <i class="fa fa-th-large size"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a href="{{ route('create') }}" class="dropdown-item">アイテム登録</a>
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