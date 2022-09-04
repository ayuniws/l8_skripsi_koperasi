<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow " data-scroll-to-active="true">
  <div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
      <li class=" navigation-header">
        <span data-i18n="nav.category.layouts">Menu Admin</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip"
        data-placement="right" data-original-title="Layouts"></i>
      </li>
      <li class=" nav-item"><a href="#"><i class="la la-users"></i><span class="menu-title" data-i18n="nav.templates.main">Manage Anggota</span></a>
        <ul class="menu-content">
          <li><a class="menu-item" href="{{ route('anggota.index') }}" data-i18n="nav.templates.vert.main">Data Anggota</a>
          </li>
          <li><a class="menu-item" href="{{ route('anggota.create') }}" data-i18n="nav.templates.horz.main">Tambah Anggota</a>
          </li>
        </ul>
      </li>
      <li class=" nav-item"><a href="index.html"><i class="la la-bank"></i><span class="menu-title" data-i18n="nav.dash.main">Transaksi</span></a>
        <ul class="menu-content">
          <li class="menu-item"><a class="menu-item" href="simpanan" data-i18n="nav.dash.ecommerce">Manage Simpanan</a>
          </li>
          <li><a class="menu-item" href="pinjaman" data-i18n="nav.dash.crypto">Manage Pinjaman</a>
          </li>
        </ul>
      </li>    
      <li class="active"><a href="laporan"><i class="la la-pencil-square"></i><span class="menu-title" data-i18n="nav.scrumboard.main">Laporan</span></a>
      </li>
    </ul>
  </div>    
</div>
