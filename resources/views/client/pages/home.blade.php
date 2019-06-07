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
			<img class="d-block w-100 carousel-image" img src="images/carousel1.jpg" alt="First slide">      
			<div class="carousel-caption d-none d-block">
				<p class="carousel-subtitle">Reading is the best gift of humanity</p>
				<h5 class="carousel-title">Keep Reading</h5>
				<button type="button" class="btn btn-dark text-light carousel-button">See more</button>
			</div>	
		</div>		
		<div class="carousel-item">
			<img class="d-block w-100 carousel-image" img src="images/carousel2.jpg" alt="Second slide">      
			<div class="carousel-caption d-none d-block">			    
				<p class="carousel-subtitle">Reading is the best gift of humanity</p>
				<h5 class="carousel-title">Keep Reading</h5>
				<button type="button" class="btn btn-dark text-light carousel-button">See more</button>
			</div>
		</div>
		<div class="carousel-item">
			<img class="d-block w-100 carousel-image" img src="images/carousel3.jpg" alt="Third slide">
			<div class="carousel-caption d-none d-block">			    
				<p class="carousel-subtitle">Reading is the best gift of humanity</p>
				<h5 class="carousel-title">Keep Reading</h5>
				<button type="button" class="btn btn-dark text-light carousel-button">See more</button>
			</div>
		</div>
	</div>  
</div>

<!------------Search bar------------------------------------------------------->

<home-search-component></home-search-component>

<!-----------------------popular books------------------------------------------->
<div class="container-fluid">
	<div class="row title-display mt-3">
		<div class="col">Popular Books</div>
	</div>
	<div class="row books-display justify-content-center pb-5">		
		<div class="col-sm-12 col-md-6 col-lg-2 p-md-1 p-sm-2 mr-lg-3 books-row">
			<div class="books-container">
				<img src="images/popular1.jpg" class="books-image mt-2">
				<p class="books-name">Destroy me</p>
				<i class="books-author">Taherah Mafi</i>
				<p class="books-price">$2.00</p>
				<div class="books-buttons-div">
					<button type="button" class="btn books-detail-button">
						<i class="fa fa-paper-plane books-buttons-icon" aria-hidden="true"></i>
						<a href="{{ route('productPage') }}">Detail</a>
					</button>
					<button type="button" class="btn books-buy-button">
						<i class="fa fa-shopping-cart books-buttons-icon" aria-hidden="true"></i>
					Buy</button>
				</div>
			</div> 
		</div>
		<div class="col-sm-12 col-md-6 col-lg-2 p-md-1 p-sm-2 mx-lg-3 books-row">	  
			<div class="books-container">
				<img src="images/popular2.jpg" class="books-image mt-2">
				<p class="books-name">Soul</p>
				<i class="books-author">Whoever</i>
				<p class="books-price">$23.00</p>
				<div class="books-buttons-div">
					<button type="button" class="btn books-detail-button">
						<i class="fa fa-paper-plane books-buttons-icon" aria-hidden="true"></i>
					Detail</button>
					<button type="button" class="btn books-buy-button">
						<i class="fa fa-shopping-cart books-buttons-icon" aria-hidden="true"></i>
					Buy</button>
				</div>
			</div>
		</div>
		<div class="col-sm-12 col-md-6 col-lg-2 p-md-1 p-sm-2 mx-lg-3 books-row">
			<div class="books-container"> 	
				<img src="images/popular3.jpg" class="books-image mt-2">
				<p class="books-name">Sita</p>
				<i class="books-author">Amish</i>
				<p class="books-price">$32.00</p>
				<div class="books-buttons-div">
					<button type="button" class="btn books-detail-button">
						<i class="fa fa-paper-plane books-buttons-icon" aria-hidden="true"></i>
					Detail</button>
					<button type="button" class="btn books-buy-button">
						<i class="fa fa-shopping-cart books-buttons-icon" aria-hidden="true"></i>
					Buy</button>
				</div>
			</div>
		</div>
		<div class="col-sm-12 col-md-6 col-lg-2 p-md-1 p-sm-2 ml-lg-3 books-row">
			<div class="books-container">
				<img src="images/popular4.jpg" class="books-image mt-2	">
				<p class="books-name">Soaring</p>
				<i class="books-author">Kristen Ashley</i>
				<p class="books-price">$12.00</p>
				<div class="books-buttons-div">
					<button type="button" class="btn books-detail-button">
						<i class="fa fa-paper-plane books-buttons-icon" aria-hidden="true"></i>
					Detail</button>
					<button type="button" class="btn books-buy-button">
						<i class="fa fa-shopping-cart books-buttons-icon" aria-hidden="true"></i>
					Buy</button>
				</div>
			</div>
		</div>		
	</div>
