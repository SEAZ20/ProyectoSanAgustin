<!-- START HEADER -->
<header id="header" class="page-topbar">
    <!-- start header nav-->
    <div class="navbar-fixed">
      <nav class="navbar-color gradient-45deg-light-blue-cyan">
        <div class="nav-wrapper">
          <ul class="left">
            <li>
              <h1 class="logo-wrapper">
                <a href="{{ url('/') }}" class="brand-logo darken-1">
                  <img src="{{ asset('images/logo/3.png') }}" alt="materialize logo">
                  
                </a>
                <span class="logo-text hide-on-med-and-down">Parroquia San Agustín</span>
                
              </h1>
            </li>
          </ul>
          {{-- <div class="header-search-wrapper hide-on-med-and-down">
            <i class="material-icons">search</i>
            <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize" />
          </div> --}}
          <ul class="right hide-on-med-and-down">
           {{--  <li>
              <a href="javascript:void(0);" class="waves-effect waves-block waves-light translation-button" data-activates="translation-dropdown">
                <span class="flag-icon flag-icon-gb"></span>
              </a>
            </li> --}}
            <li>
              <a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen">
                <i class="material-icons">settings_overscan</i>
              </a>
            </li>
            {{-- <li>
              <a href="javascript:void(0);" class="waves-effect waves-block waves-light notification-button" data-activates="notifications-dropdown">
                <i class="material-icons">notifications_none
                  <small class="notification-badge pink accent-2">5</small>
                </i>
              </a>
            </li> --}}
            <li>
              <a href="javascript:void(0);" class="waves-effect waves-block waves-light profile-button" data-activates="profile-dropdown">
                <i class="material-icons">menu</i>
                {{-- <span class="avatar-status avatar-online">
                  <img src="images/avatar/avatar-7.png" alt="avatar">
                  <i></i>
                </span> --}}
              </a>
            </li>
            {{-- <li>
              <a href="#" data-activates="chat-out" class="waves-effect waves-block waves-light chat-collapse">
                <i class="material-icons">format_indent_increase</i>
              </a>
            </li> --}}
          </ul>
          <!-- translation-button -->
          {{-- <ul id="translation-dropdown" class="dropdown-content">
            <li>
              <a href="#!" class="grey-text text-darken-1">
                <i class="flag-icon flag-icon-gb"></i> English</a>
            </li>
            <li>
              <a href="#!" class="grey-text text-darken-1">
                <i class="flag-icon flag-icon-fr"></i> French</a>
            </li>
            <li>
              <a href="#!" class="grey-text text-darken-1">
                <i class="flag-icon flag-icon-cn"></i> Chinese</a>
            </li>
            <li>
              <a href="#!" class="grey-text text-darken-1">
                <i class="flag-icon flag-icon-de"></i> German</a>
            </li>
          </ul> --}}
         
          <!-- profile-dropdown -->
          <ul id="profile-dropdown" class="dropdown-content">
            <li>
              <a href="{{ url('/') }}" class="grey-text text-darken-1">
                <i class="material-icons">home</i> Inicio </a>
            </li>
            <li class="divider"></li>
            <li>
              <a id="cerrar2" class="grey-text text-darken-1">
                <i class="material-icons">power_settings_new</i> Salir </a>
            </li>

          </ul>
          <form id="logout-form2" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
         </form>
        </div>
      </nav>
    </div>
    <!-- end header nav-->
  </header>
  <!-- END HEADER -->