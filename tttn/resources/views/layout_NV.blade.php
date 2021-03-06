<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{{ asset('') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="admin_assets/fontawesome/css/all.css">
    <!-- orion icons-->
    <link rel="stylesheet" href="admin_assets/css/orionicons.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="admin_assets/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="admin_assets/css/custom.css">
    <link rel="stylesheet" href="admin_assets/css/style.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="admin_assets/img/favicon.png?3">
    <style>
    #sidebar {
        margin-left: 0px;
        width: 230px;
    }
    </style>
</head>

<body>
    <!-- navbar-->
    <header class="header">
        <nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow">
            <button class="btn btn-outline-dark" onclick="Nav()">☰</button>
            <a class="navbar-brand font-weight-bold text-uppercase text-base">Trang nhân viên</a>
            <ul class="ml-auto d-flex align-items-center list-unstyled mb-0">
                <li class="nav-item">

                </li>
                <li class="nav-item dropdown ml-auto"><a id="userInfo" href="" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" class="nav-link dropdown-toggle">Nhân viên:
                        <?php
$tenNV = Session::get('tenNV');
if ($tenNV) {
    echo $tenNV;

}
?>

                    </a>
                    <div aria-labelledby="userInfo" class="dropdown-menu"><a
                            href="{{URL::to('/profileadmin',Session::get('idNV'))}}" class="dropdown-item"><strong
                                class="d-block text-uppercase headings-font-family"> <?php
$tenNV = Session::get('tenNV');
if ($tenNV) {
    echo $tenNV;

}
?></strong><small>
                                Thông tin nhân viên</small></a>
                        <div class="dropdown-divider"></div><a href="{{url('/')}}" class="dropdown-item">Trang chủ</a>
                        <div class="dropdown-divider"></div><a href="{{URL::to('/logoutadmin')}}"
                            class="dropdown-item">Đăng xuất</a>
                    </div>
                </li>
            </ul>
        </nav>
    </header>
    <div class="d-flex align-items-stretch">
        <div id="sidebar" class="sidebar">
            <ul class="sidebar-menu list-unstyled">
                <li class="sidebar-list-item"><a href="{{url('/phim')}}" class="sidebar-link text-dark"><i
                            class="o-table-content-1 mr-3 text-gray"></i><span>Quản Lý Phim</span></a></li>
                <li class="sidebar-list-item"><a href="{{url('/dsve')}}" class="sidebar-link text-dark"><i
                            class="o-table-content-1 mr-3 text-gray"></i><span>Quản Lý Vé</span></a></li>
                <li class="sidebar-list-item"><a href="{{url('/lichchieu')}}" class="sidebar-link text-dark"><i
                            class="o-survey-1 mr-3 text-gray"></i><span>Quản Lý Lịch Chiếu</span></a></li>
                <li class="sidebar-list-item"><a href="{{url('/dskm')}}" class="sidebar-link text-dark"><i
                            class="o-survey-1 mr-3 text-gray"></i><span>Quản Lý Khuyến Mãi</span></a></li>
                <li class="sidebar-list-item"><a href="{{URL::to('/quanlykh')}}" class="sidebar-link text-dark"><i
                            class="o-survey-1 mr-3 text-gray"></i><span>Quản Lý Người Dùng</span></a></li>
                <li class="sidebar-list-item"><a href="{{URL::to('/logoutadmin')}}" class="sidebar-link text-dark"><i
                            class="o-exit-1 mr-3 text-gray"></i><span>Đăng xuất</span></a></li>
            </ul>

        </div>
        @yield('dscuanv')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <script>
    function Nav() {
        if (document.getElementById("sidebar").style.marginLeft == "-110px") {
            document.getElementById("sidebar").style.marginLeft = "0px";
            document.getElementById("sidebar").style.width = "230px";
        } else {
            document.getElementById("sidebar").style.marginLeft = "-110px";
            document.getElementById("sidebar").style.width = "100px";
        }
    }

    function closeNav() {
        document.getElementById("sidebar").style.width = "0";
    }
    </script>
</body>

</html>