</div>

<!-----------------------featured book------------------------------------------->
<div class="container-fluid">
	<div class="row">
		<div class="offset-lg-1 col-12 col-md-12 col-lg-3 my-auto pb-5 py-5 featured-books-description-col">
			<p class="featured-book-word">Featured Book</p>
			<p class="featured-book-title">How to make thousands online</p>
			<p class="featured-book-author">Anggi Krisna</p>
			<p class="featured-book-description">From advanced selectors to generated content to web fonts, and from gradients, shadows, and rounded corners to elegant animations, CSS3 hold a universe of creative possibilities. No one can better guide you through these galaxies than Dan Cederholm.</p>
			<button type="button" class="btn btn-dark text-light">Get this book</button>
		</div>
		<div class="col-12 col-md-6 col-lg-4 pb-5 py-5 my-auto" align="center">
			<img src="images/featured1.jpg" class="featured-book-image">
		</div>
		<div class="col-12 col-md-6 col-lg-4 pb-5 py-5 my-auto" align="center">
			<img src="images/featured2.jpg" class="featured-book-image">
		</div>
	</div>
</div>

<!-----------------------popular courses------------------------------------------->
<div class="container-fluid">
	<div class="row popular-course-title-display">
		<div class="col">Popular Courses</div>
	</div>
	<div class="row popular-courses-display justify-content-center">  
		<div class="col-sm-12 col-md-6 col-lg-2 p-md-1 p-sm-2 mr-lg-4">	 
			<div class="popular-courses-container pb-5">
				<img src="images/popular1.jpg" class="popular-courses-image mt-2">
				<p class="popular-courses-name d-inline-block mt-4">Destroy me</p>		  	
				<button type="button" class="btn btn-dark text-light d-inline-block float-right mt-3 mr-3">Buy</button>
			</div>
		</div>
		<div class="col-sm-12 col-md-6 col-lg-2 p-md-1 p-sm-2 mx-lg-4">
			<div class="popular-courses-container pb-5">
				<img src="images/popular2.jpg" class="popular-courses-image mt-2">
				<p class="popular-courses-name d-inline-block mt-4">Soul</p>		  	
				<button type="button" class="btn btn-dark text-light d-inline-block float-right mt-3 mr-3">Buy</button>
			</div>
		</div>
		<div class="col-sm-12 col-md-6 col-lg-2 p-md-1 p-sm-2 mx-lg-4">
			<div class="popular-courses-container pb-5">
				<img src="images/popular3.jpg" class="popular-courses-image mt-2">
				<p class="popular-courses-name d-inline-block mt-4">Sita</p>		  	
				<button type="button" class="btn btn-dark text-light d-inline-block float-right mt-3 mr-3">Buy</button>
			</div>
		</div>
		<div class="col-sm-12 col-md-6 col-lg-2 p-md-1 p-sm-2 ml-lg-4">
			<div class="popular-courses-container pb-5">
				<img src="images/popular4.jpg" class="popular-courses-image mt-2">
				<p class="popular-courses-name d-inline-block mt-4">Soaring</p>		  	
				<button type="button" class="btn btn-dark text-light d-inline-block float-right mt-3 mr-3">Buy</button>
			</div>
		</div>		
	</div>
</div>

<!-----------------------browse collection------------------------------------------->
<div class="container-fluid">
	<div class="row browse-collection-image-filter">
		<img src="images/bookstore.jpg" class="browse-collection-image">
		<!-----change this to background image-------->
		<div class="browse-collection-word">Browse Through Our Complete Library</div>
		<button type="button" class="btn btn-primary browse-collection-button">BROWSE COLLECTION</button>
	</div>
</div>

