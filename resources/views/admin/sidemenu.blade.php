<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow " data-scroll-to-active="true">
  <div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
      <li class=" navigation-header">
        <span data-i18n="nav.category.layouts">Menu Admin</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip"
        data-placement="right" data-original-title="Layouts"></i>
      </li>
      <li class="active"><a href="{{ route('admin.dashboard') }}"><i class="la la-external-link"></i><span class="menu-title" data-i18n="nav.scrumboard.main">Dashboard</span></a>
      </li>
      <li class="active"><a href="#"><i class="la la-users"></i><span class="menu-title" data-i18n="nav.templates.main">Manage Anggota</span></a>
        <ul class="menu-content">
          <li><a class="menu-item" href="{{ route('anggota.index') }}" data-i18n="nav.templates.vert.main">Data Anggota</a>
          </li>
          <li><a class="menu-item" href="{{ route('anggota.create') }}" data-i18n="nav.templates.horz.main">Tambah Anggota</a>
          </li>
        </ul>
      </li>
      <li class="active"><a href="#"><i class="la la-users"></i><span class="menu-title" data-i18n="nav.templates.main">Manage Jabatan</span></a>
        <ul class="menu-content">
          <li><a class="menu-item" href="{{ route('jabatan.index') }}" data-i18n="nav.templates.vert.main">Data Jabatan</a>
          </li>
          <li><a class="menu-item" href="{{ route('jabatan.create') }}" data-i18n="nav.templates.horz.main">Tambah Jabatan</a>
          </li>
        </ul>
      </li>
      <li class="active"><a href="#"><i class="la la-users"></i><span class="menu-title" data-i18n="nav.templates.main">Manage Bagian</span></a>
        <ul class="menu-content">
          <li><a class="menu-item" href="{{ route('bagian.index') }}" data-i18n="nav.templates.vert.main">Data Bagian</a>
          </li>
          <li><a class="menu-item" href="{{ route('bagian.create') }}" data-i18n="nav.templates.horz.main">Tambah Bagian</a>
          </li>
        </ul>
      </li>
      <li class="active"><a href="#"><i class="la la-bank"></i><span class="menu-title" data-i18n="nav.dash.main">Transaksi</span></a>
        <ul class="menu-content">
          <li class="menu-item"><a class="menu-item" href="{{ route('angsuran.index') }}" data-i18n="nav.dash.ecommerce">Manage Angsuran</a>
          </li>
          <li class="menu-item"><a class="menu-item" href="{{ route('simpanan.index') }}" data-i18n="nav.dash.ecommerce">Manage Simpanan</a>
          </li>
          <li class="menu-item"><a class="menu-item" href="{{ route('pinjaman.index') }}" data-i18n="nav.dash.ecommerce">Manage Pinjaman</a>
          </li>
        </ul>
      </li>
      <li class="active"><a href="#"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">Laporan</span></a>
        <ul class="menu-content">
          <li class="menu-item"><a class="menu-item" href="#" data-i18n="nav.dash.ecommerce">Transaksi Angsuran</a>
          </li>
          <li class="menu-item"><a class="menu-item" href="#" data-i18n="nav.dash.ecommerce">Transaksi Simpanan</a>
          </li>
          <li class="menu-item"><a class="menu-item" href="#" data-i18n="nav.dash.ecommerce">Transaksi Pinjaman</a>
          </li>
        </ul>
      </li>
      <li class="active"><a href="{{ route('logout') }}"><i class="la la-external-link"></i><span class="menu-title" data-i18n="nav.scrumboard.main">Logout</span></a>
      </li>
    </ul>
  </div>
</div>
