 <div class="container-fluid" style="background-color: #2f2b35">
  <div class="row justify-content-center">
    <div class="col-10">
      <div class="navbar navbar-expand-lg home-nav-bar">
         <div class="navbar-header pull-left nav-title">
          <a class="navbar-brand nav-bar-logo mt-3" href="{{ route('home') }}">Bookie</a>  
         </div> 

         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
         <i class="fa fa-bars nav-bar-burger" aria-hidden="true"></i>
         </button>

         <div id="navbarNavDropdown" class="navbar-collapse collapse nav-bar-elements">        
          <ul class="navbar-nav nav-dropdown nav-middle-buttons ml-2">
            <li class="nav-item dropdown">                
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light ml-2" href="{{ route('books.index') }}">Bookstore
              <i class="fa fa-book ml-1" aria-hidden="true"></i>
              </a>
            </li>
            @if(current_user())
            @if(current_user()->isCustomer())
            <li class="nav-item">
              <a class="nav-link text-light ml-2" href="{{ route('customer.edit.profile') }}">My Account
              <i class="fa fa-user ml-1" aria-hidden="true"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link text-light ml-2" href="{{ route('customer.logout') }}">Log Out
              <i class="fa fa-sign-out ml-1" aria-hidden="true"></i>
              </a>
            </li>
            @endif
            @endif
            
            @if(!current_user())
            <li class="nav-item">
              <a class="nav-link text-light ml-2" href="{{ route('customer.login.show') }}">Login
              <i class="fa fa-sign-in ml-1" aria-hidden="true"></i>
              </a>
            </li>
            @endif
            <li class="nav-item">
              <a class="nav-link text-light ml-2" href="{{ route('contact') }}">Contact Us
              <i class="fa fa-phone-square ml-1" aria-hidden="true"></i>
              </a>
            </li>
          </ul>       
        </div>        
      </div>
    </div>
    <div class="col-1">
      <div class="pull-right ml-auto">
        <a href="{{ route('show.cart') }}">
          <button class="nav-bar-cart-button">
            <i class="fa fa-shopping-basket nav-bar-cart-icon" aria-hidden="true"></i>
          </button>
        </a>
      </div>
    </div>
  </div>
</div>