        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo mb-2">
            <a href="{{url('Admin/beranda')}}" class="app-brand-link">
              <img src="{{asset('Admin/assets/img/avatars/btn2.png')}}" style="width: 35%;">
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">

            <?php 
              $user = Auth::user();
            ?>
            @if($user->level == 0)
            <!-- Dashboard -->
            <li class="menu-item {{request()->is('Admin/beranda*') ? 'active' : ''}}">
              <a href="{{url('Admin/beranda')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Beranda</div>
              </a>
            </li>
            <li class="menu-item {{request()->is('Admin/penilaian*') ? 'active' : ''}}">
              <a href="{{url('Admin/penilaian')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-receipt"></i>
                <div data-i18n="Analytics">Hasil Penilaian</div>
              </a>
            </li>

            <li class="menu-header small text-uppercase"><span class="menu-header-text">Kriteria</span></li>
            <li class="menu-item {{request()->is('Admin/kriteria*') ? 'active' : ''}}">
              <a href="{{url('Admin/kriteria')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-receipt"></i>
                <div data-i18n="Analytics">Data Kriteria</div>
              </a>
            </li>
            <li class="menu-item {{request()->is('Admin/perhitungan-kriteria*') ? 'active' : ''}}">
              <a href="{{url('Admin/perhitungan-kriteria')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-receipt"></i>
                <div data-i18n="Analytics">Perhitungan Kriteria</div>
              </a>
            </li>

            <li class="menu-header small text-uppercase"><span class="menu-header-text">Subkriteria</span></li>
            <li class="menu-item {{request()->is('Admin/sub-kriteria*') ? 'active' : ''}}">
              <a href="{{url('Admin/sub-kriteria')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-receipt"></i>
                <div data-i18n="Analytics">Data Subkriteria</div>
              </a>
            </li>

            <li class="menu-header small text-uppercase"><span class="menu-header-text">Users</span></li>

            <li class="menu-item {{request()->is('Admin/user-admin*') ? 'active' : ''}}">
              <a href="{{url('Admin/user-admin')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-check"></i>
                <div data-i18n="Analytics">Admin</div>
              </a>
            </li>

            <li class="menu-item {{request()->is('Admin/user-karyawan*') ? 'active' : ''}}">
              <a href="{{url('Admin/user-karyawan')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div data-i18n="Analytics">Karyawan</div>
              </a>
            </li>
                
            @else
            <li class="menu-item {{request()->is('spk-btn/beranda*') ? 'active' : ''}}">
              <a href="{{url('spk-btn/beranda')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Beranda</div>
              </a>
            </li>
            @endif

          </ul>
        </aside>