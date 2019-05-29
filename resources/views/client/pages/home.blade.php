@extends('client.layout.master')

@section('content')

<!------------Carousel------------------------------------------------------->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100 carousel-image" img src="images/book1.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">			    
			    <p class="carousel-subtitle">Reading is the best gift of humanity</p>
			    <h5 class="carousel-title">Keep Reading</h5>
			    <button type="button" class="btn btn-dark text-light carousel-button">See more</button>
			</div>
		</div>			
    <div class="carousel-item">
      <img class="d-block w-100 carousel-image" img src="images/book2.jpg" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">			    
			    <p class="carousel-subtitle">Reading is the best gift of humanity</p>
			    <h5 class="carousel-title">Keep Reading</h5>
			    <button type="button" class="btn btn-dark text-light carousel-button">See more</button>
			</div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 carousel-image" img src="images/book3.jpg" alt="Third slide">
      <div class="carousel-caption d-none d-md-block">			    
			    <p class="carousel-subtitle">Reading is the best gift of humanity</p>
			    <h5 class="carousel-title">Keep Reading</h5>
			    <button type="button" class="btn btn-dark text-light carousel-button">See more</button>
			</div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!------------Jumbotron------------------------------------------------------->

<div class="container-fluid search-bar py-3">
	<div class="row" align="center">	
    <div class="col-sm-12 col-md-3 col-lg-3 p-2">
	  <input type="text" class="search-bar-elements text-secondary" placeholder="Book Title" aria-label="Recipient's username" aria-describedby="basic-addon2">
		</div>	
		<div class="dropdown col-sm-12 col-md-3 col-lg-3 p-2">
		  <button class="btn btn-secondary dropdown-toggle search-bar-elements text-secondary d-block" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		   	Book Category
		  </button>
		  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
		    <a class="dropdown-item" href="#">Action</a>
		    <a class="dropdown-item" href="#">Another action</a>
		    <a class="dropdown-item" href="#">Something else here</a>
		  </div>
		</div>
		<div class="dropdown col-sm-12 col-md-3 col-lg-3 p-2">
		  <button class="btn btn-secondary dropdown-toggle search-bar-elements text-secondary d-block" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		   	Book Author
		  </button>
		  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
		    <a class="dropdown-item" href="#">Action</a>
		    <a class="dropdown-item" href="#">Another action</a>
		    <a class="dropdown-item" href="#">Something else here</a>
		  </div>
		</div>
		<div class="col-sm-12 col-md-3 col-lg-3 p-2">
			<button type="button" class="btn btn-dark search-bar-find-button text-light d-block">FIND BOOK</button>
		</div>
	</div>
</div>


<!-----------------------popular books------------------------------------------->
<div class="container-fluid">
	<div class="row title-display mt-3">
	  <div class="col">Popular Books</div>
	</div>
	<div class="row popular-books-display pb-5">		
	  <div class="col-sm-12 col-md-6 col-lg-3 p-md-1 p-sm-2">
	  	<div class="popular-books-container pb-5">
		  	<img src="images/popular1.jpg" class="popular-books-image mt-2">
		  	<p class="popular-books-name">Destroy me</p>
		  	<i class="popular-books-author">Taherah Mafi</i>
		  	<p class="popular-books-price">$2.00</p>
		  	<button type="button" class="btn btn-dark text-light">Detail</button>
		  	<button type="button" class="btn btn-dark text-light">Buy</button>		 
	  	</div> 
	  </div>
	 	<div class="col-sm-12 col-md-6 col-lg-3 p-md-1 p-sm-2">	  
	 		<div class="popular-books-container pb-5">
		  	<img src="images/popular2.jpg" class="popular-books-image mt-2">
		  	<p class="popular-books-name">Soul</p>
		  	<i class="popular-books-author">Whoever</i>
		  	<p class="popular-books-price">$23.00</p>
		  	<button type="button" class="btn btn-dark text-light">Detail</button>
		  	<button type="button" class="btn btn-dark text-light">Buy</button>
		  </div>
	  </div>
	  <div class="col-sm-12 col-md-6 col-lg-3 p-md-1 p-sm-2">
	  	<div class="popular-books-container pb-5"> 	
		  	<img src="images/popular3.jpg" class="popular-books-image mt-2">
		  	<p class="popular-books-name">Sita</p>
		  	<i class="popular-books-author">Amish</i>
		  	<p class="popular-books-price">$32.00</p>
		  	<button type="button" class="btn btn-dark text-light">Detail</button>
		  	<button type="button" class="btn btn-dark text-light">Buy</button>
		  </div>
	  </div>
	  <div class="col-sm-12 col-md-6 col-lg-3 p-md-1 p-sm-2">
	  	<div class="popular-books-container pb-5">
		  	<img src="images/popular4.jpg" class="popular-books-image mt-2	">
		  	<p class="popular-books-name">Soaring</p>
		  	<i class="popular-books-author">Kristen Ashley</i>
		  	<p class="popular-books-price">$12.00</p>
		  	<button type="button" class="btn btn-dark text-light">Detail</button>
		  	<button type="button" class="btn btn-dark text-light">Buy</button>
		  </div>
	  </div>		
	</div>
