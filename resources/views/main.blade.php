<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('judul')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('template/vendors/feather/feather.css')}}">
    <link rel="stylesheet" href="{{asset('template/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('template/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('template/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('template/js/select.dataTables.min.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('template/css/vertical-layout-light/style.css')}}">
    <link rel="stylesheet" href="{{asset('template/css/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/css/calendar.css')}}">

    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('template/images/favicon.png')}}" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">





</head>

<body>
    <div class="container-scroller">
        @section('navbar')
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="index.html"><img
                        src="{{asset('template/images/logo.svg')}}" class="mr-2" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="index.html"><img
                        src="{{asset('template/images/logo-mini.svg')}}" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>

                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            @if (auth()->user()->foto != null)
                            <img src="{{url('/'.auth()->user()->foto)}}" alt="" width="50px" alt="profile" />
                            @else
                            <img src="{{asset('template/images/avatar.png')}}" alt="profile" />
                            @endif
                            <span class="mb-0 text-sm font-weight">{{auth()->user()->name}}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="/Setting">
                                <i class="ti-settings text-primary"></i>
                                Pengaturan
                            </a>
                            <a class="dropdown-item" href="/logout">
                                <i class="ti-power-off text-primary"></i>
                                Keluar
                            </a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button>
            </div>
        </nav>
        @show
        @section('header')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            @section('sidebar')
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard">
                            <i class="icon-grid menu-icon"></i>
                            <span class="menu-title">Halaman Utama</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/viewUsr">
                            <i class="icon-head menu-icon"></i>
                            <span class="menu-title">Data Pengguna</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/viewDsn">
                            <i class="icon-monitor menu-icon"></i>
                            <span class="menu-title">Data Dosen</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/viewMk">
                            <i class="icon-book menu-icon"></i>
                            <span class="menu-title">Data Matakuliah</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/viewProdi">
                            <i class="icon-sun menu-icon"></i>
                            <span class="menu-title">Data Program Studi</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/viewRuang">
                            <i class="icon-map menu-icon"></i>
                            <span class="menu-title">Data Ruangan</span>
                        </a>
                    </li>

                    <!--DATA TAHUN AKADEMIK -->
                    <li class="nav-item" hidden="true">
                        <a class="nav-link" href="/viewTA">
                            <i class="icon-bar-graph menu-icon"></i>
                            <span class="menu-title">Data Tahun Akademik</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#form-waktu" aria-expanded="false"
                            aria-controls="form-elements">
                            <i class="icon-watch menu-icon"></i>
                            <span class="menu-title">Data Waktu</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="form-waktu">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link" href="/viewHari">Hari</a></li>
                                <li class="nav-item"><a class="nav-link" href="/viewJam">Jam</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false"
                            aria-controls="form-elements">
                            <i class="icon-columns menu-icon"></i>
                            <span class="menu-title">Jadwal Kuliah</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="form-elements">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link" href="/viewInputJadwal">Buat
                                        Jadwal</a></li>
                                <li class="nav-item"><a class="nav-link" href="/viewJadwal">Kelola
                                        Jadwal</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            @section('contents')
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="row">
                                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                                    <h3 class="font-weight-bold">Selamat Datang, {{auth()->user()->name}}</h3>
                                    <h6 class="font-weight-normal mb-0">Semoga Harimu Menyenangkan! Jangan lupa untuk
                                        <span class="text-primary">tersenyum hari ini ! </span></h6>
                                </div>
                                <div class="col-12 col-xl-4">
                                    <div class="justify-content-end d-flex">
                                        <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                            <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button"
                                                id="dropdownMenuDate1" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="mdi mdi-calendar"></i><?php echo date('l, d-m-Y');?>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right"
                                                aria-labelledby="dropdownMenuDate1">
                                                <div class="dropdown-itemm">
                                                    <div class="cal1 cal_2">
                                                        <div class="clndr">
                                                            <div class="clndr-controls">
                                                                <div class="clndr-control-button">
                                                                    <p class="clndr-previous-button">previous</p>
                                                                </div>
                                                                <div class="clndr-control-button rightalign">
                                                                    <p class="clndr-next-button">next</p>
                                                                </div>
                                                            </div>
                                                            <table class="clndr-table" border="0" cellspacing="0"
                                                                cellpadding="0">
                                                                <thead>
                                                                    <tr class="header-days">
                                                                        <td class="header-day">S</td>
                                                                        <td class="header-day">M</td>
                                                                        <td class="header-day">T</td>
                                                                        <td class="header-day">W</td>
                                                                        <td class="header-day">T</td>
                                                                        <td class="header-day">F</td>
                                                                        <td class="header-day">S</td>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td
                                                                            class="day adjacent-month last-month calendar-day-2015-06-28">
                                                                            <div class="day-contents">28</div>
                                                                        </td>
                                                                        <td
                                                                            class="day adjacent-month last-month calendar-day-2015-06-29">
                                                                            <div class="day-contents">29</div>
                                                                        </td>
                                                                        <td
                                                                            class="day adjacent-month last-month calendar-day-2015-06-30">
                                                                            <div class="day-contents">30</div>
                                                                        </td>
                                                                        <td class="day calendar-day-2015-07-01">
                                                                            <div class="day-contents">1</div>
                                                                        </td>
                                                                        <td class="day calendar-day-2015-07-02">
                                                                            <div class="day-contents">2</div>
                                                                        </td>
                                                                        <td class="day calendar-day-2015-07-03">
                                                                            <div class="day-contents">3</div>
                                                                        </td>
                                                                        <td class="day calendar-day-2015-07-04">
                                                                            <div class="day-contents">4</div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="day calendar-day-2015-07-05">
                                                                            <div class="day-contents">5</div>
                                                                        </td>
                                                                        <td class="day calendar-day-2015-07-06">
                                                                            <div class="day-contents">6</div>
                                                                        </td>
                                                                        <td class="day calendar-day-2015-07-07">
                                                                            <div class="day-contents">7</div>
                                                                        </td>
                                                                        <td class="day calendar-day-2015-07-08">
                                                                            <div class="day-contents">8</div>
                                                                        </td>
                                                                        <td class="day calendar-day-2015-07-09">
                                                                            <div class="day-contents">9</div>
                                                                        </td>
                                                                        <td class="day calendar-day-2015-07-10">
                                                                            <div class="day-contents">10</div>
                                                                        </td>
                                                                        <td class="day calendar-day-2015-07-11">
                                                                            <div class="day-contents">11</div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="day calendar-day-2015-07-12">
                                                                            <div class="day-contents">12</div>
                                                                        </td>
                                                                        <td class="day calendar-day-2015-07-13">
                                                                            <div class="day-contents">13</div>
                                                                        </td>
                                                                        <td class="day calendar-day-2015-07-14">
                                                                            <div class="day-contents">14</div>
                                                                        </td>
                                                                        <td class="day calendar-day-2015-07-15">
                                                                            <div class="day-contents">15</div>
                                                                        </td>
                                                                        <td class="day calendar-day-2015-07-16">
                                                                            <div class="day-contents">16</div>
                                                                        </td>
                                                                        <td class="day calendar-day-2015-07-17">
                                                                            <div class="day-contents">17</div>
                                                                        </td>
                                                                        <td class="day calendar-day-2015-07-18">
                                                                            <div class="day-contents">18</div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="day calendar-day-2015-07-19">
                                                                            <div class="day-contents">19</div>
                                                                        </td>
                                                                        <td class="day calendar-day-2015-07-20">
                                                                            <div class="day-contents">20</div>
                                                                        </td>
                                                                        <td class="day calendar-day-2015-07-21">
                                                                            <div class="day-contents">21</div>
                                                                        </td>
                                                                        <td class="day calendar-day-2015-07-22">
                                                                            <div class="day-contents">22</div>
                                                                        </td>
                                                                        <td class="day calendar-day-2015-07-23">
                                                                            <div class="day-contents">23</div>
                                                                        </td>
                                                                        <td class="day calendar-day-2015-07-24">
                                                                            <div class="day-contents">24</div>
                                                                        </td>
                                                                        <td class="day calendar-day-2015-07-25">
                                                                            <div class="day-contents">25</div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="day calendar-day-2015-07-26">
                                                                            <div class="day-contents">26</div>
                                                                        </td>
                                                                        <td class="day calendar-day-2015-07-27">
                                                                            <div class="day-contents">27</div>
                                                                        </td>
                                                                        <td class="day calendar-day-2015-07-28">
                                                                            <div class="day-contents">28</div>
                                                                        </td>
                                                                        <td class="day calendar-day-2015-07-29">
                                                                            <div class="day-contents">29</div>
                                                                        </td>
                                                                        <td class="day calendar-day-2015-07-30">
                                                                            <div class="day-contents">30</div>
                                                                        </td>
                                                                        <td class="day calendar-day-2015-07-31">
                                                                            <div class="day-contents">31</div>
                                                                        </td>
                                                                        <td
                                                                            class="day adjacent-month next-month calendar-day-2015-08-01">
                                                                            <div class="day-contents">1</div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @yield('konten')
                    </div>
                </div>
                <!-- content-wrapper ends -->
                @show
                @section('footer')
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Hak Cipta © 2022.
                            Nopi Rahmawati</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">TRPL-2019 <i
                                class="ti-heart text-danger ml-1"></i></span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="{{asset('template/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('template/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#jadwal').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                    extend:'pdf',
                    orientation:'landscape',
                    pageSize:'Legal',
                    //title:'Jadwal Perkuliahan',
                    download:'open'
                },
                'csv', 'excel', 'copy','print']
            });
        });
    </script>
    <script type="text/javascript">
    $(document).ready( function () {
        $('#datatables').DataTable();
    } );
    </script>

    <script src="{{asset('template/js/dataTables.select.min.js')}}"></script>
    <script src="{{asset('template/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('template/js/off-canvas.js')}}"></script>
    <script src="{{asset('template/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('template/js/template.js')}}"></script>
    <script src="{{asset('template/js/settings.js')}}"></script>
    <script src="{{asset('template/js/todolist.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{asset('template/js/dashboard.js')}}"></script>
    <script src="{{asset('template/js/Chart.roundedBarCharts.js')}}"></script>
    <script src="{{asset('template/js/underscore-min.js')}}" type="text/javascript"></script>
    <script src="{{asset('template/js/moment-2.2.1.js')}}" type="text/javascript"></script>
    <script src="{{asset('template/js/clndr.js')}}" type="text/javascript">
    </script>
    <script src="{{asset('template/js/site.js')}}" type="text/javascript">
    </script>
    <script src="{{asset('template/js/sweetalert2.min.js')}}"></script>



    <script>
        $(document).on('click', '#btn-delete', function (e) {
            e.preventDefault();
            var link = $(this).attr('href');

            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Anda tidak bisa mengembalikan data ini",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus Data!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = link;
                }
            })
        })

        $(document).on('click', '#btn-update', function (e) {
            e.preventDefault();
            var link = $(this).attr('form');

            Swal.fire({
                title: 'Apakah kamu mau menyimpan perubahan ini?',
                icon: 'info',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Simpan',
                denyButtonText: `Jangan Simpan`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    window.location = link;
                } else if (result.isDenied) {
                    Swal.fire('Data tidak diperbarui', '', 'info')
                }
            })
        })
    </script>
    <!-- End custom js for this page-->
    @include('sweetalert::alert')
</body>

</html>