<!-----------------------informative section------------------------------------------->
<div class="container-fluid">
	<div class="row justify-content-center py-5" align="center">
		<div class="col-lg-3">
			<i class="fa fa-book informative-section-icons py-4" style="color: #27c8ea" aria-hidden="true"></i>
			<p class="informative-section-titles">Tons of Books</p>
			<p class="informative-section-text">From advanced selectors to generated content to web fonts, and from gradients, shadows, and rounded corners. to elegant animations.</p>
		</div>
		<div class="col-lg-3">
			<i class="fa fa-pencil informative-section-icons py-4" style="color: #86e154" aria-hidden="true"></i>
			<p class="informative-section-titles">Hundreds of Authors</p>
			<p class="informative-section-text">To elegant animations. , CSS3 holds a universe of creative possibilities. No one can better guide you through.</p>
		</div>
		<div class="col-lg-3">
			<i class="fa fa-bookmark informative-section-icons py-4" style="color: #f4424e" aria-hidden="true"></i>
			<p class="informative-section-titles">Easily bookmarked</p>
			<p class="informative-section-text">Shadows, and rounded corners. to elegant animations. , CSS3 holds a universe of creative possibilities. No one can better guide you through.</p>
		</div>
	</div>
</div>

<!-----------------------new books------------------------------------------->
<div class="container-fluid">
	<div class="row title-display mt-3">
		<div class="col">New Books</div>
	</div>
	<div class="row books-display pb-5 justify-content-center">		
		<div class="col-sm-12 col-md-6 col-lg-2 p-md-1 p-sm-2 mr-lg-3 books-row">
			<div class="books-container">
				<img src="images/newbook1.jpg" class="books-image mt-2">
				<p class="books-name">Spectre of Springwell Forest</p>
				<i class="books-author">Simon Dillon</i>
				<p class="books-price">$2.00</p>
				<div class="books-buttons-div">
					<button type="button" class="btn books-detail-button">
						<i class="fa fa-paper-plane books-buttons-icon" aria-hidden="true"></i>
					Detail</button>
					<button type="button" class="btn books-buy-button">
						<i class="fa fa-shopping-cart books-buttons-icon" aria-hidden="true"></i>
					Buy</button>
				</div> 
			</div> 
		</div>
		<div class="col-sm-12 col-md-6 col-lg-2 p-md-1 p-sm-2 mx-lg-3 books-row">	  
			<div class="books-container">
				<img src="images/newbook2.jpg" class="books-image mt-2">
				<p class="books-name">Young Elites</p>
				<i class="books-author">Marie Lu</i>
				<p class="books-price">$23.00</p>
				<div class="books-buttons-div">
					<button type="button" class="btn books-detail-button">
						<i class="fa fa-paper-plane books-buttons-icon" aria-hidden="true"></i>
					Detail</button>
					<button type="button" class="btn books-buy-button">
						<i class="fa fa-shopping-cart books-buttons-icon" aria-hidden="true"></i>
					Buy</button>
				</div>
			</div>
		</div>
		<div class="col-sm-12 col-md-6 col-lg-2 p-md-1 p-sm-2 mx-lg-3 books-row">
			<div class="books-container"> 	
				<img src="images/newbook3.jpg" class="books-image mt-2">
				<p class="books-name">Tempests and Slaughter</p>
				<i class="books-author">Tamora Pierce</i>
				<p class="books-price">$32.00</p>
				<div class="books-buttons-div">
					<button type="button" class="btn books-detail-button">
						<i class="fa fa-paper-plane books-buttons-icon" aria-hidden="true"></i>
					Detail</button>
					<button type="button" class="btn books-buy-button">
						<i class="fa fa-shopping-cart books-buttons-icon" aria-hidden="true"></i>
					Buy</button>
				</div>
			</div>
		</div>
		<div class="col-sm-12 col-md-6 col-lg-2 p-md-1 p-sm-2 ml-lg-3 books-row">
			<div class="books-container">
				<img src="images/newbook4.jpg" class="books-image mt-2	">
				<p class="books-name">The King of Crows</p>
				<i class="books-author">Libba Bray</i>
				<p class="books-price">$12.00</p>
				<div class="books-buttons-div">
					<button type="button" class="btn books-detail-button">
						<i class="fa fa-paper-plane books-buttons-icon" aria-hidden="true"></i>
					Detail</button>
					<button type="button" class="btn books-buy-button">
						<i class="fa fa-shopping-cart books-buttons-icon" aria-hidden="true"></i>
					Buy</button>
				</div>
			</div>
		</div>		
	</div>
</div>

@endsection
