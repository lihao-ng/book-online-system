<div class="navbar navbar-expand-lg home-nav-bar">
    <a class="navbar-brand" href="#">Bookie</a>
    <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="glyphicon glyphicon-align-justify nav-hamburger"></span>
    </button> -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fa fa-bars" aria-hidden="true"></i>
  </button>
    <div id="navbarNavDropdown" class="navbar-collapse collapse">
        <ul class="navbar-nav mr-auto">                      
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item dropdown nav-bar-elements">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-ite" href="#">Another action</a>
                </div>
            </li>
            <li class="nav-item nav-bar-elements">
                <a class="nav-link" href="{{ url('/login') }}">Login</a>
            </li>
            <li class="nav-item nav-bar-elements">
                <a class="nav-link" href="{{ url('/register') }}">Register</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
         <li class="nav-item">
                <a class="nav-link" href="{{ url('/register') }}">Cart</a>
          </li>
        </ul>
    </div>
</div>
