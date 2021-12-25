<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title_dashboard')</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="stylesheet" href="/assets/vendors/iconly/bold.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <!-- Include Choices CSS -->
    <link rel="stylesheet" href="/assets/vendors/choices.js/choices.min.css" />
    <link rel="stylesheet" href="/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="shortcut icon" href="/assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            @php
                $auth = Auth::user()->roles[0]->name;
                $dash_url = '';
                switch ($auth) {
                    case 'admin':
                        $dash_url = 'ceo';
                        break;
                    case 'dosen':
                        $dash_url = 'ruangdosen';
                        break;
                    case 'mahasiswa':
                        $dash_url = 'cafetaria';
                        break;
                }
            @endphp
            @include('dashboard.layout.sidebar',['menus'=>\App\Models\Menu::all(),'dash_url'=>$dash_url])
        </div>
        <div id="main">
            <header class="mb-3">
                <div class="bg-white rounded-pill p-3 px-4 shadow-sm d-flex justify-content-between align-items-center gap-3">
                    <a href="#" class="burger-btn d-flex align-items-center justify-content-center">
                        <i class="bi bi-justify-left fs-3" style="width:auto;height:auto"></i>
                    </a>
                    <a href="{{ url('/') }}">
                        <img src="/assets/images/logo/aldev-logo.svg" style="max-height: 50px" alt="">
                    </a>
                </div>
            </header>

            <div class="page-heading">
                @include('compontents.alerts')
                @yield('dashcontent')
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Hialdev</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="http://hialdev.com">Hialdev</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="/assets/vendors/jquery/jquery.min.js"></script>
    <script src="/js/custom.js"></script>
    <script src="/assets/js/pages/dashboard.js"></script>
    <!-- Include Choices JavaScript -->
    <script src="/assets/vendors/choices.js/choices.min.js"></script>
    <script src="/assets/vendors/tinymce/tinymce.min.js"></script>
    <script src="/assets/vendors/tinymce/plugins/code/plugin.min.js"></script>
    <script src="/assets/js/main.js"></script>
</body>

</html>