<!-- START LEFT SIDEBAR NAV-->
<aside id="left-sidebar-nav">
    <ul id="slide-out" class="side-nav fixed leftside-navigation">
      <li class="user-details cyan darken-2">
        <div class="row">
          {{-- <div class="col col s4 m4 l4">
            @if (! Auth::guest())
            <img src="images/avatar/avatar-7.png" alt="" class="circle responsive-img valign profile-image cyan">
            @endif
          </div> --}}
          <div class="col col s8 m8 l8">
            <ul id="profile-dropdown-nav" class="dropdown-content">
              <li>
                <a href="{{ url('/') }}" class="grey-text text-darken-1">
                  <i class="material-icons">home</i> Inicio </a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="{{ url('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" class="grey-text text-darken-1">
                  <i class="material-icons">power_settings_new</i>Salir </a>
              </li>
            </ul>
            @if (! Auth::guest())
            <a style="font-size: 25px" class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown-nav">{{ Auth::user()->name }}<i class="mdi-navigation-arrow-drop-down right"></i></a>
            <p class="user-roal">Administrador</p>
            @endif
          </div>
        </div>
      </li>
      <li class="no-padding">

        <ul class="collapsible " data-collapsible="accordion">
          <li class="bold">
            <a href="/home" class="waves-effect waves-cyan hoverable">
                <i class="material-icons">turned_in</i>
                <span class="nav-text">Principal</span>
              </a>
          </li>
          
          <li class="bold">
          <a class="collapsible-header waves-effect hoverable" href="JavaScript:void(0)" tabindex="0">
            <i class="material-icons">home</i>
            <span class="menu-title" data-i18n="User">Información de Inicio</span>
          </a>
          <div class="collapsible-body" style="">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
              <li><a href="{{ url('grupos') }}"><i class="material-icons">group</i><span data-i18n="Grupos">Grupos</span></a>
              </li>
              <li><a href="{{ url('evento') }}"><i class="material-icons">event</i><span data-i18n="Eventos">Eventos</span></a>
              </li>
              <li><a href="{{ url('info') }}"><i class="material-icons">info</i><span data-i18n="Información">Información</span></a>
              </li>
            </ul>
          </div>
        </li>
        <li class="bold">
          <a class="collapsible-header waves-effect waves-purple hoverable" href="JavaScript:void(0)" tabindex="0">
            <i class="material-icons">storage</i>
            <span class="menu-title" data-i18n="Bautizos">Bautizo</span>
          </a>
          <div class="collapsible-body" style="">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
              <li><a href="{{ route('bautizos') }}"><i class="material-icons">find_in_page</i><span data-i18n="View">Administrar Bautizos</span></a>
              </li>
              <li><a href="{{ route('bautizo') }}"><i class="material-icons">person_add</i><span data-i18n="List">Registrar Bautizo</span></a>
              </li>
            </ul>
          </div>
        </li>

        <li class="bold">
          <a class="collapsible-header waves-effect waves-red hoverable" href="JavaScript:void(0)" tabindex="0">
            <i class="material-icons">storage</i>
            <span class="menu-title" data-i18n="Bautizos">Comunión</span>
          </a>
          <div class="collapsible-body" style="">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
              <li><a href="{{ route('comuniones') }}"><i class="material-icons">find_in_page</i><span data-i18n="View">Administrar Comuniones</span></a>
              </li>
              <li><a href="{{ route('registarcomunion2') }}"><i class="material-icons">person_add</i><span data-i18n="List">Registrar Comunión</span></a>
              </li>  
            </ul>
          </div>
        </li>
        <li class="bold">
          <a class="collapsible-header waves-effect waves-orange hoverable" href="JavaScript:void(0)" tabindex="0">
            <i class="material-icons">storage</i>
            <span class="menu-title" data-i18n="Bautizos">Confirmación</span>
          </a>
          <div class="collapsible-body" style="">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
              <li><a href="{{ route('confirmas') }}"><i class="material-icons">find_in_page</i><span data-i18n="View">Administrar Confirmaciones</span></a>
              </li>
              <li><a href="{{ route('registarconfirma2') }}"><i class="material-icons">person_add</i><span data-i18n="List">Registrar Confirmación</span></a>
              </li>        
            </ul>
          </div>
        </li>
        <li class="bold">
          <a class="collapsible-header waves-effect waves-green hoverable" href="JavaScript:void(0)" tabindex="0">
            <i class="material-icons">storage</i>
            <span class="menu-title" data-i18n="Bautizos">Matrimonio</span>
          </a>
          <div class="collapsible-body" style="">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
              <li><a href="{{ route('matrimonios') }}"><i class="material-icons">find_in_page</i><span data-i18n="View">Administrar Matrimonios</span></a>
              </li>
              <li><a href="{{ route('registarmatrimonio') }}"><i class="material-icons">person_add</i><span data-i18n="List">Registrar Matrimonio</span></a>
              </li>        
            </ul>
          </div>
        </li>

          <li class="bold">
            <a id="cerrar" class="waves-effect waves-red hoverable">
              <i class="material-icons">power_settings_new</i>
              <span class="nav-text">Salir</span>
            </a>
          </li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
         </form>
        </ul>
      </li>
     
    </ul>
    <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-small waves-effect waves-light hide-on-large-only">
      <i class="material-icons">menu</i>
    </a>
  </aside>
  <!-- END LEFT SIDEBAR NAV-->