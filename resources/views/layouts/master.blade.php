<!DOCTYPE html>
<!--This is a starter template page. Use this page to start your new project fromscratch. This page gets rid of all links and provides the needed markup only.-->
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <title>{{config('app.name', 'Laravel')}}</title>
        <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css" />
        
    </head>
    <body class="hold-transition sidebar-mini">
        
        <div class="wrapper">
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
               <ul class="navbar-nav ml-auto">
                   <li class="nav-item">
                    <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{__('Logout')}}</a>
                   </li>
               </ul>
                <form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">@csrf</form>
            </nav>
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <a class="brand-link" href="{{route('home')}}">{{config('app.name', 'Laravel')}}</a>
                <div class="sidebar">
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                            <li class="nav-item">
                                <a href="{{route('categories.index')}}" class="nav-link">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>Categories</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('courses.index')}}" class="nav-link">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>Courses</p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
            <div class="content-wrapper"><div class="content"> 
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @yield('content')</div></div>
            <aside class="control-sidebar control-sidebar-dark">
                <div class="p-3">
                    <h5>Title</h5>
                    <p>Sidebar content</p>
                </div>
            </aside>
            <footer class="main-footer"></footer>
        </div>
        <script src="{{asset('js/app.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.js" data-turbolinks-track="true"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
        
        @yield('js')
       <script>
            $("input[data-bootstrap-switch]").each(function(){
                $(this).bootstrapSwitch();
            })
        </script>
    </body>
</html>
