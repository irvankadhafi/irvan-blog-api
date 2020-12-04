<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{$title}}</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('admin/fontawesome/css/all.css')}}">
    <link href="{{ asset('admin/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">--}}
    <link href="{{ asset('admin/swal/dist/sweetalert2.min.css') }}" rel="stylesheet">
    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/components.css') }}">
    <link rel="stylesheet" href="{{asset('admin/chart.js/chart/Chart.min.css')}}">
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="{{ asset('admin/') }}/img/avatar/avatar-1.png"
                                class="rounded-circle mr-1">
{{--                            <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div>--}}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title">Logged in 5 min ago</div>
                            <div class="dropdown-divider"></div>
{{--                            <a class="dropdown-item has-icon text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();--}}
{{--                                          document.getElementById('logout-form').submit();">--}}
{{--                                <i class="fas fa-sign-out-alt"></i> Logout--}}
{{--                                <form id="logout-form" action="{{ route('logout') }}" method="POST"--}}
{{--                                    style="display: none;">--}}
{{--                                    @csrf--}}
{{--                                </form>--}}
{{--                            </a>--}}
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="{{ route('dashboard.index') }}">BEM KEMA POLBAN</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="{{ route('dashboard.index') }}">BEM</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Menu Administrator</li>
                        <li class="{{Request::path() == 'dashboard' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('dashboard.index') }}">
                                <i class="fas fa-tachometer-alt"></i><span>Dashboard</span>
                            </a>
                        </li>
                        <li class="menu-header">Starter</li>
                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-book-open"></i> <span>Post</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="http://nuthink.jtk.polban.ac.id/post">List Post</a></li>
                                <li><a class="nav-link" href="http://nuthink.jtk.polban.ac.id/post/tampil_hapus">List Post Dihapus</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-clipboard"></i> <span>Kategori</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="http://nuthink.jtk.polban.ac.id/category">List Kategori</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-bookmark"></i> <span>Tag</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="http://nuthink.jtk.polban.ac.id/tag">List Tag</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-user"></i> <span>Users</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="http://nuthink.jtk.polban.ac.id/user">List User</a></li>
                            </ul>
                        </li>

{{--                        <li class="{{Request::path() == 'hasil' ? 'active' : '' }}">--}}
{{--                            <a class="nav-link" href="{{ route('dashboard.index') }}">--}}
{{--                                <i class="fas fa-chart-area "></i><span>Lihat Hasil</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="{{ (request()->segment(1) == 'kandidat') ? 'active' : '' }}">--}}
{{--                            <a class="nav-link" href="{{ route('dashboard.index') }}">--}}
{{--                                <i class="fas fa-fire"></i><span>Kandidat</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="{{ (request()->segment(1) == 'pemilih') ? 'active' : '' }}">--}}
{{--                            <a class="nav-link" href="{{ route('dashboard.index') }}">--}}
{{--                                <i class="fas fa-user"></i><span>Akun Voting</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
                    </ul>
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>{{ $title }}</h1>
                    </div>

                    <div class="section-body">
                        @yield('content')
                    </div>
                </section>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2018 <div class="bullet"></div> Design Template By <a
                        href="https://nauval.in/">Muhamad Nauval Azhar</a> And Developed App By <a
                        href="https://github.com/irvankadhafi">Irvan Kadhafi</a>
                </div>
                <div class="footer-right">
                    2.3.0
                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('admin/nicescroll/jquery.nicescroll.js') }}"></script>
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>--}}

    <script src="{{ asset('admin/swal/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('admin/datatables/jquery.dataTables.min.js') }}"></script>

    <script src="{{ asset('admin/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/js/stisla.js') }}"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="{{ asset('admin/js/scripts.js') }}"></script>
    <script src="{{ asset('admin/js/custom.js') }}"></script>
    <script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('admin/chart.js/chart/Chart.min.js') }}"></script>
    @if(session('status'))
    <script type="text/javascript">
        Swal.fire({
      title: 'Sukses ...',
      icon: 'success',
      text: '{{ session("status") }}',
      showClass: {
        popup: 'animated bounceInDown slow'
      },
      hideClass: {
        popup: 'animated bounceOutDown slow'
      }
    })
    </script>
    @endif
    <script>
        $(() => {
          $('#btn-back').on('click', () => {
            window.history.back();
          });

          $('#btn-submit').on('click', () => {
            $('#btn-submit').addClass('btn-progress disabled');
          });
          var t = $('#table').DataTable({
            "columnDefs": [{
              "searchable": false,
              "orderable": false,
              "targets": 0
            }],
            "order": [
              [1, 'asc']
            ],
            "language": {
              "sProcessing": "Sedang memproses ...",
              "lengthMenu": "Tampilkan _MENU_ data per halaman",
              "zeroRecord": "Maaf data tidak tersedia",
              "info": "Menampilkan halaman _PAGE_ dari _PAGES_ halaman",
              "infoEmpty": "Tidak ada data yang tersedia",
              "infoFiltered": "(difilter dari _MAX_ total data)",
              "sSearch": "Cari",
              "oPaginate": {
                "sFirst": "Pertama",
                "sPrevious": "Sebelumnya",
                "sNext": "Selanjutnya",
                "sLast": "Terakhir"
              }
            }
          });
          t.on('order.dt search.dt', function() {
            t.column(0, {
              search: 'applied',
              order: 'applied'
            }).nodes().each(function(cell, i) {
              cell.innerHTML = i + 1;
            });
          }).draw();
        })
    </script>
    <script>
        const alertconfirmn = (url) => {
                const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger mr-2'
            },
            buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
            title: 'Yakin ingin menghapus ?',
            text: "Data yang dihapus tidak dapat dikembalikan kembali !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Hapus !',
            cancelButtonText: 'Tidak, Batalkan !',
            reverseButtons: true
            }).then((result) => {
            if (result.value) {
                window.location.replace(url);
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                'Dibatalkan',
                'Data kamu tidak jadi dihapus :)',
                'error'
                )
            }
            })
  }
    </script>
    @yield('js')
    <!-- Page Specific JS File -->
</body>

</html>
