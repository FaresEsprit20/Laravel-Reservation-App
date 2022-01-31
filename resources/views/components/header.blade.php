
            <nav class="navbar fixed-top navbar-light bg-light" id="navbar">
              <div class="container-fluid">
                <a class="navbar-brand" href="#">
                  <img src="{{ asset('images/logo/logo.jpeg') }}" alt="" width="30" height="24" class="d-inline-block align-text-top">
                  Reserv App
                </a>
                <!--bouton fermée de toggle  btn-close -->
                <button class="navbar-toggler shadow-none" id="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                     
                      <a class="nav-link d-inline-block" aria-current="page" href="{{ route('home.index') }}">Accueil</a>
                      <i class="navbar-fa fa fa-home fa-2x  d-inline-block"></i>
                    </li>
                  
                    <li class="nav-item">
                      <a class="nav-link d-inline-block" href="{{ route('groupes.index') }}">Groupes</a>
                      <i class="navbar-fa fa fa-users fa-2x d-inline-block"></i>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link d-inline-block" href="{{ route('eleves.index') }}">Eleves</a>
                      <i class="navbar-fa fa fa-users fa-2x d-inline-block"></i>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link d-inline-block" href="{{ route('seances.index') }}">Seances</a>
                      <i class="navbar-fa fa fa-users fa-2x d-inline-block"></i>
                    </li>
                    <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Archive
                </a>
                <i class="navbar-fa fa fa-archive fa-2x d-inline-block"></i>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="{{ route('locations.index') }}">Locations</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="{{ route('professeurs.index') }}">Enseignants</a></li>
                </ul>
              </li>
                    <li class="nav-item">
                      <a class="nav-link d-inline-block" href="#stats">Statistiques</a>
                      <i class="navbar-fa fa fa-area-chart fa-2x d-inline-block"></i>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link d-inline-block" href="{{ route('suitesvides.list') }}">Suites Vides</a>
                      <i class="navbar-fa fa fa-mail-forward fa-2x d-inline-block"></i>
                    </li>
                    
                    @if (Auth::check())
                        
                    <li class="nav-item">
                      <a class="nav-link d-inline-block" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">Se déconnecter</a>
                       <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                      <i class="navbar-fa fa fa-mail-forward fa-2x d-inline-block"></i>
                    </li>
                    
                    @endif

                  </ul>
                </div>
              </div>
            </nav>