
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Mini Blog Admin')</title>

    <link href="{{ asset('sb-admin-2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
    <link href="{{ asset('sb-admin-2/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body id="page-top">
<div id="wrapper">

    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion">
        <a class="sidebar-brand d-flex align-items-center justify-content-center"
           href="{{ route('dashboard') }}">
            <div class="sidebar-brand-icon"><i class="fas fa-blog"></i></div>
            <div class="sidebar-brand-text mx-3">Mini Blog</div>
        </a>

        <hr class="sidebar-divider my-0">

        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ url('/posts') }}">
                <i class="fas fa-fw fa-file-alt"></i>
                <span>My Posts</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('posts.create') }}">
                <i class="fas fa-fw fa-plus-circle"></i>
                <span>Create Post</span>
            </a>
        </li>
    </ul>

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">

            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <span class="h6 mb-0 text-gray-800">@yield('heading', 'Dashboard')</span>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item d-flex align-items-center">
                        <span class="mr-3 text-gray-600 small">
                            {{ auth()->user()->name ?? 'User' }}
                        </span>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-secondary">
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </nav>

            <div class="container-fluid">
                @yield('content')
            </div>

        </div>

        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Mini Blog © {{ date('Y') }}</span>
                </div>
            </div>
        </footer>
    </div>
</div>

<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<script src="{{ asset('sb-admin-2/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('sb-admin-2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('sb-admin-2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('sb-admin-2/js/sb-admin-2.min.js') }}"></script>
</body>
</html>
