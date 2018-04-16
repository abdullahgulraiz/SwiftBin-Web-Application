<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="/main/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/main/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>SwiftBin - @yield('title')</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="/main/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="/main/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="/main/css/paper-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="/main/css/demo.css" rel="stylesheet" />


    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="/main/css/themify-icons.css" rel="stylesheet">
    <style type="text/css">
    @yield('styles')
    </style>
    @yield('header_scripts')
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="/" class="simple-text">
                    SwiftBin
                </a>
            </div>
            <ul class="nav">
                <li{{ (Request::is('bins') || Request::is('bins/*') ? ' class=active' : '') }}>
                    <a href="/bins">
                        <i class="ti-trash"></i>
                        <p>Bins</p>
                    </a>
                </li>
                @if (Auth::user()->hasRole('administrator'))
                <li{{ (Request::is('users') || Request::is('users/*') ? ' class=active' : '') }}>
                    <a href="/users">
                        <i class="ti-user"></i>
                        <p>Users</p>
                    </a>
                </li>
                @endif
				<li class="active-pro">
                    <a href="/logout">
                        <i class="ti-export"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand">@yield('title')</a>
                </div>
                <div class="collapse navbar-collapse"></div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>

                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               About Us
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Contact
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>, <a href="/">SwiftBin</a>
                </div>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="/main/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="/main/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="/main/js/bootstrap-checkbox-radio.js"></script>

	<!--  Charts Plugin -->
	<script src="/main/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="/main/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="/main/js/paper-dashboard.js"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="/main/js/demo.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){

        });
    </script>

        @yield('scripts')

</html>
