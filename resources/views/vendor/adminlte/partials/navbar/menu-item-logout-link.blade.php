@php( $logout_url = View::getSection('logout_url') ?? config('adminlte.logout_url', 'logout') )

@if (config('adminlte.use_route_url', false))
    @php( $logout_url = $logout_url ? route($logout_url) : '' )
@else
    @php( $logout_url = $logout_url ? url($logout_url) : '' )
@endif

<li class="nav-item">
    <a href="{{ route('logout') }}" class="dropdown-item"onclick="event.preventDefault();document.getElementById('logout-form').submit();">
        <i class="fa fa-fw fa-power-off text-red mr-2"></i>Logout
      </a>
      <form id="logout-form" action="/auth/logout" method="POST" style="display: none;">
        {{ csrf_field() }}
      </form>
</li>