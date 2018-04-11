<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="大创项目,评审">
    <meta name="description" content="评审广西师范大学大学生创新创业项目">
    <meta name="author" content="Fu Rongxin">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>广西师范大学大学生创新创业项目评审系统</title>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin.min.css') }}" rel="stylesheet">
    @stack('styles')

    <link rel="shortcut ico" type="image/ico" href="/favicon.ico">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
        <script src="{{ asset('js/html5shiv.js') }}"></script>
        <script src="{{ asset('js/respond.min.js') }}"></script>
    <![endif]-->
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <a class="navbar-brand" href="{{ url('/') }}">广西师范大学大学生创新创业项目评审系统</a>

            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <ul class="navbar-nav ml-auto">
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="fa fa-fw fa-sign-out"></i>退出系统
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @endauth
            </ul>
        </nav>

        <div>
            <div class="container-fluid">

                @foreach (['success', 'danger', 'warning', 'info'] as $status)
                    @if (session()->has($status))
                        <div class="alert alert-{{ $status }} alert-dismissible fade show" role="alert">
                            {{ session($status) }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                @endforeach

                @yield('content')
            </div>
        </div>

        <footer class="sticky-footer">
            <div class="container">
                <div class="text-center">
                    <small>© {{ date('Y') }} 广西师范大学教务处.</small>
                </div>
            </div>
        </footer>

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fa fa-angle-up"></i>
        </a>
    </div>

    @include('footer')

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin.min.js') }}"></script>
    <script>
    $(function() {
        $('#dataTable').dataTable({
            "language": {
                "url": "{{ asset('js/dataTables/dataTables.chinese.lang') }}"
            }
        });
    });
    </script>
    @stack('scripts')
</body>
</html>
