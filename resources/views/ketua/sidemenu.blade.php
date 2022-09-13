<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow " data-scroll-to-active="true">
  <div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
      <li class=" navigation-header">
        <span data-i18n="nav.category.layouts">Menu ketua</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip"
        data-placement="right" data-original-title="Layouts"></i>
      </li>
      <li class="active"><a href="{{ route('ketua.dashboard') }}"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.templates.main">Dashboard</span></a></li>
      <li class="active"><a href="{{ route('anggota.index') }}"><i class="la la-users"></i><span class="menu-title" data-i18n="nav.templates.main">Data Anggota</span></a></li>
      <li class="active nav-item"><a href="index.html"><i class="la la-bank"></i><span class="menu-title" data-i18n="nav.dash.main">Lihat Transaksi</span></a>
        <ul class="menu-content">
          <li class="menu-item"><a class="menu-item" href="{{ route('simpanan.index') }}" data-i18n="nav.dash.ecommerce">Transaksi Simpanan</a>
          </li>
          <li class="menu-item"><a class="menu-item" href="{{ route('pinjaman.index') }}" data-i18n="nav.dash.ecommerce">Transaksi Pinjaman</a>
          </li>
        </ul>
      </li>
      <li class="active"><a href="{{ route('pinjaman.pengajuan-diajukan') }}"><i class="la la-pencil-square"></i><span class="menu-title" data-i18n="nav.scrumboard.main">Approve Pengajuan</span></a>
      </li>
      <li class="active"><a href="#"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">Laporan</span></a>
        <ul class="menu-content">
          <li class="menu-item"><a class="menu-item" href="{{ route('laporan.angsuran') }}" data-i18n="nav.dash.ecommerce">Transaksi Angsuran</a>
          </li>
          <li class="menu-item"><a class="menu-item" href="{{ route('laporan.pinjaman') }}" data-i18n="nav.dash.ecommerce">Transaksi Pinjaman</a>
          </li>
          <li class="menu-item"><a class="menu-item" href="{{ route('laporan.simpanan') }}" data-i18n="nav.dash.ecommerce">Transaksi Simpanan</a>
          </li>
        </ul>
      </li>
      <li class="active"><a href="{{ route('logout') }}"><i class="la la-external-link"></i><span class="menu-title" data-i18n="nav.scrumboard.main">Logout</span></a>
      </li>
    </ul>
  </div>
</div>
