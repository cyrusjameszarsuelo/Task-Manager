<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
    @yield('pageLinks')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('includes.navigation')
        @include('includes.sidebar')

        @yield('content')
        
        @include('includes.footer')
    </div>
    @include('includes.scripts')
    @yield('pageScripts')
</body>

</html>
