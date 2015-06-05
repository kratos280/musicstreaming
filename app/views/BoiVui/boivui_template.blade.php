<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="{{{ asset('img/favicon.png') }}}">
    @section('header')

    @show

    <!-- Bootstrap Core CSS -->
    {{ HTML::style('css/bootstrap.min.css') }}

    <!-- Custom CSS -->
    {{ HTML::style('css/business-casual.css') }}

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div class="brand">Bói Vui Miễn Phí</div>

<!-- Navigation -->
<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    {{ link_to('/', "Trang chủ") }}
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<div class="container">

    <div class="row">
        <div class="box">
            <div class="col-lg-12 text-center">

                @yield('content')

            </div>
        </div>
    </div>

</div>
<!-- /.container -->

<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="brand-before">
                    <small>Welcome to</small>
                </h2>
                <h1 class="brand-name">Bói Vui Miễn Phí</h1>
                <hr class="tagline-divider">

                <p>Copyright &copy; Bói Vui Miễn Phí</p>
            </div>
        </div>
    </div>
</footer>

<!-- jQuery -->
{{ HTML::script('js/jquery.js') }}
<!-- Bootstrap Core JavaScript -->
{{ HTML::script('js/bootstrap.min.js') }}

<!-- Script to Activate the Carousel -->
<script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
</script>

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-63796879-1', 'auto');
    ga('send', 'pageview');

</script>

@section('script')

@show

</body>

</html>
