<div class="main-header">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="blue">

        <a href="{{ url('/') }}" class="logo">
            <img src="../assets/img/logo.svg" alt="navbar brand" class="navbar-brand">
        </a>
        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
            data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="icon-menu"></i>
            </span>
        </button>
        <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
        <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
                <i class="icon-menu"></i>
            </button>
        </div>
    </div>
    <!-- End Logo Header -->

    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2"></nav>
    <!-- End Navbar -->
</div>

<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-primary">
                <li class="nav-item {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class="nav-link"> <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteName() == 'input' ? 'active' : '' }}">
                    <a href="{{ route('input') }}" class="nav-link"> <i class="fas fa-book-open"></i>
                        <p>Input Data</p>
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteName() == 'split' ? 'active' : '' }}">
                    <a href="{{ route('split') }}" class="nav-link"> <i class="fas fa-cut"></i>
                        <p>Split Data</p>
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteName() == 'visualisasi' ? 'active' : '' }}">
                    <a href="{{ route('visualisasi') }}" class="nav-link"> <i class="fas fa-chart-area"></i>
                        <p>Visualisasi</p>
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteName() == 'prediksi' ? 'active' : '' }}">
                    <a href="{{ route('prediksi') }}" class="nav-link"> <i class="fas fa-bullseye"></i>
                        <p>Prediksi</p>
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteName() == 'akurasi' ? 'active' : '' }}">
                    <a href="{{ route('akurasi') }}" class="nav-link"> <i class="fas fa-percentage"></i>
                        <p>Akurasi</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
