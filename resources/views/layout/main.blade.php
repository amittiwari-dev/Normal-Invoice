<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>F&B Services Management || @yield('title')</title>
    <meta name="description" content="" />
    <!-- Morris Charts CSS -->
    <link href="{{ url(asset('assets/vendors/morris.js/morris.css')) }}" rel="stylesheet" type="text/css" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Bootstrap Dropzone CSS -->
    <link href="{{ url(asset('assets/vendors/dropify/dist/css/dropify.min.css')) }}" rel="stylesheet" type="text/css" />
    <!-- Data Table CSS -->
    <link href="{{ url(asset('assets/vendors/datatables.net-dt/css/jquery.dataTables.min.css')) }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ url(asset('assets/vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css')) }}"
        rel="stylesheet" type="text/css" />
    <!-- Toggles CSS -->
    <link href="{{ url(asset('assets/vendors/jquery-toggles/css/toggles.css')) }}" rel="stylesheet" type="text/css">
    <link href="{{ url(asset('assets/vendors/jquery-toggles/css/themes/toggles-light.css')) }}" rel="stylesheet"
        type="text/css">


    <!-- select2 CSS -->
    <link href="{{ url(asset('assets/vendors/select2/dist/css/select2.min.css')) }}" rel="stylesheet" type="text/css" />


    <!-- Custom CSS -->
    <link href="{{ url(asset('assets/dist/css/style.css')) }}" rel="stylesheet" type="text/css">
    <link href="{{ url(asset('assets/dist/css/app.css?v=1.1.0')) }}" rel="stylesheet" type="text/css">


    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: Arial, sans-serif;
            /* padding: 40px; */
        }
    </style>


</head>

