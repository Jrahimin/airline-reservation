<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ $settings['company_name'] }} Admin</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

    <!-- Jquery Ui -->
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet" />

    <!-- Dropzone css -->
    <link href={{ asset('css/dropzone.css')}} rel="stylesheet" />

    <!--  Light Bootstrap Table core CSS    -->
    <link href={{ asset('css/navbar-fixed-side.css')}} rel="stylesheet"/>


    <!-- Bootstrap Datepicker css -->
    <link href={{ asset('css/bootstrap-datepicker.css')}} rel="stylesheet"/>

    <!--     Fonts and icons     -->

    <link href='{{ asset('fonts/fonts.css') }}' rel='stylesheet' type='text/css'>
    <link href={{ asset('css/pe-icon-7-stroke.css')}} rel="stylesheet" />
    <link href={{ asset('css/tagit.ui-zendesk.css')}} rel="stylesheet" />
    <link href={{ asset('css/jquery.tagit.css')}} rel="stylesheet" />
    <link href="{{ asset('css/bootstrap-switch.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/ezpos.css') }}">
    <!-- Select2 -->
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/datatables.min.css') }}"/>

    <link rel="stylesheet" href="{{ asset('css/AdminLTE.css') }}">
    <link rel="stylesheet" href="{{ asset('css/skins/skin-blue.min.css') }}">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">





</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a class="logo" href="{{ url('/') }}">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>{{ $settings['company_name'][0] }}</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><img style="border-radius: 50px;padding:5px;" src="{{ asset('images/logo.png?') }}" height="50px" width="50px"> <b>{{ $settings['company_name'] }}</b> Admin</span>
        </a>

        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <a href="" class="navbar-brand">Airlines</a>

            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ asset('images/profile.png') }}" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        </a>


                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{ asset('images/profile.png') }}" class="img-circle" alt="User Image">
                                <p>
                                    {{ Auth::user()->name }}
                                    <small>Member since {{ gmdate("F d, Y",strtotime(\Illuminate\Support\Facades\Auth::user()->created_at)) }}</small>
                                </p>
                            {{--</li>--}}

                            <!-- Menu Body -->
                                <!-- <li class="user-body">

                                </li> -->

                                <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{ route('edit_user',["user"=>\Illuminate\Support\Facades\Auth::User()->id]) }}" class="btn btn-default btn-flat">Profile</a>
                                </div>

                                <div class="pull-right">
                                    <a href="#" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Sign out</a>
                                    <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> </form>
                                    <a href="{{ route('change_settings') }}"><span class="hidden-xs"><i class="fa fa-cog fa-spin fa-fw margin-bottom"></i></span></a>

                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ asset('images/profile.png') }}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <p class="text-muted">Airlines</p>
                </div>
            </div>

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                {{--<li class="header">MAIN NAVIGATION</li>--}}
                @role('Admin')
                <li><a href="{{route('view_all_user')}}"><i class="fa fa-users" aria-hidden="true"></i><span>Users</span></a></li>
                <li><a href="{{route('view_all_port')}}"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i><span>Airport</span></a></li>
                <li><a href="{{route('view_all_passenger_type')}}"><i class="fa fa-street-view" aria-hidden="true"></i><span>Passenger Type</span></a></li>
                <li><a href="{{route('view_all_airplane')}}"><i class="fa fa-plane" aria-hidden="true"></i><span>Airplane</span></a></li>
                <li><a href="{{route('view_all_trip')}}"><i class="fa fa-tripadvisor" aria-hidden="true"></i><span>Trip</span></a></li>
                <li><a href="{{route('all_order')}}"><i class="fa fa-first-order" aria-hidden="true"></i><span>Order</span></a></li>
                <li><a href="{{route('all_ticket')}}"><i class="fa fa-ticket" aria-hidden="true"></i><span>Ticket</span></a></li>
                <li><a href="{{route('view_all_roles')}}"><i class="fa fa-cog" aria-hidden="true"></i><span>Role</span></a></li>
                @endrole
            </ul>
        </section>
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @yield('pageTitle')
            </h1>

            @yield('breadcrumbs')
        </section>

        <!-- Main content -->
        <section class="content">
            @yield('content')
        </section>
    </div>

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 0.3.0
        </div>

        <strong>Copyright &copy; 2017-{{date('Y')}} <a href="#">Grims Technologies</a>.</strong> All rights reserved.
    </footer>
</div> <!-- ./wrapper -->

<!-- Scripts -->
<!-- JS Scripts -->

<!--   Core JS Files   -->
<script src="{{ asset('js/jquery.min.js')  }}" type="text/javascript" charset="utf-8"></script>
<script src="{{ asset('js/jquery-ui.min.js') }}" type="text/javascript" charset="utf-8"></script>
<script src="{{ asset("js/tag-it.js")}}" type="text/javascript" charset="utf-8"></script>
<script src={{ asset('js/bootstrap.min.js')}} type="text/javascript"></script>

<!-- Admin LTE -->
<script src="{{ asset('js/adminlte.js') }}"></script>

<!-- Chart JS -->
<script src = "{{asset('js/Chart.min.js')}}" type="text/javascript" charset="UTF-8"></script>


<!-- Data table -->
<script type="text/javascript" src="{{ asset('DataTables/datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset("DataTables/mark.min.js") }}"></script>
<script type="text/javascript" src="{{ asset("js/datatables.mark.js") }}"></script>
<!-- Select 2 -->
<script src="{{ asset('js/select2.min.js') }}"></script>

<!-- Bootstrap DatePicker JS -->
<script src={{ asset('js/bootstrap-datepicker.js')}} type="text/javascript"></script>



<!-- Token Input js -->
<script src={{ asset('js/jquery.tokeninput.js')}}></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src={{ asset('js/bootstrap-checkbox-radio-switch.js')}}></script>

<!--  Dropzone ZS -->
<script src={{ asset('js/dropzone.js')}}></script>

<!--  Charts Plugin -->

<!--  Notifications Plugin    -->
<script src={{ asset('js/bootstrap-notify.js')}}></script>

<!-- Random Color -->
<script src={{ asset('js/randomColor.js')}}></script>


<script type="text/javascript">
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.extend(true, $.fn.dataTable.defaults, {
            mark: true
        });

        var is_error = '{{ ( session()->has('error')) ? session()->get('error') : 0 }}';

        if(is_error!="0"){

            $.notify({
                icon: 'pe-7s-gift',
                message: is_error

            },{
                type: 'danger',
                timer: 4000
            });
        }

        var is_success = '{{ ( session()->has('success')) ? session()->get('success') : 0 }}';

        if(is_success!="0"){

            $.notify({
                icon: 'pe-7s-gift',
                message: is_success

            },{
                type: 'success',
                timer: 4000
            });
        }


        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@yield('additionalJS')

</body>
</html>
