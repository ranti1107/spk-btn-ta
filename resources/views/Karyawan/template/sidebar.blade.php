        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo mb-2">
            <a href="{{url('Karyawan/beranda')}}" class="app-brand-link">
              <img src="{{asset('Admin/assets/img/avatars/btn2.png')}}" style="width: 35%;">
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">

            <!-- Dashboard -->
            <li class="menu-item {{request()->is('Karyawan/beranda*') ? 'active' : ''}}">
              <a href="{{url('Karyawan/beranda')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Beranda</div>
              </a>
            </li>

            <li class="menu-item {{request()->is('Karyawan/nasabah*') ? 'active' : ''}}">
              <a href="{{url('Karyawan/nasabah')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-face"></i>
                <div data-i18n="Analytics">Nasabah Pemohon</div>
              </a>
            </li>

            <li class="menu-header small text-uppercase"><span class="menu-header-text">Penilaian</span></li>
            <li class="menu-item {{request()->is('Karyawan/perhitungan*') ? 'active' : ''}}">
              <a href="{{url('Karyawan/perhitungan')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-receipt"></i>
                <div data-i18n="Analytics">Input Data Penilaian</div>
              </a>
            </li>
            <li class="menu-item {{request()->is('Karyawan/hasil-akhir*') ? 'active' : ''}}">
              <a href="{{url('Karyawan/hasil-akhir')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-receipt"></i>
                <div data-i18n="Analytics">Hasil Akhir Penilaian</div>
              </a>
            </li>

          </ul>
        </aside>