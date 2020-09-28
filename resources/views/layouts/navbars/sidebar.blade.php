<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="https://creative-tim.com/" class="simple-text logo-normal">
      {{ __('Nao Spirits') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      @if(Route::currentRouteName() != 'home')
        @if(Route::currentRouteName() != 'dashboard')
        <li class="nav-item{{ $activePage == 'recipes' ? ' active' : '' }}">
          <a class="nav-link" href="{{ route('recipes') }}">
            <i class="material-icons">content_paste</i>
            <p>{{ __('GT Recipes') }}</p>
          </a>
        </li>
        <li class="nav-item{{ $activePage == 'playlists' ? ' active' : '' }}">
          <a class="nav-link" href="{{ route('playlists') }}">
            <i class="material-icons">content_paste</i>
            <p>{{ __('GT Playlists') }}</p>
          </a>
        </li>
        <li class="nav-item{{ $activePage == 'locations' ? ' active' : '' }}">
          <a class="nav-link" href="{{ route('locations') }}">
            <i class="material-icons">content_paste</i>
            <p>{{ __('Locations') }}</p>
          </a>
        </li>
        <li class="nav-item{{ $activePage == 'teams' ? ' active' : '' }}">
          <a class="nav-link" href="{{ route('teams') }}">
            <i class="material-icons">content_paste</i>
            <p>{{ __('Teams') }}</p>
          </a>
        </li>
        @endif
      @endif
    </ul>
  </div>
</div>