</div>
<!-----------------------featured book------------------------------------------->
<div class="container-fluid">
	<div class="row">
	  <div class="offset-lg-1 col-12 col-md-12 col-lg-3 my-auto pb-5 py-5 featured-books-description-col">
	  	<p class="featured-book-word">Featured Book</p>
	  	<p class="featured-book-title">The complete idiots guide to graphic design</p>
	  	<p class="featured-book-author">Anggi Krisna</p>
	  	<p class="featured-book-description">From advanced selectors to generated content to web fonts, and from gradients, shadows, and rounded corners to elegant animations, CSS3 hold a universe of creative possibilities. No one can better guide you through these galaxies than Dan Cederholm.</p>
	  	<button type="button" class="btn btn-dark text-light">Get this book</button>
	  </div>
	  <div class="col-12 col-md-6 col-lg-4 pb-5 py-5 my-auto" align="center">
	  	<img src="images/popular4.jpg" class="featured-book-image">
	  </div>
	  <div class="col-12 col-md-6 col-lg-4 pb-5 py-5 my-auto" align="center">
	  	<img src="images/popular2.jpg" class="featured-book-image">
	  </div>
	</div>
</div>

<!-----------------------popular courses------------------------------------------->
<div class="container-fluid">
	<div class="row popular-course-title-display">
	  <div class="col">Popular Courses</div>
	</div>
	<div class="row popular-courses-display" align="center">  
	  <div class="col-sm-12 col-md-6 col-lg-3 p-md-1 p-sm-2">	 
	  	<div class="popular-courses-container pb-5">
		  	<img src="images/popular1.jpg" class="popular-courses-image mt-2">
		  	<p class="popular-courses-name d-inline">Destroy me</p>		  	
		  	<button type="button" class="btn btn-dark text-light d-inline">Buy</button>
		  </div>
	  </div>
	 	<div class="col-sm-12 col-md-6 col-lg-3 p-md-1 p-sm-2">
	 		<div class="popular-courses-container pb-5">
		  	<img src="images/popular2.jpg" class="popular-courses-image mt-2">
		  	<p class="popular-courses-name d-inline">Soul</p>		  	
		  	<button type="button" class="btn btn-dark text-light d-inline">Buy</button>
		  </div>
	  </div>
	  <div class="col-sm-12 col-md-6 col-lg-3 p-md-1 p-sm-2">
	  	<div class="popular-courses-container pb-5">
		  	<img src="images/popular3.jpg" class="popular-courses-image mt-2">
		  	<p class="popular-courses-name d-inline">Sita</p>		  	
		  	<button type="button" class="btn btn-dark text-light d-inline">Buy</button>
		  </div>
	  </div>
	  <div class="col-sm-12 col-md-6 col-lg-3 p-md-1 p-sm-2">
	  	<div class="popular-courses-container pb-5">
		  	<img src="images/popular4.jpg" class="popular-courses-image mt-2">
		  	<p class="popular-courses-name d-inline">Soaring</p>		  	
		  	<button type="button" class="btn btn-dark text-light d-inline">Buy</button>
		  </div>
	  </div>		
	</div>
</div>
<!-----------------------browse collection------------------------------------------->

<div class="container-fluid">
	<img src="images/bookstore.jpg" class="browse-collection-image">
@endsection
