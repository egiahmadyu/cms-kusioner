<div class="page-sidebar">
  <ul class="list-unstyled accordion-menu">
    <li class="sidebar-title">
      Main
    </li>
    <li class="{{ url()->current() == route('dashboard') ? 'active-page' : '' }}">
      <a href="{{ route('dashboard') }}"><i data-feather="home"></i>Dashboard</a>
    </li>
    <li class="{{ Request::segment(1) == 'lokasi' || Request::segment(1) == 'penyimpanan' ? 'active-page' : '' }}">
      <a href="javascript:void(0);"><i data-feather="folder-plus"></i>Penyimpanan<i class="fas fa-chevron-right dropdown-icon"></i></a>
      <ul class="">
        <li><a href="{{ route('lokasi.create') }}" class="{{ url()->current() == route('lokasi.create') ? 'active' : '' }}"><i class="far fa-circle"></i>Tambah Lokasi</a></li>
        <li><a href="{{ route('lokasi') }}" class="{{ url()->current() == route('lokasi') ? 'active' : '' }}"><i class="far fa-circle"></i>Lokasi</a></li>
        <li><a href="{{ route('penyimpanan.create') }}" class="{{ url()->current() == route('penyimpanan.create') ? 'active' : '' }}"><i class="far fa-circle"></i>Pengajuan</a></li>
        <li><a href="{{ route('penyimpanan') }}" class="{{ url()->current() == route('penyimpanan') ? 'active' : '' }}"><i class="far fa-circle"></i>Penyimpanan</a></li>
      </ul>
    </li>
    <li>
      <a href="javascript:void(0);"><i data-feather="folder-minus"></i>Pengeluaran<i class="fas fa-chevron-right dropdown-icon"></i></a>
      <ul class="">
        <li><a href="{{ route('lokasi.create') }}"><i class="far fa-circle"></i>Pengeluaran</a></li>
      </ul>
    </li>
    <li class="">
      <a href="{{ route('dashboard') }}"><i data-feather="layers"></i>Laporan</a>
    </li>
    <li class="sidebar-title">
      Setting
    </li>
    <li class="{{ url()->current() == route('category') ? 'active-page' : '' }}">
      <a href="{{ route('category') }}" ><i data-feather="list"></i>Kategori</a>
    </li>
    <li class="{{ url()->current() == route('member') ? 'active-page' : '' }}">
      <a href="{{ route('member') }}"><i data-feather="star"></i>Anggota</a>
    </li>
    <li class="{{ url()->current() == route('user') ? 'active-page' : '' }}">
      <a href="{{ route ('user') }}"><i data-feather="users"></i>User</a>
    </li>
    <li class="{{ url()->current() == route('user') ? 'active-page' : '' }}">
      <a href="{{ route ('user') }}"><i data-feather="sliders"></i>Permission</a>
    </li>
  </ul>
</div>