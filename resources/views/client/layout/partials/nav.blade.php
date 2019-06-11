 <div class="container-fluid" style="background-color: #2f2b35">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="navbar navbar-expand-lg home-nav-bar">
                <div class="navbar-header pull-left">
                    <a class="navbar-brand nav-bar-logo mt-3" href="{{ route('home') }}">Bookie</a>  
                </div> 

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars nav-bar-burger" aria-hidden="true"></i>
                 </button>
               
                <div id="navbarNavDropdown" class="navbar-collapse collapse nav-bar-elements">        
                    <ul class="navbar-nav nav-dropdown nav-middle-buttons">
                        <li class="nav-item dropdown">                
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{ route('books.index') }}">Bookstore</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{ url('/register') }}">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{ url('/register') }}">VC Add-ons</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{ url('/customerLogin') }}">My Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{ url('/register') }}">Contact</a>
                        </li>
                    </ul>       
                </div>
                <div class="col-1">
                    <div class="pull-right ml-auto">
                        <a href="{{ url('/cartPage') }}">
                            <button class="nav-bar-cart-button">
                                <i class="fa fa-shopping-basket nav-bar-cart-icon" aria-hidden="true"></i>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
       </div>