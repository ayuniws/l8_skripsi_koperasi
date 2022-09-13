<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow " data-scroll-to-active="true">
  <div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
      <li class=" navigation-header">
        <span data-i18n="nav.category.layouts">Menu Anggota</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip"
        data-placement="right" data-original-title="Layouts"></i>
      </li>
      <li class="active"><a href="{{ route('anggota.dashboard') }}"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.templates.main">Dashboard</span></a></li>
      <li class="active"><a href="{{ route('anggota.show', Auth::user()->anggota->id) }}"><i class="la la-user"></i><span class="menu-title" data-i18n="nav.templates.main">Profile</span></a></li>
      <li class="active"><a href="#"><i class="la la-bank"></i><span class="menu-title" data-i18n="nav.dash.main">Transaksi</span></a>
        <ul class="menu-content">
          <li class="menu-item"><a class="menu-item" href="dashboard-ecommerce.html" data-i18n="nav.dash.ecommerce">Lihat Info Simpanan</a>
          </li>
          <li><a class="menu-item" href="dashboard-crypto.html" data-i18n="nav.dash.crypto">Pengajuan Pinjaman</a>
          </li>
        </ul>
      </li>
      <li class="active"><a href="#"><i class="la la-list-alt"></i><span class="menu-title" data-i18n="nav.dash.main">Histori</span></a>
        <ul class="menu-content">
          <li class="menu-item"><a class="menu-item" href="dashboard-ecommerce.html" data-i18n="nav.dash.ecommerce">Transaksi Simpanan</a>
          </li>
          <li><a class="menu-item" href="dashboard-crypto.html" data-i18n="nav.dash.crypto">Transaksi  Pinjaman</a>
          </li>
        </ul>
      </li>
      <li class="active"><a href="{{ route('logout') }}"><i class="la la-external-link"></i><span class="menu-title" data-i18n="nav.scrumboard.main">Logout</span></a>
      </li>
    </ul>
  </div>
</div>
