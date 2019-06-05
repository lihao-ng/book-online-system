<div class="navbar navbar-expand-lg home-nav-bar">
    <a class="navbar-brand nav-bar-logo mt-3" href="#">Bookie</a>    
    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fa fa-bars nav-bar-burger" aria-hidden="true"></i>
  </button>
    <div id="navbarNavDropdown" class="navbar-collapse collapse nav-bar-elements">        
        <ul class="navbar-nav nav-dropdown m-auto nav-middle-buttons">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-light" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Home
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="{{ url('/login') }}">Bookstore</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="{{ url('/register') }}">Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="{{ url('/register') }}">VC Add-ons</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="{{ url('/register') }}">My Account</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="{{ url('/register') }}">Contact</a>
            </li>
        </ul>       
    </div>
    <div class="ml-auto">
      <button class="nav-bar-cart-button">
        <i class="fa fa-shopping-basket nav-bar-cart-icon" aria-hidden="true"></i>
      </button>
    </div>
</div>
