<div class="page-sidebar">
  <ul class="list-unstyled accordion-menu">
    <li class="sidebar-title">
      Main
    </li>
    <li class="{{ url()->current() == route('dashboard') ? 'active-page' : '' }}">
      <a href="{{ route('dashboard') }}"><i data-feather="home"></i>Dashboard</a>
    </li>
    <li class="{{ Request::segment(1) == 'lokasi' || Request::segment(1) == 'penyimpanan' ? 'active-page' : '' }}">
      <a href="javascript:void(0);"><i data-feather="folder-plus"></i>Kuesioner<i class="fas fa-chevron-right dropdown-icon"></i></a>
      <ul class="">
        <li><a href="{{ route('kuesioner') }}" class="{{ url()->current() == route('kuesioner') ? 'active' : '' }}"><i class="far fa-circle"></i>Kuesioner</a></li>
      </ul>
    </li>
  
    <li class="">
      <a href="{{ route('dashboard') }}"><i data-feather="layers"></i>Laporan</a>
    </li>
    <li class="sidebar-title">
      Setting
    </li>
   
    <li class="{{ url()->current() == route('user') ? 'active-page' : '' }}">
      <a href="{{ route ('user') }}"><i data-feather="users"></i>User</a>
    </li>
    <li class="{{ url()->current() == route('user') ? 'active-page' : '' }}">
      <a href="{{ route ('user') }}"><i data-feather="sliders"></i>Permission</a>
    </li>
  </ul>
</div>