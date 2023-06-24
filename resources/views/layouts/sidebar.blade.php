<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="assets/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Typing Test</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        
          <li class="nav-item">
            <a href="{{ route('homeAdmin') }}" class="nav-link {{ (request()->is('home')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
              </p>
            </a>
          </li>
          {{-- make nav item for provinsi --}}
          <li class="nav-item">
            <a href="{{ route('provinsis.index') }}" class="nav-link {{ (request()->is('provinsis')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-globe"></i>
              <p>
                Provinsi
              </p>
            </a>
          </li>
          {{-- make nav item for kabupaten --}}
          <li class="nav-item">
            <a href="{{ route('kabupatens.index') }}" class="nav-link {{ (request()->is('kabupatens')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-map-marker-alt"></i>
              <p>
                Kabupaten
              </p>
            </a>
          </li>
          {{-- make nav item for kecamatan --}}
          <li class="nav-item">
            <a href="{{ route('kecamatans.index') }}" class="nav-link {{ (request()->is('kecamatans')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-map-marked-alt"></i>
              <p>
                Kecamatan
              </p>
            </a>
          </li>
          {{-- make nav item for desa --}}
          <li class="nav-item">
            <a href="{{ route('desas.index') }}" class="nav-link {{ (request()->is('desas')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-map"></i>
              <p>
                Desa
              </p>
            </a>
          </li>
          {{-- make nav item for sls --}}
          <li class="nav-item">
            <a href="{{ route('sls.index') }}" class="nav-link {{ (request()->is('sls')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-user"></i>
              <p>
                SLS
              </p>
            </a>
          </li>
          {{-- make nav item for keluarga --}}
          <li class="nav-item">
            <a href="{{ route('keluargas.index') }}" class="nav-link {{ (request()->is('keluargas')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Keluarga
              </p>
            </a>
          </li>
          {{-- make nav item for ppl --}}
          <li class="nav-item">
            <a href="{{ route('ppl.index') }}" class="nav-link {{ (request()->is('ppl')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-user"></i>
              <p>
                PPL
              </p>
            </a>
          </li>
          {{-- make nav item for pml --}}
          <li class="nav-item">
            <a href="{{ route('pml.index') }}" class="nav-link {{ (request()->is('pml')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-user"></i>
              <p>
                PML
              </p>
            </a>
          </li>
          {{-- make nav item for kuisioner --}}
          <li class="nav-item">
            <a href="{{ route('kuisioners.index') }}" class="nav-link {{ (request()->is('kuisioners')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-question"></i>
              <p>
                Kuisioner
              </p>
            </a>
          </li>
          {{-- make nav item for result --}}
          <li class="nav-item">
            <a href="{{ route('result.index') }}" class="nav-link {{ (request()->is('result')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-chart-bar"></i>
              <p>
                Result
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
