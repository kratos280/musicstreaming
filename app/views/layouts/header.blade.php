<!-- header -->
<header>
    <nav class="navbar navbar-default">
        <div class="container">
            <a class="navbar-brand" href="/"></a>
            <ul class="nav navbar-nav">
                <li class="active"><a href=""> Home</a></li>
                <li><a href="">About</a></li>
                <li><a href="">My Profile</a></li>
                <li><a href="">Logout</a></li>
                <li><a href="">Sign Up</a></li>
                <li><a href="">Log In</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <form class="navbar-form" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                            </div>
                        </div>
                    </form>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Username</a></li>
                        <li><a href="#">Settings</a></li>
                        <li><a href="#">Privacy</a></li>
                        <li class="divider"></li>
                        <li><a href="{% url 'logout' %}">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>

