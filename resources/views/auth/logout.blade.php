 @auth
     <li class="nav-item dropdown">
         <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
             aria-haspopup="true" aria-expanded="false" v-pre>
             <span>Welcome: </span>{{ Auth::user()->name }} {{ Auth::user()->lastname }}
         </a>
         <div class="dropdown-menu " aria-labelledby="navbarDropdown">
             <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                 {{ __('Cerrar Sesion') }}
             </a>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
             </form>
         </div>
     </li>
 @endauth