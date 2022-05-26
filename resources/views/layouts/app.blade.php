<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    @stack('styles')
</head>

<body id="body-pd">
    <header class="header position-relative d-block">
        <nav class="navbar navbar-expand-lg navbar-light bg-light w-100">
            <div class="container-fluid d-flex justify-content-between w-100">
                <div class="d-flex align-items-center gap-2 w-100">
                    <h5 class="m-0 me-4">Users</h5>
                    <div class="form-group m-0 position-relative">
                        <select name="" id="" class="form-control form-control-sm pe-4">
                            <option value="" selected disabled>Year</option>
                        </select>
                        <i class="bx bx-sort position-absolute top-0 h-100 d-flex align-items-center text-muted me-2" style="right: 0; font-size: 14px"></i>
                    </div>
                    <div class="form-group m-0 position-relative">
                        <input type="text" class="form-control form-control-sm pe-5" placeholder="Search">
                        <i class="bx bx-search position-absolute top-0 h-100 d-flex align-items-center text-muted me-2" style="right: 0; font-size: 14px"></i>
                    </div>
                    {{-- <a class="navbar-brand" href="#">User</a> --}}
                    <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse d-lg-block" id="navbarNavDropdown">
                    <ul class="navbar-nav flex-md-row">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Language
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Reports
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Project
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=""> <i class="bx bx-envelope"></i> </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"> <i class="bx bx-bell"></i> </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"> <i class="bx bx-user"></i> </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        {{-- <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div> --}}
    </header>
    <div class="l-navbar d-none d-md-flex p-0" id="nav-bar">
        <nav class="nav">
            <div>
                {{-- <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">BBBootstrap</span> </a> --}}
                <div class="nav_list"> <a href="#" class="nav_link"> <i class='bx bx-search nav_icon'></i>
                        <span class="nav_name">Dashboard</span> </a> <a href="#" class="nav_link"> <i
                            class='bx bx-user nav_icon'></i> <span class="nav_name">Users</span> </a> <a href="#"
                        class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> <span
                            class="nav_name">Messages</span> </a> <a href="#" class="nav_link"> <i
                            class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Bookmark</span> </a> <a
                        href="#" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span
                            class="nav_name">Files</span> </a> <a href="#" class="nav_link"> <i
                            class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Stats</span> </a>
                </div>
            </div>
            <div>
                <a href="#" class="nav_link"> <i class='bx bx-cog nav_icon'></i> <span
                        class="nav_name">Settings</span> </a>
                {{-- <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div> --}}
                <a href="#" class="nav_link collapse-toggler"><i class='bx bx-menu nav_icon nav-toggler'></i> </a>
            </div>
        </nav>
        <nav class="bg-white" style="flex-grow: 1; width: 40%">
            <a href="#" class="nav_link"> <i class='bx bxs-dashboard nav_icon'></i> <span
                    class="nav_name">Dashboard</span> </a>
            <a href="#" class="nav_link"> <i class='bx bx-group nav_icon'></i> <span
                    class="nav_name">Users</span> </a>
            <a href="#" class="nav_link"> <i class='bx bx-collection nav_icon'></i> <span
                    class="nav_name">Departments</span> </a>
            <a href="#" class="nav_link"> <i class='bx bxs-user-account nav_icon'></i> <span
                    class="nav_name">Employee</span> </a>
            <a href="#" class="nav_link"> <i class='bx bx-chip nav_icon'></i> <span
                    class="nav_name">Activities</span> </a>
            <a href="#" class="nav_link"> <i class='bx bx-chip nav_icon'></i> <span
                    class="nav_name">Holidays</span> </a>
            <a href="#" class="nav_link"> <i class='bx bx-chip nav_icon'></i> <span
                    class="nav_name">Events</span> </a>
            <a href="#" class="nav_link"> <i class='bx bx-chip nav_icon'></i> <span
                    class="nav_name">Payroll</span> </a>

            <a href="#" class="nav_link"> <i class='bx bx-chip nav_icon'></i> <span
                    class="nav_name">Accounts</span> </a>
            <a href="#" class="nav_link"> <i class='bx bx-chip nav_icon'></i> <span
                    class="nav_name">Report</span> </a>
        </nav>
        {{-- <nav class="bg-dark">
            Hello
        </nav> --}}
    </div>
    <!--Container Main start-->
    <main class="height-100">
        {{-- <h4>Main Components</h4> --}}
    </main>
    <!--Container Main end-->

    <a href="#" class="position-fixed d-block d-lg-none" style="z-index: 20; left: 20px; bottom: 20px">
        <i class="bx bx-plus rounded-circle bg-primary text-white p-2 nav-toggler" style="font-size: 28px"></i>
    </a>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(() => {
            $(window).resize(() => {
                    document.documentElement.style.setProperty('--nav-width', $('#nav-bar').width() + 'px');
                })
                .resize();

            $('.nav-toggler').click((e) => {
                $('#nav-bar').toggleClass('show');
                $('.nav-toggler').toggleClass('bx-x');
                document.documentElement.style.setProperty('--nav-width', $('#nav-bar').width() + 'px');
                $('body').toggleClass('nav-open');
                // $('body, header').css('padding-left', "calc(" + ($('#nav-bar').width() + 'px') + " + 1rem)");
                // $('.header').toggleClass('body-pd');
            });

            /*===== LINK ACTIVE =====*/
            const linkColor = document.querySelectorAll('.nav_link:not(.collapse-toggler)')

            function colorLink() {
                if (linkColor) {
                    linkColor.forEach(l => l.classList.remove('active'))
                    this.classList.add('active')
                }
            }
            linkColor.forEach(l => l.addEventListener('click', colorLink))

            // Your code to run since DOM is loaded and ready
        })
    </script>
</body>

</html>