<body>

    <!-- HK Wrapper -->
    <div class="hk-wrapper hk-vertical-nav">
        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-xl navbar-light fixed-top hk-navbar">
            <a id="navbar_toggle_btn" class="navbar-toggle-btn nav-link-hover" href="javascript:void(0);"><span
                    class="feather-icon"><i data-feather="menu"></i></span></a>
            <a class="navbar-brand" href="{{ url('index') }}">
               <h4>Invoice Services Management</h2>
            </a>
            <ul class="navbar-nav hk-navbar-content">

                <li class="nav-item dropdown dropdown-authentication">
                    <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <div class="media">
                            <div class="media-img-wrap">
                                <div class="avatar">
                                    <img src="{{ url(asset('assets/dist/img/active-user.png')) }}" alt="user"
                                        class="avatar-img rounded-circle">
                                </div>
                                <span class="badge badge-success badge-indicator"></span>
                            </div>
                            <div class="media-body">
                                {{-- Admin Login --}}
                                <span>Super Admin Login<i class="zmdi zmdi-chevron-down"></i></span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="flipInX"
                        data-dropdown-out="flipOutX">
                        <a hidden class="dropdown-item" href="#profile"><i
                                class="dropdown-icon zmdi zmdi-account"></i><span>Profile</span></a>
                        <a hidden class="dropdown-item" href="#passup"><i
                                class="dropdown-icon zmdi zmdi-account"></i><span>Change Password</span></a>
                        <a class="dropdown-item" href="{{ url('logout') }}"><i
                                class="dropdown-icon zmdi zmdi-power"></i><span>Log out</span></a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /Top Navbar -->
        <!-- Vertical Nav -->
        <nav class="hk-nav hk-nav-dark">
            <a href="javascript:void(0);" id="hk_nav_close" class="hk-nav-close"><span class="feather-icon"><i
                        data-feather="x"></i></span></a>
            <div class="nicescroll-bar">
                <div class="navbar-nav-wrap">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('index') }}">
                                <span class="feather-icon"><i data-feather="activity"></i></span>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>



                    </ul>

                    <hr class="nav-separator">
                    <div class="nav-header">
                        <span>Getting Started</span>
                        <span>GS</span>
                    </div>
                    <ul class="navbar-nav flex-column">

                        <li class="nav-item">

                            <a class="nav-link" href="{{ url('#') }}">
                                <span class="feather-icon"><i data-feather="server"></i></span>
                                About Software
                            </a>

                        </li>
                        <li class="nav-item">

                            <a class="nav-link" href="{{ route('client.list') }}">
                                <span class="feather-icon"><i data-feather="server"></i></span>
                                Client Registration
                            </a>

                        </li>

                        <li class="nav-item">

                            <a class="nav-link" href="{{ route('invoices') }}">
                                <span class="feather-icon"><i data-feather="server"></i></span>
                                Invoice
                            </a>

                        </li>






                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse"
                                data-target="#masters">
                                <span class="feather-icon"><i data-feather="server"></i></span>
                                <span class="nav-link-text">Invoice Reports </span>
                            </a>
                            <ul id="masters" class="nav flex-column collapse collapse-level-1">
                                <li class="nav-item">
                                    <ul class="nav flex-column">

                                        <li class="nav-item" hidden="">
                                            <a class="nav-link">Daily Food Supply Report</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link">Daily Sacle wise Consumption Report</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link">Daily Item wise Consumption Report</a>
                                        </li>
                                        <li class="nav-item" hidden>
                                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse"
                                                data-target="#bop">
                                                BOP
                                            </a>
                                            <ul id="bop" class="nav flex-column collapse collapse-level-2">
                                                <li class="nav-item">
                                                    <ul class="nav flex-column">
                                                        <li class="nav-item">
                                                            <a class="nav-link"
                                                                href="{{ url('bop-create') }}">Create</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link"
                                                                href="{{ url('admin/bop-list') }}">List</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link"
                                                                href="{{ url('admin/bop-supplier') }}">Amendments</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item" hidden>
                                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse"
                                                data-target="#machine">
                                                Machine
                                            </a>
                                            <ul id="machine" class="nav flex-column collapse collapse-level-2">
                                                <li class="nav-item">
                                                    <ul class="nav flex-column">
                                                        <li class="nav-item">
                                                            <a class="nav-link"
                                                                href="{{ url('add-machine') }}">Create</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link"
                                                                href="{{ url('admin/list-machine') }}">List</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>



                        <!-- <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#masters">
                        <span class="feather-icon"><i data-feather="server"></i></span>
                        <span class="nav-link-text">Masters</span>
                    </a>
                    <ul id="masters" class="nav flex-column collapse collapse-level-1">
                        <li class="nav-item">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="#/enroll">Customer Rate</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Raw Material</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">BOP</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Machine</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li> -->
                    </ul>
                </div>
            </div>
        </nav>
        <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
        <!-- /Vertical Nav -->
        @yield('otherPage')


    </div>
    <!-- /HK Wrapper -->

    <!-- jQuery -->


    <script src="{{ url(asset('assets/vendors/jquery/dist/jquery.min.js')) }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ url(asset('assets/vendors/popper.js')) }}/dist/umd/popper.min.js'))}}"></script>
    <script src="{{ url(asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js')) }}"></script>
    <!-- Dropify JavaScript -->
    <script src="{{ url(asset('assets/vendors/dropify/dist/js/dropify.min.js')) }}"></script>
    <!-- Form Flie Upload Data JavaScript -->
    <script src="{{ url(asset('assets/dist/js/form-file-upload-data.js')) }}"></script>
    <!-- Slimscroll JavaScript -->
    <script src="{{ url(asset('assets/dist/js/jquery.slimscroll.js')) }}"></script>

    <!-- Fancy Dropdown JS -->
    <script src="{{ url(asset('assets/dist/js/dropdown-bootstrap-extended.js')) }}"></script>
    <!-- print js -->
    <script src="{{ url(asset('assets/dist/js/jQuery.print.js')) }}"></script>
    <!-- Toggles JavaScript -->
    <script src="{{ url(asset('assets/vendors/jquery-toggles/toggles.min.js')) }}"></script>
    <script src="{{ url(asset('assets/dist/js/toggle-data.js')) }}"></script>

    <script src="{{ url(asset('assets/vendors/select2/dist/js/select2.full.min.js')) }}"></script>
    <script src="{{ url(asset('assets/dist/js/select2-data.js')) }}"></script>


    <!-- Select2 JS -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
    <!-- Data Table JavaScript -->
    <script src="{{ url(asset('assets/vendors/datatables.net/js/jquery.dataTables.min.js')) }}"></script>
    <script src="{{ url(asset('assets/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')) }}"></script>
    <script src="{{ url(asset('assets/vendors/datatables.net-dt/js/dataTables.dataTables.min.js')) }}"></script>
    <script src="{{ url(asset('assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')) }}"></script>
    <script src="{{ url(asset('assets/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')) }}"></script>
    <script src="{{ url(asset('assets/vendors/datatables.net-buttons/js/buttons.flash.min.js')) }}"></script>
    <script src="{{ url(asset('assets/vendors/jszip/dist/jszip.min.js')) }}"></script>
    <script src="{{ url(asset('assets/vendors/pdfmake/build/pdfmake.min.js')) }}"></script>
    <script src="{{ url(asset('assets/vendors/pdfmake/build/vfs_fonts.js')) }}"></script>
    <script src="{{ url(asset('assets/vendors/datatables.net-buttons/js/buttons.html5.min.js')) }}"></script>
    <script src="{{ url(asset('assets/vendors/datatables.net-buttons/js/buttons.print.min.js')) }}"></script>
    <script src="{{ url(asset('assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')) }}"></script>
    <script src="{{ url(asset('assets/dist/js/dataTables-data.js')) }}"></script>

    <!-- FeatherIcons JavaScript -->
    <script src="{{ url(asset('assets/dist/js/feather.min.js')) }}"></script>

    <!-- Init JavaScript -->
    <script src="{{ url(asset('assets/dist/js/init.js')) }}"></script>
    <script src="{{ url(asset('assets/dist/js/validation-data.js')) }}"></script>


    <!-- Counter Animation JavaScript -->
    <script src="{{ url(asset('assets/vendors/waypoints/lib/jquery.waypoints.min.js')) }}"></script>
    <script src="{{ url(asset('assets/vendors/jquery.counterup/jquery.counterup.min.js')) }}"></script>

    <!-- Easy pie chart JS -->
    <script src="{{ url(asset('assets/vendors/easy-pie-chart/dist/jquery.easypiechart.min.js')) }}"></script>

    <!-- Sparkline JavaScript -->
    <script src="{{ url(asset('assets/vendors/jquery.sparkline/dist/jquery.sparkline.min.js')) }}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{ url(asset('assets/vendors/raphael/raphael.min.js')) }}"></script>
    <script src="{{ url(asset('assets/vendors/morris.js/morris.min.js')) }}"></script>

    <!-- EChartJS JavaScript -->
    <script src="{{ url(asset('assets/vendors/echarts/dist/echarts-en.min.js')) }}"></script>

    <!-- Peity JavaScript -->
    <script src="{{ url(asset('assets/vendors/peity/jquery.peity.min.js')) }}"></script>

    <script type="text/javascript">
        var site_url = `{{ url('') }}`;
        var minRows = 1;
        var quotationSrc = '';
        var Items_client = {};
    </script>





</body>

</html>
