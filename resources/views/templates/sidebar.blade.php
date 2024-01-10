<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-teal elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link bg-teal">
        <img src="{{ asset('public/adminlte/dist/img/LOGOX.svg') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SEMERUSMART</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('public/adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link @if($menu == 'Dashboard' ) active @endif">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>
                <li class="nav-header">PENDAFTARAN</li>
                <li class="nav-item">
                    <a href="{{ route('DaftarPelayanan')}}" class="nav-link @if($menu == 'Daftar Pelayanan' ) active @endif">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>
                            Daftar Pelayanan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('RiwayatPendaftaran')}}" class="nav-link @if($menu == 'Riwayat Pendaftaran' ) active @endif">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>
                            Riwayat Pendaftaran
                        </p>
                    </a>
                </li>
                <li class="nav-header">ERM</li>
                <li class="nav-item">
                    <a href="" class="nav-link @if($menu == 'Pendaftaran1' ) active @endif">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>
                            Menu 1
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link @if($menu == 'Riwayat Pendaftaran1' ) active @endif">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>
                            Menu 2
                        </p>
                    </a>
                </li>
                <li class="nav-header">FARMASI</li>
                <li class="nav-item">
                    <a href="{{ route('Layananresep') }}" class="nav-link @if($menu == 'Layanan Resep' ) active @endif">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>
                            Layanan Resep
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link @if($menu == 'Riwayat Pendaftaran1' ) active @endif">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>
                            Riwayat Resep
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link @if($menu == 'Riwayat Pendaftaran1' ) active @endif">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>
                            Kartu Stok Obat
                        </p>
                    </a>
                </li>
                <li class="nav-header">GUDANG FARMASI</li>
                <li class="nav-item">
                    <a href="{{ route('Layananresep') }}" class="nav-link @if($menu == 'Stok Barang' ) active @endif">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>
                            Stok Barang
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('indexmastersupplier')}}" class="nav-link @if($menu == 'Master Supplier' ) active @endif">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>
                            Master Supplier
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('masterbarang')}}" class="nav-link @if($menu == 'Master Barang' ) active @endif">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>
                            Master Barang
                        </p>
                    </a>
                </li>
                <li class="nav-header">PENUNJANG</li>
                <li class="nav-item">
                    <a href="" class="nav-link @if($menu == 'Pendaftaran' ) active @endif">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>
                            Menu 1
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link @if($menu == 'Riwayat Pendaftaran1' ) active @endif">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>
                            Menu 2
                        </p>
                    </a>
                </li>
                <li class="nav-header">KASIR</li>
                <li class="nav-item">
                    <a href="" class="nav-link @if($menu == 'Pendaftaran1' ) active @endif">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>
                            Menu 1
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link @if($menu == 'Riwayat Pendaftaran1' ) active @endif">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>
                            Menu 2
                        </p>
                    </a>
                </li>
                <li class="nav-header">REPORTING</li>
                <li class="nav-item">
                    <a href="" class="nav-link @if($menu == 'Pendaftaran1' ) active @endif">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>
                            Menu 1
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link @if($menu == 'Riwayat Pendaftaran1' ) active @endif">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>
                            Menu 2
                        </p>
                    </a>
                </li>
                <li class="nav-header">DATA MASTER</li>
                <li class="nav-item">
                    <a href="" class="nav-link @if($menu == 'Pendaftaran1' ) active @endif">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>
                            Menu 1
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link @if($menu == 'Riwayat Pendaftaran1' ) active @endif">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>
                            Menu 2
                        </p>
                    </a>
                </li>

                <li class="nav-header">Akun</li>
                <li class="nav-item">
                    <a href="" class="nav-link @if($menu == 'Profil' ) active @endif">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p class="text">Info Akun</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="logout()">
                        <i class="nav-icon far fa-circle text-warning"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
